
<?php
    require_once './helpers/EiyouDAO.php';
    require_once './helpers/MemberDAO.php';

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!empty($_SESSION['Member'])) {
        $Member = $_SESSION['Member'];
    }
    else{
        header('Location: login.php');
        exit;
    }

    $hituyouDAO = new HituyouEiyouDAO();
    $eiyouDAO = new EiyouDAO();
    $Hituyou = $hituyouDAO->get_hituyou_natrients($Member->MID);
    $FHituyou = $hituyouDAO->get_family_hituyou_natrients($Member->MID);
    $nowEiyou = $eiyouDAO->get_nowmonth_nutrients($Member->MID);
    $nextEiyou = $eiyouDAO->get_nextmonth_nutrients($Member->MID);
?>
<html>
    <link href="css/home.css" rel="stylesheet">
    <script src="apexcharts.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="apexcharts.css" />
    <header>
        <meta charset="utf-8">
    </header>
    <body>
        <?php include "header.php" ?>
        <h2>必要栄養類摂取比較グラフ</h2>
        <h3 id="month">今月分</h3>
        <input type="button" id="monthA" value="今月分はこちら">
        <input type="button" id="monthB" value="来月分はこちら">
        <div class="chart-container">
            <div class="chart-wrapper">
                <div class="chart" id="chart"></div>
                <p class="chart-label">タンパク質</p>
            </div>
            <div class="chart-wrapper">
                <div class="chart" id="chart2"></div>
                <p class="chart-label">炭水化物</p>
            </div>
            <div class="chart-wrapper">
                <div class="chart" id="chart3"></div>
                <p class="chart-label">食物繊維</p>
            </div>
        </div>
        <div class="chart-container">
            <div class="chart-wrapper">
                <div class="chart" id="chart4"></div>
                <p class="chart-label">鉄</p>
            </div>
            <div class="chart-wrapper">
                <div class="chart" id="chart5"></div>
                <p class="chart-label">カルシウム</p>
            </div>
            <div class="chart-wrapper">
                <div class="chart" id="chart6"></div>
                <p class="chart-label">亜鉛</p>
            </div>
        </div>
        <div class="chart-container">
            <div class="chart-wrapper">
                <div class="chart" id="chart7"></div>
                <p class="chart-label">ビタミンA</p>
            </div>
            <div class="chart-wrapper">
                <div class="chart" id="chart8"></div>
                <p class="chart-label">ビタミンC</p>
            </div>
            <div class="chart-wrapper">
                <div class="chart" id="chart9"></div>
                <p class="chart-label">ビタミンD</p>
            </div>
        </div>
    </body>
    <footer>
    </footer>
    <script>
        // チャートの設定（既存のコードはそのまま）
        let options = {
            chart: { type: 'pie' },
            legend: { show: false },
            series: [<?= $nowEiyou->tanpaku ?>, <?= ($Hituyou->tanpaku + $FHituyou->tanpaku) - $nowEiyou->tanpaku ?>],
            tooltip: { enabled: false },  // ツールチップを無効化
            colors: ['#33FF57', '#ffffff']
        };

        let options2 = {
            chart: { type: 'pie' },
            legend: { show: false },
            series: [<?= $nowEiyou->tansui ?>, <?= ($Hituyou->tansui + $FHituyou->tansui) - $nowEiyou->tansui ?>],
            tooltip: { enabled: false },  // ツールチップを無効化
            colors: ['#33FF57', '#ffffff']
        };

        let options3 = {
            chart: { type: 'pie' },
            legend: { show: false },
            series: [<?= $nowEiyou->syokumotu ?>, <?= ($Hituyou->syokumotu + $FHituyou->syokumotu) - $nowEiyou->syokumotu ?>],
            tooltip: { enabled: false },  // ツールチップを無効化
            colors: ['#33FF57', '#ffffff']
        };

        let options4 = {
            chart: { type: 'pie' },
            legend: { show: false },
            series: [<?= $nowEiyou->tetu ?>, <?= ($Hituyou->tetu + $FHituyou->tetu) - $nowEiyou->tetu ?>],
            tooltip: { enabled: false },  // ツールチップを無効化
            colors: ['#33FF57', '#ffffff']
        };

        let options5 = {
            chart: { type: 'pie' },
            legend: { show: false },
            series: [<?= $nowEiyou->karu ?>, <?= ($Hituyou->karu + $FHituyou->karu) - $nowEiyou->karu ?>],
            tooltip: { enabled: false },  // ツールチップを無効化
            colors: ['#33FF57', '#ffffff']
        };

        let options6 = {
            chart: { type: 'pie' },
            legend: { show: false },
            series: [<?= $nowEiyou->zn ?>, <?= ($Hituyou->zn + $FHituyou->zn) - $nowEiyou->zn ?>],
            tooltip: { enabled: false },  // ツールチップを無効化
            colors: ['#33FF57', '#ffffff']
        };

        let options7 = {
            chart: { type: 'pie' },
            legend: { show: false },
            series: [<?= $nowEiyou->bitaA ?>, <?= ($Hituyou->bitaA + $FHituyou->bitaA) - $nowEiyou->bitaA ?>],
            tooltip: { enabled: false },  // ツールチップを無効化
            colors: ['#33FF57', '#ffffff']
        };

        let options8 = {
            chart: { type: 'pie' },
            legend: { show: false },
            series: [<?= $nowEiyou->bitaC ?>, <?= ($Hituyou->bitaC + $FHituyou->bitaC) - $nowEiyou->bitaC ?>],
            tooltip: { enabled: false },  // ツールチップを無効化
            colors: ['#33FF57', '#ffffff']
        };

        let options9 = {
            chart: { type: 'pie' },
            legend: { show: false },
            series: [<?= $nowEiyou->bitaD ?>, <?= ($Hituyou->bitaD + $FHituyou->bitaD) - $nowEiyou->bitaD ?>],
            tooltip: { enabled: false },  // ツールチップを無効化
            colors: ['#33FF57', '#ffffff']
        };

        // チャートのレンダリング
        new ApexCharts(document.querySelector("#chart"), options).render();
        new ApexCharts(document.querySelector("#chart2"), options2).render();
        new ApexCharts(document.querySelector("#chart3"), options3).render();
        new ApexCharts(document.querySelector("#chart4"), options4).render();
        new ApexCharts(document.querySelector("#chart5"), options5).render();
        new ApexCharts(document.querySelector("#chart6"), options6).render();
        new ApexCharts(document.querySelector("#chart7"), options7).render();
        new ApexCharts(document.querySelector("#chart8"), options8).render();
        new ApexCharts(document.querySelector("#chart9"), options9).render();
        
        $(function () {
            $('#monthB').click(function () {
                document.getElementById('month').innerText = '来月分';
                // チャートの設定（既存のコードはそのまま）
                let options = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nextEiyou->tanpaku ?>, <?= ($Hituyou->tanpaku + $FHituyou->tanpaku) - $nextEiyou->tanpaku ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options2 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nextEiyou->tansui ?>, <?= ($Hituyou->tansui + $FHituyou->tansui) - $nextEiyou->tansui ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options3 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nextEiyou->syokumotu ?>, <?= ($Hituyou->syokumotu + $FHituyou->syokumotu) - $nextEiyou->syokumotu ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options4 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nextEiyou->tetu ?>, <?= ($Hituyou->tetu + $FHituyou->tetu) - $nextEiyou->tetu ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options5 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nextEiyou->karu ?>, <?= ($Hituyou->karu + $FHituyou->karu) - $nextEiyou->karu ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options6 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nextEiyou->zn ?>, <?= ($Hituyou->zn + $FHituyou->zn) - $nextEiyou->zn ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options7 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nextEiyou->bitaA ?>, <?= ($Hituyou->bitaA + $FHituyou->bitaA) - $nextEiyou->bitaA ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options8 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nextEiyou->bitaC ?>, <?= ($Hituyou->bitaC + $FHituyou->bitaC) - $nextEiyou->bitaC ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options9 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nextEiyou->bitaD ?>, <?= ($Hituyou->bitaD + $FHituyou->bitaD) - $nextEiyou->bitaD ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                new ApexCharts(document.querySelector("#chart"), options).render();
                new ApexCharts(document.querySelector("#chart2"), options2).render();
                new ApexCharts(document.querySelector("#chart3"), options3).render();
                new ApexCharts(document.querySelector("#chart4"), options4).render();
                new ApexCharts(document.querySelector("#chart5"), options5).render();
                new ApexCharts(document.querySelector("#chart6"), options6).render();
                new ApexCharts(document.querySelector("#chart7"), options7).render();
                new ApexCharts(document.querySelector("#chart8"), options8).render();
                new ApexCharts(document.querySelector("#chart9"), options9).render();
            });

            $('#monthA').click(function () {
                document.getElementById('month').innerText = '今月分';
                // チャートの設定（既存のコードはそのまま）
                let options = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nowEiyou->tanpaku ?>, <?= ($Hituyou->tanpaku + $FHituyou->tanpaku) - $nowEiyou->tanpaku ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options2 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nowEiyou->tansui ?>, <?= ($Hituyou->tansui + $FHituyou->tansui) - $nowEiyou->tansui ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options3 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nowEiyou->syokumotu ?>, <?= ($Hituyou->syokumotu + $FHituyou->syokumotu) - $nowEiyou->syokumotu ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options4 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nowEiyou->tetu ?>, <?= ($Hituyou->tetu + $FHituyou->tetu) - $nowEiyou->tetu ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options5 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nowEiyou->karu ?>, <?= ($Hituyou->karu + $FHituyou->karu) - $nowEiyou->karu ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options6 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nowEiyou->zn ?>, <?= ($Hituyou->zn + $FHituyou->zn) - $nowEiyou->zn ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options7 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nowEiyou->bitaA ?>, <?= ($Hituyou->bitaA + $FHituyou->bitaA) - $nowEiyou->bitaA ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options8 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nowEiyou->bitaC ?>, <?= ($Hituyou->bitaC + $FHituyou->bitaC) - $nowEiyou->bitaC ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                let options9 = {
                    chart: { type: 'pie' },
                    legend: { show: false },
                    series: [<?= $nowEiyou->bitaD ?>, <?= ($Hituyou->bitaD + $FHituyou->bitaD) - $nowEiyou->bitaD ?>],
                    tooltip: { enabled: false },  // ツールチップを無効化
                    colors: ['#33FF57', '#ffffff']
                };

                new ApexCharts(document.querySelector("#chart"), options).render();
                new ApexCharts(document.querySelector("#chart2"), options2).render();
                new ApexCharts(document.querySelector("#chart3"), options3).render();
                new ApexCharts(document.querySelector("#chart4"), options4).render();
                new ApexCharts(document.querySelector("#chart5"), options5).render();
                new ApexCharts(document.querySelector("#chart6"), options6).render();
                new ApexCharts(document.querySelector("#chart7"), options7).render();
                new ApexCharts(document.querySelector("#chart8"), options8).render();
                new ApexCharts(document.querySelector("#chart9"), options9).render();
            });
        });
        
    </script>
</html>