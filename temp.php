<?php
    require_once './helpers/hituyouEiyouDAO.php';

    $HituyouDAO = new HituyouEiyouDAO();
    $hituyou = $HituyouDAO->get_member_age_sex('aaaa1111');

    echo $hituyou->Sex
?>