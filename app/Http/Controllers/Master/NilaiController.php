<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Nilai, Gejala, Penyakit};

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Nilai::get();
        return view('pages.nilai.index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gejala = Gejala::get();
        $penyakit = Penyakit::get();
        return view('pages.nilai.create', compact('gejala', 'penyakit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'penyakitid' => 'required',
            'gejalaid' => 'required',
            'cf_pakar' => 'required|numeric',
            'cf_pasien' => 'required|numeric',
        ]);

        Nilai::create([
            'penyakitid' => $request->penyakitid,
            'gejalaid' => $request->gejalaid,
            'cf_pakar' => $request->cf_pakar,
            'cf_pasien' => $request->cf_pasien,
            'total' => $request->cf_pakar * $request->cf_pasien,
        ]);

        return back()->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gejala = Gejala::get();
        $penyakit = Penyakit::get();
        $nilai = Nilai::find($id);
        return view('pages.nilai.edit', compact('gejala', 'penyakit', 'nilai'));
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
        $request->validate([
            'penyakitid' => 'required',
            'gejalaid' => 'required',
            'cf_pakar' => 'required|numeric',
            'cf_pasien' => 'required|numeric',
        ]);

        $nilai = Nilai::find($id);
        $nilai->update([
            'penyakitid' => $request->penyakitid,
            'gejalaid' => $request->gejalaid,
            'cf_pakar' => $request->cf_pakar,
            'cf_pasien' => $request->cf_pasien,
            'total' => $request->cf_pakar * $request->cf_pasien,
        ]);

        return back()->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(403);
    }
}
