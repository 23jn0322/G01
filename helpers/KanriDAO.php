<?php
require_once 'DAO.php';

class Admin
{
    public string $AID;
    public string $APassword;
}    

class MiddleGenre
{
    public string $MiddleGenreID;
    public string $MiddleGenreName;
}

class BuyUnit
{
    public string $UID;
    public string $UnitName;
}

class IUnit
{
    public string $IUID;
    public string $IUnitName;
}

class KanriDAO
{
    public function get_admin(string $AID , string $APassword)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * From admin WHERE AID = :AID AND APassword=:APassword";

        $stmt = $dbh->prepare($sql);

        $stmt->bindvalue(':AID', $AID, PDO::PARAM_STR);
        $stmt->bindvalue(':APassword', $APassword, PDO::PARAM_STR);

        $stmt->execute();

        $admin = $stmt->fetchObject('Admin');

        return $admin;
    }

    public function get_MiddleGenre()
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT MiddleGenreID, MiddleGenreName From MiddleGenre";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        $data = [];

        while($row = $stmt->fetchObject('MiddleGenre')){
            $data[] = $row;
        }

        return $data;
    }

    public function get_BuyUnit()
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * From BuyUnitMaster";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        $data = [];
        
        while($row = $stmt->fetchObject('BuyUnit')){
            $data[] = $row;
        }

        return $data;
    }

    public function get_IUnit()
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * From IntakeUnitMaster";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        $data = [];
        
        while($row = $stmt->fetchObject('IUnit')){
            $data[] = $row;
        }

        return $data;
    }
}


