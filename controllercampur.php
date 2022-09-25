<?php


if(!isset($_SESSION['listCampur'])){
    $_SESSION['listCampur'] = array();
}

function insertCampur(){
    $campur = new campur();
    $campur->IdKaryawan = $_POST['nama'];
    $campur->IdKantor = $_POST['namakantor'];
    array_push($_SESSION['listCampur'],$campur);
}


function indexCampur(){
    return $_SESSION['listCampur'];
}

function deleteCampur($id){
    unset($_SESSION['listCampur'][$id]);
}

function editCampur($id){
    $_SESSION['listCampur'][$id]->setKaryawan($_POST['nama']);
    $_SESSION['listCampur'][$id]->setOffice($_POST['namakantor']);
}


?>