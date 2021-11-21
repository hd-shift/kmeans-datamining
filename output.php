    <!-- get_content.php mereferensikan ke data acuan -->
    <!-- arrayCLuster = arrayCluster -->
    <!-- arrayPolusi = arrayPolusi -->
    <?php include 'get_content.php'; ?>
    <?php include 'header.php'?>
    <?php include 'navbar.php'?>

    <div class="card">
      <h5 class="card-header alert-success text-center">
        Output
      </h5>
    </div>

    <div class="container ms-auto mt-4">

    <div class="card mt-3">
    <h5 class="card-header alert-info">Tabel Output</h5>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table" id="table-proses">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Lokasi</th>
                <th scope="col">PM10</th>
                <th scope="col">PM25</th>
                <th scope="col">SO2</th>
                <th scope="col">CO</th>        
                <th scope="col">O3</th>
                <th scope="col">NO2</th>
                <th scope="col">MAX</th>
                <th scope="col">Critical</th>
                <th scope="col">Kategori</th>
                <th scope="col">Cluster</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
                $no = 1;
                foreach ($arrayPolusi as $baris){                                 
            ?>
                <th scope="row"><?= $no++?></td>
                <td><?= $baris['tanggal'];?></td>
                <td><?= $baris['lokasi'];?></td>
                <td><?= $baris['pm10'];?></td>
                <td><?= $baris['pm25'];?></td>
                <td><?= $baris['so2'];?></td>
                <td><?= $baris['co'];?></td>
                <td><?= $baris['o3'];?></td>
                <td><?= $baris['no2'];?></td>
                <td><?= $baris['max'];?></td>
                <td><?= $baris['critical'];?></td>
                <td><?= $baris['kategori'];?></td>

                <?php 
                         $c1 = sqrt(pow(($arrayCluster[0]['pm10']-$baris['pm10']),2) + 
                         pow(($arrayCluster[0]['pm25']-$baris['pm25']), 2) + 
                         pow(($arrayCluster[0]['so2']- $baris['so2']), 2) + 
                         pow(($arrayCluster[0]['co']- $baris['co']),2) + 
                         pow(($arrayCluster[0]['o3']-$baris['o3']), 2) + 
                         pow(($arrayCluster[0]['no2']- $baris['no2']), 2));

                         $c2 = sqrt(pow(($arrayCluster[1]['pm10']-$baris['pm10']),2) + 
                         pow(($arrayCluster[1]['pm25']-$baris['pm25']), 2) + 
                         pow(($arrayCluster[1]['so2']- $baris['so2']), 2) + 
                         pow(($arrayCluster[1]['co']- $baris['co']),2) + 
                         pow(($arrayCluster[1]['o3']-$baris['o3']), 2) + 
                         pow(($arrayCluster[1]['no2']- $baris['no2']), 2));
 
                         $c3 = sqrt(pow(($arrayCluster[2]['pm10']-$baris['pm10']),2) + 
                         pow(($arrayCluster[2]['pm25']-$baris['pm25']), 2) + 
                         pow(($arrayCluster[2]['so2']- $baris['so2']), 2) + 
                         pow(($arrayCluster[2]['co']- $baris['co']),2) + 
                         pow(($arrayCluster[2]['o3']-$baris['o3']), 2) + 
                         pow(($arrayCluster[2]['no2']- $baris['no2']), 2));

                         $min = array($c1, $c2, $c3);
                ?>
                <td>
                <?php 
                    if(min($min) == $c1){
                        echo 'Cluster-1';
                    }
                    if(min($min) == $c2){
                        echo 'Cluster-2';
                    }
                    if(min($min) == $c3){
                        echo 'Cluster-3';
                    }
                ?>
                </td>
            </tr>
            <?php }?>
        </tbody>
        </table>
    </div>
    </div>
    </div>

    </div>
    
</body>
<?php 
    include 'footer.php';
  ?>
  <?php 
    include 'js.php';
  ?>
  <script>
    $(document).ready(function() {
      $('#table-cluster').DataTable();
    });
    $(document).ready(function() {
      $('#table-proses').DataTable();
    });
  </script>
</html>