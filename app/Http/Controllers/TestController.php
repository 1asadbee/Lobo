<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $phone_numbers = $request['phone_number'];
        $phone_numbers_ids = $request['phone_number_ids'];

        $result = array_combine($phone_numbers_ids, $phone_numbers);

        $bazadagi_idlar = PhoneNumber::where('user_id', $request['user_id'])->get('id');
        $massiv = [];
        foreach ($bazadagi_idlar as $item) {
            $massiv[] = $item->id;
        }
        $del = array_diff( $massiv,$phone_numbers_ids);

        PhoneNumber::whereIn('id',$del)->delete();
        foreach ($result as $key => $phone_number) {
            $test = PhoneNumber::where('id', $key)->update(

                [
                    'phone_number' => $phone_number,
                    'updated_at' => Carbon::now(),

                ]
            );

            if (!$test) {
                PhoneNumber::where('id', $key)->delete();
            }
        }


    }

    public function test2(Request $request){
        PhoneNumber::insert([
            'phone_number'=>$request['phone_number'],
            'user_id'=>$request['user_id'],
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
