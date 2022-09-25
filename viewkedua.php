<?php

require_once("includeall.php");


if (isset($_POST['submit'])) {
  insertOffice();
}else if(isset($_POST['edit'])){
  editOffice($_POST['edit']);
}
if(isset($_GET['delete'])){
    deleteOffice($_GET['delete']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Office</title>
</head>

<body>

<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Office Data Owen</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Employee</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewkedua.php">Office</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewcampur.php">Office-Employees</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <h1 class="text-center">Office</h1>

    <table class="table table-dark mt-2 w-50 mx-auto">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kantor</th>
                <th scope="col">Alamat Kantor</th>
                <th scope="col">Kota</th>
                <th scope="col">No Telpon Kantor</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 0;
            foreach (indexOffice() as $index=>$office) {
                $nomor++;    
                echo "
                    <tr>
                        <td> ".$nomor." </td>
                        <td> ".$office->namakantor."</td>
                        <td> ".$office->alamatkantor."</td>
                        <td> ".$office->kota."</td>
                        <td> ".$office->nomortelp."</td>
                        <td><a href='viewkedua.php?edit=".$index."'><button class='btn btn-success'>Edit</button></a></td>
                        <td><a href='viewkedua.php?delete=".$index."'><button class='btn btn-danger'>Delete</button></a></td>
                    </tr>
                    ";
            }
            ?>
        </tbody>
    </table>
    <h1 class="text-center mt-2"><?php echo (isset($_GET['edit'])) ? 'Edit Office' : 'Tambah Office' ?></h1>
    <form action="viewkedua.php" method="POST">
        <div class="text-center">

            <div class="form-group text-start w-50 d-inline-block">
                <label for="exampleFormControlInput1" class="form-label">Nama Kantor</label>
                <input type="text" value="<?php echo (isset($_GET['edit'])) ?$_SESSION['listOffice'][$_GET['edit']]->namakantor : '' ?>" name="namakantor" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Kantor">
            </div>

            <div class="form-group text-start  w-50 d-inline-block">
                <label for="exampleFormControlInput1" class="form-label">Alamat Kantor</label>
                <input type="text" value="<?php echo (isset($_GET['edit'])) ?$_SESSION['listOffice'][$_GET['edit']]->alamatkantor : '' ?>" name="alamatkantor" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Alamat Kantor">
            </div>

            <div class="form-group text-start  w-50 d-inline-block">
                <label for="exampleFormControlInput1" class="form-label">Kota</label>
                <input type="text" value="<?php echo (isset($_GET['edit'])) ?$_SESSION['listOffice'][$_GET['edit']]->kota : '' ?>" name="kota" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Kota">
            </div>

            <div class="form-group text-start  w-50 d-inline-block">
                <label for="exampleFormControlInput1" class="form-label">No Telpon Kantor</label>
                <input type="number" value="<?php echo (isset($_GET['edit'])) ?$_SESSION['listOffice'][$_GET['edit']]->nomortelp : '' ?>" name="nomortelp" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nomor Telpon Kantor">
            </div>

            <button name="<?php echo (isset($_GET['edit'])) ? 'edit' : 'submit' ?>" value="<?php echo (isset($_GET['edit'])) ? $_GET['edit'] : '' ?>" class="btn d-block mx-auto mt-2 btn-primary">Submit</button>
        </div>
    </form>
    
</body>

</html>