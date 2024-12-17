<?php
require_once 'DAO.php';

class Nenrei
{
    public bool $Sex;
    public int  $age;
}

class HituyouEiyou
{
    public float $bitaA;
    public float $bitaC;
    public float $bitaD;
    public float $karu;
    public float $syokumotu;
    public float $tanpaku;
    public float $tansui;
    public float $tetu;
    public float $zn;
}

class HituyouEiyouDAO
{
    public function get_family_natrients(string $MID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT f.MID, n.NutrientsName,
                SUM(
                    CASE
                        -- 3-5歳の場合
                        WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 3 AND 5 THEN 
                            CASE WHEN f.Sex = 0 THEN n.[3_5_F] ELSE n.[3_5_M] END
                        -- 6-7歳の場合
                        WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 6 AND 7 THEN 
                            CASE WHEN f.Sex = 0 THEN n.[6_7_F] ELSE n.[6_7_M] END
                        -- 8-9歳の場合
                        WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 8 AND 9 THEN 
                            CASE WHEN f.Sex = 0 THEN n.[8_9_F] ELSE n.[8_9_M] END
                        -- 10-11歳の場合
                        WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 10 AND 11 THEN 
                            CASE WHEN f.Sex = 0 THEN n.[10_11_F] ELSE n.[10_11_M] END
                        -- 12-14歳の場合
                        WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 12 AND 14 THEN 
                            CASE WHEN f.Sex = 0 THEN n.[12_14_F] ELSE n.[12_14_M] END
                        -- 15-17歳の場合
                        WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 15 AND 17 THEN 
                            CASE WHEN f.Sex = 0 THEN n.[15_17_F] ELSE n.[15_17_M] END
                        -- 18-29歳の場合
                        WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 18 AND 29 THEN 
                            CASE WHEN f.Sex = 0 THEN n.[18_29_F] ELSE n.[18_29_M] END
                        -- 30-49歳の場合
                        WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 30 AND 49 THEN 
                            CASE WHEN f.Sex = 0 THEN n.[30_49_F] ELSE n.[30_49_M] END
                        -- 50-64歳の場合
                        WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 50 AND 64 THEN 
                            CASE WHEN f.Sex = 0 THEN n.[50_64_F] ELSE n.[50_64_M] END
                        -- 65-74歳の場合
                        WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 65 AND 74 THEN 
                            CASE WHEN f.Sex = 0 THEN n.[65_74_F] ELSE n.[65_74_M] END
                        -- 75歳以上の場合
                        WHEN DATEDIFF(YEAR, f.Age, GETDATE()) >= 75 THEN 
                            CASE WHEN f.Sex = 0 THEN n.[75_F] ELSE n.[75_M] END
                        ELSE NULL
                    END
                ) AS TotalNutrient
            FROM 
                Family f
            JOIN 
                NutrientsMaster n ON n.NutrientsName IN ('ビタミンA', 'ビタミンC', 'ビタミンD', 'カルシウム', '食物繊維', 'たんぱく質', '炭水化物', '鉄', '亜鉛')  -- 必要栄養素を指定
            WHERE 
                f.DeleteF = 0 AND MID = :MID
            GROUP BY 
                f.MID, n.NutrientsName
            ORDER BY 
                f.MID, n.NutrientsName;";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':MID', $MID, PDO::PARAM_STR);
        $stmt->execute();

        $member_age_sex = $stmt->fetchObject('HituyouEiyou');

        return $member_age_sex;
    }
    //続き
}
?>