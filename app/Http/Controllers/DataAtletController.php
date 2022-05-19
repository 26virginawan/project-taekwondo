<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataAtlet;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class DataAtletController extends Controller
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
        $data_user = DataAtlet::get();

        $data_atlet = DataAtlet::get();
        return view('dataatlet.index', compact('data_atlet'));
        // $data_atlet = DataAtlet::where('kelas', '=', 'reguler')->get();
        // return view('dataatlet.index', compact('data_atlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dataatlet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atlet = new \App\User();
        $atlet->name = $request->name;
        $atlet->email = $request->email;
        $atlet->password = bcrypt('rahasia');
        $atlet->username = $request->username;
        $atlet->level = 'user';
        $atlet->remember_token = str_random(60);
        $atlet->save();

        if ($request->file('foto')) {
            //simpan foto produk yang di upload ke direkteri public/storage/imageproduct
            $file = $request->file('foto')->store('imageprestasi', 'public');

            DataAtlet::create([
                'foto' => $file,
                'name' => $request->get('name'),
                'username' => $request->get('username'),
                'email' => $request->get('tgl_registrasi'),
                'tempat_lahir' => $request->get('tempat_lahir'),
                'tgl_lahir' => $request->get('tgl_lahir'),
                'jenis_kelamin' => $request->get('jenis_kelamin'),
                'bb' => $request->get('bb'),
                'tb' => $request->get('tb'),
                'no_hp' => $request->get('no_hp'),
                'tingkat_sabuk' => $request->get('tingkat_sabuk'),
                'kelas' => $request->get('kelas'),
            ]);

            alert()->success('Berhasil.', 'Data telah ditambahkan!');

            return redirect('/dataatlet');
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

        $data_atlet = DataAtlet::findOrFail($id);

        return view('dataatlet.show', compact('data_atlet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (Auth::user()->level == 'user') {
        //     Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //     return redirect()->to('/');
        // }

        $data_atlet = DataAtlet::findOrFail($id);
        return view('dataatlet.edit', compact('data_atlet'));
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
        DataAtlet::find($id)->update([
            'nama' => $request->get('nama'),
            'tgl_registrasi' => $request->get('tgl_registrasi'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tgl_lahir' => $request->get('tgl_lahir'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'bb' => $request->get('bb'),
            'tb' => $request->get('tb'),
            'no_hp' => $request->get('no_hp'),
            'tingkat_sabuk' => $request->get('tingkat_sabuk'),
            'kelas' => $request->get('kelas'),
        ]);

        if (Auth::user()->level == 'user') {
            alert()->success('Berhasil.', 'Data telah diubah!');
            return redirect('/');
        }
        alert()->success('Berhasil.', 'Data telah diubah!');
        return redirect('/dataatlet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataAtlet::find($id)->delete();
        alert()->success('Berhasil.', 'Data telah dihapus!');
        return redirect('/dataatlet');
    }
}