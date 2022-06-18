<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KomplainRequest;
use App\Models\Komplain;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Auth;


class KomplainUserController extends Controller
{
    protected $model;

    public function __construct(Komplain $komplain)
    {
        $this->model = new Repository($komplain);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lp.komplain');
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
    public function store(KomplainRequest $request)
    {
        $komplain = new Komplain();
        $komplain->user_id = $request->user_id;
        $komplain->judul = $request->judul;
        $komplain->jenis_komplain = $request->jenis_komplain;
        $komplain->isi = $request->isi;
        $komplain->save();
        
        return redirect()->route('beranda')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
