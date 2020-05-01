<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>alternative">Alternative</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>

<!-- <div class="container"> -->
    <!-- <div class="row mt-3 mb-5"> -->
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Alternative
                </div>
                <div class="card-body">
                    <!-- <?php if (validation_errors()):?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>  -->
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name_alt">Nama Alternatif</label>
                            <input type="text" name="name_alt" class="form-control" id="name_alt">
                            <small class="form-text text-danger"><?= form_error('name_alt'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="code_alt">Kode</label>
                            <input type="text" name="code_alt" class="form-control" id="code_alt">
                            <small class="form-text text-danger"><?= form_error('code_alt'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="info">Info Lahan</label>
                            <input type="text" name="info" class="form-control" id="info">
                            <small class="form-text text-danger"><?= form_error('info'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="plants">Tanaman</label>
                            <input type="text" name="plants" class="form-control" id="plants">
                            <small class="form-text text-danger"><?= form_error('plants'); ?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>   
