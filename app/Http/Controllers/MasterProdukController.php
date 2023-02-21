<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('pages.master.masterProduk', ['title' => 'Master Produk', 'produk' => $produk]);
    }
    protected function create(Request $request)
    {
        try {
            $who = Auth::id();
            Produk::create([
                'nama_produk' => $request['nama_produk'],
                'deskripsi_produk' => $request['deskripsi_produk'],
                'harga_produk' => $request['harga_produk'],
                'created_by' => $who,
            ]);
            $queryStatus = "Successful";
        } catch (Exception $e) {
            $queryStatus = "Failed";
        }
        return redirect('/master-produk');
    }
    protected function updateProdukData(Request $request)
    {
        Produk::where('id_produk', $request->id_produk)->update([
            'nama_produk' => $request['nama_produk'],
            'deskripsi_produk' => $request['deskripsi_produk'],
            'harga_produk' => $request['harga_produk'],
        ]);
        return redirect('/master-produk');
    }
    protected function deleteProdukData($id)
    {
        Produk::where('id_produk', $id)->delete();
        return redirect('/master-produk');
    }
}
