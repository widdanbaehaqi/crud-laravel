<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class PertanyaanModel
{
    public static function get_all() {
    	$items = DB::table('questions')
		            ->leftJoin('users', 'questions.user_id', '=', 'users.id')
		            ->select('questions.id as id', 'name', 'judul', 'users.id as user_id')
		            ->orderBy('id', 'desc')
		            ->get();
		return $items;
    }

    public static function simpan($data) {
    	$tambah = DB::table('questions')->insert($data);

    	return $tambah;
    }

    public static function get_isi($pertanyaan) {
    	$isi = DB::table('questions')
		            ->leftJoin('users', 'questions.user_id', '=', 'users.id')
		            ->select('isi', 'judul', 'name', 'questions.id as id', 'questions.created_at as created_at', 'questions.updated_at as updated_at')
		            ->where('questions.id', $pertanyaan)
		            ->first();
    	return $isi;
    }

    public static function update($id, $request) {
        $item = DB::table('questions')
                    ->where('id', $id)
                    ->update([
                        'judul' => $request['judul'],
                        'isi' => $request['isi'],
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
        return $item;
    }

    public static function delete($id) {
        $hapus = DB::table('questions')
                    ->where('id', $id)
                    ->delete();
        return $hapus;
    }
}
