<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Hasil Pencarian</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-eye"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                // foreach ($hasilCari as $result) {
                //     echo $result . "\n";
                // }

                // print_r($hasilCari);
                // die;
                if ($hasilCari == '404'){
                    echo "data tidak ada";
                } else {
                ?>

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
                        foreach ($hasilCari as $key => $value) { ?>
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
                <?php } ?>
            </div>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>