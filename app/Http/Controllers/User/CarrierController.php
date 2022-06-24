<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Carrier;
use App\Models\CarrierPost;
use App\Models\CarrierPostsDescription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CarrierController extends Controller
{
    public function addCarrier(Request $request)
    {
        $this->validate($request, [
            'from_id' => 'required',
            'to_id' => 'required',
            'status' => '',
            'vehicle_model_id' => 'required',
            'delivery_type_id' => 'required',
            'vehicle_type_id' => 'required',
            'free_weight' => 'required',
            'height' => 'required',
            'width' => 'required',
            'length' => 'required',
            'price' => 'required',
            'departure_time' => 'required',
            'currency_id' => 'required',
            'description' => '',
        ]);

        $carrier = Carrier::where('user_id', auth()->user()->id)->first();

        $carrier->vehicle_model_id = $request->vehicle_model_id;
        $carrier->delivery_type_id = $request->delivery_type_id;
        $carrier->vehicle_type_id = $request->vehicle_type_id;


        $carrier_post_description = new CarrierPostsDescription();

        $carrier_post_description->description = $request->description;

        $carrier_post = new CarrierPost();

        $carrier_post->user_id = auth()->user()->id;
        $carrier_post->from_id = $request->from_id;
        $carrier_post->to_id = $request->to_id;
        $carrier_post->status = $request->status == 'on' ? 1 : 0;
        $carrier_post->free_weight = $request->free_weight;
        $carrier_post->free_area = $request->height . '-' . $request->width . '-' . $request->length;
        $carrier_post->departure_time = Carbon::createFromFormat('d/m/Y', $request->departure_time);
        $carrier_post->price = $request->price;
        $carrier_post->currency_id = $request->currency_id;


        if ($carrier->save() && $carrier_post_description->save() && $carrier_post->save()) {

            return redirect()->back()->with(['success' => 'Documents Sent']);
        } else
            return redirect()->back()->with(['fail' => 'Error Data']);
    }

    public function countCarriersPost(){
        echo \App\Models\CarrierPost::orderBy('created_at','desc')->count();
    }

    public function truckers(Request $request){
        if ($request->search == '1'){

            $carrier_posts = \App\Models\CarrierPost::where('id','!=',0);

            if ($request->from_id != ''){
                $carrier_posts->where('from_id',$request->from_id);
            }

            if ($request->to_id != ''){
                $carrier_posts->where('to_id',$request->to_id);
            }

            if ($request->free_weight != ''){
                $carrier_posts->where('free_weight','>=',$request->free_weight);
            }

//            if ($request->departure != ''){
//                $carrier_posts->where('departure_time','<=',$request);
//            }

            if ($request->price_from != '' || $request->price_from != ''){
                if ($request->price_from == ''){
                    $request->price_from = 0;
                }

                if ($request->price_to == ''){
                    $request->price_to = 0;
                }

                $carrier_posts->where('price','>=',$request->price_from)->where('price','<=',$request->price_to);
            }

            return view('user.truckers.index', ['carrier_posts' => $carrier_posts->orderBy('created_at','desc')->paginate(15)]);

        }else{
            return view('user.truckers.index', ['carrier_posts' => \App\Models\CarrierPost::orderBy('created_at','desc')->paginate(15)]);
        }
    }

}
