<?php
require_once 'DAO.php';

class Syokutou
{
    public string $MID;
    public string $SyokutouID;
    public string $ResistDate;
    public string $Quantity;
    public string $SyokuID;
    public string $UID;
}   

class SyokutouDAO{
    public function get_syokutou_by_MID(string $MID)
    {
        $dbh = DAO::get_db_connect();
        $sql = "SELECT * FROM syokutou where MID = :MID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':MID',$MID,PDO::PARAM_STR);
        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('Syokutou'))
        $data[] = $row;
    }
}
?>