<?php
require_once 'DAO.php';

class Foods
{
    public string $SyokuID;         //食材ID
    public string $SyokuName;       //食材名
    public bool   $UsualFlag;       //いつものフラグ
    public string $MiddleGenreID;   //中ジャンルID
}

class FoodsSyousai
{
    public string $SyokuID;              
    public bool   $UsualFlag;      
    public string $MiddleGenreID;
    public string $MiddleGenreName;
    public string $UnitName;
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

    public function get_foods_by_SyokuName($SyokuName)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT DISTINCT Foods.SyokuID, UsualFlag, MiddleGenre.MiddleGenreID, MiddleGenreName, UnitName FROM Foods 
                INNER JOIN MiddleGenre ON Foods.MiddleGenreID = MiddleGenre.MiddleGenreID
                INNER JOIN Nutrients ON Foods.SyokuID = Nutrients.SyokuID
                INNER JOIN BuyUnitMaster ON Nutrients.UID = BuyUnitMaster.UID
                WHERE SyokuName = :SyokuName";

        $stmt = $dbh->prepare($sql);

        $stmt->bindvalue(':SyokuName', $SyokuName, PDO::PARAM_STR);

        $stmt->execute();

        $Foods = $stmt->fetchObject('FoodsSyousai');

        return $Foods;
    }
}
?>