<?php

include_once("m_programKerja.php");

class c_programKerja
{
    public $model;

    public function __construct()
    {
        $this->model = new m_programKerja();
    }

    private function isKepala()
    {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'kepala_departemen';
    }

    private function requireKepala()
    {
        if (!$this->isKepala()) {
            header('Location: index.php');
            exit;
        }
    }

    public function invoke()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';

        switch ($action) {
            case 'tambah':
                $this->tambah();
                break;
            case 'simpan':
                $this->simpan();
                break;
            case 'edit':
                $this->edit();
                break;
            case 'update':
                $this->update();
                break;
            case 'hapus':
                $this->hapus();
                break;
            default:
                $this->list();
                break;
        }
    }

    public function list()
    {
        $prokers = $this->model->getSemuaProgramKerja();
        include 'v_programKerja.php';
    }

    public function tambah()
    {
        $this->requireKepala();
        $proker = null;
        include 'v_programKerja.php';
    }

    public function simpan()
    {
        $this->requireKepala();
        $nomorProgram    = $_POST['nomorProgram']    ?? '';
        $namaProgram     = $_POST['namaProgram']     ?? '';
        $suratKeterangan = $_POST['suratKeterangan'] ?? '';

        $this->model->tambahProgramKerja($nomorProgram, $namaProgram, $suratKeterangan);
        header('Location: index.php');
        exit;
    }

    public function edit()
    {
        $this->requireKepala();
        $id     = $_GET['id'] ?? '';
        $proker = $this->model->getProgramKerjaById($id);
        include 'v_programKerja.php';
    }

    public function update()
    {
        $this->requireKepala();
        $nomorProgram    = $_POST['nomorProgram']    ?? '';
        $namaProgram     = $_POST['namaProgram']     ?? '';
        $suratKeterangan = $_POST['suratKeterangan'] ?? '';

        $this->model->editProgramKerja($nomorProgram, $namaProgram, $suratKeterangan);
        header('Location: index.php');
        exit;
    }

    public function hapus()
    {
        $this->requireKepala();
        $id = $_GET['id'] ?? '';
        $this->model->hapusProgramKerja($id);
        header('Location: index.php');
        exit;
    }
}
?>