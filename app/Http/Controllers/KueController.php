<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kue;

class KueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kue = Kue::all();
        return $kue;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Kue::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'expired' => $request->expired,
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kue = Kue::find($id);
        if ($kue) {
            return response()->json([
                'status' => 200,
                'data' => $kue

            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id diatas ' . $id . ' tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $kue = Kue::find($id);
        if ($kue){
            $kue->nama = $request->nama ? $request->nama : $request->nama;
            $kue->jenis = $request->jenis ? $request->jenis : $request->jenis;
            $kue->deskripsi = $request->deskripsi ? $request->deskripsi : $request->deskripsi;
            $kue->expired = $request->expired ? $request->expired : $request->expired;
            $kue->save();
            return response()->json([
                'status' => 200,
                'data' => $kue
            ], 200);

        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . ' tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kue = Kue::where('id', $id)->first();
        if($kue){
            $kue->delete();
            return response()->json([
                'status' => 200,
                'data' => $kue
            ], 200);

        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . ' tidak ditemukan'
            ], 404);
        }
    }
}
