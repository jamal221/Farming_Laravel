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
use App\Models\WaterResourceModel;


use Illuminate\Support\Facades\DB;
use http\Exception;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Validator;


class waterAnalyzeController extends Controller
{
    //
    public function waterAnalyze(){
        $fetched_farms=farm::join('users','farm.UserID','=','users.id')
        ->get([
            'farm.id as FarmID',
            'farm.*',
            'users.*'
                ]);
        return view('pages.WaterResourcesAnalyze.analyzeWaterResourcesFarm', compact('fetched_farms'));
    }
    public function viewPitsForAnalyze(Request $request){
        $FarmID=$request->id_farm;
        $fetched_farms=farm::join('users','farm.UserID','=','users.id')
        ->where('farm.id',$FarmID)
        ->get([
            'farm.id as FarmID',
            'farm.*',
            'users.*'
                ]);
        $fetched_farms=json_decode($fetched_farms);
        $fetched_pits=chah::where('farmID', $FarmID)->get();
        $fetched_pits_Analyzed=WaterResourceModel::where('farmID', $FarmID)
        ->where('typeResource',1)
        ->pluck('ResourceID')
        ->toArray();
        
        // dd($fetched_pits_Registered);
        $fetched_pits_count=chah::where('farmID', $FarmID)->count();
        // dd($fetched_pits_count);
        return view('pages.WaterResourcesAnalyze.PitsAnalyze', compact('fetched_farms','fetched_pits_count','fetched_pits','fetched_pits_Analyzed'));

    }
    public function AnalyzedPitsData(Request $request){
        $FarmID=$request->farm_ID;
        $ResourceID=$request->pit_ID;
        $fetched_Resource_Analyzed_data=WaterResourceModel::where('farmID', $FarmID)
        ->where('ResourceID',$ResourceID)
        ->where('typeResource',1)
        ->get();
        return json_decode($fetched_Resource_Analyzed_data);
    }
    public function AnalyzedPoolsData(Request $request){
        $FarmID=$request->farm_ID;
        $ResourceID=$request->Resource_ID;
        $fetched_Resource_Analyzed_data=WaterResourceModel::where('farmID', $FarmID)
        ->where('ResourceID',$ResourceID)
        ->where('typeResource',6)
        ->get();
        return json_decode($fetched_Resource_Analyzed_data);
    }
    public function AnalyzedRiversData(Request $request){
        $FarmID=$request->farm_ID;
        $ResourceID=$request->Resource_ID;
        $fetched_Resource_Analyzed_data=WaterResourceModel::where('farmID', $FarmID)
        ->where('ResourceID',$ResourceID)
        ->where('typeResource',5)
        ->get();
        return json_decode($fetched_Resource_Analyzed_data);
    }
    public function AnalyzedChannelsData(Request $request){
        $FarmID=$request->farm_ID;
        $ResourceID=$request->Resource_ID;
        $fetched_Resource_Analyzed_data=WaterResourceModel::where('farmID', $FarmID)
        ->where('ResourceID',$ResourceID)
        ->where('typeResource',2)
        ->get();
        return json_decode($fetched_Resource_Analyzed_data);
    }
    public function AnalyzedNetPipesData(Request $request){
        $FarmID=$request->farm_ID;
        $ResourceID=$request->Resource_ID;
        $fetched_Resource_Analyzed_data=WaterResourceModel::where('farmID', $FarmID)
        ->where('ResourceID',$ResourceID)
        ->where('typeResource',4)
        ->get();
        return json_decode($fetched_Resource_Analyzed_data);
    }
    public function AnalyzedTanksData(Request $request){
        $FarmID=$request->farm_ID;
        $ResourceID=$request->Resource_ID;
        $fetched_Resource_Analyzed_data=WaterResourceModel::where('farmID', $FarmID)
        ->where('ResourceID',$ResourceID)
        ->where('typeResource',3)
        ->get();
        return json_decode($fetched_Resource_Analyzed_data);
    }
    public function RegAnalyzeWaterPits(Request $request){
        $Data_analyze=$request->analyze_res;
        $empty_data=0;
        for($i=0; $i<count($Data_analyze); $i++){
            if($Data_analyze[$i]=="")
                $empty_data++;
        }
        if ($empty_data)
            echo '<div class="alert alert-danger">There is '.$empty_data.' of your data without value, Please paying attention again</div>';
        else{
            $class_new = new WaterResourceModel();
            for($i=0; $i<count($Data_analyze); $i++){
                $class_new->EC=$Data_analyze[0];
                $class_new->PH=$Data_analyze[1];
                $class_new->SAR=$Data_analyze[2];
                $class_new->Hardness=$Data_analyze[3];
                $class_new->TD5=$Data_analyze[4];
                $class_new->aluminum=$Data_analyze[5];
                $class_new->Arsenic=$Data_analyze[6];
                $class_new->beryllium=$Data_analyze[7];
                $class_new->cadmium=$Data_analyze[8];
                $class_new->Cobalt=$Data_analyze[9];
                $class_new->chromium=$Data_analyze[10];
                $class_new->copper=$Data_analyze[11];
                $class_new->Fe=$Data_analyze[12];
                $class_new->lithium=$Data_analyze[13];
                $class_new->Manganese=$Data_analyze[14];
                $class_new->molybdenum=$Data_analyze[15];
                $class_new->nickel=$Data_analyze[16];
                $class_new->palladium=$Data_analyze[17];
                $class_new->Selenium=$Data_analyze[18];
                $class_new->vanadium=$Data_analyze[19];
                $class_new->Zinc=$Data_analyze[20];
                $class_new->Fluorine=$Data_analyze[21];
                $class_new->Br=$Data_analyze[22];
                $class_new->Nitrate=$Data_analyze[23];
                $class_new->microbial=$Data_analyze[24];
                $class_new->salinity=$Data_analyze[25];
                $class_new->animosity=$Data_analyze[26];
                $class_new->farmID=$request->farm_ID;
                $class_new->ResourceID=$request->pit_ID;
                $class_new->typeResource=1;  

            }// end ofr
            $check_for_update_or_reg=WaterResourceModel::where('farmID',$request->farm_ID)
                                    ->where('ResourceID',$request->pit_ID)
                                    ->where('typeResource',1)
                                    ->count();
            // dd($check_for_update_or_reg);
            if($check_for_update_or_reg>=1){
                $update_WaterResource=WaterResourceModel::where('farmID',$request->farm_ID)
                    ->where('ResourceID',$request->pit_ID)
                    ->where('typeResource',1)
                    ->update([
                                'EC'=>($Data_analyze[0]),
                                'PH'=>($Data_analyze[1]),
                                'SAR'=>($Data_analyze[2]),
                                'Hardness'=>($Data_analyze[3]),
                                'TD5'=>($Data_analyze[4]),
                                'aluminum'=>($Data_analyze[5]),
                                'Arsenic'=>($Data_analyze[6]),
                                'beryllium'=>($Data_analyze[7]),
                                'cadmium'=>($Data_analyze[8]),
                                'Cobalt'=>($Data_analyze[9]),
                                'chromium'=>($Data_analyze[10]),
                                'copper'=>($Data_analyze[11]),
                                'Fe'=>($Data_analyze[12]),
                                'lithium'=>($Data_analyze[13]),
                                'Manganese'=>($Data_analyze[14]),
                                'molybdenum'=>($Data_analyze[15]),
                                'nickel'=>($Data_analyze[16]),
                                'palladium'=>($Data_analyze[17]),
                                'Selenium'=>($Data_analyze[18]),
                                'vanadium'=>($Data_analyze[19]),
                                'Zinc'=>($Data_analyze[20]),
                                'Fluorine'=>($Data_analyze[21]),
                                'Br'=>($Data_analyze[22]),
                                'Nitrate'=>($Data_analyze[23]),
                                'microbial'=>($Data_analyze[24]),
                                'salinity'=>($Data_analyze[25]),
                                'animosity'=>($Data_analyze[26]),
                                'farmID'=>$request->farm_ID
                                                     ]);
                                if($update_WaterResource){
                                    echo '<div class="alert alert-info">All of the analyze water of this resource has been Updated successfully</div>';
                                }
            }
            elseif($class_new->save()) {
                echo '<div class="alert alert-success">All of the analyze water of this resource has been registered successfully</div>';
                
            }
            else
            {
                echo '<div class="alert alert-danger">There is a problem during inserting data for this resource</div>';

            }

        }
        // dd(count($Data_analyze));

    }

    public function viewRiverForAnalyze(Request $request){

        $FarmID=$request->id_farm;
        $fetched_farms=farm::join('users','farm.UserID','=','users.id')
        ->where('farm.id',$FarmID)
        ->get([
            'farm.id as FarmID',
            'farm.*',
            'users.*'
                ]);
        $fetched_farms=json_decode($fetched_farms);
        $fetched_Rivers=river::where('farmID', $FarmID)->get();
        $fetched_Rivers_Analyzed=WaterResourceModel::where('farmID', $FarmID)
        ->where('typeResource',5)
        ->pluck('ResourceID')
        ->toArray();
        
        // dd($fetched_pits_Registered);
        $fetched_Rivers_count=river::where('farmID', $FarmID)->count();
        // dd($fetched_pits_count);
        return view('pages.WaterResourcesAnalyze.RiverAnalyze', compact('fetched_farms','fetched_Rivers_count','fetched_Rivers','fetched_Rivers_Analyzed'));
    }

    public function RegAnalyzeWaterRivers(Request $request){
        $Data_analyze=$request->analyze_res;
        $empty_data=0;
        for($i=0; $i<count($Data_analyze); $i++){
            if($Data_analyze[$i]=="")
                $empty_data++;
        }
        if ($empty_data)
            echo '<div class="alert alert-danger">There is '.$empty_data.' of your data without value, Please paying attention again</div>';
        else{
            $class_new = new WaterResourceModel();
            for($i=0; $i<count($Data_analyze); $i++){
                $class_new->EC=$Data_analyze[0];
                $class_new->PH=$Data_analyze[1];
                $class_new->SAR=$Data_analyze[2];
                $class_new->Hardness=$Data_analyze[3];
                $class_new->TD5=$Data_analyze[4];
                $class_new->aluminum=$Data_analyze[5];
                $class_new->Arsenic=$Data_analyze[6];
                $class_new->beryllium=$Data_analyze[7];
                $class_new->cadmium=$Data_analyze[8];
                $class_new->Cobalt=$Data_analyze[9];
                $class_new->chromium=$Data_analyze[10];
                $class_new->copper=$Data_analyze[11];
                $class_new->Fe=$Data_analyze[12];
                $class_new->lithium=$Data_analyze[13];
                $class_new->Manganese=$Data_analyze[14];
                $class_new->molybdenum=$Data_analyze[15];
                $class_new->nickel=$Data_analyze[16];
                $class_new->palladium=$Data_analyze[17];
                $class_new->Selenium=$Data_analyze[18];
                $class_new->vanadium=$Data_analyze[19];
                $class_new->Zinc=$Data_analyze[20];
                $class_new->Fluorine=$Data_analyze[21];
                $class_new->Br=$Data_analyze[22];
                $class_new->Nitrate=$Data_analyze[23];
                $class_new->microbial=$Data_analyze[24];
                $class_new->salinity=$Data_analyze[25];
                $class_new->animosity=$Data_analyze[26];
                $class_new->farmID=$request->farm_ID;
                $class_new->ResourceID=$request->Resource_ID;
                $class_new->typeResource=5;  

            }// end ofr
            $check_for_update_or_reg=WaterResourceModel::where('farmID',$request->farm_ID)
                                    ->where('ResourceID',$request->Resource_ID)
                                    ->where('typeResource',5)
                                    ->count();
            // dd($check_for_update_or_reg);
            if($check_for_update_or_reg>=1){
                $update_WaterResource=WaterResourceModel::where('farmID',$request->farm_ID)
                    ->where('ResourceID',$request->Resource_ID)
                    ->where('typeResource',5)
                    ->update([
                                'EC'=>($Data_analyze[0]),
                                'PH'=>($Data_analyze[1]),
                                'SAR'=>($Data_analyze[2]),
                                'Hardness'=>($Data_analyze[3]),
                                'TD5'=>($Data_analyze[4]),
                                'aluminum'=>($Data_analyze[5]),
                                'Arsenic'=>($Data_analyze[6]),
                                'beryllium'=>($Data_analyze[7]),
                                'cadmium'=>($Data_analyze[8]),
                                'Cobalt'=>($Data_analyze[9]),
                                'chromium'=>($Data_analyze[10]),
                                'copper'=>($Data_analyze[11]),
                                'Fe'=>($Data_analyze[12]),
                                'lithium'=>($Data_analyze[13]),
                                'Manganese'=>($Data_analyze[14]),
                                'molybdenum'=>($Data_analyze[15]),
                                'nickel'=>($Data_analyze[16]),
                                'palladium'=>($Data_analyze[17]),
                                'Selenium'=>($Data_analyze[18]),
                                'vanadium'=>($Data_analyze[19]),
                                'Zinc'=>($Data_analyze[20]),
                                'Fluorine'=>($Data_analyze[21]),
                                'Br'=>($Data_analyze[22]),
                                'Nitrate'=>($Data_analyze[23]),
                                'microbial'=>($Data_analyze[24]),
                                'salinity'=>($Data_analyze[25]),
                                'animosity'=>($Data_analyze[26]),
                                'farmID'=>$request->farm_ID
                                                     ]);
                                if($update_WaterResource){
                                    echo '<div class="alert alert-info">All of the analyze water of this resource has been Updated successfully</div>';
                                }
            }
            elseif($class_new->save()) {
                echo '<div class="alert alert-success">All of the analyze water of this resource has been registered successfully</div>';
                
            }
            else
            {
                echo '<div class="alert alert-danger">There is a problem during inserting data for this resource</div>';

            }

        }
        // dd(count($Data_analyze));

    } 
    public function viewNetPipeForAnalyze(Request $request){
        $FarmID=$request->id_farm;
        $fetched_farms=farm::join('users','farm.UserID','=','users.id')
        ->where('farm.id',$FarmID)
        ->get([
            'farm.id as FarmID',
            'farm.*',
            'users.*'
                ]);
        $fetched_farms=json_decode($fetched_farms);
        $fetched_NetPipes=netpipe::where('farmID', $FarmID)->get();
        $fetched_NetPipes_Analyzed=WaterResourceModel::where('farmID', $FarmID)
        ->where('typeResource',4)
        ->pluck('ResourceID')
        ->toArray();
        
        // dd($fetched_pits_Registered);
        $fetched_NetPipes_count=netpipe::where('farmID', $FarmID)->count();
        // dd($fetched_pits_count);
        return view('pages.WaterResourcesAnalyze.NetpipeAnalyze', compact('fetched_farms','fetched_NetPipes_count','fetched_NetPipes','fetched_NetPipes_Analyzed'));
    }
    public function RegAnalyzeWaterNetPipes(Request $request){
        $Data_analyze=$request->analyze_res;
        $empty_data=0;
        for($i=0; $i<count($Data_analyze); $i++){
            if($Data_analyze[$i]=="")
                $empty_data++;
        }
        if ($empty_data)
            echo '<div class="alert alert-danger">There is '.$empty_data.' of your data without value, Please paying attention again</div>';
        else{
            $class_new = new WaterResourceModel();
            for($i=0; $i<count($Data_analyze); $i++){
                $class_new->EC=$Data_analyze[0];
                $class_new->PH=$Data_analyze[1];
                $class_new->SAR=$Data_analyze[2];
                $class_new->Hardness=$Data_analyze[3];
                $class_new->TD5=$Data_analyze[4];
                $class_new->aluminum=$Data_analyze[5];
                $class_new->Arsenic=$Data_analyze[6];
                $class_new->beryllium=$Data_analyze[7];
                $class_new->cadmium=$Data_analyze[8];
                $class_new->Cobalt=$Data_analyze[9];
                $class_new->chromium=$Data_analyze[10];
                $class_new->copper=$Data_analyze[11];
                $class_new->Fe=$Data_analyze[12];
                $class_new->lithium=$Data_analyze[13];
                $class_new->Manganese=$Data_analyze[14];
                $class_new->molybdenum=$Data_analyze[15];
                $class_new->nickel=$Data_analyze[16];
                $class_new->palladium=$Data_analyze[17];
                $class_new->Selenium=$Data_analyze[18];
                $class_new->vanadium=$Data_analyze[19];
                $class_new->Zinc=$Data_analyze[20];
                $class_new->Fluorine=$Data_analyze[21];
                $class_new->Br=$Data_analyze[22];
                $class_new->Nitrate=$Data_analyze[23];
                $class_new->microbial=$Data_analyze[24];
                $class_new->salinity=$Data_analyze[25];
                $class_new->animosity=$Data_analyze[26];
                $class_new->farmID=$request->farm_ID;
                $class_new->ResourceID=$request->Resource_ID;
                $class_new->typeResource=4;  

            }// end ofr
            $check_for_update_or_reg=WaterResourceModel::where('farmID',$request->farm_ID)
                                    ->where('ResourceID',$request->Resource_ID)
                                    ->where('typeResource',4)
                                    ->count();
            // dd($check_for_update_or_reg);
            if($check_for_update_or_reg>=1){
                $update_WaterResource=WaterResourceModel::where('farmID',$request->farm_ID)
                    ->where('ResourceID',$request->Resource_ID)
                    ->where('typeResource',4)
                    ->update([
                                'EC'=>($Data_analyze[0]),
                                'PH'=>($Data_analyze[1]),
                                'SAR'=>($Data_analyze[2]),
                                'Hardness'=>($Data_analyze[3]),
                                'TD5'=>($Data_analyze[4]),
                                'aluminum'=>($Data_analyze[5]),
                                'Arsenic'=>($Data_analyze[6]),
                                'beryllium'=>($Data_analyze[7]),
                                'cadmium'=>($Data_analyze[8]),
                                'Cobalt'=>($Data_analyze[9]),
                                'chromium'=>($Data_analyze[10]),
                                'copper'=>($Data_analyze[11]),
                                'Fe'=>($Data_analyze[12]),
                                'lithium'=>($Data_analyze[13]),
                                'Manganese'=>($Data_analyze[14]),
                                'molybdenum'=>($Data_analyze[15]),
                                'nickel'=>($Data_analyze[16]),
                                'palladium'=>($Data_analyze[17]),
                                'Selenium'=>($Data_analyze[18]),
                                'vanadium'=>($Data_analyze[19]),
                                'Zinc'=>($Data_analyze[20]),
                                'Fluorine'=>($Data_analyze[21]),
                                'Br'=>($Data_analyze[22]),
                                'Nitrate'=>($Data_analyze[23]),
                                'microbial'=>($Data_analyze[24]),
                                'salinity'=>($Data_analyze[25]),
                                'animosity'=>($Data_analyze[26]),
                                'farmID'=>$request->farm_ID
                                                     ]);
                                if($update_WaterResource){
                                    echo '<div class="alert alert-info">All of the analyze water of this resource has been Updated successfully</div>';
                                }
            }
            elseif($class_new->save()) {
                echo '<div class="alert alert-success">All of the analyze water of this resource has been registered successfully</div>';
                
            }
            else
            {
                echo '<div class="alert alert-danger">There is a problem during inserting data for this resource</div>';

            }

        }
        // dd(count($Data_analyze));

    }
    public function viewChannelForAnalyze(Request $request){
        
        $FarmID=$request->id_farm;
        $fetched_farms=farm::join('users','farm.UserID','=','users.id')
        ->where('farm.id',$FarmID)
        ->get([
            'farm.id as FarmID',
            'farm.*',
            'users.*'
                ]);
        $fetched_farms=json_decode($fetched_farms);
        $fetched_Channels=channel::where('farmID', $FarmID)->get();
        $fetched_Channels_Analyzed=WaterResourceModel::where('farmID', $FarmID)
        ->where('typeResource',2)
        ->pluck('ResourceID')
        ->toArray();
        
        // dd($fetched_pits_Registered);
        $fetched_Channels_count=channel::where('farmID', $FarmID)->count();
        // dd($fetched_pits_count);
        return view('pages.WaterResourcesAnalyze.ChannelAnalyze', compact('fetched_farms','fetched_Channels_count','fetched_Channels','fetched_Channels_Analyzed'));

    }
    public function RegAnalyzeWaterChannels(Request $request){
        $Data_analyze=$request->analyze_res;
        $empty_data=0;
        for($i=0; $i<count($Data_analyze); $i++){
            if($Data_analyze[$i]=="")
                $empty_data++;
        }
        if ($empty_data)
            echo '<div class="alert alert-danger">There is '.$empty_data.' of your data without value, Please paying attention again</div>';
        else{
            $class_new = new WaterResourceModel();
            for($i=0; $i<count($Data_analyze); $i++){
                $class_new->EC=$Data_analyze[0];
                $class_new->PH=$Data_analyze[1];
                $class_new->SAR=$Data_analyze[2];
                $class_new->Hardness=$Data_analyze[3];
                $class_new->TD5=$Data_analyze[4];
                $class_new->aluminum=$Data_analyze[5];
                $class_new->Arsenic=$Data_analyze[6];
                $class_new->beryllium=$Data_analyze[7];
                $class_new->cadmium=$Data_analyze[8];
                $class_new->Cobalt=$Data_analyze[9];
                $class_new->chromium=$Data_analyze[10];
                $class_new->copper=$Data_analyze[11];
                $class_new->Fe=$Data_analyze[12];
                $class_new->lithium=$Data_analyze[13];
                $class_new->Manganese=$Data_analyze[14];
                $class_new->molybdenum=$Data_analyze[15];
                $class_new->nickel=$Data_analyze[16];
                $class_new->palladium=$Data_analyze[17];
                $class_new->Selenium=$Data_analyze[18];
                $class_new->vanadium=$Data_analyze[19];
                $class_new->Zinc=$Data_analyze[20];
                $class_new->Fluorine=$Data_analyze[21];
                $class_new->Br=$Data_analyze[22];
                $class_new->Nitrate=$Data_analyze[23];
                $class_new->microbial=$Data_analyze[24];
                $class_new->salinity=$Data_analyze[25];
                $class_new->animosity=$Data_analyze[26];
                $class_new->farmID=$request->farm_ID;
                $class_new->ResourceID=$request->Resource_ID;
                $class_new->typeResource=2;  

            }// end ofr
            $check_for_update_or_reg=WaterResourceModel::where('farmID',$request->farm_ID)
                                    ->where('ResourceID',$request->Resource_ID)
                                    ->where('typeResource',2)
                                    ->count();
            // dd($check_for_update_or_reg);
            if($check_for_update_or_reg>=1){
                $update_WaterResource=WaterResourceModel::where('farmID',$request->farm_ID)
                    ->where('ResourceID',$request->Resource_ID)
                    ->where('typeResource',2)
                    ->update([
                                'EC'=>($Data_analyze[0]),
                                'PH'=>($Data_analyze[1]),
                                'SAR'=>($Data_analyze[2]),
                                'Hardness'=>($Data_analyze[3]),
                                'TD5'=>($Data_analyze[4]),
                                'aluminum'=>($Data_analyze[5]),
                                'Arsenic'=>($Data_analyze[6]),
                                'beryllium'=>($Data_analyze[7]),
                                'cadmium'=>($Data_analyze[8]),
                                'Cobalt'=>($Data_analyze[9]),
                                'chromium'=>($Data_analyze[10]),
                                'copper'=>($Data_analyze[11]),
                                'Fe'=>($Data_analyze[12]),
                                'lithium'=>($Data_analyze[13]),
                                'Manganese'=>($Data_analyze[14]),
                                'molybdenum'=>($Data_analyze[15]),
                                'nickel'=>($Data_analyze[16]),
                                'palladium'=>($Data_analyze[17]),
                                'Selenium'=>($Data_analyze[18]),
                                'vanadium'=>($Data_analyze[19]),
                                'Zinc'=>($Data_analyze[20]),
                                'Fluorine'=>($Data_analyze[21]),
                                'Br'=>($Data_analyze[22]),
                                'Nitrate'=>($Data_analyze[23]),
                                'microbial'=>($Data_analyze[24]),
                                'salinity'=>($Data_analyze[25]),
                                'animosity'=>($Data_analyze[26]),
                                'farmID'=>$request->farm_ID
                                                     ]);
                                if($update_WaterResource){
                                    echo '<div class="alert alert-info">All of the analyze water of this resource has been Updated successfully</div>';
                                }
            }
            elseif($class_new->save()) {
                echo '<div class="alert alert-success">All of the analyze water of this resource has been registered successfully</div>';
                
            }
            else
            {
                echo '<div class="alert alert-danger">There is a problem during inserting data for this resource</div>';

            }

        }
        // dd(count($Data_analyze));

    } 
    public function viewPoolForAnalyze(Request $request){
        $FarmID=$request->id_farm;
        $fetched_farms=farm::join('users','farm.UserID','=','users.id')
        ->where('farm.id',$FarmID)
        ->get([
            'farm.id as FarmID',
            'farm.*',
            'users.*'
                ]);
        $fetched_farms=json_decode($fetched_farms);
        $fetched_Pools=pool::where('farmID', $FarmID)->get();
        $fetched_Pools_Analyzed=WaterResourceModel::where('farmID', $FarmID)
        ->where('typeResource',6)
        ->pluck('ResourceID')
        ->toArray();
        
        // dd($fetched_pits_Registered);
        $fetched_Pools_count=pool::where('farmID', $FarmID)->count();
        // dd($fetched_pits_count);
        return view('pages.WaterResourcesAnalyze.PoolAnalyze', compact('fetched_farms','fetched_Pools_count','fetched_Pools','fetched_Pools_Analyzed'));
    }
    public function RegAnalyzeWaterPools(Request $request){
        $Data_analyze=$request->analyze_res;
        $empty_data=0;
        for($i=0; $i<count($Data_analyze); $i++){
            if($Data_analyze[$i]=="")
                $empty_data++;
        }
        if ($empty_data)
            echo '<div class="alert alert-danger">There is '.$empty_data.' of your data without value, Please paying attention again</div>';
        else{
            $class_new = new WaterResourceModel();
            for($i=0; $i<count($Data_analyze); $i++){
                $class_new->EC=$Data_analyze[0];
                $class_new->PH=$Data_analyze[1];
                $class_new->SAR=$Data_analyze[2];
                $class_new->Hardness=$Data_analyze[3];
                $class_new->TD5=$Data_analyze[4];
                $class_new->aluminum=$Data_analyze[5];
                $class_new->Arsenic=$Data_analyze[6];
                $class_new->beryllium=$Data_analyze[7];
                $class_new->cadmium=$Data_analyze[8];
                $class_new->Cobalt=$Data_analyze[9];
                $class_new->chromium=$Data_analyze[10];
                $class_new->copper=$Data_analyze[11];
                $class_new->Fe=$Data_analyze[12];
                $class_new->lithium=$Data_analyze[13];
                $class_new->Manganese=$Data_analyze[14];
                $class_new->molybdenum=$Data_analyze[15];
                $class_new->nickel=$Data_analyze[16];
                $class_new->palladium=$Data_analyze[17];
                $class_new->Selenium=$Data_analyze[18];
                $class_new->vanadium=$Data_analyze[19];
                $class_new->Zinc=$Data_analyze[20];
                $class_new->Fluorine=$Data_analyze[21];
                $class_new->Br=$Data_analyze[22];
                $class_new->Nitrate=$Data_analyze[23];
                $class_new->microbial=$Data_analyze[24];
                $class_new->salinity=$Data_analyze[25];
                $class_new->animosity=$Data_analyze[26];
                $class_new->farmID=$request->farm_ID;
                $class_new->ResourceID=$request->Resource_ID;
                $class_new->typeResource=6;  

            }// end ofr
            $check_for_update_or_reg=WaterResourceModel::where('farmID',$request->farm_ID)
                                    ->where('ResourceID',$request->Resource_ID)
                                    ->count();
            // dd($check_for_update_or_reg);
            if($check_for_update_or_reg==1){
                $update_WaterResource=WaterResourceModel::where('farmID',$request->farm_ID)
                    ->where('ResourceID',$request->Resource_ID)
                    ->update([
                                'EC'=>($Data_analyze[0]),
                                'PH'=>($Data_analyze[1]),
                                'SAR'=>($Data_analyze[2]),
                                'Hardness'=>($Data_analyze[3]),
                                'TD5'=>($Data_analyze[4]),
                                'aluminum'=>($Data_analyze[5]),
                                'Arsenic'=>($Data_analyze[6]),
                                'beryllium'=>($Data_analyze[7]),
                                'cadmium'=>($Data_analyze[8]),
                                'Cobalt'=>($Data_analyze[9]),
                                'chromium'=>($Data_analyze[10]),
                                'copper'=>($Data_analyze[11]),
                                'Fe'=>($Data_analyze[12]),
                                'lithium'=>($Data_analyze[13]),
                                'Manganese'=>($Data_analyze[14]),
                                'molybdenum'=>($Data_analyze[15]),
                                'nickel'=>($Data_analyze[16]),
                                'palladium'=>($Data_analyze[17]),
                                'Selenium'=>($Data_analyze[18]),
                                'vanadium'=>($Data_analyze[19]),
                                'Zinc'=>($Data_analyze[20]),
                                'Fluorine'=>($Data_analyze[21]),
                                'Br'=>($Data_analyze[22]),
                                'Nitrate'=>($Data_analyze[23]),
                                'microbial'=>($Data_analyze[24]),
                                'salinity'=>($Data_analyze[25]),
                                'animosity'=>($Data_analyze[26]),
                                'farmID'=>$request->farm_ID
                                                     ]);
                                if($update_WaterResource){
                                    echo '<div class="alert alert-info">All of the analyze water of this resource has been Updated successfully</div>';
                                }
            }
            elseif($class_new->save()) {
                echo '<div class="alert alert-success">All of the analyze water of this resource has been registered successfully</div>';
                
            }
            else
            {
                echo '<div class="alert alert-danger">There is a problem during inserting data for this resource</div>';

            }

        }
        // dd(count($Data_analyze));

    } 
    public function viewTankForAnalyze(Request $request){
        $FarmID=$request->id_farm;
        $fetched_farms=farm::join('users','farm.UserID','=','users.id')
        ->where('farm.id',$FarmID)
        ->get([
            'farm.id as FarmID',
            'farm.*',
            'users.*'
                ]);
        $fetched_farms=json_decode($fetched_farms);
        $fetched_Tanks=makhzan::where('farmID', $FarmID)->get();
        $fetched_Tanks_Analyzed=WaterResourceModel::where('farmID', $FarmID)
        ->where('typeResource',3)
        ->pluck('ResourceID')
        ->toArray();
        
        // dd($fetched_pits_Registered);
        $fetched_Tanks_count=makhzan::where('farmID', $FarmID)->count();
        // dd($fetched_pits_count);
        return view('pages.WaterResourcesAnalyze.TankAnalyze', compact('fetched_farms','fetched_Tanks_count','fetched_Tanks','fetched_Tanks_Analyzed'));
    }
    public function RegAnalyzeWaterTanks(Request $request){
        $Data_analyze=$request->analyze_res;
        $empty_data=0;
        for($i=0; $i<count($Data_analyze); $i++){
            if($Data_analyze[$i]=="")
                $empty_data++;
        }
        if ($empty_data)
            echo '<div class="alert alert-danger">There is '.$empty_data.' of your data without value, Please paying attention again</div>';
        else{
            $class_new = new WaterResourceModel();
            for($i=0; $i<count($Data_analyze); $i++){
                $class_new->EC=$Data_analyze[0];
                $class_new->PH=$Data_analyze[1];
                $class_new->SAR=$Data_analyze[2];
                $class_new->Hardness=$Data_analyze[3];
                $class_new->TD5=$Data_analyze[4];
                $class_new->aluminum=$Data_analyze[5];
                $class_new->Arsenic=$Data_analyze[6];
                $class_new->beryllium=$Data_analyze[7];
                $class_new->cadmium=$Data_analyze[8];
                $class_new->Cobalt=$Data_analyze[9];
                $class_new->chromium=$Data_analyze[10];
                $class_new->copper=$Data_analyze[11];
                $class_new->Fe=$Data_analyze[12];
                $class_new->lithium=$Data_analyze[13];
                $class_new->Manganese=$Data_analyze[14];
                $class_new->molybdenum=$Data_analyze[15];
                $class_new->nickel=$Data_analyze[16];
                $class_new->palladium=$Data_analyze[17];
                $class_new->Selenium=$Data_analyze[18];
                $class_new->vanadium=$Data_analyze[19];
                $class_new->Zinc=$Data_analyze[20];
                $class_new->Fluorine=$Data_analyze[21];
                $class_new->Br=$Data_analyze[22];
                $class_new->Nitrate=$Data_analyze[23];
                $class_new->microbial=$Data_analyze[24];
                $class_new->salinity=$Data_analyze[25];
                $class_new->animosity=$Data_analyze[26];
                $class_new->farmID=$request->farm_ID;
                $class_new->ResourceID=$request->Resource_ID;
                $class_new->typeResource=3;  

            }// end ofr
            $check_for_update_or_reg=WaterResourceModel::where('farmID',$request->farm_ID)
                                    ->where('ResourceID',$request->Resource_ID)
                                    ->where('typeResource',3)
                                    ->count();
            // dd($check_for_update_or_reg);
            if($check_for_update_or_reg>=1){
                $update_WaterResource=WaterResourceModel::where('farmID',$request->farm_ID)
                    ->where('ResourceID',$request->Resource_ID)
                    ->where('typeResource',3)
                    ->update([
                                'EC'=>($Data_analyze[0]),
                                'PH'=>($Data_analyze[1]),
                                'SAR'=>($Data_analyze[2]),
                                'Hardness'=>($Data_analyze[3]),
                                'TD5'=>($Data_analyze[4]),
                                'aluminum'=>($Data_analyze[5]),
                                'Arsenic'=>($Data_analyze[6]),
                                'beryllium'=>($Data_analyze[7]),
                                'cadmium'=>($Data_analyze[8]),
                                'Cobalt'=>($Data_analyze[9]),
                                'chromium'=>($Data_analyze[10]),
                                'copper'=>($Data_analyze[11]),
                                'Fe'=>($Data_analyze[12]),
                                'lithium'=>($Data_analyze[13]),
                                'Manganese'=>($Data_analyze[14]),
                                'molybdenum'=>($Data_analyze[15]),
                                'nickel'=>($Data_analyze[16]),
                                'palladium'=>($Data_analyze[17]),
                                'Selenium'=>($Data_analyze[18]),
                                'vanadium'=>($Data_analyze[19]),
                                'Zinc'=>($Data_analyze[20]),
                                'Fluorine'=>($Data_analyze[21]),
                                'Br'=>($Data_analyze[22]),
                                'Nitrate'=>($Data_analyze[23]),
                                'microbial'=>($Data_analyze[24]),
                                'salinity'=>($Data_analyze[25]),
                                'animosity'=>($Data_analyze[26]),
                                'farmID'=>$request->farm_ID
                                                     ]);
                                if($update_WaterResource){
                                    echo '<div class="alert alert-info">All of the analyze water of this resource has been Updated successfully</div>';
                                }
            }
            elseif($class_new->save()) {
                echo '<div class="alert alert-success">All of the analyze water of this resource has been registered successfully</div>';
                
            }
            else
            {
                echo '<div class="alert alert-danger">There is a problem during inserting data for this resource</div>';

            }

        }
        // dd(count($Data_analyze));

    }
}
