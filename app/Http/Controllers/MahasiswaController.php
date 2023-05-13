<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $data = DB::table('mahasiswa')->get();
        return [
            'success' => true,
            'status' => 200,
            'message' => 'request data success',
            'data' => $data
        ];
    }

    public function getByID($id)
    {
        $data = DB::table('mahasiswa')->where('nim', $id)->first();
        if ($data) {
            return response()->json($data);
        } else {
            return response()
                ->json([
                    'success' => false,
                    'status' => 404,
                    'message' => 'Data not found'
                ], 404);
        }
    }

    public function insert()
    {
        $data = request()->all();
        $mhs = [
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'jurusan' => $data['jurusan'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'telepon' => $data['telepon']
        ];
        try {
            DB::table('mahasiswa')->insert($mhs);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'insert mahasiswa sukses'
            ];
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()
                ->json([
                    'success' => false,
                    'status' => 400,
                    'message' => $message
                ], 400);
        }
    }

    public function update($id)
    {
        $data = request()->all();
        $mhs = [
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'jurusan' => $data['jurusan'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'telepon' => $data['telepon']
        ];
        try {
            DB::table('mahasiswa')
                ->where('nim', $id)
                ->update($mhs);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'update mahasiswa sukses'
            ];
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()
                ->json([
                    'success' => false,
                    'status' => 400,
                    'message' => $message
                ], 400);
        }
    }

    public function delete($id)
    {
        try {
            DB::table('mahasiswa')
                ->where('nim', $id)
                ->delete();
            return [
                'success' => true,
                'status' => 201,
                'message' => 'delete mahasiswa sukses'
            ];
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()
                ->json([
                    'success' => false,
                    'status' => 400,
                    'message' => $message
                ], 400);
        }
    }
}
