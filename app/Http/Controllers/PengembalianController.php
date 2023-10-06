<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $RakData = Pengembalian::all();
        return response()->json([
            "message" => "Berhasil Mendapatkan Pengembalian",
            "data" => $RakData
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Pengembalian::create([
            "tanggal_pengembalian" => $request->tanggal_pengembalian,
            "denda" => $request->denda,
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
        $data = Pengembalian::findOrFail($request->id);
        $updateData = $data->update([
           "tanggal_pengembalian" => $request->tanggal_pengembalian,
            "denda" => $request->denda,
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
        $dataToDelete = Pengembalian::findOrFail($request->id);
         $deleteProced = $dataToDelete->delete();

         if(!$deleteProced) return response()->json([
           "Message" => "Gagal Menghapus Data!"
         ],400);

         return response()->json([
            "Message" => "Berhasil Menghapus Data!"
         ],200);
    }
}
