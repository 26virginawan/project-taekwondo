<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataPrestasi;
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
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

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
            return redirect()->to('/');
        }

        return view('dataprestasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //menyimpan produk ke database
        if ($request->file('foto')) {
            //simpan foto produk yang di upload ke direkteri public/storage/imageproduct
            $file = $request->file('foto')->store('imageprestasi', 'public');

            DataPrestasi::create([
                'foto' => $file,
                'nama' => $request->get('nama'),
                'nama_acara' => $request->get('nama_acara'),
                'tgl_acara' => $request->get('tgl_acara'),
                'lokasi' => $request->get('lokasi'),
            ]);

            alert()->success('Berhasil.', 'Data telah ditambahkan!');

            return redirect('/dataprestasi');
        }
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
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
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
        $data_prestasi = DataPrestasi::findOrFail($id);

        if ($request->file('foto')) {
            Storage::delete('public/' . $data_prestasi->image);
            $file = $request->file('foto')->store('imageprestasi', 'public');
            $data_prestasi->foto = $file;
        }

        // $data_prestasi->nama = $request->nama;
        // $data_prestasi->nama_acara = $request->nama_acara;
        // $data_prestasi->tgl_acara = $request->tgl_acara;
        // $data_prestasi->lokasi = $request->lokasi;

        DataPrestasi::find($id)->update([
            'nama' => $request->get('nama'),
            'nama_acara' => $request->get('nama_acara'),
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
        DataPrestasi::find($id)->delete();
        alert()->success('Berhasil.', 'Data telah dihapus!');
        return redirect('/dataprestasi');
    }
}