<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>criteria">Criteria</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah</li>
        </ol>
    </nav>

    <!-- <div class="container"> -->
    <!-- <div class="row mt-3 mb-5"> -->
    <div class="col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                Form Ubah Data Criteria
            </div>
            <div class="card-body">
                <!-- <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>  -->
                <form action="" method="POST">
                    <input type="hidden" name="id_criteria" value="<?= $criteria['id_criteria']; ?>">
                    <div class="form-group">
                        <label for="criteria">Kriteria</label>
                        <input type="text" name="criteria" class="form-control" id="criteria" value="<?= $criteria['criteria']; ?>" readonly>
                        <small class="form-text text-danger"><?= form_error('criteria'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="code_crt">Kode</label>
                        <input type="text" name="code_crt" class="form-control" id="code_crt" value="<?= $criteria['code_crt']; ?>" readonly>
                        <small class="form-text text-danger"><?= form_error('code_crt'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="weight">Bobot</label>
                        <select class="form-control" id="weight" name="weight">
                            <?php foreach ($weight as $w) : ?>
                                <?php if ($w == $criteria['weight']) : ?>
                                    <option value="<?= $w; ?>" selected><?= $w; ?></option>
                                <?php else : ?>
                                    <option value="<?= $w; ?>"><?= $w; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<br>