<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataPrestasi;
use App\DataAtlet;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DataPrestasiController extends Controller
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
        // if (Auth::user()->level == 'user') {
        //     Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //     return redirect()->to('/');
        // }

        $data_prestasi = DataPrestasi::get();
        return view('dataprestasi.index', compact('data_prestasi'));
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
            return redirect()->to('/dataprestasi');
        }
        $data_name = DataAtlet::all();

        return view('dataprestasi.create', ['data_name' => $data_name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        DataPrestasi::create([
            'name' => $request->get('name'),
            'nama_kejuaraan' => $request->get('nama_kejuaraan'),
            'tingkat' => $request->get('tingkat'),
            'kelas' => $request->get('kelas'),
            'kategori' => $request->get('kategori'),
            'perolehan' => $request->get('perolehan'),
            'tgl_acara' => $request->get('tgl_acara'),
            'lokasi' => $request->get('lokasi'),
        ]);

        alert()->success('Berhasil.', 'Data telah ditambahkan!');

        return redirect('/dataprestasi');
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

        $data_prestasi = DataPrestasi::findOrFail($id);

        return view('dataprestasi.show', compact('dataprestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_name = DataAtlet::all();
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang melakukan ini.');
            return redirect()->to('/dataprestasi');
        }

        $data_prestasi = DataPrestasi::findOrFail($id);
        return view('dataprestasi.edit', compact('data_prestasi'));
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
        $data_name = DataAtlet::all();
        $data_prestasi = DataPrestasi::findOrFail($id);

        DataPrestasi::find($id)->update([
            'nama' => $request->get('nama'),
            'nama_kejuaraan' => $request->get('nama_kejuaraan'),
            'tingkat' => $request->get('tingkat'),
            'kelas' => $request->get('kelas'),
            'kategori' => $request->get('kategori'),
            'perolehan' => $request->get('perolehan'),
            'tgl_acara' => $request->get('tgl_acara'),
            'lokasi' => $request->get('lokasi'),
        ]);

        alert()->success('Berhasil.', 'Data telah diubah!');
        return redirect('/dataprestasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang melakukan ini.');
            return redirect()->to('/dataprestasi');
        }
        DataPrestasi::find($id)->delete();
        alert()->success('Berhasil.', 'Data telah dihapus!');
        return redirect('/dataprestasi');
    }
}