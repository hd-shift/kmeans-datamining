    <!-- get_content.php mereferensikan ke data acuan -->
    <!-- arrayCLuster = arrayCluster -->
    <!-- arrayPolusi = arrayPolusi -->
    <?php include 'get_content.php'?>
    <?php include 'header.php'?>
    <?php include 'navbar.php'?>

    <div class="card">
      <h5 class="card-header alert-success text-center">
        Proses
      </h5>
    </div>

    <div class="container ms-auto mt-4">
    <div class="card">
        <h5 class="card-header alert-info">
        Tabel Cluster
        </h5>
       <div class="card-body">
            <div class="table-responsive bg-light" >
        <table class="table" id="table-cluster">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Cluster</th>
                <th scope="col">PM10</th>
                <th scope="col">PM25</th>
                <th scope="col">SO2</th>
                <th scope="col">CO</th>
                <th scope="col">O3</th>
                <th scope="col">NO2</th>        
                <th scope="col">Aksi</th>        
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
                $no = 1;
                foreach ($arrayCluster as $baris){                                 
            ?>
                <th scope="row"><?= $no++?></td>
                <td><?= $baris['cluster'];?></td>
                <td><?= $baris['pm10'];?></td>
                <td><?= $baris['pm25'];?></td>
                <td><?= $baris['so2'];?></td>
                <td><?= $baris['co'];?></td>
                <td><?= $baris['o3'];?></td>
                <td><?= $baris['no2'];?></td>
                <td>
                   <a href="update.php?id=<?= $baris['id'];?>" class="btn btn-warning">
                    Edit 
                 </a>
                </td>
            </tr>
            <?php }?>
        </tbody>
        </table>
    </div>
        </div>
    </div>

    <div class="card mt-3">
    <h5 class="card-header alert-info">Tabel Proses</h5>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table" id="table-proses">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">PM10</th>
                <th scope="col">PM25</th>
                <th scope="col">SO2</th>
                <th scope="col">CO</th>        
                <th scope="col">O3</th>
                <th scope="col">NO2</th>
                <th scope="col">Cluster1</th>
                <th scope="col">Cluster2</th>
                <th scope="col">Cluster3</th>
                <th scope="col">Min</th>
                <th scope="col">Cluster</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
                $no = 1;
                foreach ($arrayPolusi as $barisa){                                 
            ?>
                <th scope="row"><?= $no++?></td>
                <td><?= $barisa['pm10'];?></td>
                <td><?= $barisa['pm25'];?></td>
                <td><?= $barisa['so2'];?></td>
                <td><?= $barisa['co'];?></td>
                <td><?= $barisa['o3'];?></td>
                <td><?= $barisa['no2'];?></td>
                <td>
                    <!-- C1 -->
                    <?php 
                         $c1 = sqrt(pow(($arrayCluster[0]['pm10']-$barisa['pm10']),2) + pow(($arrayCluster[0]['pm25']-$barisa['pm25']), 2) + pow(($arrayCluster[0]['so2']- $barisa['so2']), 2) + pow(($arrayCluster[0]['co']- $barisa['co']),2) + pow(($arrayCluster[0]['o3']-$barisa['o3']), 2) + pow(($arrayCluster[0]['no2']- $barisa['no2']), 2));
                         echo $c1;
                    ?>
                </td>
                <td>
                    <?php 
                         $c2 = sqrt(pow(($arrayCluster[1]['pm10']-$barisa['pm10']),2) + pow(($arrayCluster[1]['pm25']-$barisa['pm25']), 2) + pow(($arrayCluster[1]['so2']- $barisa['so2']), 2) + pow(($arrayCluster[1]['co']- $barisa['co']),2) + pow(($arrayCluster[1]['o3']-$barisa['o3']), 2) + pow(($arrayCluster[1]['no2']- $barisa['no2']), 2));
                         echo $c2;
                    ?>
                </td>
                <td>
                    <?php 
                        $c3 = sqrt(pow(($arrayCluster[2]['pm10']-$barisa['pm10']),2) + pow(($arrayCluster[2]['pm25']-$barisa['pm25']), 2) + pow(($arrayCluster[2]['so2']- $barisa['so2']), 2) + pow(($arrayCluster[2]['co']- $barisa['co']),2) + pow(($arrayCluster[2]['o3']-$barisa['o3']), 2) + pow(($arrayCluster[2]['no2']- $barisa['no2']), 2));
                        echo $c3;
                    ?>
                </td>
                <td>
                <?php 
                    $min = array($c1, $c2, $c3);
                    echo min($min);
                ?>
                </td>

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