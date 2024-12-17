<?php
require_once 'DAO.php';

class Foods
{
    public string $SyokuID;         //食材ID
    public string $SyokuName;       //食材名
    public bool   $UsualFlag;       //いつものフラグ
    public string $MiddleGenreID;   //中ジャンルID
}

class FoodsDAO
{
    public function get_foods()
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * FROM Foods";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('Foods')) {
            $data[] = $row;
        }

        return $data;
    }
}
?>