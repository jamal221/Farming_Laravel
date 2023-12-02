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
use App\Models\dieselPump;
use App\Models\fertilize_tank;

use Illuminate\Support\Facades\DB;
use http\Exception;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Validator;

class FertilizeController extends Controller
{
    //
    public function Fertilizeform(){
        
 
            $fetched_farms=farm::join('users','farm.UserID','=','users.id')
            ->get([
                'farm.id as FarmID',
                'farm.*',
                'users.*'
            ]);
            $fetched_farms_count=farm::get()->count();
            $farms_id=farm::get('id')->toArray();
            $fetched_Fertilized_farm_ID=fertilize_tank::groupBy('farmID')
                                        ->select('farmID',DB::raw('count(*) as count_fram'))
                                        ->get();
            $fetched_Fertilized_farm_ID=json_decode($fetched_Fertilized_farm_ID);
            // dd($fetched_Fertilized_farm_ID);
        return view('pages.Fertilizing.FertilizeFarm', compact('fetched_farms','fetched_farms_count','fetched_Fertilized_farm_ID'));
    }

    public function RegFertilizersCount(Request $request){
        $validator = Validator::make($request->all(), [
            'frt'  =>'required| min:1'
        ]);
        if ($validator->passes()) {
            // dd($request);
            $input = $request->all();
                $update_farm=farm::where('id',$input['FarmID'])->update
                ([
                'FertilizerCount'=>$input['frt'],
                
                ]);
                if($update_farm){
                    echo '<div class="alert alert-success">The Fertilization Count has been registered for this farm </div>';
                }                
        }else{
            // there are some inputs that are not valid, please write prorate feedback
            // return back()->with('Transaction_Response_water_add_fail','Please Fill all of the fields permanently');
            echo '<div class="alert alert-warning"> Please check syntax of the words and careful more and more </div>';

        }

    }

    public function viewDefineFertilizePage(Request $request){
        if($request->id_farm){

            $fetched_farms=farm::join('users','farm.UserID','=','users.id')
            ->where('farm.id',$request->id_farm)
            ->get([
                'farm.id as FarmID',
                'farm.*',
                'users.*'
            ]);
            $fetched_farms=json_decode($fetched_farms);
            $Fertilizer_defined_count=fertilize_tank::get()->count();
            $fetched_Fertilizer=fertilize_tank::where('farmID',$request->id_farm)->get();
            return view('pages.Fertilizing.defineFertilizer', compact('fetched_farms','Fertilizer_defined_count','fetched_Fertilizer'));
           }
    }

    public function RegFertilizer(Request $request){
        $validator = Validator::make($request->all(), [
            'InjectionSystem'  =>'required| min:1',
            'type' => 'required| min:1',
            'fertilizers'=>'required| min:1',
            'tank_amount'=>'required|min:1',
            'input_pip_num'=>'required',
            'out_pip_num'=>'required',
            'control_debby_pip_num'=>'required|min:1',
            'control_debby_pip_num'=>'required| min:1',
            'check_tank_num'=>'required| min:1'
        ]);
        if ($validator->passes()) {
            $input = $request->all();
            $class_new = new fertilize_tank();
            $class_new->InjectionSystem = $input['InjectionSystem'];
            $class_new->type=$input['type'];
            $class_new->fertilizers=$input['fertilizers'];
            $class_new->tank_amount=$input['tank_amount'];
            $class_new->input_pip_num=$input['input_pip_num'];
            $class_new->out_pip_num=$input['out_pip_num'];
            $class_new->control_debby_pip_num=$input['control_debby_pip_num'];
            $class_new->check_tank_num=$input['check_tank_num'];
            $class_new->farmID=$input['FarmID'];
            
            if($class_new->save()) {
                // return back()->with('Transaction_Response_water_add', 'The new water Resource has been successfully registered');
                echo '<div class="alert alert-success">The new Fertilizer has been successfully registered</div>';
                
            }
            else
            {
                // return back()->with('Transaction_Response_water_add_fail','The is an error during registering this water Resource');
                echo '<div class="alert alert-danger">There is a problem during fertilizer installation </div>';
            }
        }
    }

    public function EditFertilizeUnit(Request $request){

        try{
            $update_Fertilize=fertilize_tank::where('id',$request->id_fertilizer)->update
            ([
            'InjectionSystem'=>($request->InjectionSystem),
            'type'=>($request->type),
            'fertilizers'=>($request->fertilizers),
            'tank_amount'=>($request->tank_amount),
            'input_pip_num'=>($request->input_pip_num),
            'out_pip_num'=>($request->out_pip_num),
            'control_debby_pip_num'=>($request->control_debby_pip_num),
            'check_tank_num'=>($request->check_tank_num)
        ]);
        if($update_Fertilize){
            // return back()->with('Transaction_Response_Update_pool', 'The new water Resource has been successfully registered');
            echo '<div class="alert alert-success">The Fertilize Unit has been successfully updated</div>';
        }
        else{
            // return back()->with('Transaction_Response_Update_pool_fail', 'There is an error during update this pit');
            echo '<div class="alert alert-danger">There is an error during update this Fertilize unit</div>';
        }

        }
        catch(\Exception $e){
            Log::error($e);
            // return back()->with('Transaction_Response_Update_pool_fail_syntax', 'In the syntax of your code there is an error');
            echo '<div class="alert alert-warning">There is an warning during update this Fertilize Unit</div>';

        } 
    }
}
