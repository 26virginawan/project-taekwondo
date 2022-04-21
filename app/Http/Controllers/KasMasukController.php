<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KasMasuk;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class KasMasukController extends Controller
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
        $kas_masuk = KasMasuk::get();
        $jumlahmasuk = 0;
        foreach ($kas_masuk as $item => $value) {
            // simpan nilai harga ke variabel $harga_total
            $jumlahmasuk += $value['jumlah'];
        }

        return view('kasmasuk.index', compact('kas_masuk', 'jumlahmasuk'));
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
        $kas_masuk = KasMasuk::all();

        return view('kasmasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        KasMasuk::create([
            'tanggal' => $request->get('tanggal'),
            'keterangan' => $request->get('keterangan'),
            'jumlah' => $request->get('jumlah'),
        ]);

        alert()->success('Berhasil.', 'Data telah ditambahkan!');

        return redirect('/kasmasuk');
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

        $kas_masuk = KasMasuk::findOrFail($id);

        return view('kasmasuk.show', compact('kas_masuk'));
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
            Alert::info('Oopss..', 'Anda dilarang melakukan ini.');
            return redirect()->to('/kasmasuk');
        }

        $kas_masuk = KasMasuk::findOrFail($id);
        return view('kasmasuk.edit', compact('kas_masuk'));
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
        $kas_masuk = KasMasuk::findOrFail($id);

        KasMasuk::find($id)->update([
            'tanggal' => $request->get('tanggal'),
            'keterangan' => $request->get('keterangan'),
            'jumlah' => $request->get('jumlah'),
        ]);

        alert()->success('Berhasil.', 'Data telah diubah!');
        return redirect('/kasmasuk');
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
        KasMasuk::find($id)->delete();
        alert()->success('Berhasil.', 'Data telah dihapus!');
        return redirect('/kasmasuk');
    }
}