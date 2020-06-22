<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>action/edit">Action</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <!-- <div class="container"> -->
    <!-- <div class="row mt-3 mb-5"> -->
    <div class="col-lg mt-4">
        <div class="card">
            <div class="card-header">
                Form Ubah Data Alternative
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="alternative">Nama Alternatif</label>
                        <input name="alternative" type="text" class="form-control" id="alternative" value="<?php echo isset($valueAlternative[0]->alternative) ? $valueAlternative[0]->alternative : '' ?>" placeholder="nama alternatif">
                        <small class="form-text text-danger"><?= form_error('alternative'); ?></small>
                    </div>
                    <div class="table-responsive ">
                        <label for="">Penilaian</label>
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="2">Criteria</th>
                                    <th colspan="4">Nilai</th>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dataView as $item) {
                                ?>
                                    <tr>
                                        <td><?php echo $item['nama']; ?></td>
                                        <?php
                                        $no = 1;
                                        foreach ($item['data'] as $dataItem) {

                                        ?>
                                            <td>
                                                <input type="radio" name="value[<?php echo $dataItem->id_criteria ?>]" value="<?php echo $dataItem->value ?>" <?php if (isset($valueAlternative)) {
                                                                                                                                                                    foreach ($valueAlternative as $item => $value) {
                                                                                                                                                                        if ($value->id_criteria == $dataItem->id_criteria) {
                                                                                                                                                                            if ($value->value ==  $dataItem->value) { ?> checked="checked" <?php
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                if ($no == 3) { ?> checked="checked" <?php
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                }                                                                                                                          ?> /> <?php echo $dataItem->subcriteria;
                                                                                                                                                                                                                                                                                                                                                                                                    $no++; ?> </td>
                                    <?php
                                        }
                                        echo '</tr>';
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
</div>