<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class MasterPelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pages.master.masterPelanggan', ['title' => 'Master Pelanggan', 'pelanggan' => $pelanggan]);
    }
    protected function create(Request $request)
    {
        try {
            $who = Auth::id();
            Pelanggan::create([
                'nama_pelanggan' => $request['nama_pelanggan'],
                'nomor_hp_pelanggan' => $request['nomor_hp_pelanggan'],
                'created_by' => $who,
            ]);
            $queryStatus = "Successful";
        } catch (Exception $e) {
            $queryStatus = "Failed";
        }
        return redirect('/master-pelanggan');
    }
    protected function updatePelangganData(Request $request)
    {
        // dd($request);
        Pelanggan::where('id_pelanggan', $request->id_pelanggan)->update([
            'nama_pelanggan' => $request['nama_pelanggan'],
            'nomor_hp_pelanggan' => $request['nomor_hp_pelanggan']
        ]);
        return redirect('/master-pelanggan');
    }
    protected function deletePelangganData($id)
    {
        Pelanggan::where('id_pelanggan', $id)->delete();
        return redirect('/master-pelanggan');
    }
}
