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
 
    public function get_syokutou_by_UID(string $UID)
    {
        $dbh = DAO::get_db_connect();
        $sql = "SELECT * FROM syokutou where UID = :UID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':UID',$UID,PDO::PARAM_STR);
        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('Syokutou'))
        $data[] = $row;
    }


}
?>