<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>criteria">Criteria</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>

    <!-- <div class="container"> -->
    <!-- <div class="row mt-3 mb-5"> -->
    <div class="col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                Form Tambah Data Criteria
            </div>
            <div class="card-body">
                <!-- <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>  -->
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="criteria">Kriteria</label>
                        <input type="text" name="criteria" class="form-control" id="criteria">
                        <small class="form-text text-danger"><?= form_error('criteria'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="code_crt">Kode</label>
                        <input type="text" name="code_crt" class="form-control" id="code_crt">
                        <small class="form-text text-danger"><?= form_error('code_crt'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="weight_id">Bobot</label>
                        <select class="form-control" id="weight_id" name="weight_id">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <!-- <?php foreach ($weight as $w) : ?>
                                <?php if ($w == $criteria['weight']) : ?>
                                    <option value="<?= $w; ?>" selected><?= $w; ?></option>
                                <?php else : ?>
                                    <option value="<?= $w; ?>"><?= $w; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?> -->
                        </select>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>