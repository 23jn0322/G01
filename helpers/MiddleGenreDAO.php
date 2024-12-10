<?php
    require_once 'DAO.php';

    class Genre
    {
        public string $middlegenreID;
        public string $middlegenrename;
        public string $genreID;
    }

    class MiddleGenreDAO
    {
        public function get_middle_genre()
        {
            //DBに接続する
            $dbh = DAO::get_db_connect();

            //大ジャンルを取得するSQL
            $sql = "SELECT * FROM MiddleGenre";
            $stmt = $dbh->prepare($sql);

            //SQLを実行する
            $stmt->execute();

            $data = [];
            while($row = $stmt->fetchObject('MiddleGenre')){
                $data[] = $row;
            }

            return $data;
        }
    }
?>