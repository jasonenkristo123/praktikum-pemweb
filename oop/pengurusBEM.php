<?php

class pengurusBEM {

   public $nama;
   public $nim;
   public $angkatan;
   public $jabatan;
   public $foto;

   public function setNama($nama) { 
      $this->nama = $nama;
   }

   public function getNama() {
      echo "$this->nama";
   }

   public function setJabatan($jabatan) {    
      $this->jabatan = $jabatan;
   }
  
   public function getJabatan() {
      echo "$this->jabatan";
   }
}