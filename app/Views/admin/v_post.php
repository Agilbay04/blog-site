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
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dt_post as $row) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row["judul"]; ?></td>
                                        <td><img src="/dist/img/<?= $row["gambar"]; ?>" alt="<?= $row["gambar"]; ?>" class="img img-bordered-sm" width="30%"></td>
                                        <td><?= $row["nama"]; ?></td>
                                        <td><?= date("d/m/Y H:i", strtotime($row["created_at"])); ?></td>
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
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $title; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/post/save" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="" selected disabled>-- kategori --</option>
                                    <?php foreach ($dt_ktg as $row) : ?>
                                        <option value="<?= $row["id"]; ?>"><?= $row["kategori"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea name="isi" class="form-control" id="isi" cols="30" rows="10" placeholder="Masukkan isi"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                        <label class="custom-file-label" for="gambar">Pilih file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<?php foreach ($dt_post as $row) : ?>
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
                        <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $row["judul"]; ?>" placeholder="Masukkan kategori">
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
                        Apakah anda yakin ingin menghapus data <?= $row["judul"]; ?>
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