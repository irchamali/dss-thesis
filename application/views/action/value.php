<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <a href="<?= base_url(); ?>alternative/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div> -->

        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Alternative <strong>berhasil </strong><?= $this->session->flashdata('flash'); ?>.
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
                                <td><?= $alt['name_alt']; ?></td>
                                <td><?= $alt['code_alt']; ?></td>
                                <td><?= $alt['info']; ?></td>
                                <td><?= $alt['plants']; ?></td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#lihatModal<?= $alt['id_alternative'] ?>" class="badge badge-success"><i class="far fa-fw fa-eye"></i> Detail</a>
                                    <a href="" data-toggle="modal" data-target="#editAltModal<?= $sm['id'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
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
                                    <h5 class="card-title"><?= $alt['name_alt']; ?></h5>
                                    <p class="card-text">Alternatif lahan pertanian organik yang dikodifikasi menjadi (<?= $alt['code_alt']; ?>) dengan luas lahan <?= $alt['info']; ?> yang dikelola dengan sistem budidaya <?= $alt['plants']; ?>.</p>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAltModal<?= $alt['id_alternative'] ?>Label">Edit Alternative</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('action/editalternative/' . $alt['id_alternative']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $alt['name_alt'] ?>" id="name_alt" name="name_alt" placeholder="Nama Alternative">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $alt['info'] ?>" id="info" name="info" placeholder="Info lahan">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $alt['plants'] ?>" id="plants" name="plants" placeholder="Nama Tanaman">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option>Select Item Criteria</option>
                                <?php foreach ($menu as $mm) : ?>
                                    <?php if ($esm['menu_id'] == $mm['id']) : ?>
                                        <option value="<?= $mm['id']; ?>" selected> <?= $mm['menu']; ?> </option>
                                    <?php else : ?>
                                        <option value="<?= $mm['id']; ?>"> <?= $mm['menu']; ?> </option>
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