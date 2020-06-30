<?php
error_reporting(0);
$sawah = array();
$lahan = array();
foreach ($getDataAlternative as $key => $value) {
    $row[0] = $value->id_alternative;
    $row[1] = $value->alternative;
    $row[2] = $value->code_alt;

    $sawah[$row[0]] = $row[2];
    $lahan[$row[0]] = $row[1];
}




// $penilaian = array();
// while ($row2 = $getDataAlternative->fetch_array(MYSQLI_ASSOC)) {
//     // mengambil hasil dari tabel alternative
//     $tampil = json_decode($row2['info'], true);
//     // mengambil penilaian
//     for ($i = 0; $i < count($tampil); $i++) {
//         $penilaian[$row2['id_alternative']][] = $tampil[$i]['hasil' . $i];
//     }
// }

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800"><?= $title; ?></h1>
    <p class="mb-4 text-justify">Sistem Pendukung Keputusan ini menggunakan metode ELECTRE untuk evaluasi kesesuaian penggunaan lahan, selengkapnya baca <a target="_blank" href="#">panduan pengguna</a> ya. Evaluasi dilakukan dengan studikasus 8 lahan sawah organik berdasarkan 9 kriteria lingkungan.</p>
    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="accordion" id="accordionExample">
        <!-- metode electre sementara hapus -->
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <strong>#1 Perbandingan berpasangan untuk normalisasi matriks (r)</strong>
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <h4>Perbandingan berpasangan (x)</h4>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Alternatif</th>
                                        <th colspan="<?= count($getDataCriteria); ?>">Criteria</th>
                                    </tr>
                                    <tr>
                                        <?php
                                        foreach ($getDataCriteria as $key => $value) {
                                            echo '<th>C' . $value->id_criteria . '</th>';
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //-- query untuk mengambil data jumlah kriteria 'n'
                                    $sql    = "SELECT * FROM electre_criterias";
                                    $result = $this->db->query($sql);
                                    $row    = $result->result();
                                    //--- inisialisasi jumlah kriteria 'n'

                                    $n = COUNT($row);
                                    //-- query untuk mengambil data Perbandingan Berpasangan X
                                    $sql    = "SELECT * FROM electre_evaluations ORDER BY id_alternative, id_criteria";
                                    $result = $this->db->query($sql)->result();
                                    $X = array();
                                    $alternative = '';
                                    //--- inisialisasi jumlah alternative 'm'
                                    $m = 0;
                                    foreach ($result as $key => $r) {
                                        $row[0] = $r->id_alternative;
                                        $row[1] = $r->id_criteria;
                                        $row[2] = $r->value;
                                        if ($row[0] != $alternative) {
                                            $X[$row[0]] = array();
                                            $alternative = $row[0];
                                            ++$m;
                                        }
                                        $X[$row[0]][$row[1]] = $row[2];
                                    }

                                    foreach ($X as $key => $value) {
                                        echo "<tr>";
                                        echo "<td><b>" . $sawah[$key] . "</b></td>";
                                        for ($i = 1; $i <= count($value); $i++) {
                                            echo "<td>" . $value[$i] . "</td>";
                                        }
                                        echo "</tr>";
                                    }

                                    // foreach ($getDataAlternative as $key => $value) {
                                    //     echo '
                                    // <tr>
                                    //     <td>A' . $value->id_alternative . '</td>';
                                    //     foreach ($getDataCriteria as $key => $row) {
                                    //         $x = $this->db->query("SELECT * FROM electre_evaluations a WHERE a.id_alternative='" . $value->id_alternative . "' AND a.id_criteria='" . $row->id_criteria . "' LIMIT 1")->row_array();
                                    //         echo '<td>' . $x['value'] . '</td>';
                                    //     }
                                    //     echo '</tr>';
                                    // }
                                    ?>

                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h4>Perbandingan berpasangan ternormalisasi (r)</h4>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Alternatif</th>
                                        <th colspan="<?= count($getDataCriteria); ?>">Criteria</th>
                                    </tr>
                                    <tr>
                                        <?php
                                        foreach ($getDataCriteria as $j => $value) {
                                            echo '<th>C' . $value->id_criteria . '</th>';
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //-- menentukan nilai rata-rata kuadrat per-kriteria
                                    $x_rata = array();
                                    foreach ($X as $i => $x) {
                                        foreach ($x as $j => $value) {
                                            $x_rata[$j] = (isset($x_rata[$j]) ? $x_rata[$j] : 0) + pow($value, 2);
                                        }
                                    }
                                    for ($k = 1; $k <= $n; $k++) {
                                        $x_rata[$k] = sqrt($x_rata[$k]);
                                    }


                                    //-- menormalisasi matriks X menjadi matriks R
                                    $R = array();
                                    $alternative = '';
                                    foreach ($X as $i => $x) {
                                        if ($alternative != $i) {
                                            $alternative = $i;
                                            $R[$i] = array();
                                        }
                                        foreach ($x as $j => $value) {
                                            $R[$i][$j] = $value / $x_rata[$j];
                                        }
                                    }

                                    foreach ($R as $key => $value) {
                                        echo "<tr>";
                                        echo "<td><b>" . $sawah[$key] . "</b></td>";
                                        for ($i = 1; $i <= count($value); $i++) {
                                            echo "<td>" . $value[$i] . "</td>";
                                        }
                                        echo "</tr>";
                                    }

                                    ?>

                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <strong>#2 Menentukan bobot(w) dan membentuk matriks preferensi(v)</strong>
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <h4>Menentukan bobot tiap-tiap kriteria (w)</h4>
                    <div class="card-body text-center">
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">Criteria</th>
                                        <?php
                                        foreach ($getDataCriteria as $key => $value) {
                                            echo '<th>C' . $value->id_criteria . '</th>';
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- <td scope="row">Bobot</td> -->
                                        <?php
                                        // query untuk mengambil data nilai bobot criteria
                                        $sql    = "SELECT id_criteria, weight_id FROM electre_criterias ORDER BY id_criteria";
                                        $result0 = $this->db->query($sql)->result();

                                        $criteria = array();
                                        foreach ($result0 as $key => $value) {
                                            $row[0] = $value->id_criteria;
                                            $row[1] = $value->weight_id;
                                            $criteria[$row[0]] = $row[1];
                                        }
                                        echo "<tr>";
                                        echo "<td scope='row'>Bobot</td>";
                                        for ($i = 1; $i <= count($criteria); $i++) {

                                            echo "<td>" . $criteria[$i] . "</td>";
                                        }
                                        echo "</tr>";

                                        // foreach ($getDataCriteria as $key => $value) {
                                        //     echo '<th>' . $value->weight . '</th>';
                                        // }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h4>Membentuk matriks preferensi (v)</h4>
                    <div class="card-body text-center">
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Alternatif</th>
                                        <th colspan="<?= count($getDataCriteria); ?>">Criteria</th>
                                    </tr>
                                    <tr>
                                        <?php
                                        foreach ($getDataCriteria as $j => $value) {
                                            echo '<th>C' . $value->id_criteria . '</th>';
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //-- inisialisasi matrik preferensi V dan himpunan bobot kriteria w
                                    $V = $w = array();
                                    //-- memasukkan data bobot ke dalam $w
                                    foreach ($criteria as $j => $weight)
                                        $w[$j] = $weight;
                                    $alternative = '';
                                    //-- menghitung nilai Preferensi V
                                    foreach ($R as $i => $r) {
                                        if ($alternative != $i) {
                                            $alternative = $i;
                                            $V[$i] = array();
                                        }
                                        foreach ($r as $j => $value) {
                                            $V[$i][$j] = $w[$j] * $value;
                                        }
                                    }

                                    foreach ($V as $key => $value) {
                                        echo "<tr>";
                                        echo "<td><b>" . $sawah[$key] . "</b></td>";
                                        for ($i = 1; $i <= count($value); $i++) {
                                            echo "<td>" . $value[$i] . "</td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <strong>#3 Menentukan concordance index(Ckl) dan discordance index(Dkl)</strong>
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <h4>Menentukan concordance index(Ckl)</h4>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>

                                    <tr>
                                        <th>Code</th>
                                        <?php
                                        foreach ($getDataAlternative as $key => $value) {
                                            echo "<th>" . $value->code_alt . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $c = array();
                                    $c_index = '';
                                    for ($k = 1; $k <= $m; $k++) {
                                        if ($c_index != $k) {
                                            $c_index = $k;
                                            $c[$k] = array();
                                        }
                                        for ($l = 1; $l <= $m; $l++) {
                                            if ($k != $l) {
                                                for ($j = 1; $j <= $n; $j++) {
                                                    if (!isset($c[$k][$l])) $c[$k][$l] = array();
                                                    if ($V[$k][$j] >= $V[$l][$j]) {
                                                        array_push($c[$k][$l], $j);
                                                    }
                                                }
                                            } else if (isset($c[$k][$l]) == NULL) {
                                                $c[$k][$l] = $c[$k][$l] = "-";
                                            }
                                        }
                                    }

                                    foreach ($c as $key => $value) {
                                        echo "<tr>";
                                        echo "<td><b>" . $sawah[$key] . "</b></td>";
                                        for ($i = 1; $i <= count($c); $i++) {
                                            echo is_array($value[$i]) ? "<td>" . implode(", ", $value[$i]) . "</td>" : "<td>" . $value[$i] . "</td>";
                                        }
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h4>Menentukan discordance index(Dkl)</h4>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <?php
                                        foreach ($getDataAlternative as $key => $value) {
                                            echo "<th>" . $value->code_alt . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $d = array();
                                    $d_index = '';
                                    for ($k = 1; $k <= $m; $k++) {
                                        if ($d_index != $k) {
                                            $d_index = $k;
                                            $d[$k] = array();
                                        }
                                        for ($l = 1; $l <= $m; $l++) {
                                            if ($k != $l) {
                                                for ($j = 1; $j <= $n; $j++) {
                                                    if (!isset($d[$k][$l])) $d[$k][$l] = array();
                                                    if ($V[$k][$j] < $V[$l][$j]) {
                                                        array_push($d[$k][$l], $j);
                                                    }
                                                }
                                            } else if (isset($d[$k][$l]) == NULL) {
                                                $d[$k][$l] = $d[$k][$l] = "-";
                                            }
                                        }
                                    }

                                    foreach ($d as $key => $value) {
                                        echo "<tr>";
                                        echo "<td><b>" . $sawah[$key] . "</b></td>";
                                        for ($i = 1; $i <= count($c); $i++) {
                                            echo is_array($value[$i]) ? "<td>" . implode(", ", $value[$i]) . "</td>" : "<td>" . $value[$i] . "</td>";
                                        }
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <strong>#4 Menghitung matriks concordance(C) dan matriks discordance(D)</strong>
                    </button>
                </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    <h4>Menghitung matriks concordance (C)</h4>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <?php
                                        foreach ($getDataAlternative as $key => $value) {
                                            echo "<th>" . $value->code_alt . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $C = array();
                                    $c_index = '';
                                    for ($k = 1; $k <= $m; $k++) {
                                        if ($c_index != $k) {
                                            $c_index = $k;
                                            $C[$k] = array();
                                        }
                                        for ($l = 1; $l <= $m; $l++) {
                                            if ($k != $l && count($c[$k][$l])) {
                                                $f = 0;
                                                foreach ($c[$k][$l] as $j) {
                                                    $C[$k][$l] = (isset($C[$k][$l]) ? $C[$k][$l] : 0) + $w[$j];
                                                }
                                            } else if (isset($C[$k][$l]) == NULL) {
                                                $C[$k][$l] = $C[$k][$l] = "-";
                                            }
                                        }
                                    }

                                    foreach ($C as $key => $value) {
                                        echo "<tr>";
                                        echo "<tr>";
                                        echo "<td><b>" . $sawah[$key] . "</b></td>";
                                        for ($i = 1; $i <= count($c); $i++) {
                                            echo is_array($value[$i]) ? "<td>" . implode(", ", $value[$i]) . "</td>" : "<td>" . $value[$i] . "</td>";
                                        }
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h4>Threshold <u>c</u></h4>
                    <div class="card-body text-left">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>
                                            <?php
                                            $sigma_c = 0;
                                            foreach ($C as $k => $cl) {
                                                foreach ($cl as $l => $value) {
                                                    $sigma_c += $value;
                                                }
                                            }
                                            $threshold_c = $sigma_c / ($m * ($m - 1));
                                            echo "<b>" . $threshold_c . "</b>";
                                            ?>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-body ">
                    <h4>Menghitung matriks discordance(D)</h4>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <?php
                                        foreach ($getDataAlternative as $key => $value) {
                                            echo "<th>" . $value->code_alt . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $D = array();
                                    $d_index = '';
                                    for ($k = 1; $k <= $m; $k++) {
                                        if ($d_index != $k) {
                                            $d_index = $k;
                                            $D[$k] = array();
                                        }
                                        for ($l = 1; $l <= $m; $l++) {
                                            if ($k != $l) {
                                                $max_d = 0;
                                                $max_j = 0;
                                                if (count($d[$k][$l])) {
                                                    $mx = array();
                                                    foreach ($d[$k][$l] as $j) {
                                                        if ($max_d < abs($V[$k][$j] - $V[$l][$j]))
                                                            $max_d = abs($V[$k][$j] - $V[$l][$j]);
                                                    }
                                                }
                                                $mx = array();
                                                for ($j = 1; $j <= $n; $j++) {
                                                    if ($max_j < abs($V[$k][$j] - $V[$l][$j]))
                                                        $max_j = abs($V[$k][$j] - $V[$l][$j]);
                                                }
                                                $D[$k][$l] = $max_d / $max_j;
                                            } else if (isset($D[$k][$l]) == NULL) {
                                                $D[$k][$l] = $D[$k][$l] = "-";
                                            }
                                        }
                                    }

                                    foreach ($D as $key => $value) {
                                        echo "<tr>";
                                        echo "<td><b>" . $sawah[$key] . "</b></td>";
                                        for ($i = 1; $i <= count($c); $i++) {
                                            echo is_array($value[$i]) ? "<td>" . implode(", ", $value[$i]) . "</td>" : "<td>" . $value[$i] . "</td>";
                                        }
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h4>Threshold <u>d</u></h4>
                    <div class="card-body text-left">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>
                                            <?php
                                            $sigma_d = 0;
                                            foreach ($D as $k => $dl) {
                                                foreach ($dl as $l => $value) {
                                                    $sigma_d += $value;
                                                }
                                            }
                                            $threshold_d = $sigma_d / ($m * ($m - 1));
                                            echo $threshold_d;
                                            ?>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div><br>

            </div>
        </div>

        <div class="card shadow">
            <div class="card-header" id="headingFive">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <strong>#5 Membentuk matriks dominan concordance(f) dan discordance(g)</strong>
                    </button>
                </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    <h4>Membentuk matriks dominan concordance (f)</h4>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <?php
                                        foreach ($getDataAlternative as $key => $value) {
                                            echo "<th>" . $value->code_alt . "</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $F = array();
                                    foreach ($C as $k => $cl) {
                                        $F[$k] = array();
                                        foreach ($cl as $l => $value) {
                                            $F[$k][$l] = ($value >= $threshold_c ? 1 : 0);
                                        }
                                    }

                                    foreach ($F as $key => $value) {
                                        echo "<tr>";
                                        echo "<td><b>" . $sawah[$key] . "</b></td>";
                                        for ($i = 1; $i <= count($c); $i++) {
                                            echo is_array($value[$i]) ? "<td>" . implode(", ", $value[$i]) . "</td>" : "<td>" . $value[$i] . "</td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <h4>Membentuk matriks dominan discordance (g)</h4>
                        <div class="card-body text-center">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <?php
                                            foreach ($getDataAlternative as $key => $value) {
                                                echo "<th>" . $value->code_alt . "</th>";
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $G = array();
                                        foreach ($D as $k => $dl) {
                                            $G[$k] = array();
                                            foreach ($dl as $l => $value) {
                                                $G[$k][$l] = ($value >= $threshold_d ? 1 : 0);
                                            }
                                        }

                                        foreach ($G as $key => $value) {
                                            echo "<tr>";
                                            echo "<td><b>" . $sawah[$key] . "</b></td>";
                                            for ($i = 1; $i <= count($c); $i++) {
                                                echo is_array($value[$i]) ? "<td>" . implode(", ", $value[$i]) . "</td>" : "<td>" . $value[$i] . "</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header" id="headingSix">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <strong>#6 Membentuk matriks agregasi dominan(e)</strong>
                    </button>
                </h2>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body text-center">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <?php
                                    foreach ($getDataAlternative as $key => $value) {
                                        echo "<th>" . $value->code_alt . "</th>";
                                    }
                                    ?>
                                    <th>Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $hasil = array();
                                $E = array();
                                foreach ($F as $k => $sl) {
                                    $E[$k] = array();
                                    foreach ($sl as $l => $value) {
                                        $E[$k][$l] = $F[$k][$l] * $G[$k][$l];
                                    }
                                }

                                foreach ($E as $key => $value) {
                                    $hasil[$key] = array_sum($value);

                                    echo "<tr>";
                                    echo "<td><b>" . $sawah[$key] . "</b></td>";
                                    for ($i = 1; $i <= count($c); $i++) {
                                        echo is_array($value[$i]) ? "<td>" . implode(", ", $value[$i]) . "</td>" : "<td>" . $value[$i] . "</td>";
                                    }
                                    echo "<td>" . array_sum($value) . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header" id="headingSeven">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSix">
                        <strong>#7 Hasil dan kesimpulan</strong>
                    </button>
                </h2>
            </div>
            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                <div class="card-body text-center">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Ranking</th>
                                    <th>Alternatif</th>
                                    <th>Skor (X)</th>
                                    <th>Poin (Ekl)</th>
                                    <th>Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                arsort($hasil);
                                $no = 1;
                                foreach ($hasil as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $lahan[$key]; ?></td>
                                        <td><?= array_sum($X[$key]); ?></td>
                                        <td><?= $hasil[$key]; ?></td>
                                        <td>
                                            <?php
                                            if (($hasil[$key]) > 3) {
                                                echo "Sangat Sesuai";
                                            } else if (($hasil[$key]) >= 3) {
                                                echo "Cukup Sesuai";
                                            } else if (($hasil[$key]) <= 3) {
                                                echo "Sesuai Marginal";
                                            }
                                            ?>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div>
                        <form action="" method="post">
                            <input type="submit" name="update" value="Infografis" class="btn btn-block btn-success btn-md font-weight-medium auth-form-btn">
                        </form>
                        <?php
                        if (isset($_POST['update'])) {
                            foreach ($hasil as $key => $value) {
                                if (($hasil[$key]) > 3) {
                                    $nilai = "S1";
                                } else if (($hasil[$key]) >= 3) {
                                    $nilai = "S2";
                                } else if (($hasil[$key]) <= 3) {
                                    $nilai = "S3";
                                }

                                $sql = "UPDATE electre_alternatives SET new_info = '$nilai' WHERE id_alternative = '$key'";
                                $query = $this->db->query($sql);

                                if ($query) {
                                    echo "<script>window.location=(href='admin')</script>";
                                }
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->