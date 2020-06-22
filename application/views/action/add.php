<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>action/add">Alternative</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>

    <!-- <div class="container"> -->
    <!-- <div class="row mt-3 mb-5"> -->
    <div class="col-lg-6 mt-4">
        <div class="card">
            <div class="card-header">
                Form Tambah Data Alternative
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="alternative">Nama Alternatif</label>
                        <input type="text" name="alternative" class="form-control" id="alternative">
                        <small class="form-text text-danger"><?= form_error('alternative'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="code_alt">Kode</label>
                        <input type="text" name="code_alt" class="form-control" id="code_alt">
                        <small class="form-text text-danger"><?= form_error('code_alt'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="plants">Tanaman</label>
                        <input type="text" name="plants" class="form-control" id="plants">
                        <small class="form-text text-danger"><?= form_error('plants'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="info">Info Lahan</label>
                        <input type="text" name="info" class="form-control" id="info">
                        <small class="form-text text-danger"><?= form_error('info'); ?></small>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>