<?php


class BrightDB
{
    /**
     * @return BrightDB
     */
    public static function get(): BrightDB
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();

        return $_SESSION['bright_db'];
    }

    /**
     * @var mysqli $conn
     */
    private $conn;

    /**
     * @var array $dbConfig
     */
    private $dbConfig;

    /**
     * BrightDB constructor.
     * @param array $dbConfig
     */
    public function __construct(array $dbConfig)
    {
        $this->dbConfig = $dbConfig;
    }

    /**
     * @return DBConnResult
     */
    public function init(): DBConnResult
    {
        $this->conn = new mysqli($this->dbConfig['host'], $this->dbConfig['username'], $this->dbConfig['password'], $this->dbConfig['db_name']);
        $connect_error = $this->conn->connect_error;
        return new DBConnResult(!isset($connect_error), isset($connect_error) ? $connect_error : '', (int)$this->conn->connect_errno);
    }

    public function connect()
    {
        $this->conn->connect($this->dbConfig['host'], $this->dbConfig['username'], $this->dbConfig['password'], $this->dbConfig['db_name']);
    }

    public function createDB()
    {
        $this->query('CREATE TABLE IF NOT EXISTS gears (
                                        id VARCHAR(128) PRIMARY KEY,
                                        active BOOLEAN NOT NULL,
                                        isBase BOOLEAN NOT NULL DEFAULT false,
                                        override VARCHAR(128),
                                        CONSTRAINT gear_override_by_gear FOREIGN KEY (override) REFERENCES gears(id)
                                    );');

        /*
        $this->query('CREATE TABLE IF NOT EXISTS joints (
                                        gear VARCHAR(128),
                                        joint VARCHAR(128),
                                        PRIMARY KEY(gear, joint),
                                        CONSTRAINT joints_gear_gears FOREIGN KEY (gear) REFERENCES gears(id),
                                        CONSTRAINT joints_joint_gears FOREIGN KEY (joint) REFERENCES gears(id)
                                    );');

        $this->query('CREATE VIEW Bases AS SELECT * FROM Gears WHERE isBase = true;');
        */
    }

    /**
     * @return bool
     */
    public function isConnectionAlive()
    {
        return $this->conn->ping();
    }

    /**
     * @param string $queryString
     * @return bool|mysqli_result
     */
    public function query(string $queryString)
    {
        $result = $this->conn->query($queryString);
        if ($result === false) {
            echo "QUERY ERROR: {$this->conn->errno} | {$this->conn->error}";
            die;
        }
        return $result;
    }

    public function getAllGears()
    {
        return $this->query("SELECT * FROM gears;");
    }

    /**
     * @param string $id
     * @param bool $active
     * @param string $override
     * @param bool $isBase
     * @return bool|false|mysqli_result
     */
    private function insertGearElement(string $id, bool $active, string $override, bool $isBase)
    {
        /* create a prepared statement */
        if ($stmt = $this->conn->prepare("INSERT INTO gears (id, active, isBase, override) VALUES (?, ?, ?, ?);")) {

            /* bind parameters for markers */
            $stmt->bind_param("siis", $id, $active, $isBase, $override);

            /* execute query */
            $stmt->execute();

            $result = $stmt->get_result();

            /* close statement */
            $stmt->close();

            return $result;
        }
        return false;
    }

    /**
     * @param string $id
     * @param bool $active
     * @param string $override
     */
    public function insertGear(string $id, bool $active, string $override)
    {
        $this->insertGearElement($id, $active, $override, false);
    }

    /**
     * @param string $id
     * @param bool $active
     * @param string $override
     */
    public function insertBase(string $id, bool $active, string $override)
    {
        $this->insertGearElement($id, $active, $override, true);
    }

    /**
     * @param array $gears
     * @return bool|mysqli_result
     */
    public function updateGears(array $gears)
    {
        $valueList = [];
        foreach ($gears as $id => $data) {
            $valueList[] = "('$id'," . ($data['active'] ? 'true' : 'false') . ',' . ($data['isBase'] ? 'true' : 'false') . ',' . ($data['override'] ? "'{$data['override']}'" : 'NULL') . ')';
        }

        return $this->query('INSERT INTO gears (id, active, isBase, override) VALUES ' . implode(',', $valueList)
            . ' ON DUPLICATE KEY UPDATE active = VALUES(active), isBase = VALUES(isBase), override = VALUES(override);');
    }

    public function getGearsNum()
    {
        return $this->query("SELECT COUNT(*) AS NUM FROM gears;")->fetch_assoc()['NUM'];
    }

    public function getActiveGearID(string $id)
    {
        if ($stmt = $this->conn->prepare("SELECT id FROM gears WHERE override = ? AND active = true;")) {
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $stmt->bind_result($replaceID);
            $stmt->close();

            if ($replaceID)
                return $replaceID;

            if ($stmt = $this->conn->prepare("SELECT id FROM gears WHERE id = ? AND active = true;")) {
                $stmt->bind_param("s", $id);
                $stmt->execute();
                $stmt->bind_result($gearID);
                $stmt->close();

                if ($gearID)
                    return $gearID;
            }
        }
        return false;
    }

    public function getInstalledBases()
    {
        return $this->query("SELECT id, override FROM gears WHERE active = true AND (isBase = true OR override IN (SELECT id FROM gears WHERE isBase = true AND active = false));");
    }

    public function getInstalledGears()
    {
        return $this->query("SELECT id, override FROM gears WHERE active = true AND isBase = false AND override NOT IN (SELECT id FROM gears WHERE isBase = true);");

    }
}
