<?php
require_once 'DAO.php';

class Admin
{
    public string $AID;
    public string $APassword;

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

    }


