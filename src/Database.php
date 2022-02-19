<?php

namespace gustin\electraphp;

use Error;

use function PHPSTORM_META\type;

class Database
{
    /**
     * @var string  $hostname
     * @var string  $dsn
     * @var string  $schema
     * @var string  $username
     * @var integer $password
    **/
    private $conn;
    public $dsn;
    public $hostname;
    public $schema;
    public $username;
    public $password;

    public function __construct($hostname, $schema, $username, $password = "",$dsn = "mysql")
    {
        $this->dsn = $dsn;
        $this->hostname = $hostname;
        $this->schema = $schema;
        $this->username = $username;
        $this->password = $password;

        @$this->conn = new \PDO($this->dsn . ":dbname=" . $this->schema . ";hostname=" . $this->hostname . ";", $this->username, $this->password);
    }
    public function __toString()
    {
        try {
            @$this->conn = new \PDO($this->dsn . ":dbname=" . $this->schema . ";hostname=" . $this->hostname . ";", $this->username, $this->password);
            return "Conectado à " . $this->schema . "\n";
        } catch (\Exception $e) {
            return $e->getMessage() . "\n";
            // throw new \Error("Erro");
        }
    }
    /**
     * @param string $rawQuery
     * @param array $params
     */
    public function query($rawQuery, $params = [])
    {
        $conn = $this->conn;
        $conn->beginTransaction();
        $stmt = $conn->prepare($rawQuery);
        try {
            if ($stmt->execute($params)) {
                $conn->commit();
                return $stmt;
            }
        } catch (\Exception $e) {
            $conn->rollBack();
            throw new \Error("Erro ao executar a query.");
        }
        return false;
    }
    /**
     * @param string $table
     */
    public function All($table)
    {
        $table = preg_replace('/[^[:alpha:]_]/', '',$table);
        try {
            $query = $this->query("SELECT * FROM ".$table);
            // if($query == false){
            //     throw new Error("BOOL");
            // }
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new Error("BOL".$e->getMessage());
            if (count($query->fetchAll(\PDO::FETCH_ASSOC)) == 0 || $query == false) {
                return "Error";
            }
        }
    }
}
