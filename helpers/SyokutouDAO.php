<?php
require_once 'DAO.php';

class Syokutou
{
    public string $MID;
    public DateTime $ResistDate;
    public string $SyokuID;
    public float $Quantity;
    public String $UID;
}    
class UID {
    public string $UnitName;
    public string $UID;
}
class SyokuID {
    public string $SyokuID;
}

class SyokutouDAO{
 
    public function get_syokutou_by_UID(string $SyokuName)
    {
        $dbh = DAO::get_db_connect();
        $sql = "select DISTINCT BuyUnitMaster.UnitName ,BuyUnitMaster.UID
        From BuyUnitMaster 
        INNER JOIN Nutrients ON Nutrients.UID = BuyUnitMaster.UID 
        INNER JOIN Foods on Nutrients.SyokuID = Foods.SyokuID 
        where SyokuName = :SyokuName";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':SyokuName',$SyokuName,PDO::PARAM_STR);
        $stmt->execute();

        $Unit = $stmt->fetchObject("UID");

        return $Unit;
    }

    public function get_SyokuID_by_SyokuName(string $SyokuName)
    {
        $dbh = DAO::get_db_connect();
        $sql = "SELECT SyokuID FROM Foods where SyokuName = :SyokuName";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':SyokuName',$SyokuName,PDO::PARAM_STR);
        $stmt->execute();

        $SyokuID = $stmt->fetchObject("SyokuID");

        return $SyokuID;
    }
    
    public function insert_syokutou(string $MID, string $SyokuID, float $Quantity, string $UID) {
        $dbh = DAO::get_db_connect();
        // SQL文の準備
        $sql = "INSERT INTO syokutou VALUES(:MID,GETDATE(),:SyokuID,:Quantity,:UID)";
        $stmt = $dbh->prepare($sql);
    


            $stmt->bindValue(':MID', $MID, PDO::PARAM_STR);
            $stmt->bindValue(':SyokuID',  $SyokuID, PDO::PARAM_STR);
            $stmt->bindValue(':Quantity', $Quantity, PDO::PARAM_INT);
            $stmt->bindValue(':UID',$UID, PDO::PARAM_STR);
    
            // SQLの実行
            $stmt->execute();

            return true;  // 成功した場合はtrueを返す
        
        
    }

    public function get_UID_by_UnitName(string $UnitName)
    {
        $dbh = DAO::get_db_connect();
        $sql = "select UnitName, UID
        From BuyUnitMaster 
        where UnitName = :UnitName";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':UnitName',$UnitName,PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetchObject("UID");

        return $data;
    }
    
}
?>