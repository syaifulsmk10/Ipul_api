<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bookData = Buku::all();
        return response()->json([
            "message" => "Berhasil Mendapatkan Buku",
            "data" => $bookData
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Buku::create([
            "kode_buku" => $request->kode_buku,
            "judul_buku" => $request->judul_buku,
            "penulis_buku" => $request->penulis_buku,
            "penerbit_buku" => $request->penerbit_buku,
            "tahun_penerbit" => $request->tahun_terbit, // Mengubah "tahun_penerbit" menjadi "tahun_terbit"
            "stock" => $request->stock
        ]);

        if ($data) {
            return response()->json([
                "message" => "Berhasil membuat buku",
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
        $data = Buku::findOrFail($request->id);
        $updateData = $data->update([
            "kode_buku" => $request->kode_buku,
            "judul_buku" => $request->judul_buku,
            "penulis_buku" => $request->penulis_buku,
            "penerbit_buku" => $request->penerbit_buku,
            "tahun_penerbit" => $request->tahun_terbit, // Mengubah "tahun_penerbit" menjadi "tahun_terbit"
            "stock" => $request->stock
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
        $dataToDelete = Buku::findOrFail($request->id);
         $deleteProced = $dataToDelete->delete();

         if(!$deleteProced) return response()->json([
           "Message" => "Gagal Menghapus Data!"
         ],400);

         return response()->json([
            "Message" => "Berhasil Menghapus Data!"
         ],200);
    }

}
