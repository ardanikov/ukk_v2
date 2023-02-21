<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class MasterUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return view('pages.master.masterUser', ['title' => 'Master User', 'users' => $users]);
    }
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'roles' => ['required', 'string', 'min:1'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function create(Request $request)
    {
        try {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'roles' => $request['roles'],
            ]);
            $queryStatus = "Successful";
        } catch (Exception $e) {
            $queryStatus = "Failed";
        }
        return redirect('/master-user');
    }
    protected function deleteUserData($id)
    {
        User::where('id', $id)->delete();
        return redirect('/master-user');
    }
    protected function updateUserData(Request $request)
    {
        // dd($request);
        $getPassword = User::find($request->id);
        if ($request->password == NULL) {
            $password = $getPassword['password'];
        } else {
            $password = Hash::make($request->password);
        }
        // dd($password);
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'roles' => $request->roles,
            'password' => $password,
        ]);
        return redirect('/master-user');
    }
    protected function getUserById($id)
    {
        $res = User::find($id);
        dd(response($res));
        return response($res);
    }
}
