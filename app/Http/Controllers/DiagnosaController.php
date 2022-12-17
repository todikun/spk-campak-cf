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
        // campak bayi
        $tempCombineBayi = array();
        $campakBayi = array();
        $combineBayi = 0;
        
        // rubeola
        $tempCombineRubeola = array();
        $rubeola = array();
        $combineRubeola = 0;

        // rubella
        $tempCombineRubella = array();
        $rubella = array();
        $combineRubella = 0;

        $result = array();
        
        if (!$request->gejala || sizeof($request->gejala) == 1) {
            return 'Penyakit tidak diketahui, karena informasi gejala kurang!';
        } else {
            foreach ($request->gejala as $gejala) {
                // ambil id penyakit
                $tempCampakBayi = Nilai::where('gejalaid', $gejala)->where('penyakitid', 1)->first();
                $tempRubeola = Nilai::where('gejalaid', $gejala)->where('penyakitid', 2)->first();
                $tempRubella = Nilai::where('gejalaid', $gejala)->where('penyakitid', 3)->first();
                
                // masukan ke temp
                $tempCampakBayi != null ? array_push($campakBayi, $tempCampakBayi) : null;
                $tempRubeola != null ? array_push($rubeola, $tempRubeola) : null;
                $tempRubella != null ? array_push($rubella, $tempRubella) : null;
            }
        }

        // dd($campakBayi[2], $rubeola ,$rubella);
        // dd(sizeof($campakBayi));

        if (sizeof($campakBayi) == 2) {
            $tempCombine = $campakBayi[0]['total'] + $campakBayi[1]['total'] * (1 - $campakBayi[0]['total']);
            array_push($tempCombineBayi, $tempCombine);
            $combineBayi = $tempCombineBayi[sizeof($tempCombineBayi) - 1];
        } else if (sizeof($campakBayi) > 2) {
            $index = 1;
            for ($i = 0; $i < sizeof($campakBayi); $i++) {
                if ($i == 0) {
                    $tempCombine = $campakBayi[0]['total'] + $campakBayi[1]['total'] * (1 - $campakBayi[0]['total']);
                    array_push($tempCombineBayi, $tempCombine);
                    $combineBayi = $tempCombineBayi[sizeof($tempCombineBayi) - 1];
                } else {
                    if ($i == 1) {
                        $tempCombine = $campakBayi[2]['total'] + $tempCombineBayi[0] * (1 - $campakBayi[2]['total']);
                        // dd($campakBayi[$index]['total']);
                        array_push($tempCombineBayi, $tempCombine);
                        $combineBayi = $tempCombineBayi[sizeof($tempCombineBayi) - 1];
                        // dd($tempCombine);
                    } else {
                        // cek kalo udah kondisi terkahir langsung berhenti looping
                        if ($i + 1 == sizeof($campakBayi)) {
                            break;
                        }
                        
                        $tempCombine = $campakBayi[2 + $index]['total'] + $tempCombineBayi[sizeof($tempCombineBayi) - 1] * (1 - $campakBayi[2 + $index]['total']);
                        
                        array_push($tempCombineBayi, $tempCombine);
                        $combineBayi = $tempCombineBayi[sizeof($tempCombineBayi) - 1];
                        $index++;
                    }
                }
            }
            
        }

        // dd($combineBayi);
        dd($tempCombineBayi);
        
        // dd(0.60 + 0.8176 * (1 - 0.60));
        // dd($tempCombine);
        
    }
}

