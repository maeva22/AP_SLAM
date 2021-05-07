<!DOCTYPE html>
<html lang="fr">

<?php
$title = "Statistiques des démarches";
include '../includes/header.php';
include '../middlewares/etudiant.php';
include '../back_end/stats_stages_querries.php';
include '../includes/barnav.php';
?>

<body>
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <?php
                $t_departements = array();
                $t_departements['01'] = 'Ain';
                $t_departements['02'] = 'Aisne';
                $t_departements['03'] = 'Allier';
                $t_departements['04'] = 'Alpes-de-Haute-Provence';
                $t_departements['05'] = 'Hautes-Alpes';
                $t_departements['06'] = 'Alpes-Maritimes';
                $t_departements['07'] = 'Ardèche';
                $t_departements['08'] = 'Ardennes';
                $t_departements['09'] = 'Ariège';
                $t_departements['10'] = 'Aube';
                $t_departements['11'] = 'Aude';
                $t_departements['12'] = 'Aveyron';
                $t_departements['13'] = 'Bouches-du-Rhône';
                $t_departements['14'] = 'Calvados';
                $t_departements['15'] = 'Cantal';
                $t_departements['16'] = 'Charente';
                $t_departements['17'] = 'Charente-Maritime';
                $t_departements['18'] = 'Cher';
                $t_departements['19'] = 'Corrèze';
                $t_departements['21'] = 'Côte-d\'Or';
                $t_departements['22'] = 'Côtes-d\'Armor';
                $t_departements['23'] = 'Creuse';
                $t_departements['24'] = 'Dordogne';
                $t_departements['25'] = 'Doubs';
                $t_departements['26'] = 'Drôme';
                $t_departements['27'] = 'Eure';
                $t_departements['28'] = 'Eure-et-Loir';
                $t_departements['29'] = 'Finistère';
                $t_departements['30'] = 'Gard';
                $t_departements['31'] = 'Haute-Garonne';
                $t_departements['32'] = 'Gers';
                $t_departements['33'] = 'Gironde';
                $t_departements['34'] = 'Hérault';
                $t_departements['35'] = 'Ille-et-Vilaine';
                $t_departements['36'] = 'Indre';
                $t_departements['37'] = 'Indre-et-Loire';
                $t_departements['38'] = 'Isère';
                $t_departements['39'] = 'Jura';
                $t_departements['40'] = 'Landes';
                $t_departements['41'] = 'Loir-et-Cher';
                $t_departements['42'] = 'Loire';
                $t_departements['43'] = 'Haute-Loire';
                $t_departements['44'] = 'Loire-Atlantique';
                $t_departements['45'] = 'Loiret';
                $t_departements['46'] = 'Lot';
                $t_departements['47'] = 'Lot-et-Garonne';
                $t_departements['48'] = 'Lozère';
                $t_departements['49'] = 'Maine-et-Loire';
                $t_departements['50'] = 'Manche';
                $t_departements['51'] = 'Marne';
                $t_departements['52'] = 'Haute-Marne';
                $t_departements['53'] = 'Mayenne';
                $t_departements['54'] = 'Meurthe-et-Moselle';
                $t_departements['55'] = 'Meuse';
                $t_departements['56'] = 'Morbihan';
                $t_departements['57'] = 'Moselle';
                $t_departements['58'] = 'Nièvre';
                $t_departements['59'] = 'Nord';
                $t_departements['60'] = 'Oise';
                $t_departements['61'] = 'Orne';
                $t_departements['62'] = 'Pas-de-Calais';
                $t_departements['63'] = 'Puy-de-Dôme';
                $t_departements['64'] = 'Pyrénées-Atlantiques';
                $t_departements['65'] = 'Hautes-Pyrénées';
                $t_departements['66'] = 'Pyrénées-Orientales';
                $t_departements['67'] = 'Bas-Rhin';
                $t_departements['68'] = 'Haut-Rhin';
                $t_departements['69'] = 'Rhône';
                $t_departements['70'] = 'Haute-Saône';
                $t_departements['71'] = 'Saône-et-Loire';
                $t_departements['72'] = 'Sarthe';
                $t_departements['73'] = 'Savoie';
                $t_departements['74'] = 'Haute-Savoie';
                $t_departements['75'] = 'Paris';
                $t_departements['76'] = 'Seine-Maritime';
                $t_departements['77'] = 'Seine-et-Marne';
                $t_departements['78'] = 'Yvelines';
                $t_departements['79'] = 'Deux-Sèvres';
                $t_departements['80'] = 'Somme';
                $t_departements['81'] = 'Tarn';
                $t_departements['82'] = 'Tarn-et-Garonne';
                $t_departements['83'] = 'Var';
                $t_departements['84'] = 'Vaucluse';
                $t_departements['85'] = 'Vendée';
                $t_departements['86'] = 'Vienne';
                $t_departements['87'] = 'Haute-Vienne';
                $t_departements['88'] = 'Vosges';
                $t_departements['89'] = 'Yonne';
                $t_departements['90'] = 'Territoire de Belfort';
                $t_departements['91'] = 'Essonne';
                $t_departements['92'] = 'Hauts-de-Seine';
                $t_departements['93'] = 'Seine-Saint-Denis';
                $t_departements['94'] = 'Val-de-Marne';
                $t_departements['95'] = 'Val-d\'Oise';
                $t_departements['971'] = 'Guadeloupe';
                $t_departements['972'] = 'Martinique';
                $t_departements['973'] = 'Guyane';
                $t_departements['974'] = 'La Réunion';
                $t_departements['2A'] = 'Corse-du-Sud';
                $t_departements['2B'] = 'Haute-Corse';
                function random_color_part()
                {
                    return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
                }

                function random_color()
                {
                    $r = random_color_part();
                    $v = random_color_part();
                    $b = random_color_part();
                    return $r . $v . $b;
                }
                $labels = '';
                $values = '';
                $colors = '';
                foreach ($stats_villes as $row) {
                    $labels = $labels . '"' . $row['labels'] . '",';
                    $values = $values . $row['nbville'] . ',';
                    $colors .= '"#' . random_color() . '",';
                }
                $labels = substr($labels, 0, -1);
                $values = substr($values, 0, -1);
                $colors = substr($colors, 0, -1);

                $labels2 = '';
                $values2 = 0;
                $colors2 = '';
                $ancien = '';
                foreach ($stats_departements as $row) {
                    if ($row['labels'] != $ancien) {
                        $labels2 = $labels2 . '"' . $t_departements[$row['labels']] . '",';
                    } else {
                        $labels2 = $ancien . ',';
                    }

                    $ancien = $t_departements[$row['labels']];
                    $values2 = $values2 . $row['nbdepartement'] . ',';
                    $colors2 = $colors2 . '"#' . random_color() . '"    ,';
                }
                $labels2 = substr($labels2, 0, -1);
                $values2 = substr($values2, 0, -1);
                $colors2 = substr($colors2, 0, -1);

                $labels3 = '';
                $values3 = 0;
                $colors3 = '';
                foreach ($stats_entreprises as $row) {
                    $labels3 = $labels3 . '"' . $row['labels'] . '",';
                    $values3 = $values3 . $row['nbentreprise'] . ',';
                    $colors3 = $colors3 . '"#' . random_color() . '",';
                }
                $labels3 = substr($labels3, 0, -1);
                $values3 = substr($values3, 0, -1);
                $colors3 = substr($colors3, 0, -1);

                ?>
                <div class="row">
                    <div class="d-flex col-sm  justify-content-center">
                        <div class="card chart-container">
                            <div class="card-body">
                                <h4 class="card-title text-center">Nombre d'étudiants par ville pendant le stage</h4>
                                <div class="col-sm d-flex" id="legend1"></div>
                                <div class="col-sm d-flex">
                                    <canvas class="doughnut-chart" id="doughnut-chart">
                                        <script>
                                            var Chart1 = new Chart(document.getElementById("doughnut-chart"), {
                                                type: 'doughnut',
                                                data: {
                                                    labels: [<?php echo $labels; ?>],
                                                    datasets: [{
                                                        label: "Villes",
                                                        backgroundColor: [<?php echo $colors; ?>],
                                                        data: [<?php echo $values; ?>]
                                                    }]
                                                },
                                                options: {
                                                    responsive: true,
                                                    legend: {
                                                        display: false,
                                                    },
                                                    legendCallback: (chart) => {
                                                        const renderLabels = (chart) => {
                                                            const {
                                                                data
                                                            } = chart;
                                                            return data.datasets[0].data
                                                                .map(
                                                                    (_, i) =>
                                                                    `
                                                                    <li class="list-group-item">
                                                                        <div id="legend-${i}-item" class="legend-item">
                                                                            <span style="background-color:
                                                                                ${data.datasets[0].backgroundColor[i]}">
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                            </span>
                                                                            ${
                                                                                data.labels[i] &&
                                                                                `<span class="label">${data.labels[i]}: ${data.datasets[0].data[i]}</span>`
                                                                            }
                                                                        </div>
                                                                    </li>
                                                                `
                                                                )
                                                                .join("");
                                                        };
                                                        return `
                                                        <ul class="chartjs-legend list-group list-group-flush">
                                                            ${renderLabels(chart)}
                                                                </ul>`;
                                                    },
                                                    title: {
                                                        display: false,
                                                        text: 'Nombre d\'étudiants par ville pendant le stage'
                                                    }
                                                }
                                            });
                                            $('#legend1').html(Chart1.generateLegend());
                                        </script>
                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex col-sm  justify-content-center">
                        <div class="card chart-container">
                            <div class="card-body">
                                <h4 class="card-title text-center">Nombre d'étudiants par départements pendant le stage</h4>
                                <div class="col-sm d-flex" id="legend2">
                                </div>
                                <div class="col-sm d-flex">
                                    <canvas class="doughnut-chart" id="doughnut-chart2">
                                        <script>
                                            var Chart2 = new Chart(document.getElementById("doughnut-chart2"), {
                                                type: 'doughnut',
                                                data: {
                                                    labels: [<?php echo $labels2; ?>],
                                                    datasets: [{
                                                        label: "Villes",
                                                        backgroundColor: [<?php echo $colors2; ?>],
                                                        data: [<?php echo $values2; ?>]
                                                    }]
                                                },
                                                options: {
                                                    responsive: true,
                                                    legend: {
                                                        display: false,
                                                    },
                                                    legendCallback: (chart) => {
                                                        const renderLabels = (chart) => {
                                                            const {
                                                                data
                                                            } = chart;
                                                            return data.datasets[0].data
                                                                .map(
                                                                    (_, i) =>
                                                                    `
                                                                    <li class="list-group-item">
                                                                        <div id="legend-${i}-item" class="legend-item">
                                                                            <span style="background-color:
                                                                                ${data.datasets[0].backgroundColor[i]}">
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                            </span>
                                                                            ${
                                                                                data.labels[i] &&
                                                                                `<span class="label">${data.labels[i]}: ${data.datasets[0].data[i]}</span>`
                                                                            }
                                                                        </div>
                                                                    </li>
                                                                `
                                                                )
                                                                .join("");
                                                        };
                                                        return `
                                                        <ul class="chartjs-legend list-group list-group-flush">
                                                            ${renderLabels(chart)}
                                                                </ul>`;
                                                    },
                                                    title: {
                                                        display: false,
                                                        text: 'Nombre d\'étudiants par départements pendant le stage'
                                                    }
                                                }
                                            });
                                            $('#legend2').html(Chart2.generateLegend());
                                        </script>
                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex col-sm  justify-content-center">
                        <div class="card chart-container">
                            <div class="card-body">
                                <h4 class="card-title text-center">Nombre d'étudiants par entreprises pendant le stage</h4>
                                <div class="col-sm d-flex" id="legend3"></div>
                                <div class="col-sm d-flex">
                                    <canvas class="doughnut-chart" id="doughnut-chart3">
                                        <script type="text/javascript">
                                            var Chart3 = new Chart(document.getElementById("doughnut-chart3"), {
                                                type: 'doughnut',
                                                data: {
                                                    labels: [<?php echo $labels3; ?>],
                                                    datasets: [{
                                                        label: "Entreprises",
                                                        backgroundColor: [<?php echo $colors3; ?>],
                                                        data: [<?php echo $values3; ?>]
                                                    }]
                                                },
                                                options: {
                                                    responsive: true,
                                                    legend: {
                                                        display: false,
                                                    },
                                                    legendCallback: (chart) => {
                                                        const renderLabels = (chart) => {
                                                            const {
                                                                data
                                                            } = chart;
                                                            return data.datasets[0].data
                                                                .map(
                                                                    (_, i) =>
                                                                    `
                                                                    <li class="list-group-item">
                                                                        <div id="legend-${i}-item" class="legend-item">
                                                                            <span style="background-color:
                                                                                ${data.datasets[0].backgroundColor[i]}">
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                            </span>
                                                                            ${
                                                                                data.labels[i] &&
                                                                                `<span class="label">${data.labels[i]}: ${data.datasets[0].data[i]}</span>`
                                                                            }
                                                                        </div>
                                                                    </li>
                                                                `
                                                                )
                                                                .join("");
                                                        };
                                                        return `
                                                        <ul class="chartjs-legend list-group list-group-flush">
                                                            ${renderLabels(chart)}
                                                                </ul>`;
                                                    },
                                                    title: {
                                                        display: false,
                                                        text: 'Nombre d\'étudiants par entreprises pendant le stage'
                                                    }
                                                }
                                            });
                                            $('#legend3').html(Chart3.generateLegend());
                                        </script>
                                    </canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="lime-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="footer-text">2020 © iStage</span>
                </div>
            </div>
        </div>
    </div>
    <?php include '../includes/footer.php' ?>
</body>

</html>