<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index(Request $request) {
        return view('mahasiswa.index');
    }
    
    public function create(Request $request) {
        return view('mahasiswa.create');
    }

    public function edit(Request $request, $id) {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        return view('mahasiswa.edit', [
            'mahasiswa'=> $mahasiswa
        ]);
    }

    public function list(Request $request, $page=1) {
        $get = Mahasiswa::orderBy('name')->get();

        return response()->json($get);
    }

    public function store(Request $request) {
      
        $validated = $request->validate([
            'name' => 'required|max:100',
            'nim' => 'required|unique:mahasiswas,nim|max:255',
            'tahun_angkatan'=>'required|date',
            'pembimbing'=>'required|nullable'
        ]);
        
        Mahasiswa::create($validated);
        
        return response()->json(['status'=>'ok']);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'nim' => 'required|unique:mahasiswas,nim,'.$id.'|max:255',
            'tahun_angkatan'=>'required|date',
            'pembimbing'=>'required|nullable'
        ]);

        Mahasiswa::where('id', $id)->update($validated);
        
        return response()->json(['status'=>'ok']);
    }
    
    public function delete(Request $request, $id) {
        $get = Mahasiswa::where('id', $id)->first();

        if(!$get){
            return response()->json(['status'=>'ok']);
        }

        $get->delete();

        return redirect()->back();
    }
}
