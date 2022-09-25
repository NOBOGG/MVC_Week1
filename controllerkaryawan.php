<?php

require_once('controllercampur.php');

if(!isset($_SESSION['listKaryawan'])){
    $_SESSION['listKaryawan'] = array();
}

function insertKaryawan(){
    $karyawan = new karyawan();
    $karyawan->nama = $_POST['nama'];
    $karyawan->jabatan = $_POST['jabatan'];
    $karyawan->usia = $_POST['usia'];
    array_push($_SESSION['listKaryawan'],$karyawan);
}

function indexKaryawan(){
    return $_SESSION['listKaryawan'];
}

function deleteKaryawan($id){
    foreach(indexCampur() as $index=>$temp){
        if(indexKaryawan()[$id]->nama==$_SESSION['listKaryawan'][$temp->IdKaryawan]->nama){
            unset($_SESSION["listCampur"][$index]);
            unset($_SESSION["listKaryawan"][$id]);
        }
    }
    unset($_SESSION["listKaryawan"][$id]);
}

function editKaryawan($id){
    $_SESSION['listKaryawan'][$id]->setNama($_POST['nama']);
    $_SESSION['listKaryawan'][$id]->setJabatan($_POST['jabatan']);
    $_SESSION['listKaryawan'][$id]->setUsia($_POST['usia']);
}

?>