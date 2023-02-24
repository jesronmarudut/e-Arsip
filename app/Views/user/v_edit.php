<div class="row">
    <div class="col-md-12">
    </div>
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-gears text"></i> Edit User</h3>

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
                <?php echo form_open_multipart('user/update/' . $user['id_user']); ?>

                <div class="form-group">
                    <label>Nama User</label>
                    <input name="nama_user" value="<?= $user['nama_user'] ?>" class="form-control" placeholder="Masukan username">
                </div>

                <div class="form-group">
                    <label>E-mail</label>
                    <input name="email" value="<?= $user['email'] ?>" class="form-control" placeholder="Masukan Email" readonly>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" value="<?= $user['password'] ?>" class="form-control" placeholder="Masukan Password">
                </div>

                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <option value="<?= $user['level'] ?>">--Pilih Role User--</option>
                        <option value="1">Super Admin</option>
                        <option value="2">Admin</option>
                        <option value="3">User</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Instansi</label>
                    <select name="id_dep" class="form-control">
                        <option value="<?= $user['id_dep'] ?>"><?= $user['nama_dep'] ?></option>
                        <?php foreach ($dep as $key => $value) { ?>
                            <option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?></option>
                        <?php } ?>
                    </select>
                </div>


                <div class="row">
                    <div class="col-sm-5">
                        <label>Foto User</label>
                        <img src="<?= base_url('foto/' . $user['foto']) ?>" width="100px">
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ganti Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <br>
                    <a href="<?= base_url('user') ?>" class="btn btn-primary btn-flat"><i class="fa fa-close"></i> Cancel</a>
                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Update</button>
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