<?php
    require_once 'DAO.php';

    class Genre
    {
        public string $genreID;
        public string $genrename;
    }

    class GenreDAO
    {
        public function get_genre()
        {
            //DBに接続する
            $dbh = DAO::get_db_connect();

            //大ジャンルを取得するSQL
            $sql = "SELECT * FROM Genre";
            $stmt = $dbh->prepare($sql);

            //SQLを実行する
            $stmt->execute();

            $data = [];
            while($row = $stmt->fetchObject('Genre')){
                $data[] = $row;
            }

            return $data;
        }
    }
?>