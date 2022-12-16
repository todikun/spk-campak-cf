<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Gejala, Nilai, Diagnosa, Penyakit};

class DiagnosaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::orderBy('id', 'ASC')->get();
        return view('pages.diagnosa.index', compact('gejala'));
    }

    public function diagnosa(Request $request)
    {
        $tempPenyakit = array();
        $penyakit = array();
        $total = array();
        $combine = 0;
        $result = array();

        if (!$request->gejala || sizeof($request->gejala) == 1) {
            return 'Penyakit tidak diketahui, karena informasi gejala kurang!';
        } else {
            foreach ($request->gejala as $gejala) {
                // ambil id penyakit
                $nilai = Nilai::where('gejalaid', $gejala)->get();
                foreach ($nilai as $item) {
                    array_push($tempPenyakit, $item->penyakitid);
                }

                // ambil total
                $gejala = Gejala::find($gejala);
                array_push($total, $gejala->nilai->total);
            }
        }

        // hapus penyakit id yg sama
        array_push($penyakit, array_unique($tempPenyakit));

        // rumus
        for ($i = 0; $i < sizeof($penyakit); $i++) { 
            for ($j = 0; $j < sizeof($request->gejala); $j++) { 
                if (sizeof($request->gejala) == 2) {
                    $combine = $total[$j] + $total[$j++] * (1 - $total[$j]);
                }
            }

            $kodePenyakit = Penyakit::find($penyakit[$i]);
            array_push($result, array(
                'kode' => $kodePenyakit[0]['kode'],
                'nama' => $kodePenyakit[0]['nama'],
                'kepercayaan' => $combine * 100,
            ));
        }


        dd($result);
    }
}

