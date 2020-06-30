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
                <h5 class="card-title"><b><?= $alternative['alternative']; ?></b></h5>
                <hr>
                <p class="card-text">Merupakan salahsatu Alternatif lahan pertanian di Kabupaten Magelang yang dikodifikasi menjadi (<?= $alternative['code_alt']; ?>) yang dikelola dengan sistem budidaya <?= $alternative['plants']; ?> <?= $alternative['info']; ?>.</p>
                <a href="<?= base_url(); ?>alternative" class="btn btn-primary ">Kembali</a>
            </div>
        </div>

    </div>
</div>
</div>