<?php
require_once 'DAO.php';
require_once 'FoodsDAO.php';
require_once 'MemberDAO.php';

class Rireki{
   public string $SyokuName;
   public string $MID;
}
class Unit{
    public string $UID;
    public string $SyokuID;
}

class rirekiDAO{
    public function get_rireki_by_syokuID(string $MID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "select DISTINCT Foods.SyokuName,syokutou.MID 
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
    public function get_rireki_by_UID(string $MID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "select DISTINCT Foods.SyokuName,syokutou.MID 
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
}
?>