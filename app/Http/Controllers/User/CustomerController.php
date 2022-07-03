<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CustomerPost;
use App\Models\CustomerPostsDescription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function customers(Request $request){

        $countries = \App\Models\Country::select('id','name')->orderBy('name', 'asc')->get();

        if ($request->search == '1'){

            $customers = \App\Models\CustomerPost::where('id','!=',0);

            if ($request->from_id != ''){
                $customers->where('from_id',$request->from_id);
            }

            if ($request->to_id != ''){
                $customers->where('to_id',$request->to_id);
            }

            if ($request->weight != ''){
                $customers->where('weight','>=',$request->weight);
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

                $customers->where('price','>=',$request->price_from)->where('price','<=',$request->price_to);
            }

            $customers = $customers->orderBy('created_at','desc')->paginate(15);

            return view('user.customers.index', compact('countries', 'customers'));

        }else{

            $customers = CustomerPost::orderBy('created_at','desc')->paginate(15);

            return view('user.customers.index',compact('countries', 'customers'));

        }
    }

    public function addCustomer(Request $request)
    {
//        return 'test';
        $this->validate($request, [
            'from_city' => '',
            'to_city' => '',
            'load' => 'required',
            'weight' => 'required',
            'area' => '',
            'daten' => 'required',
            'height' => '',
            'width' => '',
            'length' => '',
            'price' => 'required',
            'from_id' => 'required',
            'to_id' => 'required',
            'delivery_type_id' => 'required',
            'vehicle_type_id' => 'required',
            'load_type_id' => 'required',
            'currency_id' => 'required',
            'description' => '',
        ]);
        $customer_post = new CustomerPost();

        $customer_post->user_id = auth()->user()->id;
        $customer_post->from_city = $request->from_city;
        $customer_post->to_city = $request->to_city;
        $customer_post->load = $request->load;
        $customer_post->weight = $request->weight;
        $customer_post->area = $request->height . '-' . $request->width . '-' . $request->length;
        $customer_post->daten =Carbon::createFromFormat('d/m/Y', $request->daten);
        $customer_post->price = $request->price;
        $customer_post->from_id = $request->from_id;
        $customer_post->to_id = $request->to_id;
        $customer_post->delivery_type_id = $request->delivery_type_id;
        $customer_post->vehicle_type_id = $request->vehicle_type_id;
        $customer_post->load_type_id = $request->load_type_id;
        $customer_post->currency_id = $request->currency_id;



        if ($customer_post->save()) {

            $customer_description = new CustomerPostsDescription();

            $customer_description->description = $request->description;

            $customer_description->customer_post_id = $customer_post->id;

            if ($customer_description->save()){
                return redirect()->back()->with(['success' => 'Documents Sent']);
            }

        } else{
            return redirect()->back()->with(['fail' => 'Error Data']);
        }
    }

    public function countCustomersPost(){
        echo \App\Models\CustomerPost::orderBy('created_at','desc')->count();
    }

}
