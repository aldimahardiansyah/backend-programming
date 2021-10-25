<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public $animals = ['Ayam', 'Ikan', 'Kucing'];
    public function index()
    {
        echo "Menampilkan data animals<br>";
        foreach ($this->animals as $animal) {
            echo '- ' . $animal . '<br>';
        }
    }
    public function store(Request $request)
    {
        echo "Menambahkan hewan baru<br>";
        $data = $request->only('name');
        array_push($this->animals, $data['name']);
        $this->index();
    }
    public function update(Request $request, $id)
    {
        echo "Mengupdate data hewan id " . $id . '<br>';
        $data = $request->only('name');
        $this->animals[$id] = $data['name'];
        $this->index();
    }
    public function destroy($id)
    {
        echo "Menghapus data animals id " . $id . '<br>';
        unset($this->animals[$id]);
        $this->index();
    }
}
