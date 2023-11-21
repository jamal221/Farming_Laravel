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
use Illuminate\Support\Facades\DB;
use http\Exception;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Validator;

class settingsController extends Controller
{
    //
    public function RegPompform(){
        $fetched_farms=farm::join('users','farm.UserID','=','users.id')
        ->get([
            'farm.id as FarmID',
            'farm.*',
            'users.*'
                ]);
        return view('pages.station.pumpFarmList', compact('fetched_farms'));
    }
    public function RegIrrigationform(){
        $new_farm= new farm();
        $new_user=new user();
        $fetched_farms=farm::join('users','farm.UserID','=','users.id')->get([
            'farm.id as FarmID',
            'farm.*',
            'users.*'
        ]);
        // dd($fetched_farms);
        return view('pages.Irrigation', compact('fetched_farms'));

    }
    public function regFarmIrrigation(Request $request){
       if($request->id_farm){

        $fetched_farms=farm::join('users','farm.UserID','=','users.id')
        ->where('farm.id',$request->id_farm)
        ->get([
            'farm.id as FarmID',
            'farm.*',
            'users.*'
        ]);

        $fetched_unit_irrigated=abiari::where('farmID',$request->id_farm )->pluck('unitID')->toArray();
        $fetched_unit_irrigated_count=abiari::where('farmID','=',$request->id_farm )->count();
        // dd($fetched_unit_irrigated);
        
        $fetched_farms=json_decode($fetched_farms);
        // dd($fetched_farms);
        
        return view('pages.IrrigationUnit', compact('fetched_farms','fetched_unit_irrigated', 'fetched_unit_irrigated_count'));
       }
        
        

    }

    public function WaterResorcesform(){
        $fetched_farms=farm::join('users','farm.UserID','=','users.id')
        ->get([
            'farm.id as FarmID',
            'farm.*',
            'users.*'
                ]);
        return view('pages.waterResources', compact('fetched_farms'));

    }

    public function regWaterResources(Request $request){
        if($request->id_farm){

            $fetched_farms=farm::join('users','farm.UserID','=','users.id')
            ->where('farm.id',$request->id_farm)
            ->get([
                'farm.id as FarmID',
                'farm.*',
                'users.*'
            ]);
            $count_pits=chah::where('farmID',$request->id_farm)->count();
            $count_pool=pool::where('farmID',$request->id_farm)->count();
            $count_tank=makhzan::where('farmID',$request->id_farm)->count();
            $count_river=river::where('farmID',$request->id_farm)->count();
            $count_pipe=netpipe::where('farmID',$request->id_farm)->count();
            $count_channel=channel::where('farmID',$request->id_farm)->count();
            $fetched_farms=json_decode($fetched_farms);
            // dd($count_pits);
            
            return view('pages.waterResourceFarm', compact('fetched_farms','count_pits','count_pool','count_tank','count_river','count_pipe','count_channel'));
           }
    }

    public function regChah(Request $request) {
        // dd($request);
        $input = $request->all();
            //dd($input);
            $class_new = new chah();
            $class_new->type = $input['pit_type'];
            $class_new->bodyType=$input['pit_body'];
            $class_new->diameter=$input['Diameter'];
            $class_new->chahHeight=$input['pit_height'];
            $class_new->year=$input['drilling_year'];
            $class_new->useYear=$input['apply_year'];
            $class_new->waterHeight=$input['water_height'];
            $class_new->wateramount=$input['incide_water'];
            $class_new->water_permission_amount=$input['permission_water'];
            $class_new->farmID=$input['farm_id_input'];
            
            if($class_new->save()) {
                return back()->with('Transaction_Response_water_add', 'The new water Resource has been successfully registered');
                
            }
            else
            {
                return back()->with('Transaction_Response_water_add_fail','The is an error during registering this water Resource');
            }


            return route()->back();
//            return response()->json(['success'=>'done']);
        
    }
    public function regPool(Request $request){
        $validator = Validator::make($request->all(), [
            'pool_type'  =>'required| min:1',
            'length' => 'required| min:1',
            'width'=>'required| min:1',
            'deep'=>'required|min:1',
            'YearMade'=>'required',
            'YearUse'=>'required',
            'water_height'=>'required|min:1',
            'inside_water'=>'required| min:1',
            'permission_water'=>'required| min:1'
        ]);
        if ($validator->passes()) {
            // dd($request);
            $input = $request->all();
            //dd($input);
            $class_new = new pool();
            $class_new->type_pool = $input['pool_type'];
            $class_new->lenght=$input['length'];
            $class_new->width=$input['width'];
            $class_new->depth=$input['deep'];
            $class_new->buildTime=$input['YearMade'];
            $class_new->applyTime=$input['YearUse'];
            $class_new->water_height=$input['water_height'];
            $class_new->inside_water=$input['inside_water'];
            $class_new->water_permission_amount=$input['permission_water'];
            $class_new->farmID=$input['farm_id_input'];
            
            if($class_new->save()) {
                return back()->with('Transaction_Response_water_add', 'The new water Resource has been successfully registered');
                
            }
            else
            {
                return back()->with('Transaction_Response_water_add_fail','The is an error during registering this water Resource');
            }

        }else{
            // there are some inputs that are not valid, please write prorate feedback
            return back()->with('Transaction_Response_water_add_fail','Please Fill all of the fields permanently');
        }
        // dd($request);
    }

    public function regTank(Request $request){
        $validator = Validator::make($request->all(), [
            'tank_type'  =>'required| min:1',
            'length' => 'required| min:1',
            'width'=>'required| min:1',
            'height'=>'required|min:1',
            'YearMade'=>'required',
            'YearUse'=>'required',
            'water_height'=>'required|min:1',
            'inside_water'=>'required| min:1',
            'permission_water'=>'required| min:1'
        ]);
        if ($validator->passes()) {
            // dd($request);
            $input = $request->all();
            //dd($input);
            $class_new = new makhzan();
            $class_new->type_tank = $input['tank_type'];
            $class_new->length=$input['length'];
            $class_new->width=$input['width'];
            $class_new->height=$input['height'];
            $class_new->buildTime=$input['YearMade'];
            $class_new->applyTime=$input['YearUse'];
            $class_new->water_height=$input['water_height'];
            $class_new->inside_water=$input['inside_water'];
            $class_new->water_permission_amount=$input['permission_water'];
            $class_new->farmID=$input['farm_id_input'];
            
            if($class_new->save()) {
                return back()->with('Transaction_Response_water_add', 'The new water Resource has been successfully registered');
                
            }
            else
            {
                return back()->with('Transaction_Response_water_add_fail','The is an error during registering this water Resource');
            }

        }else{
            // there are some inputs that are not valid, please write prorate feedback
            return back()->with('Transaction_Response_water_add_fail','Please Fill all of the fields permanently');
        }
        // dd($request);
    }

    public function regRiver(Request $request){
        $validator = Validator::make($request->all(), [
            'depth'  =>'required| min:1',
            'Pipe' => 'required| min:1',
            'height'=>'required| min:1',
            'permission_water'=>'required| min:1'
        ]);
        if ($validator->passes()) {
            // dd($request);
            $input = $request->all();
            //dd($input);
            $class_new = new river();
            $class_new->sensor_depth = $input['depth'];
            $class_new->pip_size=$input['Pipe'];
            $class_new->height=$input['height'];
            $class_new->water_permission_amount=$input['permission_water'];
            $class_new->farmID=$input['farm_id_input'];
            
            if($class_new->save()) {
                return back()->with('Transaction_Response_water_add', 'The new water Resource has been successfully registered');
                
            }
            else
            {
                return back()->with('Transaction_Response_water_add_fail','The is an error during registering this water Resource');
            }

        }else{
            // there are some inputs that are not valid, please write prorate feedback
            return back()->with('Transaction_Response_water_add_fail','Please Fill all of the fields permanently');
        }
        // dd($request);
    }

    public function regPipe(Request $request){
        $validator = Validator::make($request->all(), [
            'pipeType'  =>'required| min:1',
            'diameterIrrigate' => 'required| min:1',
            'diameterWater'=>'required| min:1',
            'permission_water'=>'required| min:1'
        ]);
        if ($validator->passes()) {
            // dd($request);
            $input = $request->all();
            //dd($input);
            $class_new = new netpipe();
            $class_new->type = $input['pipeType'];
            $class_new->netpipD=$input['diameterIrrigate'];
            $class_new->pipwaterD=$input['diameterWater'];
            $class_new->water_permission_amount=$input['permission_water'];
            $class_new->farmID=$input['farm_id_input'];
            
            if($class_new->save()) {
                return back()->with('Transaction_Response_water_add', 'The new water Resource has been successfully registered');
                
            }
            else
            {
                return back()->with('Transaction_Response_water_add_fail','The is an error during registering this water Resource');
            }

        }else{
            // there are some inputs that are not valid, please write prorate feedback
            return back()->with('Transaction_Response_water_add_fail','Please Fill all of the fields permanently');
        }
        // dd($request);
    }

    public function regChannel(Request $request){
        $validator = Validator::make($request->all(), [
            'channelWidth'  =>'required| min:1',
            'pipSize' => 'required| min:1',
            'waterHeightSensor'=>'required| min:1',
            'channelType'=>'required| min:1',
            'permission_water'=>'required| min:1'
        ]);
        if ($validator->passes()) {
            // dd($request);
            $input = $request->all();
            //dd($input);
            $class_new = new channel();
            $class_new->width = $input['channelWidth'];
            $class_new->valveSize=$input['pipSize'];
            $class_new->heightWaterSensor=$input['waterHeightSensor'];
            $class_new->type=$input['channelType'];
            $class_new->water_permission_amount=$input['permission_water'];
            $class_new->farmID=$input['farm_id_input'];
            
            if($class_new->save()) {
                return back()->with('Transaction_Response_water_add', 'The new water Resource has been successfully registered');
                
            }
            else
            {
                return back()->with('Transaction_Response_water_add_fail','The is an error during registering this water Resource');
            }

        }else{
            // there are some inputs that are not valid, please write prorate feedback
            return back()->with('Transaction_Response_water_add_fail','Please Fill all of the fields permanently');
        }
        // dd($request);
    }

    public function viewPits(Request $request){
        if($request->id_farm){
            $fetched_pits=chah::where('farmID', $request->id_farm)->get();
            // dd($fetched_pits);
            return view('pages.WaterResourcesDefined.viewPits', compact('fetched_pits'));
        }

    }
    public function viewPools(Request $request){
        if($request->id_farm){
            $fetched_pools=pool::where('farmID', $request->id_farm)->get();
            // dd($fetched_pits);
            return view('pages.WaterResourcesDefined.viewPools', compact('fetched_pools'));
        }

    }
    public function viewTanks(Request $request){
        if($request->id_farm){
            $fetched_tanks=makhzan::where('farmID', $request->id_farm)->get();
            // dd($fetched_pits);
            return view('pages.WaterResourcesDefined.viewTanks', compact('fetched_tanks'));
        }

    }

    public function viewRiver(Request $request){
        if($request->id_farm){
            $fetched_river=river::where('farmID', $request->id_farm)->get();
            // dd($fetched_pits);
            return view('pages.WaterResourcesDefined.viewRiver', compact('fetched_river'));
        }
    }

    public function viewPipe(Request $request){
        if($request->id_farm){
            $fetched_pips=netpipe::where('farmID', $request->id_farm)->get();
            // dd($fetched_pits);
            return view('pages.WaterResourcesDefined.viewnetworkPipe', compact('fetched_pips'));
        }
    }

    public function viewChannel(Request $request){
        if($request->id_farm){
            $fetched_channels=channel::where('farmID', $request->id_farm)->get();
            // dd($fetched_pits);
            return view('pages.WaterResourcesDefined.viewChannel', compact('fetched_channels'));
        }
    }


    public function UpdateChah(Request $request){
        // dd($request);
        try{
            $update_chah=chah::where('id',$request->WaterResouceID)->update
            (['type'=>($request->pit_type),
                'bodyType'=>($request->pit_body),
                'diameter'=>($request->Diameter),
                'waterHeight'=>($request->water_height),
                'chahHeight'=>($request->pit_height),
                'wateramount'=>($request->incide_water),
                'year'=>($request->YearMade),
                'water_permission_amount'=>($request->permission_water),
                'useYear'=>($request->YearUse)
        ]);
        if($update_chah){
            // return back()->with('Transaction_Response_Update_pit', 'The new water Resource has been successfully registered');
            echo '<div class="alert alert-success">The new water Resource has been successfully registered</div>';
        }
        else{
            // return back()->with('Transaction_Response_Update_pit_fail', 'There is an error during update this pit');
            echo '<div class="alert alert-danger">There is an error during update this pit</div>';
        }

        }
        catch(\Exception $e){
            // Log::error($e);
            // return back()->with('Transaction_Response_Update_pit_fail_syntax', 'In the syntax of your code there is an error');
            echo '<div class="alert alert-warning">There is an warning during update this pit</div>';
        } 
    }

    public function updatePool(Request $request){
        // dd($request);
        try{
            $update_pool=pool::where('id',$request->WaterResouceID)->update
            (['type_pool'=>($request->pool_type),
            'lenght'=>($request->length),
            'width'=>($request->width),
            'depth'=>($request->deep),
            'buildTime'=>($request->YearMade),
            'applyTime'=>($request->YearUse),
            'water_height'=>($request->water_height),
            'water_permission_amount'=>($request->permission_water),
            'inside_water'=>($request->inside_water)
        ]);
        if($update_pool){
            // return back()->with('Transaction_Response_Update_pool', 'The new water Resource has been successfully registered');
            echo '<div class="alert alert-success">The new water Resource has been successfully registered</div>';
        }
        else{
            // return back()->with('Transaction_Response_Update_pool_fail', 'There is an error during update this pit');
            echo '<div class="alert alert-danger">There is an error during update this pool</div>';
        }

        }
        catch(\Exception $e){
            Log::error($e);
            // return back()->with('Transaction_Response_Update_pool_fail_syntax', 'In the syntax of your code there is an error');
            echo '<div class="alert alert-warning">There is an warning during update this pool</div>';

        } 
    }

    public function updateTank(Request $request){
        // dd($request);
        try{
            $update_tank=makhzan::where('id',$request->WaterResouceID)->update
            ([
            'type_tank'=>($request->tank_type),
            'length'=>($request->length),
            'width'=>($request->width),
            'height'=>($request->height),
            'buildTime'=>($request->YearMade),
            'applyTime'=>($request->YearUse),
            'water_height'=>($request->water_height),
            'water_permission_amount'=>($request->permission_water),
            'inside_water'=>($request->inside_water)
        ]);
        if($update_tank){
            // return back()->with('Transaction_Response_Update_tank', 'The new water Resource has been successfully registered');
            echo '<div class="alert alert-success">The new water Resource has been successfully registered</div>';
        }
        else{
            // return back()->with('Transaction_Response_Update_tank_fail', 'There is an error during update this tank');
            echo '<div class="alert alert-danger">There is an error during update this Tank</div>';
        }

        }
        catch(\Exception $e){
            Log::error($e);
            // return back()->with('Transaction_Response_Update_tank_fail_syntax', 'In the syntax of your code there is an error');
            echo '<div class="alert alert-warning">There is an warning during update this Tank</div>';
        } 
    }

    public function updateRiver(Request $request){
        // dd($request);
        try{
            $update_river=river::where('id',$request->WaterResouceID)->update
            ([
            'sensor_depth'=>($request->depth),
            'pip_size'=>($request->Pipe),
            'water_permission_amount'=>($request->permission_water),
            'height'=>($request->height)
        ]);
        if($update_river){
            // return back()->with('Transaction_Response_Update_river', 'The new water Resource has been successfully registered');
            echo '<div class="alert alert-success">The new water Resource has been successfully registered</div>';
        }
        else{
            // return back()->with('Transaction_Response_Update_river_fail', 'There is an error during update this river');
            echo '<div class="alert alert-danger">There is an error during update this river</div>';

        }

        }
        catch(\Exception $e){
            Log::error($e);
            // return back()->with('Transaction_Response_Update_river_fail_syntax', 'In the syntax of your code there is an error');
            echo '<div class="alert alert-warning">There is an warning during update this river</div>';
        } 
    }

    public function updatePipe(Request $request){
        // dd($request);
        try{
            $update_Pipe=netpipe::where('id',$request->WaterResouceID)->update
            ([
            'type'=>($request->pipeType),
            'netpipD'=>($request->diameterIrrigate),
            'water_permission_amount'=>($request->permission_water),
            'pipwaterD'=>($request->diameterWater)
        ]);
        if($update_Pipe){
            // return back()->with('Transaction_Response_Update_pipe', 'The new water Resource has been successfully registered');
            echo '<div class="alert alert-success">The new water Resource has been successfully registered</div>';
        }
        else{
            // return back()->with('Transaction_Response_Update_pipe_fail', 'There is an error during update this pipe');
            echo '<div class="alert alert-danger">There is an error during update this network pipe</div>';
        }

        }
        catch(\Exception $e){
            Log::error($e);
            // return back()->with('Transaction_Response_Update_pipe_fail_syntax', 'In the syntax of your code there is an error');
            echo '<div class="alert alert-warning">There is an warning during update this network pipe</div>';
        } 
    }

    public function updateChannel(Request $request){
        // dd($request);
        try{
            $update_Channel=channel::where('id',$request->WaterResouceID)->update
            ([
            'type'=>($request->channelType),
            'width'=>($request->channelWidth),
            'valveSize'=>($request->pipSize),
            'water_permission_amount'=>($request->permission_water),
            'heightWaterSensor'=>($request->waterHeightSensor)
        ]);
        if($update_Channel){
            // return back()->with('Transaction_Response_Update_channel', 'The new water Resource has been successfully registered');
            echo '<div class="alert alert-success">The new water Resource has been successfully registered</div>';

        }
        else{
            // return back()->with('Transaction_Response_Update_channel_fail', 'There is an error during update this channel');
            echo '<div class="alert alert-danger">There is an error during update this Channel</div>';
        }

        }
        catch(\Exception $e){
            Log::error($e);
            // return back()->with('Transaction_Response_Update_channel_fail_syntax', 'In the syntax of your code there is an error');
            echo '<div class="alert alert-warning">There is an warning during update this Channel</div>';
        } 
    }
}
