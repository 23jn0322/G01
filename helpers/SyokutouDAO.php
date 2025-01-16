<?php
require_once 'DAO.php';

class UID {
    public string $UnitName;
}

class SyokutouDAO{
 
    public function get_syokutou_by_UID(string $Syokuname)
    {
        $dbh = DAO::get_db_connect();
        $sql = "select DISTINCT BuyUnitMaster.UnitName 
        From BuyUnitMaster 
        INNER JOIN Nutrients ON Nutrients.UID = BuyUnitMaster.UID 
        INNER JOIN Foods on Nutrients.SyokuID = Foods.SyokuID 
        where SyokuName = :SyokuName";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':SyokuName',$Syokuname,PDO::PARAM_STR);
        $stmt->execute();

        $UnitName = $stmt->fetchObject("UID");

        return $UnitName;
    }
    
}
?>