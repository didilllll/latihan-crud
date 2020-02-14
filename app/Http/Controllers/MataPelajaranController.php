<?php

namespace App\Http\Controllers;

use App\Mata_pelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
 public function __construct(){
     return $this->middleware('auth');
 }
    public function index()
    {
        //
        $mapel = Mata_pelajaran::all();// menampilkan semua data yg ada di kelas
        return view('mapel.index', compact('mapel'));
    }

    public function create()
    {

        //menampilkan ke halaman FROM INPUT
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $mapel = new Mata_pelajaran();
        $mapel->nama = $request->nama;
        $mapel->save();
        return redirect()->route('mapel.index');
    }

    public function show($id)
    {
        //
        $mapel = Mata_pelajaran::findOrFail($id);
        return view('mapel.show', compact('mapel'));
    }

    public function edit($id)
    {
        //
        $mapel = Mata_pelajaran::findOrFail($id);
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        //
        $mapel = Mata_pelajaran::findOrFail($id);
        $mapel->nama = $request->nama;
        $mapel->save();
        return redirect()->route('mapel.index');
    }


    public function destroy($id)
    {
        //
        $mapel = Mata_pelajaran::findOrFail($id)->delete();
        return redirect()->route('mapel.index');
    }
}
