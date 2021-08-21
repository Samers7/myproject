<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        // if(Auth::use == 'admin'){
        //     return redirect('/admin');
        // }
        return redirect('/products');
    }

    public function update(Request $request, $id){
        if($request->input('role') == 'change user permission') return redirect('/users');
        $role = User::find($id);
        $role->role = $request->input('role');
        $role->save();
        return redirect('/users');
    }

}
