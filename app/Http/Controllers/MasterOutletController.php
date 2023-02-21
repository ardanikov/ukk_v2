<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterOutletController extends Controller
{
    public function index()
    {
        $outlet = Outlet::all();
        return view('pages.master.masterOutlet', ['title' => 'Master Outlet', 'outlet' => $outlet]);
    }
    protected function create(Request $request)
    {
        $who = Auth::id();
        Outlet::create([
            'nama_outlet' => $request['nama_outlet'],
            'lokasi_outlet' => $request['lokasi_outlet'],
            'created_by' => $who,
        ]);
        return redirect('/master-outlet');
    }
    protected function deleteOutletData($id)
    {
        Outlet::where('id_outlet', $id)->delete();
        return redirect('/master-outlet');
    }
    protected function updateOutletData(Request $request)
    {
        Outlet::where('id_outlet', $request->id_outlet)->update([
            'nama_outlet' => $request['nama_outlet'],
            'lokasi_outlet' => $request['lokasi_outlet']
        ]);
        return redirect('/master-outlet');
    }
}
