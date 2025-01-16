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
 
    public function get_syokutou_by_UID(string $Syokuname)
    {
        $dbh = DAO::get_db_connect();
        $sql = "select DISTINCT Foods.SyokuName,BuyUnitMaster.UnitName 
        From BuyUnitMaster 
        INNER JOIN Nutrients ON Nutrients.UID = BuyUnitMaster.UID 
        INNER JOIN Foods on Nutrients.SyokuID = Foods.SyokuID 
        where SyokuName = :Syokuname";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':UID',$UID,PDO::PARAM_STR);
        $stmt->bindValue(':SyokuName',$SyokuName,PDO::PARAM_STR);
        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('Syokutou'))
        $data[] = $row;
    }

}
?>