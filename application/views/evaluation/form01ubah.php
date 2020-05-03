<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>evaluation">Perbandingan (x)</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah</li>
        </ol>
    </nav>


<!-- <div class="container"> -->
    <!-- <div class="row mt-3 mb-5"> -->
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header">
                    Form Ubah Data Perbandingan
                </div>
                <div class="card-body">
                    <!-- <?php if (validation_errors()):?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>  -->
                    <form action="" method="POST">
                        <input type="hidden" name="id_alternative" value="<?= $evaluation['id_alternative']; ?>">
                        <div class="form-group">
                            <label for="id_alternative">Alternatif</label>
                            <input type="text" name="id_alternative" class="form-control" id="id_alternative" value="<?= $evaluation['id_alternative']; ?>" readonly>
                            <small class="form-text text-danger"><?= form_error('id_altenative'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="id_criteria">Kriteria</label>
                            <input type="text" name="id_criteria" class="form-control" id="id_criteria" value="<?= $evaluation['id_criteria']; ?>" readonly>
                            <small class="form-text text-danger"><?= form_error('id_criteria'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="value">Nilai Rating</label>
                                <select class="form-control" id="value" name="value">
                                    <?php foreach($value as $val): ?>
                                        <?php if ($val == $evaluation['value']): ?>
                                            <option value="<?= $val; ?>" selected><?= $val; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $val; ?>"><?= $val; ?></option>
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
