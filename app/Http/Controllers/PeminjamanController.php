<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
     public function index()
    {
        $RakData = Peminjaman::all();
        return response()->json([
            "message" => "Berhasil Mendapatkan Peminjaman",
            "data" => $RakData
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Peminjaman::create([
            "tanggal_pinjam" => $request->tanggal_pinjam,
            "tanggal_kembali" => $request->tanggal_kembali,
            "buku_id" => $request->buku_id,
              "anggota_id" => $request->anggota_id,
                "petugas_id" => $request->petugas_id,
          
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
        $data = Peminjaman::findOrFail($request->id);
        $updateData = $data->update([
           "tanggal_pinjam" => $request->tanggal_pinjam,
            "tanggal_kembali" => $request->tanggal_kembali,
            "buku_id" => $request->buku_id,
              "anggota_id" => $request->anggota_id,
                "petugas_id" => $request->petugas_id,
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
        $dataToDelete = Peminjaman::findOrFail($request->id);
         $deleteProced = $dataToDelete->delete();

         if(!$deleteProced) return response()->json([
           "Message" => "Gagal Menghapus Data!"
         ],400);

         return response()->json([
            "Message" => "Berhasil Menghapus Data!"
         ],200);
    }
}
