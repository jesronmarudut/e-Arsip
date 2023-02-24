<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-file-text text-default"></i> Dokumen</h3>

                <?php
                if (session()->get('level') == 3) {
                    // tidak menampilkan td.
                } else {
                ?>
                    <div class="box-tools pull-right">
                        <a href="<?= base_url('file/add') ?>" class="btn bg-red">
                            <i class="fa fa-plus-square"></i> Dokumen</a>
                    </div>
                <?php
                }
                ?>


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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Surat</th>
                                <th>Nama Dokumen</th>
                                <th>Kategori</th>
                                <th>Pengirim</th>
                                <th>Ditujukan</th>
                                <th>Tanggal Surat</th>
                                <th>Tanggal Diterima</th>
                                <th>Deskripsi</th>
                                <th>Berkas</th>
                                <?php
                                if (session()->get('level') == 3) {
                                    // tidak menampilkan td.
                                } else {
                                ?>
                                    <th width="200px"> Aksi</th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>


                        <tbody>
                            <?php $no = 1;
                            foreach ($file as $key => $value) { ?>
                                <tr>
                                    <td> <?= $no++; ?> </td>
                                    <td> <?= $value['no_surat']; ?> </td>
                                    <td> <?= $value['nama_file']; ?> </td>
                                    <td> <?= $value['nama_kategori']; ?> </td>
                                    <td> <?= $value['pengirim']; ?> </td>
                                    <td> <?= $value['tujuan']; ?> </td>
                                    <td> <?= $value['tgl_surat']; ?> </td>
                                    <td> <?= $value['tgl_diterima']; ?> </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#lihatdeskripsi<?= $value['id_file']; ?>">
                                            <i class="fa fa-eye"></i> Lihat</button>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('file/viewpdf/' . $value['id_file']) ?>" class="btn btn-sm btn-danger">
                                            <i class=" fa fa-file-pdf-o fa-2x label-danger"></i></a><br>
                                        <?= $value['namapdf'] ?>
                                    </td>
                                    <!-- UNTUK MENAMPILKAN NAMA FILE -->



                                    <?php
                                    if (session()->get('level') == 3) {
                                        // tidak menampilkan td.
                                    } else {
                                    ?>
                                        <td class="text-center">
                                            <div class="btn">
                                                <a href="<?= base_url('file/edit/' . $value['id_file']) ?>" class="btn btn-primary btn-block btn-sm">
                                                    <i class="fa fa-gears"></i> Edit</a>
                                                <button class="btn btn-danger btn-block btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_file']; ?>">
                                                    <i class="fa fa-trash"></i> Delete</button>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL VIEW DESKRIPSI -->
<?php foreach ($file as $key => $value) { ?>
    <div class=" modal fade" id="lihatdeskripsi<?= $value['id_file']; ?>">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Deskripsi Dokumen</h4>
                </div>
                <div class="modal-body">
                    <p><?= $value['deskripsi']; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">
                        <i class="fa fa-remove"></i> Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



<!-- /.MODAL DELETE -->
<?php foreach ($file as $key => $value) { ?>
    <div class=" modal fade" id="delete<?= $value['id_file']; ?>">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus <b><?= $value['nama_file']; ?></b> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left btn-flat" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancel</button>
                    <a href="<?= base_url('file/delete/' . $value['id_file']) ?> " type="submit" class="btn btn-danger btn-flat">
                        <i class="fa fa-trash"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>