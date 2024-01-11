<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class SiswaImport implements ToModel
{
    public function model(array $row)
    {
        return new Siswa([
            'nama' => $row['Nama'],
            'jeniskelamin' => $row['Jenis Kelamin'],
            'jurusan' => $row['Jurusan'],
            'foto' => $row['Foto'],
            'created_at' => Carbon::now(), // Set nilai created_at saat impor
        ]);
    }
}
