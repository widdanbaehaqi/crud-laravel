<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PertanyaanModel;
use App\Models\JawabanModel;

class PertanyaanController extends Controller
{
    public function index() {
    	$pertanyaan = PertanyaanModel::get_all();
    	return view('isi.pertanyaan', compact('pertanyaan'));
    }

    public function create() {
    	$pertanyaan = PertanyaanModel::get_all();
    	return view('isi.tambahpertanyaan', compact('pertanyaan'));
    }

    public function store(Request $request) {
    	$judul = $request["judul"];
    	$isi = $request["isi"];
    	$user_id = $request["nama"];
    	$data = array('judul'=>$judul, 'isi'=>$isi, 'user_id'=>$user_id, 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s'));
    	
    	$simpan = PertanyaanModel::simpan($data);

    	return redirect('/pertanyaan');
    }

    public function show($id) {
        $data = PertanyaanModel::get_isi($id);
        $jawaban = JawabanModel::get_all($id);
        
        return view('isi.detailpertanyaan', compact('data', 'jawaban'));
    }

    public function edit($id) {
        $data = PertanyaanModel::get_isi($id);
        return view('isi.editpertanyaan', compact('data'));
    }

    public function update($id, Request $request) {
        $data = PertanyaanModel::update($id, $request->all());

        return redirect('/pertanyaan');
    }

    public function destroy($id) {
        $data = PertanyaanModel::delete($id);

        return redirect('/pertanyaan');
    }
}
