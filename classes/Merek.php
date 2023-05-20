<?php

class Merek extends DB
{
    function getMerek()
    {
        $query = "SELECT * FROM merek";
        return $this->execute($query);
    }

    function getMerekById($id)
    {
        $query = "SELECT * FROM merek WHERE id_merek=$id";
        return $this->execute($query);
    }
    function searchMerek($keyword)
    {
        $query = "SELECT * FROM merek
          WHERE nama_merek LIKE '$keyword'";

        return $this->execute($query);
    }
    function addMerek($data)
    {
        $nama = $data['nama'];
        $query = "INSERT INTO merek VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateMerek($id, $data)
    {
        $nama = $data['nama'];
        $query = "UPDATE merek SET nama_merek='$nama' WHERE id_merek=$id";
        return $this->executeAffected($query);
    }

    function deleteMerek($id)
    {
        $query = "DELETE FROM merek WHERE id_merek=$id";
        return $this->executeAffected($query);
    }
}

