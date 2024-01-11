<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where('nama', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('jeniskelamin', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('jurusan', 'LIKE', '%' . $searchTerm . '%');
        }

        $data = $query->paginate(5);

        return view('datasiswa', compact('data'));
    }

    public function tambahsiswa()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        $data = new Siswa();

        // Mengambil data dari request untuk kolom lainnya
        $data->nama = $request->input('nama');
        $data->jeniskelamin = $request->input('jeniskelamin');
        $data->jurusan = $request->input('jurusan');

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $file->hashName(); // Mendapatkan nama file yang unik
            $file->store('public/fotosiswa'); // Simpan foto ke direktori penyimpanan dengan nama unik
            $data->foto = $fileName; // Simpan nama file foto ke dalam model Siswa
        }

        $data->save(); // Simpan data siswa ke dalam database

        // Set session untuk memberikan pesan sukses
        Session::flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('siswa');
    }

    public function tampilkandata($id)
    {
        $data = Siswa::find($id);

        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Siswa::find($id);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName(); // Atau sesuaikan dengan kebutuhan
            $file->storeAs('public/fotosiswa', $fileName);

            // Simpan nama file foto ke database
            $data->foto = $fileName;
        }

        // Update data siswa berdasarkan request
        $data->update($request->except('foto')); // Kecuali foto, agar foto tidak diubah jika tidak diunggah

        return redirect()->route('siswa')->with('success', 'Data Berhasil Update!');
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        $siswa->delete();

        return response()->json(['message' => 'Data deleted successfully'], 200);
    }

    public function exportexcel(){
        return Excel::download(new SiswaExport,'datasiswa.xlsx');
    }

    public function exportpdf(){
        $data = Siswa::all();
        view()->share('data',$data);
        $pdf = PDF::loadview('datasiswa', compact('data')); // Pastikan view yang di-load adalah 'datasiswa'
        return $pdf->download('data.pdf');
    }
    public function importexcel(Request $request){
    $data = $request->file('file'); // Mengambil file yang diunggah dari form dengan nama 'file'
    
    $namafile = $data->getClientOriginalName(); // Mendapatkan nama asli file yang diunggah
    $data->storeAs('SiswaData', $namafile, 'public'); // Memindahkan file yang diunggah ke direktori 'SiswaData' di dalam direktori penyimpanan 'public'
    
    // Melakukan proses impor menggunakan class SiswaImport
    Excel::import(new SiswaImport, storage_path('app/public/SiswaData/' . $namafile));
    
    // Set session untuk memberikan pesan sukses
    Session::flash('success', 'Data berhasil diimpor.');

    return redirect()->back(); // Kembali ke halaman sebelumnya setelah impor selesai
}

    
    
    
}
