<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
      public function index()
    {
        $RakData = Petugas::all();
        return response()->json([
            "message" => "Berhasil Mendapatkan Data Petugas",
            "data" => $RakData
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Petugas::create([
            "nama_petugas" => $request->nama_petugas,
            "jabatan_petugas" => $request->jabatan_petugas,
            "no_telp_petugas" => $request->no_telp_petugas,
              "alamat_petugas" => $request->alamat_petugas,
                
          
        ]);

        if ($data) {
            return response()->json([
                "message" => "Berhasil membuat menmbah petugas",
                "Data" => $data
            ], 200);
        } else {
            return response()->json([
                "message" => "Gagal membuat buku"
            ], 400); // Mengembalikan status 400 jika gagal membuat buku
        }
    }



    public function update(Request $request)
    {
        $data = Petugas::findOrFail($request->id);
        $updateData = $data->update([
             "nama_petugas" => $request->nama_petugas,
            "jabatan_petugas" => $request->jabatan_petugas,
            "no_telp_petugas" => $request->no_telp_petugas,
              "alamat_petugas" => $request->alamat_petugas,
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
        $dataToDelete = Petugas::findOrFail($request->id);
         $deleteProced = $dataToDelete->delete();

         if(!$deleteProced) return response()->json([
           "Message" => "Gagal Menghapus Data!"
         ],400);

         return response()->json([
            "Message" => "Berhasil Menghapus Data!"
         ],200);
    }
}
