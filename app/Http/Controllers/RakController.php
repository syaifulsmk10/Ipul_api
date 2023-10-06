<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
      public function index()
    {
        $RakData = Rak::all();
        return response()->json([
            "message" => "Berhasil Mendapatkan Rak",
            "data" => $RakData
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Rak::create([
            "nama_rak" => $request->nama_rak,
            "lokasi_rak" => $request->lokasi_rak,
            "buku_id" => $request->buku_id,
          
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
        $data = Rak::findOrFail($request->id);
        $updateData = $data->update([
            "nama_rak" => $request->nama_rak,
            "lokasi_rak" => $request->lokasi_rak,
            "buku_id" => $request->buku_id,
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
        $dataToDelete = Rak::findOrFail($request->id);
         $deleteProced = $dataToDelete->delete();

         if(!$deleteProced) return response()->json([
           "Message" => "Gagal Menghapus Data!"
         ],400);

         return response()->json([
            "Message" => "Berhasil Menghapus Data!"
         ],200);
    }
}
