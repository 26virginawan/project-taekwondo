<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataUkt;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DataUktController extends Controller
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

        $data_ukt = DataUkt::get();
        return view('dataukt.index', compact('data_ukt'));
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

        return view('dataukt.create');
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
        // $this->validate($request, [
        //     'judul' => 'required|string|max:255',
        //     'isbn' => 'required|string',
        // ]);

        // if ($request->file('cover')) {
        //     $file = $request->file('cover');
        //     $dt = Carbon::now();
        //     $acak = $file->getClientOriginalExtension();
        //     $fileName =
        //         rand(11111, 99999) .
        //         '-' .
        //         $dt->format('Y-m-d-H-i-s') .
        //         '.' .
        //         $acak;
        //     $request->file('cover')->move('images/buku', $fileName);
        //     $cover = $fileName;
        // } else {
        //     $cover = null;
        // }

        DataUkt::create([
            'tgl_buka' => $request->get('tgl_buka'),
            'tgl_tutup' => $request->get('tgl_tutup'),
            'status' => $request->get('status'),
        ]);

        // alert()->success('Berhasil.', 'Data telah ditambahkan!');

        return redirect('/dataukt');
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

        $data_ukt = DataUkt::findOrFail($id);

        return view('dataukt.show', compact('data_ukt'));
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

        $data_ukt = DataUkt::findOrFail($id);
        return view('dataukt.edit', compact('data_ukt'));
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
        DataUkt::find($id)->update([
            'tgl_buka' => $request->get('tgl_buka'),
            'tgl_tutup' => $request->get('tgl_tutup'),
            'status' => $request->get('status'),
        ]);

        alert()->success('Berhasil.', 'Data telah diubah!');
        return redirect('/dataukt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataUkt::find($id)->delete();
        alert()->success('Berhasil.', 'Data telah dihapus!');
        return redirect('/dataukt');
    }
}