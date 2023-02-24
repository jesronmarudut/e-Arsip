<div class="row">
    <div class="col-sm-12">
        <div class="box-body table-responsive no-padding">
            <table class="table table-bordered">
                <tr>
                    <th width="100px">Nomor Surat </th>
                    <th width="30px">: </th>
                    <td><?= $file['no_surat'] ?></td>
                    <th width="120px">Tgl Surat </th>
                    <th width="30px">:</th>
                    <td><?= $file['tgl_surat'] ?> </td>
                </tr>
                <tr>
                    <th>Perihal</th>
                    <th>:</th>
                    <td><?= $file['nama_file'] ?></th>
                    <th>Tgl Diterima</th>
                    <th>:</th>
                    <td><?= $file['tgl_diterima'] ?></td>
                </tr>
                <tr>
                    <th>Pengelola</th>
                    <th>:</th>
                    <td><?= $file['nama_user'] ?></td>
                    <th>Nama PDF</th>
                    <th>:</th>
                    <td><?= $file['namapdf'] ?></td>
                </tr>
                <tr>
                    <th>Instansi</th>
                    <th>:</th>
                    <td><?= $file['nama_dep'] ?></td>
                    <th>Deskripsi</th>
                    <th>:</th>
                    <td><?= $file['deskripsi'] ?></td>
                </tr>
            </table>
        </div>
        </div>

        <div class="col-sm-12">
            <iframe src="<?= base_url('file_dokumen/' . $file['tipe_file']) ?>" style="border:2px solid red;" height="700px" width="100%"></iframe>
        </div>

    </div>