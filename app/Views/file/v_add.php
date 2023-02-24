<div class="row">
    <div class="col-md-12">
    </div>
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-file-text text-white"></i> File</h3>
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
                <?php echo form_open_multipart('file/insert');
                helper('text');
                //Dibawah UNTUK NOMOR FILE SUPAYA AUTOMATIS NGIKUTIN TANGGAL-------------------------
                $no_file = date('sdmy') . '-' . random_string('alnum', 5);
                ?>

                <div class="form-group">
                    <label>Nomor File</label>
                    <input name="no_file" class="form-control" value="<?= $no_file ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Jenis Surat</label>
                    <select name="id_kategori" class="form-control">
                        <option value="">--Jenis Surat--</option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nomor Surat</label>
                    <input name="no_surat" class="form-control" placeholder="Masukan Nomor Surat" autocomplete='off'>
                </div>

                <div class="form-group">
                    <label>Perihal Surat</label>
                    <input name="nama_file" class="form-control" placeholder="Masukan Perihal Surat" autocomplete='off'>
                </div>

                <div class="form-group">
                    <label>Pengirim Surat</label>
                    <input name="pengirim" class="form-control" placeholder="Masukan Nama Pengirim Surat" autocomplete='off'>
                </div>

                <div class="form-group">
                    <label>Tujuan Surat</label>
                    <input name="tujuan" class="form-control" placeholder="Masukan Nama Tujuan Surat" autocomplete='off'>
                </div>

                <div class="form-group">
                    <label>Tanggal Surat</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="Tanggal_Surat" class="form-control pull-right" id="tglsurat" placeholder="Pilih Tanggal Surat">
                    </div>
                </div>

                <div class="form-group">
                    <label>Tanggal Diterima</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="Tanggal_Diterima" class="form-control" id="tglditerima" placeholder="Pilih Tanggal Diterima">
                    </div>
                </div>

                <div class="form-group">
                    <label>Deskripsi File</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>File</label>
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