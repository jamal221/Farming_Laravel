<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\farm;
use App\Models\unit;
use App\Models\user;
use App\Models\abiari;
use App\Models\chah;
use App\Models\pool;
use App\Models\makhzan;
use App\Models\river;
use App\Models\netpipe;
use App\Models\channel;
use App\Models\station;
use App\Models\electro_pump;
use Illuminate\Support\Facades\DB;
use http\Exception;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Validator;

class stationPumpcontroller extends Controller
{
    //
    public function viewStation(Request $request){
        if($request->id_farm){
 
            $fetched_farms=farm::join('users','farm.UserID','=','users.id')
            ->where('farm.id',$request->id_farm)
            ->get([
                'farm.id as FarmID',
                'farm.*',
                'users.*'
            ]);
            //  $fetched_farms=json_decode($fetched_farms);
        // dd($fetched_farms);
        
        return view('pages.station.defineStation', compact('fetched_farms'));
        }
    }
    public function viewElectroPump(Request $request){
        if($request->id_farm){
 
            $fetched_farms=farm::join('users','farm.UserID','=','users.id')
            ->where('farm.id',$request->id_farm)
            ->get([
                'farm.id as FarmID',
                'farm.*',
                'users.*'
            ]);
            //  $fetched_farms=json_decode($fetched_farms);
        // dd($fetched_farms);
        
        return view('pages.station.electroPump', compact('fetched_farms'));
        }
        
    }

    public function RegStation(Request $request){
        $validator = Validator::make($request->all(), [
            'BarOut'  =>'required| min:1',
            'BarPresent' => 'required| min:1'
        ]);
        if ($validator->passes()) {
            // dd($request);
            $input = $request->all();
            // dd($input);
            $class_new = new station();
            $class_new->out_BAR = $input['BarOut'];
            $class_new->present_BAR = $input['BarPresent'];
            $class_new->farmID=$input['FarmID'];
            if($class_new->save()) {
                $update_farm=farm::where('id',$input['FarmID'])->update
                ([
                'station'=>(1),
                
                ]);
                if(update_farm){
                    echo '<div class="alert alert-success">The new Station has been registered for this farm </div>';
                }                
            }
            else
            {
                // return back()->with('Transaction_Response_water_add_fail','The is an error during registering this water Resource');
                echo '<div class="alert alert-danger"> There is an error during registration of station </div>';

            }

        }else{
            // there are some inputs that are not valid, please write prorate feedback
            // return back()->with('Transaction_Response_water_add_fail','Please Fill all of the fields permanently');
            echo '<div class="alert alert-warning"> Please check syntax of the words and careful more and more </div>';

        }
    }

    public function RegElectroPump(Request $request){
        $validator = Validator::make($request->all(), [
            'model'  =>'required| min:1',
            'Voltage' => 'required| min:1',
            'Frequency' => 'required| min:1',
            'Phase' => 'required| min:1',
            'Current' => 'required| min:1',
            'Power_factor' => 'required| min:1',
            'kw1' => 'required| min:1',
            'HP1' => 'required| min:1',
            'Duty' => 'required| min:1',
            'SN1' => 'required| min:1'
                ]);
        if ($validator->passes()) {
            $get_Station_ID=station::where('farmID',$request->FarmID)->get('id');
            // dd($get_Station_ID[0]['id']);
                    $input = $request->all();
                    $class_new = new electro_pump();
                    $class_new->model = $input['model'];
                    $class_new->Voltage = $input['Voltage'];
                    $class_new->Frequency = $input['Frequency'];
                    $class_new->Phase= $input['Phase'];
                    $class_new->Current= $input['Current'];
                    $class_new->Power_factor= $input['Power_factor'];
                    $class_new->kw= $input['kw1'];
                    $class_new->HP= $input['HP1'];
                    $class_new->Duty= $input['Duty'];
                    $class_new->SN= $input['SN1'];
                    $class_new->farmID=$input['FarmID'];
                    $class_new->stationID=$get_Station_ID[0]['id'];
                    if($class_new->save()) {
                        echo '<div class="alert alert-success">The new Electro Pump has been registered for this Station </div>';              
                    }
                    else
                    {
                        // return back()->with('Transaction_Response_water_add_fail','The is an error during registering this water Resource');
                        echo '<div class="alert alert-danger"> There is an error during registration of station </div>';
        
                    }
        
                }else{
                    // there are some inputs that are not valid, please write prorate feedback
                    // return back()->with('Transaction_Response_water_add_fail','Please Fill all of the fields permanently');
                    echo '<div class="alert alert-warning"> Please check syntax of the words and careful more and more </div>';
        
                }

    }
}
