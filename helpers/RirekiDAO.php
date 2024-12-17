<?php
require_once 'DAO.php';
require_once 'FoodsDAO.php';
require_once 'MemberDAO.php';

class rireki{
   public string $syokuname;
   public string $MID;
}

class rirekiDAO{
    public function get_rireki_by_syokuID(string $syokuID,string $MID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "select DISTINCT Foods.SyokuName,syokutou.MID 
        from Foods 
        INNER JOIN syokutou ON Foods.SyokuID = syokutou.SyokuID
         where syokutou.MID = :MID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':SyokuName',$syokuname,PDO::PARAM_STR);
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