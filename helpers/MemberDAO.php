<?php
require_once 'DAO.php';

class Member
{
    public string $MID;
    public string $Password;
    public string $Name;
    public string $DOB;
    public int $Sex;
    public bool $Fami;
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

    public function insert(Member $member) {
        $dbh = DAO::get_db_connect();
        // SQL文の準備
        $sql = "INSERT INTO Members (MID, Password, Name, DOB, Sex) VALUES (:MID, :Password, :Name, :DOB, :Sex)";
        $stmt = $dbh->prepare($sql);
    
        try {
            // パラメータをバインド（Sexは整数、Passwordはハッシュ化）
            $stmt->bindValue(':MID', $member->MID, PDO::PARAM_STR);
            $stmt->bindValue(':Password', password_hash($member->Password, PASSWORD_DEFAULT), PDO::PARAM_STR);  // パスワードのハッシュ化
            $stmt->bindValue(':Name', $member->Name, PDO::PARAM_STR);
            $stmt->bindValue(':DOB', $member->DOB, PDO::PARAM_STR);
            $stmt->bindValue(':Sex', $member->Sex, PDO::PARAM_INT);  // 性別は整数（1または0）として扱う
    
            // SQLの実行
            $stmt->execute();
            
            return true;  // 成功した場合はtrueを返す
        } catch (PDOException $e) {
            // エラーが発生した場合の処理
            error_log('Error inserting member: ' . $e->getMessage());  // エラーログに記録
            return false;  // 失敗した場合はfalseを返す
        }
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
