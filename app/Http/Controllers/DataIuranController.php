<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataIuran;
use App\DataAtlet;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DataIuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $data_user = DataIuran::get();

        $data_iuran = DataIuran::get();
        return view('dataiuran.index', compact('data_iuran'));
    }

    public function atlet()
    {
        $atlet = DataAtlet::get();

        return view('dataiuran.dataatlet', compact('atlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/dataiuran');
        }
        $data_iuran = DataIuran::all();

        return view('dataiuran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DataIuran::create([
            'bulan' => $request->get('bulan'),
            'tgl_bayar' => $request->get('tgl_bayar'),
            'keterangan' => $request->get('keterangan'),
        ]);

        alert()->success('Berhasil.', 'Data telah ditambahkan!');

        return redirect('/dataiuran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data_iuran = DataIuran::findOrFail($id);

        return view('dataiuran.show', compact('data_iuran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data_iuran = DataIuran::findOrFail($id);
        return view('dataiuran.edit', compact('data_iuran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DataIuran::find($id)->update([
            'bulan' => $request->get('bulan'),
            'tgl_bayar' => $request->get('tgl_bayar'),
            'keterangan' => $request->get('keterangan'),
        ]);

        alert()->success('Berhasil.', 'Data telah diubah!');
        return redirect('/dataiuran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataIuran::find($id)->delete();
        alert()->success('Berhasil.', 'Data telah dihapus!');
        return redirect('/dataiuran');
    }
}