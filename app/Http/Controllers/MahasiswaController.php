<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function all()
    {
        $mahasiswas = Mahasiswa::all();
        foreach ($mahasiswas as $mahasiswa) {
            echo "$mahasiswa->id | $mahasiswa->nim | $mahasiswa->nama | $mahasiswa->jurusan <br>";
        }
    }

    public function attach()
    {
        $mahasiswa = Mahasiswa::find(3);
        $matakuliah = Matakuliah::find(4);
        // Lakukan proses attach, yakni hubungkan mahasiswa dan matakuliah
        $mahasiswa->matakuliahs()->attach($matakuliah);
        echo "Proses attach berhasil";
    }

    public function toggle()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Tiara Siregar')->first();
        $matakuliahs = Matakuliah::where('nama', 'Kriptografi')->get();
        $mahasiswa->matakuliahs()->toggle($matakuliahs);
        echo "Proses toggle berhasil";
    }

    public function delete()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Tiara Siregar')->first();
        $mahasiswa->delete();
        echo "Data $mahasiswa->nama berhasil di hapus";
    }
}
