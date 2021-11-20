    <?php include 'header.php'?>
     <!-- get_content.php mereferensikan ke data acuan -->
    <!-- arrayCLuster = arrayCluster -->
    <!-- arrayPolusi = arrayPolusi -->
    <?php include 'get_content.php'; ?>
    <?php include 'navbar.php'?>

    <div class="container ms-auto mt-4">

    <div class="card m-auto">
        <h5 class="card-header alert-success">
        Edit Cluster
        </h5>

       <div class="card-body">
       <form action="" method="post">
        <div class="modal-body">
        <?php 
        foreach($arrayCluster as $key => $c){
            if($c['id']==$_GET['id']){       
        ?>
        <div class="form-group row mt-2">
              <label for="cluster" class="col-sm-3 col-form-label text-left">Cluster</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="pm10" name="cluster" autocomplete="" value="<?= $arrayCluster[$key]['cluster'];?>" readonly>
              </div>
            </div>
          <div class="form-group row mt-2">
              <label for="pm10" class="col-sm-3 col-form-label text-left">PM10</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="pm10" name="pm10" autocomplete="" value="<?= $arrayCluster[$key]['pm10'];?>">
              </div>
              <label for="pm25" class="col-sm-3 col-form-label text-left">PM25</label>
              <div class="col-sm-3">
                <input type="number"" class="form-control" id="pm25" name="pm25" autocomplete="" value="<?= $arrayCluster[$key]['pm25'];?>">
              </div>
             
            </div>
          <div class="form-group row mt-2">
              <label for="so2" class="col-sm-3 col-form-label text-left">SO2</label>
              <div class="col-sm-3">
                <input type="number"" class="form-control" id="so2" name="so2" autocomplete="" value="<?= $arrayCluster[$key]['so2'];?>">
              </div>
              <label for="co" class="col-sm-3 col-form-label text-left">CO</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="co" name="co" autocomplete="" value="<?= $arrayCluster[$key]['co'];?>">
              </div>
          </div>
          <div class="form-group row mt-2">
              <label for="o3" class="col-sm-3 col-form-label text-left">O3</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="o3" name="o3" autocomplete="" value="<?= $arrayCluster[$key]['o3'];?>">
              </div>
              <label for="no2" class="col-sm-3 col-form-label text-left">NO2</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="no2" name="no2" autocomplete="" value="<?= $arrayCluster[$key]['no2'];?>">
              </div>
            
          </div>

          <div class="modal-footer justify-content-center mt-4">
            <a href="proses.php" class="btn btn-danger">Kembali</a>
            <button type="reset" name="reset" class="btn btn-info">Default</button>
            <button type="submit" name="update" class="btn btn-warning" onclick="return confirm('Yakin ubah <?php echo $arrayCluster[$key]['cluster'];?>')">Update</button>
          </div>
          <?php }}?>
        </div>
        </form>
        </div>
    </div>

    <?php
    //penambahan u pada variabel bahwa akan dieksekusi update
        $diru = 'data/cluster.json';
        $dataClusteru = file_get_contents($diru);
        $arrayClusteru = json_decode($dataClusteru, true);

        if(isset($_POST['update'])){
        
        $pm10 = $_POST['pm10'];
        $pm25 = $_POST['pm25'];
        $so2 = $_POST['so2'];
        $co = $_POST['co'];
        $o3 = $_POST['o3'];
        $no2 = $_POST['no2'];

        foreach ($arrayClusteru as $key => $c){
            if($c['id'] == $_GET['id']){
                $arrayClusteru[$key]['cluster'] = $_POST['cluster'];
                $arrayClusteru[$key]['pm10'] = $_POST['pm10'];
                $arrayClusteru[$key]['pm25'] = $_POST['pm25'];
                $arrayClusteru[$key]['so2'] = $_POST['so2'];
                $arrayClusteru[$key]['co'] = $_POST['co'];
                $arrayClusteru[$key]['o3'] = $_POST['o3'];
                $arrayClusteru[$key]['no2'] = $_POST['no2'];
            }
        }

        file_put_contents($diru, json_encode($arrayClusteru, JSON_PRETTY_PRINT));
        
        // echo '<script>
        //   alert("Update Berhasil");
        //   window.location = "proses.php";
        // </script>;';
        echo '<script>
        swal ({
            title: "Berhasil!",
            text: "Update Data",
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