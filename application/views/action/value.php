<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url(); ?>action/add" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>

        <?php if ($this->session->flashdata('message')) : ?>
            <div class="row mt-3">
                <div class="col-md-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Yeey, Data Alternative <strong>berhasil </strong><?= $this->session->flashdata('flash'); ?>diubah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- bagian tabel -->
        <div class="card-body">
            <div class="table-responsive">
                <?php if (empty($alternative)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data Alternative tidak ditemukan!
                    </div>
                <?php endif; ?>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Alternative</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Info</th>
                            <th scope="col">Tanaman</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($alternative as $alt) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $alt['alternative']; ?></td>
                                <td><?= $alt['code_alt']; ?></td>
                                <td><?= $alt['info']; ?></td>
                                <td><?= $alt['plants']; ?></td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#lihatModal<?= $alt['id_alternative'] ?>" class="badge badge-success"><i class="far fa-fw fa-eye"></i> Detail</a>
                                    <a href="<?= base_url(); ?>action/edit/<?= $alt['id_alternative']; ?>" class="badge badge-warning"><i class="far fa-fw fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Lihat -->
<?php foreach ($alternative as $alt) : ?>
    <div class="modal fade" id="lihatModal<?= $alt['id_alternative'] ?>" tabindex="-1" role="dialog" aria-labelledby="lihatModal<?= $alt['id_alternative'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatModal<?= $alt['id_alternative'] ?>Label">Lihat Alternative</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('data/lihatalternatif/' . $alt['id_alternative']); ?>" method="post">
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/FarmerSmg.png'); ?>" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $alt['alternative']; ?></h5>
                                    <p class="card-text">Merupakan salahsatu Alternatif lahan pertanian di Kabupaten Magelang yang dikodifikasi menjadi (<?= $alt['code_alt']; ?>) yang dikelola dengan sistem budidaya <?= $alt['plants']; ?> <?= $alt['info']; ?>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Edit Modal -->

<!-- Edit Modal -->
<?php foreach ($alternative as $alt) : ?>
    <div class="modal fade" id="editAltModal<?= $alt['id_alternative'] ?>" tabindex="-1" role="dialog" aria-labelledby="editAltModal<?= $alt['id_alternative'] ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAltModal<?= $alt['id_alternative'] ?>Label">Edit Alternative</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('action/value/' . $alt['id_alternative']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name-alt" class="col-form-label">Alternatif:</label>
                            <input type="text" readonly class="form-control" value="<?= $alt['alternative'] ?>" id="alternative" name="alternative">
                        </div>
                        <div class="form-group">
                            <label for="plants" class="col-form-label">Tanaman:</label>
                            <input type="text" class="form-control" value="<?= $alt['plants'] ?>" id="plants" name="plants">
                        </div>
                        <div class="form-group">
                            <label for="info" class="col-form-label">Info lahan:</label>
                            <select class="form-control" id="info" name="info">
                                <option value="1">Cukup Sesuai</option>
                                <option value="2">Sesuai</option>
                                <option value="3">Sangat Sesuai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="plants" class="col-form-label">Penilaian:</label>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
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
                                                        <input type="radio" name="nilai[<?php echo $dataItem->id_criteria ?>]" value="<?php echo $dataItem->value ?>" <?php if (isset($valueAlternative)) {
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

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Edit Modal -->