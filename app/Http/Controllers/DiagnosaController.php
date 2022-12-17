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

        $tempCombine = array();
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

        // dd($campakBayi[2], $rubeola ,$rubella);
        // dd(sizeof($campakBayi));

        if (sizeof($campakBayi) == 2) {
            $combine = $campakBayi[0]['total'] + $campakBayi[1]['total'] * (1 - $campakBayi[0]['total']);
        } else {
            $index = 1;
            for ($i = 0; $i < sizeof($campakBayi); $i++) {
                if ($i == 0) {
                    $tempCombineAwal = $campakBayi[0]['total'] + $campakBayi[1]['total'] * (1 - $campakBayi[0]['total']);
                    // array_push($tempCombineAwal, $tempCombine);
                    // dd($tempCombineAwal);
                } else {
                    if ($i == 1) {
                        $tempCombineNext = $campakBayi[2]['total'] + $tempCombineAwal * (1 - $campakBayi[2]['total']);
                        // dd($campakBayi[$index]['total']);
                        array_push($tempCombine, $tempCombineNext);
                        // dd($tempCombineNext);
                    } else {

                        // cek kalo udah kondisi terkahir langsung berhenti looping
                        if ($i + 1 == sizeof($campakBayi)) {
                            break;
                        }
                        
                        $tempCombineNext = $campakBayi[2 + $index]['total'] + $tempCombine[sizeof($tempCombine) - 1] * (1 - $campakBayi[2 + $index]['total']);
                        
                        array_push($tempCombine, $tempCombineNext);
                        array_push($combine, $tempCombineNext);
                        $index++;
                    }
                }
            }
            
        }

        // dd($tempCombine);
        dd($combine);
        // dd(0.60 + 0.8176 * (1 - 0.60));
        // dd($tempCombine);
        // dd($tempCombineNext);
        
    }
}

