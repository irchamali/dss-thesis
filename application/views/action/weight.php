<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <a href="<?= base_url(); ?>criteria/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div> -->

        <?php if ($this->session->flashdata('message')) : ?>
            <div class="row mt-3">
                <div class="col-md-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Yeey, Bobot Criteria <strong>berhasil</strong> diubah<?= $this->session->flashdata('flash'); ?>.
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
                <?php if (empty($criteria)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data Criteria tidak ditemukan!
                    </div>
                <?php endif; ?>


                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kriteria</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($criteria as $crt) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $crt['criteria']; ?></td>
                                <td><?= $crt['code_crt']; ?></td>
                                <td><?= $crt['weight_id']; ?></td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#lihatModal<?= $crt['id_criteria'] ?>" class="badge badge-success"><i class="far fa-fw fa-eye"></i> Detail</a>
                                    <a href="" data-toggle="modal" data-target="#editCrtModal<?= $crt['id_criteria'] ?>" class="badge badge-secondary"><i class="far fa-fw fa-edit"></i>Update</a>
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

<!-- Modal update -->
<?php foreach ($criteria as $crt) : ?>
    <div class="modal fade" id="editCrtModal<?= $crt['id_criteria'] ?>" tabindex="-1" role="dialog" aria-labelledby="editCrtModal<?= $crt['id_criteria'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCrtModal<?= $crt['id_criteria'] ?>Label">Edit Bobot</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('action/editweight/' . $crt['id_criteria']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $crt['criteria'] ?>" id="criteria" name="criteria" placeholder="Nama Criteria">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $crt['code_crt'] ?>" id="code_crt" name="code_crt" placeholder="Kode">
                        </div>
                        <div class="form-group">
                            <select name="weight_id" id="weight_id" class="form-control">
                                <?php foreach ($weight as $we) : ?>
                                    <?php if ($crt['weight_id'] == $we['id']) : ?>
                                        <option value="<?= $we['id']; ?>" selected> <?= $we['weight']; ?> </option>
                                    <?php else : ?>
                                        <option value="<?= $we['id']; ?>"> <?= $we['weight']; ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
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

<!-- Modal detail -->
<?php foreach ($criteria as $crt) : ?>
    <div class="modal fade" id="lihatModal<?= $crt['id_criteria'] ?>" tabindex="-1" role="dialog" aria-labelledby="lihatModal<?= $crt['id_criteria'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatModal<?= $crt['id_criteria'] ?>Label">Lihat Criteria</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('data/lihatcriteria/' . $crt['id_criteria']); ?>" method="post">
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/FarmerSmg.png'); ?>" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $crt['criteria']; ?></h5>
                                    <p class="card-text">Kriteria ini sebagai bagian dari faktor lingkungan yang dikodifikasi menjadi (<?= $crt['code_crt']; ?>) dengan bobot preferensi (w= <?= $crt['weight_id']; ?>) yang telah diberikan oleh pengambil keputusan <?= $user['name']; ?>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End detail Modal -->