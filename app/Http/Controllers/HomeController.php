<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataAtlet;
use App\User;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_atlet = DataAtlet::get();
        $user = User::select('name');

        $dataprofil = DataAtlet::where(
            'name',

            Auth::user()->name
        )->get();

        return view('home', compact('data_atlet', 'dataprofil'));
    }

    public function profil()
    {
        if (Auth::user()->level == 'user') {
            $aktif = DataAtlet::where('id', 'name');
        }

        $dataprofil = DataAtlet::where('id', $aktif);
    }
}