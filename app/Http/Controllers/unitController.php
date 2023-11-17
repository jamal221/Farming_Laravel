<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\farm;
use App\Models\unit;
use App\Models\abiari;
use Illuminate\Support\Facades\Validator;


class unitController extends Controller
{
    //
    public function regFarm(Request $request)
    {
        // if($request->ajax())
        if($request->id_ajax)
        {
            $id_user=$request->id_ajax;
            $user_fetched=user::where('id',$id_user)->get();
            $fetched_farm=farm::where('UserID','=',$id_user)->get();
            // dd( $user_fetched);
            return view('pages.defineFarm', compact('user_fetched','fetched_farm'));
        }
    }
    public function regUnitforFarm(Request $request){
        if($request->id_farm)
        {
            $id_farm=$request->id_farm;
            $fetched_farm=farm::where('id','=',$id_farm)->get();
            // dd( $user_fetched);
            return view('pages.regUnit', compact('fetched_farm'));
        }

    }
    public function RegFarmOfUser(Request $request){
        // dd($request);
        $validator = Validator::make($request->all(), [
            'costumerName'  =>'required',
            'costumerFamily' => 'required',
            'farmSize'=>'required',
            'unitNum'=>'required|min:1',
        ]);
        if ($validator->passes()) {
            // dd($request);
            $input = $request->all();
            //dd($input);
            $comp_new = new farm();
            $comp_new->farm_size = $input['farmSize'];
            $comp_new->farm_unit= $input['unitNum'];
            $comp_new->UserID= $input['costumerID'];
//            dd($album_name->album_name);
            if($comp_new->save()) {
                return back()->with('Transaction_Response_farm', 'The new Farm for this user  has been successfully registered');
                
            }
            else
            {
                return back()->with('Transaction_Response_farm_fail','The is an error during regesring this user');
            }


            return route()->back();
//            return response()->json(['success'=>'done']);

        }
        
        
    }
    public function regfarmform(){
        $fetch_user=farm::all();
        return view('pages.defineFarm', compact('fetch_farm'));
    }

    public function regUnitDetails(Request $request){
            $input = $request->all();
            //dd($input);
            $comp_new = new unit();
            $comp_new->unitID = $input['unit_id_input'];
            $comp_new->electrical_conductivity = $input['electrical_conductivity'];
            $comp_new->size_hektare = $input['size_hektare'];
            $comp_new->Soil_acidity= $input['Soil_acidity'];
            $comp_new->Number_main_irrigation= $input['Number_of_main_irrigation'];
            $comp_new->soil_pattern= $input['soil_pattern'];
            $comp_new->Genetic_profile=$input['Genetic_profile'];
            $comp_new->Lime=$input['Lime'];
            $comp_new->Number_plants_trees=$input['Number_of_plants_trees'];
            $comp_new->organic_matter=$input['organic_matter'];
            $comp_new->planting_year=$input['planting_year'];
            $comp_new->Nitrate=$input['Nitrate'];
            $comp_new->Year_operation=$input['Year_operation'];
            $comp_new->nitrogen=$input['nitrogen'];
            $comp_new->Age_plant_tree=$input['Age_plant_tree'];
            $comp_new->phosphorus=$input['phosphorus'];
            $comp_new->Average_plant_tree_height=$input['Average_plant_tree_height'];
            $comp_new->potassium=$input['potassium'];
            $comp_new->average_diameter=$input['average_diameter'];
            $comp_new->Calcium=$input['Calcium'];
            $comp_new->Unit_coordinates=$input['Unit_coordinates'];
            $comp_new->magnesium=$input['magnesium'];
            $comp_new->number_of_soil=$input['number_of_soil'];
            $comp_new->sulfur=$input['sulfur'];
            $comp_new->Soil_moisture=$input['Soil_moisture'];
            $comp_new->iron=$input['iron'];
            $comp_new->diameter_of_pipes=$input['diameter_pipes'];
            $comp_new->zinc=$input['zinc'];
            $comp_new->dropper=$input['dropper'];
            $comp_new->Manganese=$input['Manganese'];
            $comp_new->Number_drippers=$input['Number_of_drippers'];
            $comp_new->copper=$input['copper'];
            $comp_new->total_number_droppers=$input['total_number'];
            $comp_new->Bor=$input['Bor'];
            $comp_new->Dropper_flow_rate=$input['Dropper'];
            $comp_new->sodium=$input['sodium'];
            $comp_new->flow_rate_single=$input['flow_rate_of_single'];
            $comp_new->Sodium_Absorption=$input['Sodium_Absorption'];
            $comp_new->FarmID=$input['farm_id_input'];
            if($comp_new->save()) {
                return back()->with('Transaction_Response_unit_add', 'The new unit  has been successfully registered');
                
            }
            else
            {
                return back()->with('Transaction_Response_unit_add_fail','The is an error during registering this unit');
            }


            return route()->back();
//            return response()->json(['success'=>'done']);

    }

    public function regUnitDetailsIrrigation(Request $request){
        $input = $request->all();
            //dd($input);
            $class_new = new abiari();
            $class_new->unitID = $input['unit_id_input'];
            $class_new->duration=$input['Irrigation_Period'];
            $class_new->time=$input['Irrigation_duration'];
            $class_new->methods=$input['Irrigation_Method'];
            $class_new->priority=$input['Irrigation_priority'];
            $class_new->farmID=$input['farm_id_input'];
            $class_new->unneeded_status=$input['unneededـirrigation'];
            $class_new->turn_key=$input['Manual_key'];
            
            if($class_new->save()) {
                return back()->with('Transaction_Response_abiari_add', 'The new irrigation unit  has been successfully registered');
                
            }
            else
            {
                return back()->with('Transaction_Response_abiari_add_fail','The is an error during registering this irrigation unit');
            }


            return route()->back();
//            return response()->json(['success'=>'done']);
    }
}
