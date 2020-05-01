<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
		<div class="col-lg-6">
        <?= form_error('criteria', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
		</div>
    </div>
    <div class="row mb-2">
		<div class="col-lg-6">
			<button type="button" class="btn btn-primary tombolTambahData2" data-toggle="modal" data-target="#formModal2">
			Tambah Data Criteria
			</button>
		</div>
    </div>
    <div class="row mb-3">
		<div class="col-lg-6">
			<form action="<?= base_url(); ?>criteria/cari" method="post" class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Cari Alternatif" name="keyword" id="keyword" autocomplete="off">
				<button class="btn btn-outline-primary my-2 my-sm-0" type="submit" id="tombolCari">Search</button>
			</form>
		</div>
	</div>

    <!-- bagian tabel -->
    <div class="row">
        <div class="col-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kriteria</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($criteria as $crt) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $crt['criteria']; ?></td>
                        <td><?= $crt['code']; ?></td>
                        <td><?= $crt['weight']; ?></td>
                        <td>
                            <a href="<?= base_url('criteria'); ?>/detail" class="badge badge-primary" >detail</a>
                            <a href="<?= base_url(); ?>criteria/tambah/<?= $crt ['id_criteria']; ?>" class="badge badge-success tampilModalUbah2" data-toggle="modal" data-target="#formModal2">edit</a>
                            <!-- <a href="<?= base_url(); ?>criteria/hapus/<?= $crt ['id_criteria']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">hapus</a> -->
                            <form action="<?=base_url('criteria');?>/hapus" method="POST"><input type="hidden" name="id_criteria" value="<?= $crt->id_criteria?>">
                                <button onclick="return confirm('Kamuyakin?')" class="badge badge-danger">hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="formModal2" tabindex="-1" role="dialog" aria-labelledby="formModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel2">Add New Criteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="<?= base_url(); ?>/criteria/tambah" method="post">
                <div class="modal-body">
                <input type="hidden" name="id_criteria" id="id_criteria">
                    <div class="form-group">
                        <input type="text" class="form-control" id="criteria" name="criteria" placeholder="Criteria name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="code" name="code" placeholder="Code of criteria">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="weight" name="weight" placeholder="Bobot">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>
