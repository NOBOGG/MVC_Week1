<?php
require('includeall.php');


if (isset($_POST['submit'])) {
    insertCampur();
}
if (isset($_POST['edit'])) {
    editCampur($_POST['index']);
}
if (isset($_GET['delete'])) {
    deleteCampur($_GET['delete']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Office-Employees</title>
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

    <h1 class="text-center">Office Employees</h1>

    <table class="table table-dark mt-2 w-50 mx-auto">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Karyawan</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Usia</th>
                <th scope="col">Nama Kantor</th>
                <th scope="col">Alamat Kantor</th>
                <th scope="col">Kota</th>
                <th scope="col">No Telpon</th>
                <th scope="col">Edit and Delete</th>
            </tr>
        </thead>
        <?php
        ?>
        <tbody>
            <?php
            $nomor = 0;
            foreach (indexCampur() as $index => $campur) {
                $nomor++;
                echo "
                    <tr>
                        <td> " . $nomor . " </td>
                        <td> " . indexKaryawan()[$campur->IdKaryawan]->nama . "</td>
                        <td> " . indexKaryawan()[$campur->IdKaryawan]->jabatan . "</td>
                        <td> " . indexKaryawan()[$campur->IdKaryawan]->usia . "</td>
                        <td> " . indexOffice()[$campur->IdKantor]->namakantor . "</td>
                        <td> " . indexOffice()[$campur->IdKantor]->alamatkantor . "</td>
                        <td> " . indexOffice()[$campur->IdKantor]->kota . "</td>
                        <td> " . indexOffice()[$campur->IdKantor]->nomortelp . "</td>
                       
                        
                        <td><a href='viewcampur.php?edit=" . $index . "'><button class='btn btn-success'>Edit</button></a><a href='viewcampur.php?delete=" . $index . "'><button class='btn btn-danger mt-2'>Delete</button></a></td>
                    </tr>
                    ";
            }
            ?>
        </tbody>
    </table>
    <h1 class="text-center mt-2">Kaitkan Office dan Employees</h1>

    <form method="POST" action="viewcampur.php">
        <div class="text-center">
            <div class="form-group text-start w-50 d-inline-block">
                <label>Nama</label>
                <?php
                if (isset($_GET['edit'])) {
                ?>
                    <input type="hidden" name="index" value="<?= $_GET['edit'] ?>">
                <?php
                }
                ?>
                <select id="inputNama" name="nama" class="form-select">
                    <?php
                    if (isset($_GET['edit'])) {
                    ?>
                        <option value="<?= $_SESSION['listCampur'][$_GET['edit']]->IdKaryawan ?>" selected><?= $_SESSION['listKaryawan'][$_SESSION['listCampur'][$_GET['edit']]->IdKaryawan]->nama ?></option>
                    <?php
                    }
                    ?>

                    <?php foreach (indexKaryawan() as $indexka => $karyawan) : ?>

                        <option value="<?= $indexka ?>" name='nama'><?= $karyawan->nama ?></option>


                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group text-start w-50 d-inline-block">
                <label>Nama Office</label>
                <select id="inputOffice" name="namakantor" class="form-select">
                    <?php
                    if (isset($_GET['edit'])) {
                    ?>
                        <option value="<?= $_SESSION['listCampur'][$_GET['edit']]->IdKantor ?>" selected><?= $_SESSION['listOffice'][$_SESSION['listCampur'][$_GET['edit']]->IdKantor]->namakantor ?></option>
                    <?php

                    }
                    ?>

                    <?php foreach (indexOffice() as $indexof => $office) : ?>

                        <option value="<?= $indexof ?>" name='nama'><?= $office->namakantor ?></option>

                    <?php endforeach; ?>

                </select>
                <button name="<?php if (isset($_GET['edit'])) {
                            echo "edit";
                        } else {
                            echo "submit";
                        }
                        ?>" type="submit" class="btn btn-primary mt-2">Submit</button>
            </div>
       
        </div>
       
    </form>

</body>

</html>