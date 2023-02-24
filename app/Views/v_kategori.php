<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-tags text-default"></i> Kategori File</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn bg-yellow" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus-square"></i> Kategori File</button>
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
                <div class="box-body table-responsive no-padding">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50px"> No</th>
                                <th>Kategori Surat</th>
                                <th width="200px"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($kategori as $key => $value) { ?>
                                <tr>
                                    <td> <?= $no++; ?> </td>
                                    <td> <?= $value['nama_kategori']; ?> </td>

                                    <td class="text-center">
                                        <div class="btn">
                                            <button class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_kategori']; ?>">
                                                <i class="fa fa-cogs"></i> Edit</button>
                                            <button class="btn btn-danger btn-block btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_kategori']; ?>">
                                                <i class="fa fa-trash"></i> Delete</button>
                                        </div>
                                    </td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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
                <h4 class="modal-title">Tambah Kategori</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('kategori/add')
                ?>

                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input name="nama_kategori" class="form-control" placeholder="Masukan nama kategori" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left btn-flat" data-dismiss="modal">
                    <i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat">
                    <i class="fa fa-save"></i> Save</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<!-- /.PENUTUP MODAL ADD KATEGORI -->


<!-- /.MODAL EDIT KATEGORI -->
<?php foreach ($kategori as $key => $value) { ?>
    <div class=" modal fade" id="edit<?= $value['id_kategori']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Kategori</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('kategori/edit/' . $value['id_kategori'])
                    ?>

                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input name="nama_kategori" value="<?= $value['nama_kategori']; ?>" class="form-control" placeholder="Masukan nama kategori" required>
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
<?php foreach ($kategori as $key => $value) { ?>
    <div class=" modal fade" id="delete<?= $value['id_kategori']; ?>">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus <?= $value['nama_kategori']; ?>?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left btn-flat" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancel</button>
                    <a href="<?= base_url('kategori/delete/' . $value['id_kategori']) ?> " type="submit" class="btn btn-danger btn-flat">
                        <i class="fa fa-trash"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- /.PENUTUP MODAL DELETE KATEGORI -->