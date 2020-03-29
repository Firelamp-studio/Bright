<?php


class GearConfigParser
{
    /**
     * @var string $filename
     */
    private $filename;

    /**
     * GearConfigParser constructor.
     * @param $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    function parse(): ?GearConfig
    {
        if (file_exists($this->filename)) {

            $fileXML = simplexml_load_file($this->filename);

            if ($fileXML and $fileXML['id'] and $fileXML['implementation'] and (!$fileXML['ignore'] or !$fileXML['ignore']->__toString())) {


                $isBase = $fileXML->getName() == 'base' ? true : false;
                $id = $fileXML['id']->__toString();

                $coreJoint = $fileXML->xpath('core-joint')[0]['field'];

                $joints = [];
                foreach ($fileXML->joint as $joint) {
                    $joints[$joint['field']->__toString()] = $joint['gear']->__toString();
                }


                $override = $fileXML['override'] ? $fileXML['override']->__toString() : '';
                $overriddenJoint = '';
                if ($override)
                    $overriddenJoint = $fileXML->xpath('override-joint')[0]['field'];

                return new GearConfig($id, $fileXML['implementation']->__toString(), $isBase, ($fileXML['expose'] ? $fileXML['expose']->__toString() : ''), $override, ($coreJoint ? $coreJoint->__toString() : ''), ($overriddenJoint ? $overriddenJoint->__toString() : ''), $joints);
            }

        }

        return null;
    }
}