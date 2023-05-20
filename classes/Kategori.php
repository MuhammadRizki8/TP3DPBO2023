<?php

class Kategori extends DB
{
    function getKategori()
    {
        $query = "SELECT * FROM kategori";
        return $this->execute($query);
    }

    function getKategoriById($id)
    {
        $query = "SELECT * FROM kategori WHERE id_kategori=$id";
        return $this->execute($query);
    }
    function searchKategori($keyword)
    {
        $query = "SELECT * FROM kategori
          WHERE nama_kategori LIKE '$keyword'";

        return $this->execute($query);
    }
    function addKategori($data)
    {
        $nama = $data['nama'];
        $query = "INSERT INTO kategori VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateKategori($id, $data)
    {
        $nama = $data['nama'];
        $query = "UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori=$id";
        return $this->executeAffected($query);
    }

    function deleteKategori($id)
    {
        $query = "DELETE FROM kategori WHERE id_kategori=$id";
        return $this->executeAffected($query);
    }
}
