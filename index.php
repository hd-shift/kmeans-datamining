    <!-- get_content.php mereferensikan ke data acuan -->
    <!-- arrayCLuster = arrayCluster -->
    <!-- arrayPolusi = arrayPolusi -->
    <?php include 'get_content.php'; ?>
    <?php include 'header.php'?>
    <?php include 'navbar.php'?>

    <div class="card">
      <h5 class="card-header alert-success text-center">
        Home
      </h5>
    </div>

    <div class="container ms-auto mt-4">
    <div class="card">
        <h5 class="card-header alert-info">
        Tabel Data
        </h5>
        <div class="card-header alert-success">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Data
            </button>
        </div>
        
        <div class="card-body">
        <div class="table-responsive">
        <table class="table" id="table-sample">
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
            
            </tr>
            <?php }?>
        </tbody>
        </table>
    </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Form -->
        <form action="" method="post">
        <div class="modal-body">
        <div class="form-group row">
              <label for="tanggal" class="col-sm-3 col-form-label text-left">Tanggal</label>
              <div class="col-sm-6">
                <input type="date" class="form-control" id="tanggal" name="tanggal" autocomplete="" required>
              </div>
            </div>
          <div class="form-group row mt-2">
              <label for="lokasi" class="col-sm-3 col-form-label text-left">Lokasi</label>
              <div class="col-sm-6">
                <select name="lokasi" id="lokasi" class="form-control" required>
                    <option value="" selected disabled>-- Pilih Lokasi --</option>
                    <option value="DKI1 (Bunderan HI)">DKI1 (Bunderan HI)</option>
                    <option value="DKI2 (Kelapa Gading)">DKI2 (Kelapa Gading)</option>
                    <option value="DKI3 (Jagakarsa)">DKI3 (Jagakarsa)</option>
                    <option value="DKI4 (Lubang Buaya)">DKI4 (Lubang Buaya)</option>
                    <option value="DKI5 (Kebon Jeruk) Jakarta Barat">DKI5 (Kebon Jeruk) Jakarta Barat</option>
                  </select>
              </div>
            </div>
          <div class="form-group row mt-2">
              <label for="pm10" class="col-sm-3 col-form-label text-left">PM10</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="pm10" name="pm10" autocomplete="">
              </div>
              <label for="pm25" class="col-sm-3 col-form-label text-left">PM25</label>
              <div class="col-sm-3">
                <input type="number"" class="form-control" id="pm25" name="pm25" autocomplete="">
              </div>
             
            </div>
          <div class="form-group row mt-2">
              <label for="so2" class="col-sm-3 col-form-label text-left">SO2</label>
              <div class="col-sm-3">
                <input type="number"" class="form-control" id="so2" name="so2" autocomplete="">
              </div>
              <label for="co" class="col-sm-3 col-form-label text-left">CO</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="co" name="co" autocomplete="">
              </div>
          </div>
          <div class="form-group row mt-2">
              <label for="o3" class="col-sm-3 col-form-label text-left">O3</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="o3" name="o3" autocomplete="">
              </div>
              <label for="no2" class="col-sm-3 col-form-label text-left">NO2</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="no2" name="no2" autocomplete="">
              </div>
              
          </div>

          <div class="modal-footer justify-content-center mt-4">
            <button type="reset" name="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
          </div>
          
        </div>
        </form>
        </div>
    <?php

    if(isset($_POST['submit'])){
    //Read dan memasukkan data ketika tombol submit ditekan (s = sumbit)
    $dirs = 'data/data.json';
    $dataPolusis = file_get_contents($dir);
    $arayPolusis = json_decode($dataPolusis, true);

    $pm10 = $_POST['pm10'];
    $pm25 = $_POST['pm25'];
    $so2 = $_POST['so2'];
    $co = $_POST['co'];
    $o3 = $_POST['o3'];
    $no2 = $_POST['no2'];

    $partikulat = [
        [
        'name' => 'pm10',
        'value' => $pm10
        ],
        [
        'name' => 'pm25',
        'value' => $pm25
        ],
        [
        'name' => 'so2',
        'value' => $so2
        ],
        [
        'name' => 'co',
        'value' => $co
        ],
        [
        'name' => 'o3',
        'value' => $o3
        ],
        [
        'name' => 'no2',
        'value' => $no2
        ]
    ];
    

    usort($partikulat, function ($a, $b) {
        return $a['value'] <=> $b['value'];
    });

    $max = $partikulat[count($partikulat) - 1]["value"];
    $crirtical = $partikulat[count($partikulat) - 1]["name"];

    
    if ($max <= 50) {
        $kategori = "BAIK";
    } elseif ($max <= 100) {
        $kategori = "SEDANG";
    } else {
        $kategori = "TIDAK SEHAT";
    }

    $arayPolusis[] = array(
        'tanggal' => $_POST['tanggal'],
        'lokasi' => $_POST['lokasi'],
        'pm10' => $pm10,
        'pm25' => $pm25,
        'so2' => $so2,
        'co' => $co,
        'o3' => $o3,
        'no2' => $no2,
        'max' => $max,
        'critical' => $crirtical,
        'kategori' => $kategori
        
    );

    file_put_contents($dirs, json_encode($arayPolusis, JSON_PRETTY_PRINT));
    
    echo '<script>
    swal({
        title: "Berhasil!",
        text: "Menambah Data",
        type: "success",
        icon: "success"
    }).then(function() {
        window.location = "index.php";
    });
        </script>';
    }

    ?>
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
      $('#table-sample').DataTable();
    });
  </script>
</html>