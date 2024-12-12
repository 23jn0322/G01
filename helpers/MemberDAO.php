<?php
require_once 'DAO.php';

class Member
{
    public string $MID;
    public string $Password;
    public string $Name;
    public string $DOB;
    public bool $Sex;
    public bool $Fami;
    public string $Password2;
}    

class Family
{
    public string $MID;
    public string $FID;
    public string $Age;
    public bool $Sex;
    public bool $DeleteF;
}

class MemberDAO
{
    public function get_member(string $MID , string $Password)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT * From Members WHERE MID = :MID";

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

    public function insert(Member $member)
    {
        $dbh = DAO::get_db_connect();

        $sql = "INSERT INTO Members(MID,Password,Name,DOB,Sex) VALUES (:MID,:Password, :Name, :DOB, :Sex)";

        $stmt = $dbh->prepare($sql);

        //パスワードをハッシュ化
        $password=password_hash($Member->Password, PASSWORD_DEFAULT);

        $stmt->bindValue(':MID', $Member->MID, PDO::PARAM_STR);
        $stmt->bindValue(':Password', $Password, PDO::PARAM_STR);
        $stmt->bindValue(':Name', $Member->Name, PDO::PARAM_STR);
        $stmt->bindValue(':DOB', $Member->DOB, PDO::PARAM_STR);
        $stmt->bindValue(':Sex', $Member->Sex, PDO::PARAM_BOOL);

        $stmt->execute();



        $sql = "INSERT INTO Family(MID,FID,Age,Sex, DeleteF) VALUES (:MID,:FID, :Age, :Sex, :DeleteF)";

        $stmt = $dbh->prepare($sql);

        
        $stmt->bindValue(':MID', $Family->MID, PDO::PARAM_STR);
        $stmt->bindValue(':FID', $FID, PDO::PARAM_STR);
        $stmt->bindValue(':Age', $Family->Age, PDO::PARAM_STR);
        $stmt->bindValue(':Sex', $Family->Sex, PDO::PARAM_BOOL);
        $stmt->bindValue(':DeleteF', $Family->DeleteF, PDO::PARAM_BOOL);

        $stmt->execute();


    }

    

    public function update(Member $member)
    {
        $dbh = DAO::get_db_connect();

        $sql = "UPDATE Members SET Name = :Name, DOB = :DOB, Sex = :Sex WHERE MID = :MID";

        $stmt = $dbh->prepare($sql);

           $stmt->bindvalue(':Name', $member->Name, PDO::PARAM_STR);
           $stmt->bindvalue(':DOB',$member-> $DOB, PDO::PARAM_STR);
           $stmt->bindvalue(':Sex', $member->$Sex, PDO::PARAM_INT);

           $stmt->execute();
           $member = $stmt->fetchObject('Member');
    }
}
?>
