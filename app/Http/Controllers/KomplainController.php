<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\KomplainRequest;
use App\Models\Komplain;
use App\Models\Produk;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class KomplainController extends Controller
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
    public function index(Request $request)
    {
        $data = Komplain::get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function ($row) {
                    return $row->user->nama;
                })
                ->addColumn('status', function ($row) {
                    return ($row->status == true) ? 'Selesai' : 'Belum';
                })
                ->addColumn('action', function ($row) {
                    $button = '<div class="btn-group" role="group">';
                    $button .= '<a href="' .route('komplain.done', $row->id).'" class="btn btn-success btn-sm btn-check btn-edit-halte"><i class="material-icons">check</i></a>';
                    $button .= '<a href="' .route('komplain.undone', $row->id).'" class="btn btn-danger btn-sm btn-check btn-edit-halte"><i class="material-icons">close</i></a>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('komplain.index', compact('data'));
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
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = $this->model->show($id);
            return response()->json(['data' => $data], 200);
        }
        return redirect()->route('halte.index');
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
        $this->model->update([
            'produk_id' => $request->produk_id_edit,
            'nama' => $request->nama_edit,
            'kota' => $request->kota_edit,
            'provinsi' => $request->provinsi_edit,
        ], $id);
        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json(['success' => true], 200);
    }

    public function done($id)
    {
        $this->model->update([
            'status' => true
        ], $id);
        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function undone($id)
    {
        $this->model->update([
            'status' => false
        ], $id);
        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }
}
