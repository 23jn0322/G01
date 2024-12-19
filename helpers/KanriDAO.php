<?php
require_once 'DAO.php';

class Kanri
{
    public string $AID;
    public string $APassword;

}    

class KanriDAO
{
    public function get_admin(string $AID , string $APassword)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * From admin WHERE AID = :AID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindvalue(':AID', $AID, PDO::PARAM_STR);

        $stmt->execute();

        $kanri = $stmt->fetchObject('Kanri');

        if ($kanri !== false) {
            if (password_verify($APassword, $kanri->APassword)) {
                return $kanri;
            }
        }

        return false;
    }
}