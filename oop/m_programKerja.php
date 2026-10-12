<?php

require 'koneksiMVC.php';

class m_programKerja
{
    private $nomorProgram;
    private $namaProgram;
    private $suratKeterangan;

    public function getSemuaProgramKerja()
    {
        global $mysqli;
        $rs   = $mysqli->query("SELECT * FROM proker ORDER BY nomorProgram ASC");
        $rows = [];
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;          
    }

    public function getProgramKerjaById($id)
    {
        global $mysqli;
        $id = $mysqli->real_escape_string($id);
        $rs  = $mysqli->query("SELECT * FROM proker WHERE nomorProgram = '$id'");
        return $rs->fetch_assoc();
    }

    public function tambahProgramKerja($nomorProgram, $namaProgram, $suratKeterangan)
    {
        global $mysqli;
        $nomorProgram     = $mysqli->real_escape_string($nomorProgram);
        $namaProgram      = $mysqli->real_escape_string($namaProgram);
        $suratKeterangan  = $mysqli->real_escape_string($suratKeterangan);

        $sql = "INSERT INTO proker (nomorProgram, namaProgram, suratKeterangan)
                VALUES ('$nomorProgram', '$namaProgram', '$suratKeterangan')";
        return $mysqli->query($sql);
    }

    public function editProgramKerja($nomorProgram, $namaProgram, $suratKeterangan)
    {
        global $mysqli;
        $namaProgram     = $mysqli->real_escape_string($namaProgram);
        $suratKeterangan = $mysqli->real_escape_string($suratKeterangan);
        $nomorProgram    = $mysqli->real_escape_string($nomorProgram);

        $sql = "UPDATE proker
                   SET namaProgram = '$namaProgram',
                       suratKeterangan = '$suratKeterangan'
                 WHERE nomorProgram = '$nomorProgram'";
        return $mysqli->query($sql);
    }

    public function hapusProgramKerja($nomorProgram)
    {
        global $mysqli;
        $nomorProgram = $mysqli->real_escape_string($nomorProgram);
        $sql = "DELETE FROM proker WHERE nomorProgram = '$nomorProgram'";
        return $mysqli->query($sql);
    }
}
?>
