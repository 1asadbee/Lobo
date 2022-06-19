<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\PhoneNumbersController;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function add_number(Request $request){


        $request->phone_number=str_replace('+','',$request->phone_number);
        $phoneNumber = PhoneNumber::create($request->all());
        return response()->json(array('id'=> $phoneNumber->id,'phone_number'=>$request->phone_number));
    }
}
