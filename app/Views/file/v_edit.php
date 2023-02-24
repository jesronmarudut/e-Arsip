<div class="row">
    <div class="col-md-12">
    </div>
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-gears"></i> Edit File</h3>
            </div>

            <!-- VIEW UNTUK MENAMBAH FILE -->
            <div class="box-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <h4>Terjadi Kesalahan !</h4>
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <?php
                echo form_open_multipart('file/update/' . $file['id_file']);
                // helper('text');
                // $no_file = date('sdmy') . '-' . random_string('alnum', 5); //UNTUK NOMOR FILE SUPAYA AUTOMATIS NGIKUTIN TANGGAL-------------------------
                ?>

                <div class="form-group">
                    <label>Nomor File</label>
                    <input name="no_file" class="form-control" value="<?= $file['no_file'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <option value="<?= $file['id_kategori'] ?>"><?= $file['nama_kategori'] ?></option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nomor Surat</label>
                    <input name="no_surat" value="<?= $file['no_surat'] ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Perihal</label>
                    <input name="nama_file" value="<?= $file['nama_file'] ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Pengirim</label>
                    <input name="pengirim" value="<?= $file['pengirim'] ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tujuan Surat</label>
                    <input name="tujuan" value="<?= $file['tujuan'] ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tanggal Surat</label>
                    <input type="text" value="<?= $file['tgl_surat'] ?>" name="Tanggal_Surat" class="form-control" id="tglsurat">
                </div>

                <div class="form-group">
                    <label>Tanggal Diterima</label>
                    <input type="text" value="<?= $file['tgl_diterima'] ?>" name="Tanggal_Diterima" class="form-control" id="tglditerima">
                </div>

                <div class="form-group">
                    <label>Deskripsi File</label>
                    <textarea name="deskripsi" class="form-control" rows="5"><?= $file['deskripsi'] ?></textarea>
                </div>

                <div class="form-group">
                    <label>Ganti File</label>
                    <input type="file" name="tipe_file" class="form-control">
                    <label class="text-danger">Format file harus PDF</label>
                </div>

                <div class="form-group">
                    <a href="<?= base_url('file') ?>" class="btn btn-primary btn-flat"><i class="fa fa-close"></i> Cancel</a>
                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Save</button>
                </div>
                <?php echo form_close() ?>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-3">
    </div>
</div>