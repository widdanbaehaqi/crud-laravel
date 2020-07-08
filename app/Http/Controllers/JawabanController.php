<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PertanyaanModel;
use App\Models\JawabanModel;

class JawabanController extends Controller
{
    public function index($pertanyaan_id) {
    	$pertanyaan = PertanyaanModel::get_isi($pertanyaan_id);
    	$pertanyaanAll = PertanyaanModel::get_all();
    	$jawaban = JawabanModel::get_all($pertanyaan_id);
    	$id = $pertanyaan_id;
    	return view('isi.jawaban', compact('jawaban', 'pertanyaan', 'pertanyaanAll', 'id'));
    }

    public function store(Request $request) {
    	$isi = $request["isi"];
    	$user_id = $request["nama"];
    	$question_id = $request["question_id"];
    	$data = array('isi'=>$isi, 'user_id'=>$user_id, 'question_id' => $question_id);
    	
    	$simpan = JawabanModel::simpan($data);

    	return redirect('/jawaban/'.$question_id);
    }
}
