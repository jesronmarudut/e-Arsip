<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-mortar-board"></i> Instansi</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn bg-orange " data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus-square"></i> Instansi</button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success! - ';
                    echo session()->getFlashdata('pesan');
                    echo '</h4></div>';
                    # code...
                } ?>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px"> No</th>
                            <th>Instansi</th>
                            <th width="200px"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dep as $key => $value) { ?>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $value['nama_dep']; ?> </td>
                                <td class="text-center">
                                    <div class="btn">
                                        <button class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_dep']; ?>">
                                            <i class="fa fa-cogs"></i> Edit</button>
                                        <button class="btn btn-danger btn-block btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_dep']; ?>">
                                            <i class="fa fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>


<!-- /MODAL ADD KATEGORI -->
<div class=" modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Instansi</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('dep/add')
                ?>

                <div class="form-group">
                    <label>Nama Instansi</label>
                    <input name="nama_dep" class="form-control" placeholder="Masukan nama Instansi" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left btn-flat" data-dismiss="modal">
                    <i class="fa fa-close"></i> Cancel</button>
                <button type="submit" class="btn btn-success btn-flat">
                    <i class="fa fa-save"></i> Save</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<!-- /.PENUTUP MODAL ADD KATEGORI -->


<!-- /.MODAL EDIT KATEGORI -->
<?php foreach ($dep as $key => $value) { ?>
    <div class=" modal fade" id="edit<?= $value['id_dep']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Instansi</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('dep/edit/' . $value['id_dep'])
                    ?>

                    <div class="form-group">
                        <label>Nama Instansi</label>
                        <input name="nama_dep" value="<?= $value['nama_dep']; ?>" class="form-control" placeholder="Masukan nama Instansi" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left btn-flat" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancel</button>
                    <button type="submit" class="btn btn-success btn-flat">
                        <i class="fa fa-save"></i> Update</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>
<!-- /.PENUTUP MODAL EDIT KATEGORI -->


<!-- /.MODAL DELETE KATEGORI -->
<?php foreach ($dep as $key => $value) { ?>
    <div class=" modal fade" id="delete<?= $value['id_dep']; ?>">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus <b><?= $value['nama_dep']; ?></b> ?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left btn-flat" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancel</button>
                    <a href="<?= base_url('dep/delete/' . $value['id_dep']) ?> " type="submit" class="btn btn-danger btn-flat">
                        <i class="fa fa-trash"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- /.PENUTUP MODAL DELETE KATEGORI -->