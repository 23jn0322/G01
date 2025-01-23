<?php
require_once 'DAO.php';
require_once 'FoodsDAO.php';
require_once 'MemberDAO.php';

class Rireki{
   public string $SyokuName;
   public string $MID;
   public string $SyokuID;
}
class Unit{
    public string $SyokuID;
    public string $UID;
    public string $UnitName;
}

class rirekiDAO{
    public function get_rireki_by_MID(string $MID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "select DISTINCT Foods.SyokuName,Foods.SyokuID,syokutou.MID
        from Foods 
        INNER JOIN syokutou ON Foods.SyokuID = syokutou.SyokuID
         where syokutou.MID = :MID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':MID',$MID,PDO::PARAM_STR);
        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('Rireki')){
            $data[] = $row;
        }
        return $data;
    }
    public function get_UID_by_SyokuID($SyokuID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT DISTINCT syokutou.SyokuID,UnitName,Nutrients.UID
                from Nutrients 
                INNER JOIN syokutou ON Nutrients.UID = syokutou.UID 
                INNER JOIN BuyUnitMaster ON Nutrients.UID = BuyUnitMaster.UID
				where syokutou.SyokuID = :SyokuID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':SyokuID',$SyokuID,PDO::PARAM_STR);
        $stmt->execute();

        $Unit = $stmt->fetchObject("Unit");

        return $Unit;        
    }
}
?>