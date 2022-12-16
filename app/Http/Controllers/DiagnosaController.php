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
        $combine = array();
        $result = array();

        $campakBayi = array();
        $rubeola = array();
        $rubella = array();

        if (!$request->gejala || sizeof($request->gejala) == 1) {
            return 'Penyakit tidak diketahui, karena informasi gejala kurang!';
        } else {
            foreach ($request->gejala as $gejala) {
                // ambil id penyakit
                $tempCampakBayi = Nilai::where('gejalaid', $gejala)->where('penyakitid', 1)->first();
                $tempRubeola = Nilai::where('gejalaid', $gejala)->where('penyakitid', 2)->first();
                $tempRubella = Nilai::where('gejalaid', $gejala)->where('penyakitid', 3)->first();
                
                $tempCampakBayi != null ? array_push($campakBayi, $tempCampakBayi) : null;
                $tempRubeola != null ? array_push($rubeola, $tempRubeola) : null;
                $tempRubella != null ? array_push($rubella, $tempRubella) : null;
                
                // ambil total
                $gejala = Gejala::find($gejala);
                array_push($total, $gejala->nilai->total);
            }
        }

        // dd($campakBayi[1]['total'], $rubeola ,$rubella);
        // dd(sizeof($campakBayi));

        if (sizeof($campakBayi) == 2) {
            $combine = $campakBayi[0]['total'] + $campakBayi[1]['total'] * (1 - $campakBayi[0]['total']);
        } else {
            $index = 0;
            for ($i = 0; $i < sizeof($campakBayi); $i++) {
                if ($i == 0) {
                    $tempCombineAwal = $campakBayi[0]['total'] + $campakBayi[1]['total'] * (1 - $campakBayi[0]['total']);
                    // array_push($tempCombineAwal, $tempCombine);
                    // dd($tempCombineAwal);
                } else if ($i > 1) {
                    $tempCombineNext = $campakBayi[$index]['total'] + $tempCombineAwal * (1 - $campakBayi[$index]['total']);
                    array_push($combine, $tempCombineNext);
                    $index++;
                }
            }
            
        }
        dd($combine);
        // dd($tempCombineNext);


        // hapus penyakit id yg sama
        array_push($penyakit, array_unique($tempPenyakit));

        // rumus
        for ($i = 0; $i < sizeof($penyakit); $i++) { 
            $tempCombine = array();
            for ($j = 0; $j < sizeof($request->gejala); $j++) { 
                if (sizeof($total) == 2) {
                    $combine = $total[$j] + $total[$j++] * (1 - $total[$j]);
                } else {
                    if ($j < 1) {
                        $combine = $total[0] + $total[1] * (1 - $total[$j]);
                        array_push($tempCombine, $combine);
                    } else {

                    }
                }
            }

            $kodePenyakit = Penyakit::find($penyakit[$i]);
            array_push($result, array(
                'kode' => $kodePenyakit[0]['kode'],
                'nama' => $kodePenyakit[0]['nama'],
                'kepercayaan' => $combine * 100,
            ));
        }


        // dd($result);
    }
}

