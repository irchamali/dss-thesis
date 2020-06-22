<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>alternative">Alternative</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>

    <!-- <div class="container"> -->
    <!-- <div class="row mt-3"> -->
    <div class="col-md-6 mt-4">

        <div class="card">
            <div class="card-header">
                Detail Data Alternative
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $alternative['alternative']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $alternative['code_alt']; ?></h6>
                <p class="card-text">Alternative ini merupakan lahan pertanian desa <?= $alternative['alternative']; ?> dengan luas lahan <?= $alternative['info']; ?> yang tengah ditanami tumbuhan: <?= $alternative['plants']; ?>.</p>
                <a href="<?= base_url(); ?>alternative" class="btn btn-primary ">Kembali</a>
            </div>
        </div>

    </div>
</div>
</div>