<?php
class Person
{
    public $nama;
    public $jurusan;
    public $alamat;

    public function __construct($nama, $jurusan, $alamat)
    {
        $this->nama = $nama;
        $this->jurusan = $jurusan;
        $this->alamat = $alamat;
    }

    public function setNama($data)
    {
        $this->nama = $data;
    }
}

// membuat object
$aldi = new Person('Aldi Mahardiansyah', 'Teknik Informatika', 'Bogor');

//mengakses property
echo $aldi->nama;


//mengakses method
echo '<br>';
$aldi->setNama('Aldi');
echo $aldi->nama;
