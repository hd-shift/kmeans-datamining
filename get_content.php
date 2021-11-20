<?php 
    //read data Polusi
    $dir = 'data/data.json';
    $dataPolusi = file_get_contents($dir);
    $arrayPolusi = json_decode($dataPolusi, true);

    //read data Cluster
    $dirc = 'data/cluster.json';
    $dataCluster = file_get_contents($dirc);
    $arrayCluster = json_decode($dataCluster, true);

?>
