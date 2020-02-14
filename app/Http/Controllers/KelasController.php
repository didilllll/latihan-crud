<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
       $kelas = Kelas::all();// menampilkan semua data yg ada di kelas
       return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan ke halaman FROM INPUT
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $kelas = new Kelas();
        $kelas->kelas = $request->kelas;
        $kelas->save();
        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $kelas = Kelas::findOrFail($id);
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }
    public function update(Request $request, $id)
    {
        //
        $kelas = Kelas::findOrFail($id);
        $kelas->kelas = $request->kelas;
        $kelas->save();
        return redirect()->route('kelas.index');
    }
    public function destroy($id)
    {
        //
        $kelas = Kelas::findOrFail($id)->delete();
        return redirect()->route('kelas.index');
    }
}
