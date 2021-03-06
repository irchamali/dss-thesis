<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <div class="card-header py-3 text-center">
        <a href="<?= base_url(); ?>evaluation/form01" class="btn btn-primary"><i class="fas fa-arrow-right"></i> NEXT STEP</a>
    </div> -->

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- <h1 class="h3 mb-4 mt-8 text-gray-800">Land Suitable Evaluation</h1> -->
    <!-- Collapse -->
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header text-center" id="headingZero">
                <h5 class="mb-0">
                    <strong>Metode ELECTRE (Elimination Et choix tradusiant la realite)</strong>
                </h5>
            </div>
            <div id="collapseZero" class="collapse show" aria-labelledby="headingZero" data-parent="#accordionExample">
                <div class="card-body text-justify">
                    <p>Metode ELECTRE merupakan salah satu metode outranking untuk pengambilan keputusan multi kriteria yang diperkenalkan oleh Bernard Roy pada tahun 1960. Metode ini melibatkan analisis sistematis antar pasangan dari pilihan yang berbeda dan setiap pilihan memiliki skor masing-masing dari serangkaian kriteria evaluasi. Utamanya, ELECTRE digunakan dalam proses perangkingan dari keseluruhan hubungan outranking yang menggunakan index kesesuaian (concordance) dan ketidaksesuaian (discordance) untuk memilih dan menganalisis alternatif terbaik (Rogers dkk., 2000).</p>

                    <p>Ada 6 langkah yang perlu dilalui dalam metode ini. Yok kita coba evaluasi: </p>
                    <button class="btn btn-success collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Langkah #1
                    </button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <strong>#1 Perbandingan berpasangan untuk normalisasi matriks (r)</strong>
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <h4>Perbandingan berpasangan (x)</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php if (empty($evaluation)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    Data Evaluasi tidak ditemukan!
                                </div>
                            <?php endif; ?>

                            <table class="table table-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Alt</th>
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
                                    foreach ($getDataAlternative as $key => $value) {
                                        echo '
                                    <tr>
                                        <td>A' . $value->id_alternative . '</td>';
                                        foreach ($getDataCriteria as $key => $row) {
                                            $x = $this->db->query("SELECT * FROM electre_evaluations a WHERE a.id_alternative='" . $value->id_alternative . "' AND a.id_criteria='" . $row->id_criteria . "' LIMIT 1")->row_array();
                                            echo '<td>' . $x['value'] . '</td>';
                                        }
                                        echo '</tr>';
                                    }
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
                            <?php if (empty($evaluation)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    Data Evaluasi tidak ditemukan!
                                </div>
                            <?php endif; ?>

                            <table class="table table-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Alt</th>
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

                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <strong>#2 Menentukan bobot(w) dan membentuk matriks preferensi(v)</strong>
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <h4>Menentukan bobot tiap-tiap kriteria (w)</h4>
                        <div class="card-body text-center">
                            <div class="table-responsive">
                                <?php if (empty($evaluation)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Data Evaluasi tidak ditemukan!
                                    </div>
                                <?php endif; ?>

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
                                            <td scope="row">Bobot</td>
                                            <?php
                                            foreach ($getDataCriteria as $key => $value) {
                                                echo '<th>' . $value->weight . '</th>';
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <h4>Membentuk matriks preferensi (v)</h4>
                        <div class="card-body text-center">
                            <div class="table-responsive">
                                <?php if (empty($evaluation)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Data Evaluasi tidak ditemukan!
                                    </div>
                                <?php endif; ?>
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Alt</th>
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

                                    </tbody>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <strong>#3 Menentukan concordance index(Ckl) dan discordance index(Dkl)</strong>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table table-hover">

                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <strong>#4 Menghitung matriks concordance(C) dan matriks discordance(D)</strong>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</p>
                                <br>
                                <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Langkah #5
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <strong>#5 Membentuk matriks dominan concordance(f) dan discordance(g)</strong>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</p>
                                <br>
                                <button class="btn btn-primary collapsed" type="submit" data-toggle="collapse" data-target="<?= base_url('/evaluation') ?>/hasil" aria-expanded="false" aria-controls="collapseSix">
                                    Langkah #6
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <strong>#6 Membentuk matriks agregasi dominan(e)</strong>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                <br>
                                <!-- <button class="btn btn-success collapsed" type="button" data-toggle="collapse" data-target="#collapseZero" aria-expanded="false" aria-controls="collapseZero">
                                    DONE
                                </button> -->
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->
            <br>
        </div>
        <!-- End of Main Content -->
    </div>