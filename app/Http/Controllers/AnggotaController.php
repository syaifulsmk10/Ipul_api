<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
      public function index()
    {
        $AnggotaData = Anggota::all();
        return response()->json([
            "message" => "Berhasil Mendapatkan Anggota",
            "data" => $AnggotaData
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Anggota::create([
            "kode_anggota" => $request->kode_anggota,
            "nama_anggota" => $request->nama_anggota,
            "jk_anggota" => $request->jk_anggota,
            "jurusan_anggota" => $request->jurusan_anggota,
            "no_telp_anggota" => $request->no_telp_anggota, // Mengubah "tahun_penerbit" menjadi "tahun_terbit"
            "alamat_anggota" => $request->alamat_anggota
        ]);

        if ($data) {
            return response()->json([
                "message" => "Berhasil membuat ",
                "Data" => $data
            ], 200);
        } else {
            return response()->json([
                "message" => "Gagal membuat "
            ], 400); // Mengembalikan status 400 jika gagal membuat buku
        }
    }



    public function update(Request $request)
    {
        $data = Anggota::findOrFail($request->id);
        $updateData = $data->update([
             "kode_anggota" => $request->kode_anggota,
            "nama_anggota" => $request->nama_anggota,
            "jk_anggota" => $request->jk_anggota,
            "jurusan_anggota" => $request->jurusan_anggota,
            "no_telp_anggota" => $request->no_telp_anggota, // Mengubah "tahun_penerbit" menjadi "tahun_terbit"
            "alamat_anggota" => $request->alamat_anggota
        ]);

         if ($updateData) {
            return response()->json([
                "message" => "Berhasil mengupdate data",
                "Data" => $data
            ],200);
        } else {
            return response()->json([
                "message" => "Gagal mengupdate data"
            ], 400); // Mengembalikan status 400 jika gagal membuat buku
        }

    }


      public function destroy(Request $request)
    {
        $dataToDelete = Anggota::findOrFail($request->id);
         $deleteProced = $dataToDelete->delete();

         if(!$deleteProced) return response()->json([
           "Message" => "Gagal Menghapus Data!"
         ],400);

         return response()->json([
            "Message" => "Berhasil Menghapus Data!"
         ],200);
    }
}
