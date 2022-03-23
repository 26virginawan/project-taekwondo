<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Anggota;
use App\Buku;
use App\DataAtlet;
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
        $transaksi = Transaksi::get();
        $anggota = Anggota::get();
        $buku = Buku::get();
        if (Auth::user()->level == 'user') {
            $datas = Transaksi::where('status', 'pinjam')
                ->where('anggota_id', Auth::user()->anggota->id)
                ->get();
        } else {
            $datas = Transaksi::where('status', 'pinjam')->get();
        }
        return view(
            'home',
            compact('transaksi', 'anggota', 'buku', 'datas', 'data_atlet')
        );
    }
}