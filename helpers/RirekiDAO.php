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
    public string $UID;
    public string $SyokuID;
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
    public function get_rireki_by_UID()
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT DISTINCT syokutou.SyokuID,UnitName 
        from Nutrients 
        INNER JOIN syokutou ON Nutrients.UID = syokutou.UID 
        INNER JOIN BuyUnitMaster ON Nutrients.UID = BuyUnitMaster.UID";

        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('Unit')){
        $data[] = $row;
    }
    return $data;
    }
}
?>