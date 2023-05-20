<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Merek.php');
include('classes/Kategori.php');
include('classes/Barang.php');
include('classes/Template.php');

$barang = new Barang($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$barang->open();

$data = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $barang->getBarangById($id);
        $row = $barang->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['nama_barang'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['foto_barang'] . '" class="img-thumbnail" alt="' . $row['foto_barang'] . '" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>ID</td>
                                    <td>:</td>
                                    <td>' . $row['id_barang'] . '</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>' . $row['nama_barang'] . '</td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>Rp.' . $row['harga'] . '</td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td>' . $row['stok'] . '</td>
                                </tr>
                                <tr>
                                    <td>Merek</td>
                                    <td>:</td>
                                    <td>' . $row['nama_merek'] . '</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td>' . $row['nama_kategori'] . '</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td>' . $row['deskripsi'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="form.php?id=' . $row['id_barang'] . '"><button type="button" class="btn btn-success text-white">Ubah Data</button></a>
                <a href="form.php?hapus=' . $row['id_barang'] . '"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

$barang->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_BARANG', $data);
$detail->write();
