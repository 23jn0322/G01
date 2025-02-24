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
    
    // MemberDAOクラスに追加するメソッド
public function addFamily($MID, $familyMembers) {
    $dbh = DAO::get_db_connect();
    
    // トランザクション開始
    $dbh->beginTransaction();

    try {
        // 家族メンバーの情報を挿入
        $familyStmt = $dbh->prepare("INSERT INTO Family (FID, MID, Age, Sex) VALUES (:FID, :MID, :Age, :Sex)");

        foreach ($familyMembers as $index => $family) {
            // 家族のユーザーID（MID-1, MID-2...）
            $familyMID = $MID . '-' . ($index + 1);

            // 家族の生年月日と性別をバインド
            $familyStmt->bindValue(':FID', $familyMID, PDO::PARAM_STR); // 家族のユーザーID（例: MID-1）
            $familyStmt->bindValue(':MID', $MID, PDO::PARAM_STR); // 親のMID
            $familyStmt->bindValue(':Age', $family['DOB'], PDO::PARAM_STR); // 家族の生年月日
            $familyStmt->bindValue(':Sex', $family['Sex'], PDO::PARAM_INT); // 性別
            
            // SQLの実行（Familyテーブル）
            $familyStmt->execute();
        }

        // コミット
        $dbh->commit();
    } catch (PDOException $e) {
        // エラーが発生した場合の処理
        $dbh->rollBack();  // ロールバック
        error_log('Error inserting family: ' . $e->getMessage());  // エラーログに記録
        return false;  // 失敗した場合はfalseを返す
    }
}

public function addOneFamily($MID, $familyMembers) {
    $dbh = DAO::get_db_connect();
    
    // トランザクション開始
    $dbh->beginTransaction();

    try {
        $sql = "select COUNT(FID) as MAXID from Family where MID= :MID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindvalue(':MID', $MID, PDO::PARAM_STR);

        $stmt->execute();
        $res = $stmt->fetchAll();
        $index = $res[0]['MAXID'];
        // 家族メンバーの情報を挿入
        $familyStmt = $dbh->prepare("INSERT INTO Family (FID, MID, Age, Sex) VALUES (:FID, :MID, :Age, :Sex)");

        //foreach ($familyMembers as $index => $family) {
            // 家族のユーザーID（MID-1, MID-2...）
            $familyMID = $MID . '-' . ($index + 1);


            // 家族の生年月日と性別をバインド
            $familyStmt->bindValue(':FID', $familyMID, PDO::PARAM_STR); // 家族のユーザーID（例: MID-1）
            $familyStmt->bindValue(':MID', $MID, PDO::PARAM_STR); // 親のMID
            $familyStmt->bindValue(':Age', $familyMembers[0]['DOB'], PDO::PARAM_STR); // 家族の生年月日
            $familyStmt->bindValue(':Sex', $familyMembers[0]['Sex'], PDO::PARAM_INT); // 性別
            
            // SQLの実行（Familyテーブル）
            $familyStmt->execute();
        //}

        // コミット
        $dbh->commit();
    } catch (PDOException $e) {
        // エラーが発生した場合の処理
        $dbh->rollBack();  // ロールバック
        var_dump('Error inserting family: ' . $e->getMessage());  // エラーログに記録
        //return false;  // 失敗した場合はfalseを返す
    }
}

public function update(Member $member) {
    $dbh = DAO::get_db_connect();
    // SQL文の準備
    $sql =   $sql = "UPDATE Members SET Name = :Name, DOB = :DOB, Sex = :Sex WHERE MID = :MID";

    $stmt = $dbh->prepare($sql);


    try {
        // パラメータをバインド（Sexは整数）
        $stmt->bindValue(':MID', $member->MID, PDO::PARAM_STR);
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
    public function getFamily(string $MID) {

        $dbh = DAO::get_db_connect();

        $sql = "SELECT * From Members  Left outer JOIN  Family ON Members.MID = Family.MID where Members.MID=:MID and DeleteF=0";

        $stmt = $dbh->prepare($sql);

        $stmt->bindvalue(':MID', $MID, PDO::PARAM_STR);

        $stmt->execute();

        $memberAndFamily = $stmt->fetchAll();

        return $memberAndFamily;
    }
    public function updateFamily(Family $Age) {
        $dbh = DAO::get_db_connect();
        // SQL文の準備
            $sql =   $sql = "UPDATE Family SET Age =:Age WHERE FID = :FID";
    
            $stmt = $dbh->prepare($sql);
    
            try {
            // パラメータをバインド（Sexは整数）
               
            $stmt->bindValue(':Age', $family['DOB'], PDO::PARAM_STR); // 家族の生年月日
    
    
            // SQLの実行
            $stmt->execute();
            
            return true;  // 成功した場合はtrueを返す
        } catch (PDOException $e) {
            // エラーが発生した場合の処理
            error_log('Error inserting member: ' . $e->getMessage());  // エラーログに記録
            return false;  // 失敗した場合はfalseを返す
        }
    }
    public function deleteFamily(string $FID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "UPDATE Family SET DeleteF=1 WHERE FID=:FID;";

        $stmt = $dbh->prepare($sql);

        
        $stmt->bindValue(':FID',$FID,PDO::PARAM_STR);
        $stmt->execute();
    }

    public function insertFamily(Member $member)
    {
        $dbh = DAO::get_db_connect();

        $sql = "INSERT INTO Family(Age,Sex)
                VALUES(:Age,:Sex)";

        $stmt = $dbh->prepare($sql);


        $stmt->bindValue(':Age',$Age,PDO::PARAM_STR);
        $stmt->bindValue(':Sex',$Sex);
        
        $stmt->execute();

    }

}

?>
