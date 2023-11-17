<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    //
    public function costumerReg(Request $request){
        //dd($request);
        $validator = Validator::make($request->all(), [
            'costumerName'  =>'required',
            'costumerFamily' => 'required',
            'costumerAdd'=>'required',
            'costumerEmail'=>'required|email',
            'costumerMob' => 'required|max:11|min:10',
            'costumerTell' => 'required|max:11|min:8',
        ]);
        //dd($request);
        if ($validator->passes()) {


            $input = $request->all();
            //dd($input);
            $comp_new = new user();
            $comp_new->name = $input['costumerName'];
            $comp_new->email = $input['costumerEmail'];
            $comp_new->family = $input['costumerFamily'];
            $comp_new->Address= $input['costumerAdd'];
            $comp_new->tel= $input['costumerTell'];
            $comp_new->mobile= $input['costumerMob'];
            $comp_new->password= '123456';
            $costumer_mobile_double=user::find($input['costumerMob']);
            if($costumer_mobile_double){
                $fetched_costumer=$costumer_mobile_double->mobile;
            }
           
//            dd($album_name->album_name);
            if($comp_new->save()) {
                return back()->with('Transaction_Response_costumer', 'The user has been successfuly registered');
                
            }
            else
            {
                return back()->with('Transaction_Response_costumer_fail','The is an error during regesring this user');
            }


            return route()->back();
//            return response()->json(['success'=>'done']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
}

public function reguserform(){
    $fetch_user=user::all();
    return view('pages.regUser', compact('fetch_user'));
}
}
