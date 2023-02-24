<div class="row">
    <div class="col-md-12">
        <div class="box box-default box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cari Dokumen</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-eye"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">


                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Levenshtein Distance Searching</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <?php echo form_open_multipart('cari/hasil');
                                helper('text');
                                ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="">Cari Dokumen</label>
                                        <input type="text" name="cari" class="form-control" placeholder="Masukkan nama dokumen...">
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-search"></i> Cari Dokumen</button>
                                    </div>

                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>