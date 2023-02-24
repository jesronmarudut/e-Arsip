<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-users text-default"></i> Pengguna</h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('user/add') ?>" class="btn bg-orange">
                        <i class="fa fa-user-plus"></i> Pengguna</a>
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
                                <th width="50px"> No.</th>
                                <th> Nama User</th>
                                <th> Email</th>
                                <th> Password</th>
                                <th> Level</th>
                                <th> Instansi</th>
                                <th> Foto</th>
                                <th width="200px"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($user as $key => $value) { ?>
                                <tr>
                                    <td> <?= $no++; ?> </td>
                                    <td> <?= $value['nama_user']; ?> </td>
                                    <td> <?= $value['email']; ?> </td>
                                    <td> <?= $value['password']; ?> </td>
                                    <td> <?php if ($value['level'] == 1) {
                                                echo 'Super Admin';
                                            } else if ($value['level'] == 2) {
                                                echo 'Admin';
                                            } else {
                                                echo 'User';
                                            }; ?> </td>
                                    <td> <?= $value['nama_dep']; ?> </td>
                                    <td> <img src="<?= base_url('foto/' . $value['foto']) ?>" width="70px" class="img-circle"></td>
                                    <td class="text-center">
                                        <div class="btn">
                                            <a href="<?= base_url('user/edit/' . $value['id_user']) ?>" class="btn btn-primary btn-block btn-sm">
                                                <i class="fa fa-gears"></i> Edit</a>
                                            <button class="btn btn-danger btn-block btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_user']; ?>">
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


<!-- /.MODAL DELETE KATEGORI -->
<?php foreach ($user as $key => $value) { ?>
    <div class=" modal fade" id="delete<?= $value['id_user']; ?>">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus <b><?= $value['nama_user']; ?></b> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left btn-flat" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancel</button>
                    <a href="<?= base_url('user/delete/' . $value['id_user']) ?> " type="submit" class="btn btn-danger btn-flat">
                        <i class="fa fa-trash"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- /.PENUTUP MODAL DELETE KATEGORI -->