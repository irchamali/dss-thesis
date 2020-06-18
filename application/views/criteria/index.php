<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url(); ?>criteria/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>

        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Criteria <strong>berhasil </strong><?= $this->session->flashdata('flash'); ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- tombol tambah codingan -->
        <!-- <div class="row mb-2">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>criteria/tambah" class="btn btn-primary">Tambah Data</a>
        </div>
    </div> -->
        <!-- tombol cari codingan sendiri -->
        <!-- <div class="row mb-3">
        <div class="col-md-6">
            <form action="<?= base_url(); ?>criteria/cari" method="post" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Cari dengan keyword" name="keyword" id="keyword" autocomplete="off">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button>
            </form>
        </div>
    </div> -->

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
                                    <!-- <a href="" class="badge badge-warning" data-toggle="modal" data-target="#detailModal" 
                            >ubah</a> -->
                                    <a href="<?= base_url(); ?>criteria/detail/<?= $crt['id_criteria']; ?>" class="badge badge-info">Detail</a>
                                    <a href="<?= base_url(); ?>criteria/ubah/<?= $crt['id_criteria']; ?>" class="badge badge-warning">ubah</a>
                                    <a href="<?= base_url(); ?>criteria/hapus/<?= $crt['id_criteria']; ?>" class="badge badge-danger" onclick="return confirm('Yakin mau dihapus?');">Hapus</a>

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