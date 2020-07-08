<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JawabanModel extends Model
{
    public static function get_all($pertanyaan) {
    	$jawaban = DB::table('answers')
		            ->leftJoin('users', 'answers.user_id', '=', 'users.id')
		            ->select('isi', 'name')
		            ->where('question_id', $pertanyaan)
		            ->get();
    	return $jawaban;
    }

    public static function simpan($data) {
    	$tambah = DB::table('answers')->insert($data);

    	return $tambah;
    }


}
