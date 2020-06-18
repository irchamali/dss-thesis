<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>criteria">Criteria</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>

    <!-- <div class="container"> -->
    <!-- <div class="row mt-3"> -->
    <div class="col-md-6 mt-4">

        <div class="card">
            <div class="card-header">
                Detail Data Criteria
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $criteria['criteria']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $criteria['code_crt']; ?></h6>
                <p class="card-text">Criteria ini oleh pengambil keputusan diberikan bobot: <?= $criteria['weight_id']; ?></p>
                <a href="<?= base_url(); ?>criteria" class="btn btn-primary ">Kembali</a>
            </div>
        </div>

    </div>
</div>
</div>