<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArmadaRequest;
use App\Models\Armada;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ArmadaController extends Controller
{
    protected $model;

    public function __construct(Armada $armada)
    {
        $this->model = new Repository($armada);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Armada::get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $button = '<div class="btn-group" role="group">';
                    $button .= '<a href="javascript:void(0)" data-toggle="modal" data-id="' . $row->id . '" data-target="#editArmadaModal" data-url="armada/' . $row->id . '" class="btn btn-sm btn-info btn-edit-armada"><i class="material-icons">edit</i></a>';
                    $button .= '<a href="javascript:void(0)" data-toggle="modal" data-id="' . $row->id . '" data-target="#deleteArmadaModal" class="btn btn-sm btn-danger btn-delete-armada"><i class="material-icons">delete</i></a>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('armada.index', compact('data'));
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
    public function store(ArmadaRequest $request)
    {
        $this->model->create($request->only(['nama','stock', 'tarif']));
        return redirect()->route('armada.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = $this->model->show($id);
            return response()->json(['data' => $data], 200);
        }
        return redirect()->route('armada.index');
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
        return redirect()->route('armada.index');
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
            'nama' => $request->nama,
            'stock' => $request->stock_edit,
            'tarif' => $request->tarif_edit,
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
}
