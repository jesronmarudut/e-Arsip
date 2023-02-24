<div class="row">
    <div class="col-md-12">
    </div>
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user-plus text"></i> User</h3>
            </div>

            <!-- VIEW UNTUK MEMBUAT USER -->
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
                <?php echo form_open_multipart('user/insert'); ?>

                <div class="form-group">
                    <label>Nama User</label>
                    <input name="nama_user" class="form-control" placeholder="Masukan username">
                </div>

                <div class="form-group">
                    <label>E-mail</label>
                    <input name="email" class="form-control" placeholder="Masukan Email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" placeholder="Masukan Password">
                </div>

                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <option value="">--Pilih Level--</option>
                        <option value="1">Super Admin</option>
                        <option value="2">Admin</option>
                        <option value="3">User</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Instansi</label>
                    <select name="id_dep" class="form-control">
                        <option value="">--Pilih Instansi--</option>
                        <?php foreach ($dep as $key => $value) { ?>
                            <option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="form-group">
                    <a href="<?= base_url('user') ?>" class="btn btn-primary btn-flat"><i class="fa fa-close"></i> Cancel</a>
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