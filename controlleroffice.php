<?php

require_once('controllercampur.php');

if(!isset($_SESSION['listOffice'])){
    $_SESSION['listOffice'] = array();
}

function insertOffice(){
    $office = new office();
    $office->namakantor = $_POST['namakantor'];
    $office->alamatkantor = $_POST['alamatkantor'];
    $office->kota = $_POST['kota'];
    $office->nomortelp = $_POST['nomortelp'];
    array_push($_SESSION['listOffice'],$office);
}

function indexOffice(){
    return $_SESSION['listOffice'];
}

function deleteOffice($id){
    foreach(indexCampur() as $index=>$temp){
        if(indexOffice()[$id]->namakantor==$_SESSION['listOffice'][$temp->IdKantor]->namakantor){
            unset($_SESSION["listCampur"][$index]);
            unset($_SESSION["listOffice"][$id]);
        }
    }
    unset($_SESSION["listOffice"][$id]);
}

function editOffice($id){
    $_SESSION['listOffice'][$id]->setNamaKantor($_POST['namakantor']);
    $_SESSION['listOffice'][$id]->setAlamatKantor($_POST['alamatkantor']);
    $_SESSION['listOffice'][$id]->setKota($_POST['kota']);
    $_SESSION['listOffice'][$id]->setNomortelp($_POST['nomortelp']);
}


?>