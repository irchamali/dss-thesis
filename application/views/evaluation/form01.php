<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
      <div class="card-header py-3 text-center">
        <a href="<?= base_url(); ?>evaluation/form01" class="btn btn-primary"><i class="fas fa-arrow-right"></i> NEXT STEP</a>
      </div>

      <?php if ($this->session->flashdata('flash')): ?>
      <div class="row mt-3">
          <div class="col-md-6">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Data Criteria <strong>berhasil </strong><?= $this->session->flashdata('flash');?>.
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
              <?php if ( empty($evaluation)) : ?>
                  <div class="alert alert-danger" role="alert">
                      Data Perbandingan tidak ditemukan!
                  </div>
            <?php endif; ?>
            <table class="table table-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">Alternatif</th>
                        <th scope="col">Kriteria</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <?php foreach ($evaluation as $eva) : ?>
                    <tr>
                        <td><?= $eva['id_alternative']; ?></td>
                        <td><?= $eva['id_criteria']; ?></td>
                        <td><?= $eva['value']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>evaluation/form01ubah/<?= $eva['id_criteria']; ?>" class="badge badge-warning"><i class="fas fa-edit"></i> Ubah</a>
                        </td>
                    </tr>
                    
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

