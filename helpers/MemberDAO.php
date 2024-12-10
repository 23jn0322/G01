<?php
require_once 'DAO.php';

class Member
{
    public string $MID;
    public string $Password;
    public string $Name;
    public string $DOB;
    public bool $Sex;
}    

class MemberDAO
{
    public function get_member(string $MID , string $Password)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * From Member WHERE MID = :MID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindvalue(':MID', $MID, PDO::PARAM_STR);

        $stmt->execute();

        $member = $stmt->fetchObject('Member');

        if ($member !== false) {
            if (password_verify($Password, $member->Password)) {
                return $member;
            }
        }

        return false;
    }
}
?>