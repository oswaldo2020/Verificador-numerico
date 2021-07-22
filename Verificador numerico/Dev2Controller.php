<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dev2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $dataNumbers)
    {

        $desarrollo =[];
        
        if((! $dataNumbers->filled('repit_numeric')) || (!$dataNumbers->filled('numbers1')) || (!$dataNumbers->filled('numbers2')) ){
        return view('dev.dev2', compact('desarrollo') ); }
       
        $numeros1 = explode(',',$dataNumbers->numbers1);
        $numeros2 = explode(',',$dataNumbers->numbers2); 
        $howMany1 = count($numeros1);
        $howMany2 = count($numeros2);

        $desarrollo2 = $this->comparationNumber ($dataNumbers->repit_numeric, $howMany1, $howMany2, $numeros1, $numeros2);
        return view('dev.dev2', ['desaInt'=>$desarrollo2]);
    }

    function comparationNumber ($repit_numeric, $howMany1, $howMany2, $numeros1, $numeros2) {           
        $repetidos = [];
        $noRepetidos= [];
            for($x=0;$x<$howMany1;$x++){
                $a = $numeros1[$x];  
                $cumple=true;
                $operador = '';
                    for($y = 0;$y<$howMany2;$y++){
                        $b= $numeros2[$y];
                        switch($repit_numeric){
                            case 'repetidos':
                                if ($a == $b){
                                   array_push($repetidos,$a); 
                                }
                                break; 
                                case 'no_repetidos':
                                    if ($a == $b){
                                         $cumple=false;
                                    }    
                                break;
                        }
                    }
                if($cumple==true){    
                  array_push($noRepetidos,$a);
                } 
            } 
            if($repit_numeric == 'repetidos')
            {
                return $repetidos;}
                elseif($repit_numeric == 'no_repetidos'){
                return $noRepetidos;}
    }

    
    function generateStruct2($order,$pos, $aux ){
        switch ($order) {
        case 'repetidos':
            return $pos == $aux;
            break;
            case 'no_repetidos':
            return $pos != $aux;
            break;
        }
    }
}