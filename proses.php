<?php 
    //read data
    $dir = 'data/cluster.json';
    $dataJson = file_get_contents($dir);
    $arrayPHP = json_decode($dataJson, true);

    $dira = 'data/data.json';
    $dataJsona = file_get_contents($dira);
    $arrayPHPA = json_decode($dataJsona, true);

?>

    <?php include 'header.php'?>
    <?php include 'navbar.php'?>

    <div class="card">
      <h3 class="card-header alert-success">
        Proses
      </h3>
    </div>

    <div class="container ms-auto mt-4">
    <div class="card">
        <h5 class="card-header alert-info">
        Cluster
        </h5>
       <div class="card-body">
            <div class="table-responsive bg-light">
        <table class="table">
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
                foreach ($arrayPHP as $baris){                                 
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
    <h5 class="card-header alert-info">Data</h5>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tgl</th>
                <th scope="col">Lokasi</th>
                <th scope="col">PM10</th>
                <th scope="col">PM25</th>
                <th scope="col">SO2</th>
                <th scope="col">CO</th>        
                <th scope="col">O3</th>
                <th scope="col">NO2</th>
                <th scope="col">MAX</th>
                <th scope="col">Crit.</th>
                <th scope="col">Kat.</th>
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
                foreach ($arrayPHPA as $barisa){                                 
            ?>
                <th scope="row"><?= $no++?></td>
                <td><?= $barisa['tanggal'];?></td>
                <td><?= $barisa['lokasi'];?></td>
                <td><?= $barisa['pm10'];?></td>
                <td><?= $barisa['pm25'];?></td>
                <td><?= $barisa['so2'];?></td>
                <td><?= $barisa['co'];?></td>
                <td><?= $barisa['o3'];?></td>
                <td><?= $barisa['no2'];?></td>
                <td><?= $barisa['max'];?></td>
                <td><?= $barisa['critical'];?></td>
                <td><?= $barisa['kategori'];?></td>
                <td>
                    <!-- C1 -->
                    <?php 
                         $c1 = sqrt(pow(($arrayPHP[0]['pm10']-$barisa['pm10']),2) + pow(($arrayPHP[0]['pm25']-$barisa['pm25']), 2) + pow(($arrayPHP[0]['so2']- $barisa['so2']), 2) + pow(($arrayPHP[0]['co']- $barisa['co']),2) + pow(($arrayPHP[0]['o3']-$barisa['o3']), 2) + pow(($arrayPHP[0]['no2']- $barisa['no2']), 2));
                         echo $c1;
                    ?>
                </td>
                <td>
                    <?php 
                         $c2 = sqrt(pow(($arrayPHP[1]['pm10']-$barisa['pm10']),2) + pow(($arrayPHP[1]['pm25']-$barisa['pm25']), 2) + pow(($arrayPHP[1]['so2']- $barisa['so2']), 2) + pow(($arrayPHP[1]['co']- $barisa['co']),2) + pow(($arrayPHP[1]['o3']-$barisa['o3']), 2) + pow(($arrayPHP[1]['no2']- $barisa['no2']), 2));
                         echo $c2;
                    ?>
                </td>
                <td>
                    <?php 
                        $c3 = sqrt(pow(($arrayPHP[2]['pm10']-$barisa['pm10']),2) + pow(($arrayPHP[2]['pm25']-$barisa['pm25']), 2) + pow(($arrayPHP[2]['so2']- $barisa['so2']), 2) + pow(($arrayPHP[2]['co']- $barisa['co']),2) + pow(($arrayPHP[2]['o3']-$barisa['o3']), 2) + pow(($arrayPHP[2]['no2']- $barisa['no2']), 2));
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
                        echo '1';
                    }
                    if(min($min) == $c2){
                        echo '2';
                    }
                    if(min($min) == $c3){
                        echo '3';
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>