<?php

class GearJointsInstaller
{
    /**
     * @var Core
     */
    private $core;

    /**
     * @var GearJoint[]
     */
    private $gearJoints;

    /**
     * GearsManagerInstaller constructor.
     * @param Core $core
     */
    public function __construct(Core $core)
    {
        $this->core = $core;
        $this->gearJoints = [];
    }

    public function getGearJointInstances(): array
    {
        $overrideList = [];
        $pureList = [];

        // SCAN GEARS DIRECTORY TO POPULATE JOINTS DATA
        foreach (glob(BASE_DIR . '{' . BASEMOUNTS_SUBDIR . ',' . EXTRAGEARS_SUBDIR . '}/*/{base,gear}.xml', GLOB_BRACE) as $file) {

            $gearConfig = (new GearConfigParser($file))->parse();

            if ($gearConfig) {
                $override = $gearConfig->getOverrideID();
                $overrideList[$gearConfig->getID()] = null;
                if ($override) {

                    if ($overrideList[$override]) {
                        echo "WARNING: Multiple override not supported! [Gear '$override' overridden by '{$overrideList[$override]}' replaced with '{$gearConfig->getID()}']<br>";
                        unset($this->gearJoints[$overrideList[$override]]);
                        unset($overrideList[$overrideList[$override]]);
                    }

                    $overrideList[$override] = $gearConfig->getID();
                }

                $this->gearJoints[$gearConfig->getID()] = new GearJoint($gearConfig);
            }
        }


        // ANALYZE OVERRIDE LIST TO DISABLE OVERRIDDEN GEARS, CHECK IMPLEMENTATIONS AND CREATE REDIRECT IDs TO SET OVERRIDER JOINTs
        foreach ($overrideList as $idToOverride => $overriderId) {

            $joint = $this->gearJoints[$idToOverride];

            if (!$overriderId and !$joint->getConfig()->getOverrideID()) {

                $pureList[] = $joint;

            } else if ($overriderId and !$joint->getConfig()->getOverrideID()) {

                $redirectIDs = [];
                $overriderOriginJoint = $this->gearJoints[$this->goToTopOverrider($idToOverride, $overrideList, $redirectIDs)];

                foreach ($redirectIDs as $redirectID) {
                    $this->gearJoints[$redirectID]->setOverriderJoint($overriderOriginJoint);
                    $this->gearJoints[$redirectID]->setEnabled(false);
                }

                $this->jointSetUp($overriderOriginJoint);
            }
        }

        foreach ($pureList as $pureJoint) {
            $this->jointSetUp($pureJoint);
        }

        return $this->gearJoints;
    }

    /**
     * PROCURE GEAR, INJECT JOINTS AND INIT GEAR
     * @param GearJoint $joint
     */
    private function jointSetUp(GearJoint $joint)
    {
        $gear = $joint->procureGear();
        try {
            $reflection = new \ReflectionClass($gear);

            // INJECT RECURSIVE OVERRIDE-JOINT IF EXIST
            if ($joint->getConfig()->getOverrideID() and $joint->getConfig()->getOverriddenJointFieldName()) {

                $overrideProperty = $reflection->getProperty($joint->getConfig()->getOverriddenJointFieldName());

                if (preg_match('/@var\s+([^\s]+)/', $overrideProperty->getDocComment(), $matches)) {
                    list(, $type) = $matches;

                    $overriddenJoint = $this->gearJoints[$joint->getConfig()->getOverrideID()];
                    if (!$overriddenJoint) {
                        http_response_code('500');
                        echo "ERROR: '{$joint->getID()}' is trying to override '{$joint->getConfig()->getOverrideID()}', a not installed or enabled gear.<br>";
                        die;
                    }

                    $exposedClass = $overriddenJoint->getConfig()->getExposedClass();
                    if (!$exposedClass or $type == $exposedClass) {
                        $overrideProperty->setValue($gear, $overriddenJoint->procureGear());
                        $this->jointSetUp($overriddenJoint);
                    }
                }
            }

            // INJECT CORE-JOINT IF EXIST
            $coreJointField = $joint->getConfig()->getCoreJointFieldName();
            if ($coreJointField) {
                $coreProperty = $reflection->getProperty($coreJointField);
                if ($coreProperty && preg_match('/@var\s+([^\s]+)/', $coreProperty->getDocComment(), $matches)) {
                    list(, $type) = $matches;
                    if ($coreProperty and $type == Core::class) {
                        $coreProperty->setValue($gear, $this->core);
                    }
                }
            }

            // INJECT ALL JOINTS
            foreach ($joint->getConfig()->getJoints() as $jointField => $jointGear) {

                $property = $reflection->getProperty($jointField);
                if ($property) {

                    $enabledJoint = $this->gearJoints[$jointGear]->getImplementedJoint();
                    if (!$enabledJoint) {
                        http_response_code('500');
                        echo "ERROR: '{$joint->getID()}' is trying to join '{$enabledJoint}', a not installed or enabled gear.<br>";
                        die;
                    }

                    if ($enabledJoint && preg_match('/@var\s+([^\s]+)/', $property->getDocComment(), $matches)) {
                        list(, $type) = $matches;

                        if (!$enabledJoint->getConfig()->getExposedClass() or $type == $enabledJoint->getConfig()->getExposedClass())
                            $property->setValue($gear, $enabledJoint->procureGear());
                    }
                }

            }
        } catch (ReflectionException $e) {
        }
        $joint->getGear()->init();
    }

    private function goToTopOverrider(?string $idToOverride, array &$overrideList, array &$redirectIDs): string
    {
        $overriderId = $overrideList[$idToOverride];

        //$overrideList[$idToOverride] = null;

        if ($overriderId) {

            $gearToOverride = $this->gearJoints[$idToOverride];
            $gearOverrider = $this->gearJoints[$overriderId];

            $exposedClass = $gearToOverride->getConfig()->getExposedClass();
            if ($exposedClass and !in_array($exposedClass, class_parents($gearOverrider->getConfig()->getImplementationClass()))) {
                http_response_code(500);
                echo "{$gearOverrider->getConfig()->getImplementationClass()} not correctly implement overridden Gear '$exposedClass' Interface!";
                die;
            }

            $redirectIDs[] = $idToOverride;

            return $this->goToTopOverrider($overriderId, $overrideList, $redirectIDs);
        }

        return $idToOverride;
    }
}