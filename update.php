<?php 
    //read data
    $dir = 'data/cluster.json';
    $dataJson = file_get_contents($dir);
    $arrayPHP = json_decode($dataJson, true);

?>

    <?php include 'header.php'?>
    <?php include 'navbar.php'?>

    <div class="container ms-auto mt-4">

    <div class="card w-50 m-auto">
        <h5 class="card-header alert-success">
        Edit Cluster
        </h5>

       <div class="card-body">
       <form action="" method="post">
        <div class="modal-body">
        <?php 
        foreach($arrayPHP as $key => $c){
            if($c['id']==$_GET['id']){       
        ?>
        <div class="form-group row mt-2">
              <label for="cluster" class="col-sm-3 col-form-label text-left">Cluster</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="pm10" name="cluster" autocomplete="" value="<?= $arrayPHP[$key]['cluster'];?>" readonly>
              </div>
            </div>
          <div class="form-group row mt-2">
              <label for="pm10" class="col-sm-3 col-form-label text-left">PM10</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="pm10" name="pm10" autocomplete="" value="<?= $arrayPHP[$key]['pm10'];?>">
              </div>
              <label for="pm25" class="col-sm-3 col-form-label text-left">PM25</label>
              <div class="col-sm-3">
                <input type="number"" class="form-control" id="pm25" name="pm25" autocomplete="" value="<?= $arrayPHP[$key]['pm25'];?>">
              </div>
             
            </div>
          <div class="form-group row mt-2">
              <label for="so2" class="col-sm-3 col-form-label text-left">SO2</label>
              <div class="col-sm-3">
                <input type="number"" class="form-control" id="so2" name="so2" autocomplete="" value="<?= $arrayPHP[$key]['so2'];?>">
              </div>
              <label for="co" class="col-sm-3 col-form-label text-left">CO</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="co" name="co" autocomplete="" value="<?= $arrayPHP[$key]['co'];?>">
              </div>
          </div>
          <div class="form-group row mt-2">
              <label for="o3" class="col-sm-3 col-form-label text-left">O3</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="o3" name="o3" autocomplete="" value="<?= $arrayPHP[$key]['o3'];?>">
              </div>
              <label for="no2" class="col-sm-3 col-form-label text-left">NO2</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="no2" name="no2" autocomplete="" value="<?= $arrayPHP[$key]['no2'];?>">
              </div>
            
          </div>

          <div class="modal-footer justify-content-center mt-4">
            <a href="proses.php" class="btn btn-danger">Kembali</a>
            <button type="reset" name="reset" class="btn btn-info">Default</button>
            <button type="submit" name="update" class="btn btn-warning" onclick="return confirm('Yakin ubah <?php echo $arrayPHP[$key]['cluster'];?>')">Update</button>
          </div>
          <?php }}?>
        </div>
        </form>
        </div>
    </div>

    <?php
        $dirb = 'data/cluster.json';
        $dataJsonb = file_get_contents($dirb);
        $arrayPHPB = json_decode($dataJsonb, true);

        if(isset($_POST['update'])){
        
        $pm10 = $_POST['pm10'];
        $pm25 = $_POST['pm25'];
        $so2 = $_POST['so2'];
        $co = $_POST['co'];
        $o3 = $_POST['o3'];
        $no2 = $_POST['no2'];

        foreach ($arrayPHPB as $key => $c){
            if($c['id'] == $_GET['id']){
                $arrayPHPB[$key]['cluster'] = $_POST['cluster'];
                $arrayPHPB[$key]['pm10'] = $_POST['pm10'];
                $arrayPHPB[$key]['pm25'] = $_POST['pm25'];
                $arrayPHPB[$key]['so2'] = $_POST['so2'];
                $arrayPHPB[$key]['co'] = $_POST['co'];
                $arrayPHPB[$key]['o3'] = $_POST['o3'];
                $arrayPHPB[$key]['no2'] = $_POST['no2'];
            }
        }

        file_put_contents($dirb, json_encode($arrayPHPB, JSON_PRETTY_PRINT));
        
        echo '<script>
        swal({
            title: "Berhasil!",
            text: "Menambah Data",
            type: "success",
            icon: "success"
        }).then(function() {
            window.location = "proses.php";
        });
            </script>';
        }

    ?>
    </div>
    </div>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>