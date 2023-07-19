<?php

namespace MyLibrary\DataBases;
require_once 'IDataAccessLayer.php';

use PDO;

class MySqlDataAccessLayer implements IDataAccessLayer
{

    private string $dataBaseName;
    private string $serverName;
    private string $dbType;
    private string $username;
    private string $password;
    private string $connectionString;
    private PDO $pdoObj;
    private bool $connected=false;

    /**
     * @param $dataBaseName
     */
    public function __construct($dataBaseName)
    {
        $this->dbType = "mysql";
        $this->serverName = "localhost";
        $this->password = '';
        $this->username = 'root';
        $this->dataBaseName = $dataBaseName;
        $this->connectionString = "$this->dbType:host=$this->serverName;dbname=$this->dataBaseName";
    }

    function connect()
    {
        if(!$this->connected)
        {
           // try {
                $this->pdoObj = new PDO($this->connectionString, $this->username, $this->password);
                $this->pdoObj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connected = true;
           // }catch (PDOException $)

        }

    }

    function disconnect()
    {
        $this->pdoObj = null;
        $this->connected=false;
    }

    function isConnected(): bool
    {
        return $this->connected;
    }

    function selectData($queryStr): array
    {
        if(!$this->connected)
            $this->connect();

        if( ($res = $this->pdoObj->query($queryStr))!==false){
           return $res->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }

    }

    function executeCommand($queryStr): bool
    {
        if(!$this->connected)
            $this->connect();

        if( ($res = $this->pdoObj->query($queryStr))!==false){
            return  true ;
        }else{
            return false;
        }
    }

    function getValue(string $queryStr): int
    {
        if(!$this->connected)
            $this->connect();
        if( ($res = $this->pdoObj->query($queryStr))!==false){
           $value = $res->fetchAll(PDO::FETCH_BOTH);
           return (int)$value[0][0];
        }else{
            return false;
        }
    }
}