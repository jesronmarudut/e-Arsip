<div class="row" <div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->

        <?php
        if (session()->get('level') == 3) {
            // tidak menampilkan td.
        } else {
        ?>
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $tot_kategori ?></h3>
                    <p>Kategori</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pricetags"></i>
                </div>
                <a href="<?= base_url('kategori') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3><?= $tot_dep ?></h3>
                <p>Instansi</p>
            </div>
            <div class="icon">
                <i class="ion ion-university"></i>
            </div>
            <a href="<?= base_url('dep') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $tot_file ?></h3>
                <p>Dokumen</p>
            </div>
            <div class="icon">
                <i class="fa fa-file-pdf-o"></i>
            </div>
            <a href="<?= base_url('file') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>



    <?php
            if (empty($_SESSION['level'] == 2)) {
    ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?= $tot_user ?></h3>
                    <p>User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
                <a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php
    }?>


<?php
        }
?>
</div>


<br>
<br>


<!-- GRAFIK DATA SURAT -->
<canvas id="myChart" width="200" height="60">
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Chart',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.80)',
                        'rgba(54, 162, 235, 0.80)',
                        'rgba(255, 206, 86, 0.80)',
                        'rgba(75, 192, 192, 0.80)',
                        'rgba(153, 102, 255, 0.80)',
                        'rgba(255, 159, 64, 0.80)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</canvas>