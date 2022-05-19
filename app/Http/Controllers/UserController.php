<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataAtlet;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
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
        $data_atlet = DataAtlet::get();
        $dataprofil = DataAtlet::where(
            'name',

            Auth::user()->name
        )->get();

        $datas = User::get();
        return view('auth.user', compact('datas', 'dataprofil', 'data_atlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Auth::user()->level == 'user') {
        //     Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //     return redirect()->to('/');
        // }
        return view('auth.register');
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

        $user_register = \App\DataAtlet::create($request->all());

        alert()->success('Berhasil.', 'Data telah disimpan!');

        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->level == 'user' && Auth::user()->id != $id) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data = User::findOrFail($id);

        return view('auth.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->level == 'user' && Auth::user()->id != $id) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data = User::findOrFail($id);

        return view('auth.edit', compact('data'));
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
        $user_data = User::findOrFail($id);

        $user_data->name = $request->input('name');
        $user_data->email = $request->input('email');
        $user_data->level = $request->input('level');
        if ($request->input('password')) {
            $user_data->level = $request->input('level');
        }

        if ($request->input('password')) {
            $user_data->password = bcrypt($request->input('password'));
        }

        $user_data->update();

        Session::flash('message', 'Berhasil diubah!');
        Session::flash('message_type', 'success');
        return redirect()->to('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id != $id) {
            $user_data = User::findOrFail($id);
            $user_data->delete();
            Session::flash('message', 'Berhasil dihapus!');
            Session::flash('message_type', 'success');
        } else {
            Session::flash('message', 'Akun anda sendiri tidak bisa dihapus!');
            Session::flash('message_type', 'danger');
        }
        return redirect()->to('user');
    }
}