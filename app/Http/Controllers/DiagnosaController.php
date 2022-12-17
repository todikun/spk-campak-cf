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
        $campakBayi = array();
        
        // rubeola
        $rubeola = array();

        // rubella
        $rubella = array();

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
        
        $resultBayi = array(
            'nama' => 'Campak Bayi atau Roseola Infantum',
            'kepercayaan' => $this->rumus($campakBayi),
        );

        $resultRubeola = array(
            'nama' => 'Campak Rubeola',
            'kepercayaan' => $this->rumus($rubeola),
        );

        $resultRubella = array(
            'nama' => 'Campak Rubella',
            'kepercayaan' => $this->rumus($rubella),
        );

        dd($resultBayi, $resultRubeola, $resultRubella);
        
    }

    private function rumus(array $data)
    {
        $combine = array();
        $result = 0;

        if (sizeof($data) == 2) {
            $tempCombine = $data[0]['total'] + $data[1]['total'] * (1 - $data[0]['total']);
            array_push($combine, $tempCombine);
            $result = $combine[sizeof($combine) - 1];
        } else if (sizeof($data) > 2) {
            $index = 1;
            for ($i = 0; $i < sizeof($data); $i++) {
                if ($i == 0) {
                    $tempCombine = $data[0]['total'] + $data[1]['total'] * (1 - $data[0]['total']);
                    array_push($combine, $tempCombine);
                    $result = $combine[sizeof($combine) - 1];
                } else {
                    if ($i == 1) {
                        $tempCombine = $data[2]['total'] + $combine[0] * (1 - $data[2]['total']);
                        // dd($data[$index]['total']);
                        array_push($combine, $tempCombine);
                        $result = $combine[sizeof($combine) - 1];
                        // dd($tempCombine);
                    } else {
                        // cek kalo udah kondisi terkahir langsung berhenti looping
                        if ($i + 1 == sizeof($data)) {
                            break;
                        }
                        
                        $tempCombine = $data[2 + $index]['total'] + $combine[sizeof($combine) - 1] * (1 - $data[2 + $index]['total']);
                        
                        array_push($combine, $tempCombine);
                        $result = $combine[sizeof($combine) - 1];
                        $index++;
                    }
                }
            }
            
        }

        return $result * 100;
    }

}

