<?= $this->extend("admin/layouts/template"); ?>

<?= $this->section("content"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title; ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Tambah Data <i class="fas fa-plus"></i></button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach ($dt_ktg as $row) : 
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row["kategori"]; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-edit<?= $row["id"]; ?>" title="edit data"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-del<?= $row["id"]; ?>" title="hapus data"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>    
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/kategori/save" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukkan kategori">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal <i class="fas fa-times"></i></button>
                <button type="submit" class="btn btn-primary">Simpan <i class="fas fa-save"></i></button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.End Modal Tambah Data -->

<?php foreach ($dt_ktg as $row) : ?>
<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-edit<?= $row["id"]; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/kategori/update" method="post">
            <div class="modal-body">
                <input type="hidden"  name="id" value="<?= $row["id"]; ?>">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $row["kategori"]; ?>" placeholder="Masukkan kategori">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal <i class="fas fa-times"></i></button>
                <button type="submit" class="btn btn-primary">Simpan <i class="fas fa-save"></i></button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.End Modal Tambah Data -->

<!-- Modal Hapus Data -->
<div class="modal fade" id="modal-del<?= $row["id"]; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/kategori/delete" method="post">
            <div class="modal-body">
                <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                Apakah anda yakin ingin menghapus data <?= $row["kategori"]; ?>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal <i class="fas fa-times"></i></button>
                <button type="submit" class="btn btn-danger">Hapus <i class="fas fa-trash"></i></button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.End Modal Hapus Data -->
<?php endforeach; ?>
<?= $this->endSection(); ?>