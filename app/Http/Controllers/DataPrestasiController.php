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

    // public function format()
    // {
    //     $data = [
    //         [
    //             'judul' => null,
    //             'isbn' => null,
    //             'pengarang' => null,
    //             'penerbit' => null,
    //             'tahun_terbit' => null,
    //             'jumlah_buku' => null,
    //             'deskripsi' => null,
    //             'lokasi' => 'rak1/rak2/rak3',
    //         ],
    //     ];
    //     $fileName = 'format-buku';

    //     $export = Excel::create($fileName . date('Y-m-d_H-i-s'), function (
    //         $excel
    //     ) use ($data) {
    //         $excel->sheet('buku', function ($sheet) use ($data) {
    //             $sheet->fromArray($data);
    //         });
    //     });

    //     return $export->download('xlsx');
    // }

    // public function import(Request $request)
    // {
    //     $this->validate($request, [
    //         'importBuku' => 'required',
    //     ]);

    //     if ($request->hasFile('importBuku')) {
    //         $path = $request->file('importBuku')->getRealPath();

    //         $data = Excel::load($path, function ($reader) {})->get();
    //         $a = collect($data);

    //         if (!empty($a) && $a->count()) {
    //             foreach ($a as $key => $value) {
    //                 $insert[] = [
    //                     'judul' => $value->judul,
    //                     'isbn' => $value->isbn,
    //                     'pengarang' => $value->pengarang,
    //                     'penerbit' => $value->penerbit,
    //                     'tahun_terbit' => $value->tahun_terbit,
    //                     'jumlah_buku' => $value->jumlah_buku,
    //                     'deskripsi' => $value->deskripsi,
    //                     'lokasi' => $value->lokasi,
    //                     'cover' => null,
    //                 ];

    //                 Buku::create($insert[$key]);
    //             }
    //         }
    //     }
    //     alert()->success('Berhasil.', 'Data telah diimport!');
    //     return back();
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $acak;
            $request->file('foto')->move('/storage/prestasi/', $fileName);
            $foto = $fileName;
        } else {
            $foto = null;
        }

        DataPrestasi::create([
            'foto' => $foto,
            'nama' => $request->get('nama'),
            'nama_acara' => $request->get('nama_acara'),
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
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName =
                rand(11111, 99999) .
                '-' .
                $dt->format('Y-m-d-H-i-s') .
                '.' .
                $acak;
            $request->file('foto')->move('images/buku', $fileName);
            $foto = $fileName;
        } else {
            $foto = null;
        }

        DataPrestasi::find($id)->update([
            'foto' => $foto,
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