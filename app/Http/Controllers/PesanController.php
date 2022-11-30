<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesan = Pesan::all();
        return $pesan;
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
        $table = Pesan::create([
            'menu_pesanan' => $request->menu_pesanan,
            'jumlah' => $request->jumlah,
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'pesanan berhasil disimpan',
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
        $pesan = Pesan::find($id);
        if ($pesan) {
            return response()->json([
                'status' => 200,
                'data' => $pesan

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
        $pesan = Pesan::find($id);
        if ($pesan){
            $pesan->menu_pesanan = $request->menu_pesanan ? $request->menu_pesanan : $request->menu_pesanan;
            $pesan->jumlah = $request->jumlah ? $request->jumlah : $request->jumlah;
            $pesan->save();
            return response()->json([
                'status' => 200,
                'data' => $pesan
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
        $pesan = Pesan::where('id', $id)->first();
        if($pesan){
            $pesan->delete();
            return response()->json([
                'status' => 200,
                'data' => $pesan
            ], 200);

        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . ' tidak ditemukan'
            ], 404);
        }
    }
}
