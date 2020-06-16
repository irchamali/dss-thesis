<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url(); ?>admin/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>

        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data User <strong>berhasil </strong><?= $this->session->flashdata('flash'); ?>.
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
                <?php if (empty($useri)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data User tidak ditemukan!
                    </div>
                <?php endif; ?>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <!-- <th scope="col">Nama</th>
                            <th scope="col">Email</th> -->
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($user as $u) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <!-- <td><?= $u['name']; ?></td>
                                <td><?= $u['email']; ?></td> -->
                                <td><?= $u['role_id']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>useradd/detail/<?= $u['id']; ?>" class="badge badge-info">Detail</a>
                                    <a href="<?= base_url(); ?>useradd/ubah/<?= $u['id']; ?>" class="badge badge-warning">ubah</a>
                                    <a href="<?= base_url(); ?>useradd/hapus/<?= $u['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin mau dihapus?');">Hapus</a>

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