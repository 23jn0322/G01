<?php
require_once 'DAO.php';

class HituyouEiyou
{
    public float $tanpaku;
    public float $tansui;
    public float $syokumotu;
    public float $tetu;
    public float $karu;
    public float $zn;
    public float $bitaA;
    public float $bitaC;
    public float $bitaD;
}

class FHituyouEiyou
{
    public float $tanpaku;
    public float $tansui;
    public float $syokumotu;
    public float $tetu;
    public float $karu;
    public float $zn;
    public float $bitaA;
    public float $bitaC;
    public float $bitaD;
}
class get_SyokuID{
    public String $SyokuID;

}
class Eiyou
{
    public float $IncludeNatri;
}

class EiyouName
{
    public string $NID;
    public string $NutrientsName;
    public string $IUnitName;
}
class Newinclude{
    public string $SyokuID;
    public string $NID;
    public float $IncludeNatri;
}

class HituyouEiyouDAO
{
    public function get_family_hituyou_natrients(string $MID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT 
                    ISNULL([たんぱく質], 0) AS tanpaku,
                    ISNULL([炭水化物], 0) AS tansui,
                    ISNULL([食物繊維], 0) AS syokumotu,
                    ISNULL([鉄], 0) AS tetu,
                    ISNULL([カルシウム], 0) AS karu,
                    ISNULL([亜鉛], 0) AS zn,
                    ISNULL([ビタミンA], 0) AS bitaA,
                    ISNULL([ビタミンC], 0) AS bitaC,
                    ISNULL([ビタミンD], 0) AS bitaD
                FROM 
                    (SELECT 
                        f.MID, 
                        n.NutrientsName,
                        SUM(
                            CASE
                                WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 3 AND 5 THEN 
                                    CASE WHEN f.Sex = 0 THEN n.[3_5_F] ELSE n.[3_5_M] END
                                WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 6 AND 7 THEN 
                                    CASE WHEN f.Sex = 0 THEN n.[6_7_F] ELSE n.[6_7_M] END
                                WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 8 AND 9 THEN 
                                    CASE WHEN f.Sex = 0 THEN n.[8_9_F] ELSE n.[8_9_M] END
                                WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 10 AND 11 THEN 
                                    CASE WHEN f.Sex = 0 THEN n.[10_11_F] ELSE n.[10_11_M] END
                                WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 12 AND 14 THEN 
                                    CASE WHEN f.Sex = 0 THEN n.[12_14_F] ELSE n.[12_14_M] END
                                WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 15 AND 17 THEN 
                                    CASE WHEN f.Sex = 0 THEN n.[15_17_F] ELSE n.[15_17_M] END
                                WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 18 AND 29 THEN 
                                    CASE WHEN f.Sex = 0 THEN n.[18_29_F] ELSE n.[18_29_M] END
                                WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 30 AND 49 THEN 
                                    CASE WHEN f.Sex = 0 THEN n.[30_49_F] ELSE n.[30_49_M] END
                                WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 50 AND 64 THEN 
                                    CASE WHEN f.Sex = 0 THEN n.[50_64_F] ELSE n.[50_64_M] END
                                WHEN DATEDIFF(YEAR, f.Age, GETDATE()) BETWEEN 65 AND 74 THEN 
                                    CASE WHEN f.Sex = 0 THEN n.[65_74_F] ELSE n.[65_74_M] END
                                WHEN DATEDIFF(YEAR, f.Age, GETDATE()) >= 75 THEN 
                                    CASE WHEN f.Sex = 0 THEN n.[75_F] ELSE n.[75_M] END
                                ELSE NULL
                            END
                        ) * (DAY(EOMONTH(GETDATE(), 0))) AS TotalNutrient
                    FROM 
                        Family f
                    JOIN 
                        NutrientsMaster n ON n.NutrientsName IN ('ビタミンA', 'ビタミンC', 'ビタミンD', 'カルシウム', '食物繊維', 'たんぱく質', '炭水化物', '鉄', '亜鉛')  -- 必要栄養素を指定
                    WHERE 
                        f.DeleteF = 0 AND f.MID = :MID
                    GROUP BY 
                        f.MID, n.NutrientsName
                    ) AS NutrientData
                PIVOT
                    (
                        SUM(TotalNutrient)
                        FOR NutrientsName IN ([たんぱく質], [炭水化物], [食物繊維], [鉄], [カルシウム], [亜鉛], [ビタミンA], [ビタミンC], [ビタミンD])
                    ) AS PivotedData
                ORDER BY MID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':MID', $MID, PDO::PARAM_STR);
        $stmt->execute();

        $member_family_heiyou = $stmt->fetchObject('FHituyouEiyou');

        if ($member_family_heiyou !== false) {
            return $member_family_heiyou;
        }
        return false;
    }

    public function get_hituyou_natrients(string $MID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT 
                    ISNULL([たんぱく質], 0) AS tanpaku,
                    ISNULL([炭水化物], 0) AS tansui,
                    ISNULL([食物繊維], 0) AS syokumotu,
                    ISNULL([鉄], 0) AS tetu,
                    ISNULL([カルシウム], 0) AS karu,
                    ISNULL([亜鉛], 0) AS zn,
                    ISNULL([ビタミンA], 0) AS bitaA,
                    ISNULL([ビタミンC], 0) AS bitaC,
                    ISNULL([ビタミンD], 0) AS bitaD
                FROM 
                    (SELECT 
                        m.MID, 
                        n.NutrientsName,
                        SUM(
                            CASE
                                WHEN DATEDIFF(YEAR, m.DOB, GETDATE()) BETWEEN 3 AND 5 THEN 
                                    CASE WHEN m.Sex = 0 THEN n.[3_5_F] ELSE n.[3_5_M] END
                                WHEN DATEDIFF(YEAR, m.DOB, GETDATE()) BETWEEN 6 AND 7 THEN 
                                    CASE WHEN m.Sex = 0 THEN n.[6_7_F] ELSE n.[6_7_M] END
                                WHEN DATEDIFF(YEAR, m.DOB, GETDATE()) BETWEEN 8 AND 9 THEN 
                                    CASE WHEN m.Sex = 0 THEN n.[8_9_F] ELSE n.[8_9_M] END
                                WHEN DATEDIFF(YEAR, m.DOB, GETDATE()) BETWEEN 10 AND 11 THEN 
                                    CASE WHEN m.Sex = 0 THEN n.[10_11_F] ELSE n.[10_11_M] END
                                WHEN DATEDIFF(YEAR, m.DOB, GETDATE()) BETWEEN 12 AND 14 THEN 
                                    CASE WHEN m.Sex = 0 THEN n.[12_14_F] ELSE n.[12_14_M] END
                                WHEN DATEDIFF(YEAR, m.DOB, GETDATE()) BETWEEN 15 AND 17 THEN 
                                    CASE WHEN m.Sex = 0 THEN n.[15_17_F] ELSE n.[15_17_M] END
                                WHEN DATEDIFF(YEAR, m.DOB, GETDATE()) BETWEEN 18 AND 29 THEN 
                                    CASE WHEN m.Sex = 0 THEN n.[18_29_F] ELSE n.[18_29_M] END
                                WHEN DATEDIFF(YEAR, m.DOB, GETDATE()) BETWEEN 30 AND 49 THEN 
                                    CASE WHEN m.Sex = 0 THEN n.[30_49_F] ELSE n.[30_49_M] END
                                WHEN DATEDIFF(YEAR, m.DOB, GETDATE()) BETWEEN 50 AND 64 THEN 
                                    CASE WHEN m.Sex = 0 THEN n.[50_64_F] ELSE n.[50_64_M] END
                                WHEN DATEDIFF(YEAR, m.DOB, GETDATE()) BETWEEN 65 AND 74 THEN 
                                    CASE WHEN m.Sex = 0 THEN n.[65_74_F] ELSE n.[65_74_M] END
                                WHEN DATEDIFF(YEAR, m.DOB, GETDATE()) >= 75 THEN 
                                    CASE WHEN m.Sex = 0 THEN n.[75_F] ELSE n.[75_M] END
                                ELSE NULL
                            END
                        ) * (DAY(EOMONTH(GETDATE(), 0))) AS TotalNutrient
                    FROM 
                        Members m
                    JOIN 
                        NutrientsMaster n ON n.NutrientsName IN ('ビタミンA', 'ビタミンC', 'ビタミンD', 'カルシウム', '食物繊維', 'たんぱく質', '炭水化物', '鉄', '亜鉛')  -- 必要栄養素を指定
                    WHERE 
                        m.MID = :MID
                    GROUP BY 
                        m.MID, n.NutrientsName
                    ) AS NutrientData
                PIVOT
                    (
                        SUM(TotalNutrient)
                        FOR NutrientsName IN ([たんぱく質], [炭水化物], [食物繊維], [鉄], [カルシウム], [亜鉛], [ビタミンA], [ビタミンC], [ビタミンD])
                    ) AS PivotedData
                ORDER BY MID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':MID', $MID, PDO::PARAM_STR);
        $stmt->execute();

        $member_heiyou = $stmt->fetchObject('HituyouEiyou');

        if ($member_heiyou !== false){
            return $member_heiyou;
        }
        return false;
    }
}

class eiyouDAO
{
    public function get_nowmonth_nutrients(string $MID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT 
                    SUM(CASE WHEN n.NID = 'tanpaku' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS tanpaku,
                    SUM(CASE WHEN n.NID = 'tansui' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS tansui,
                    SUM(CASE WHEN n.NID = 'syokumotu' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS syokumotu,
                    SUM(CASE WHEN n.NID = 'tetu' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS tetu,
                    SUM(CASE WHEN n.NID = 'karu' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS karu,
                    SUM(CASE WHEN n.NID = 'zn' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS zn,
                    SUM(CASE WHEN n.NID = 'bitaA' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS bitaA,
                    SUM(CASE WHEN n.NID = 'bitaC' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS bitaC,
                    SUM(CASE WHEN n.NID = 'bitaD' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS bitaD
                FROM 
                    syokutou st
                JOIN 
                    nutrients n ON st.SyokuID = n.SyokuID AND st.UID = n.UID
                WHERE 
                    st.MID = :MID AND ResistDate >= DATEADD(MONTH, DATEDIFF(MONTH, 0, GETDATE()), 0) AND ResistDate <= DATEADD(DAY, 24, DATEADD(MONTH, DATEDIFF(MONTH, 0, GETDATE()), 0))
                GROUP BY 
                    st.MID
                ORDER BY 
                    st.MID;";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':MID', $MID, PDO::PARAM_STR);
        $stmt->execute();

        $member_eiyou = $stmt->fetchObject('HituyouEiyou');

        if ($member_eiyou !== false){
            return $member_eiyou;
        }
        return false;
    }

    public function get_nextmonth_nutrients(string $MID)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT 
                    SUM(CASE WHEN n.NID = 'tanpaku' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS tanpaku,
                    SUM(CASE WHEN n.NID = 'tansui' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS tansui,
                    SUM(CASE WHEN n.NID = 'syokumotu' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS syokumotu,
                    SUM(CASE WHEN n.NID = 'tetu' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS tetu,
                    SUM(CASE WHEN n.NID = 'karu' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS karu,
                    SUM(CASE WHEN n.NID = 'zn' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS zn,
                    SUM(CASE WHEN n.NID = 'bitaA' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS bitaA,
                    SUM(CASE WHEN n.NID = 'bitaC' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS bitaC,
                    SUM(CASE WHEN n.NID = 'bitaD' THEN st.Quantity * n.IncludeNatri ELSE 0 END) AS bitaD
                FROM 
                    syokutou st
                JOIN 
                    nutrients n ON st.SyokuID = n.SyokuID AND st.UID = n.UID
                WHERE 
                    st.MID = :MID AND ResistDate >= DATEADD(DAY, 25, DATEADD(MONTH, DATEDIFF(MONTH, 0, GETDATE()), 0))
                GROUP BY 
                    st.MID
                ORDER BY 
                    st.MID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':MID', $MID, PDO::PARAM_STR);
        $stmt->execute();

        $member_eiyou = $stmt->fetchObject('Eiyou');

        if ($member_eiyou !== false){
            return $member_eiyou;
        }
        return false;
    }

    public function get_Nutrients_SyokuID(string $SyokuName)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT 
                    IncludeNatri
                FROM Nutrients
                INNER JOIN Foods on Nutrients.SyokuID = Foods.SyokuID
                WHERE SyokuName = :SyokuName
				ORDER BY
					CASE NID
						WHEN 'tanpaku' THEN 1
						WHEN 'tansui' THEN 2
						WHEN 'syokumotu' THEN 3
						WHEN 'tetu' THEN 4
						WHEN 'karu' THEN 5
						WHEN 'zn' THEN 6
						WHEN 'bitaA' THEN 7
						WHEN 'bitaC' THEN 8
						WHEN 'bitaD' THEN 9
					  END;";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':SyokuName', $SyokuName, PDO::PARAM_STR);
        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('Eiyou')) {
            $data[] = $row;
        }

        return $data;
    }

    public function get_NutrientsName()
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT NID, NutrientsName, IUnitName
                FROM NutrientsMaster
                INNER JOIN IntakeUnitMaster ON NutrientsMaster.IUID = IntakeUnitMaster.IUID
                ORDER BY 
                CASE NutrientsName
                    WHEN 'たんぱく質' THEN 1
                    WHEN '炭水化物' THEN 2
                    WHEN '食物繊維' THEN 3
                    WHEN '鉄' THEN 4
                    WHEN 'カルシウム' THEN 5
                    WHEN '亜鉛' THEN 6
                    WHEN 'ビタミンA' THEN 7
                    WHEN 'ビタミンC' THEN 8
                    WHEN 'ビタミンD' THEN 9
                END;";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('EiyouName')) {
            $data[] = $row;
        }

        return $data;
    }

    public function Update_Eiyou($SyokuID,$IncludeNatri,$NID){
        $dbh = DAO::get_db_connect();

        $sql = "UPDATE Nutrients 
                SET IncludeNatri = :IncludeNatri
                from Nutrients JOIN Foods ON Nutrients.SyokuID = Foods.SyokuID 
                WHERE Nutrients.SyokuID = :SyokuID AND Nutrients.NID = :NID";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':SyokuID', $SyokuID, PDO::PARAM_STR);
        $stmt->bindValue(':IncludeNatri', $IncludeNatri, PDO::PARAM_INT);
        $stmt->bindValue(':NID', $NID, PDO::PARAM_STR);

        $stmt->execute();
        $Newinclude = $stmt->fetchObject("Newinclude");

        return $Newinclude;
    }

    public function get_SyokuID_by_SyokuName(string $SyokuName)
    {
        $dbh = DAO::get_db_connect();
        $sql = "SELECT SyokuID FROM Foods where SyokuName = :SyokuName";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':SyokuName',$SyokuName,PDO::PARAM_STR);
        $stmt->execute();

        $SyokuID = $stmt->fetchObject("SyokuID");

        return $SyokuID;
    }
}
?>