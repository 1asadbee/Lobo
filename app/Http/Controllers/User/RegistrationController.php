<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Carrier;
use App\Models\Declarant;
use App\Models\DeclarantsDescription;
use App\Models\TrailerSize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{
    public function carrierCarInputs(Request $request)
    {
        if (isset($request->delivery_type)) {
            echo ' <div class="mb-2">Vehicle</div>
                   <select onchange="activateRegisterBtn()" id="vehicle" name="vehicle" class="input w-full border flex-1 your_car">
                   <option disabled selected>Vehicle</option>';
            foreach (\App\Models\Vehicle::where('delivery_type_id', $request->delivery_type)->select('id', 'name_'.$request->lang)->get() as $vehicle) {
                if ($vehicle->id == $request->vehicle_id){
                    echo '<option value="'.$vehicle->id.'" selected>'.$vehicle['name_'.$request->lang].'</option>';
                }else{
                    echo '<option value="'.$vehicle->id.'">'.$vehicle['name_'.$request->lang].'</option>';
                }
            }
            echo '</select>';
            if ($vehicle->id != ''){

                echo "<script type='text/javascript'> $(document).ready(function () {
            $('#vehicle').change(function () {
                $('#vehicle_type_div').load('".route('input-function',$request->lang)."?vehicle=' + document.getElementById('vehicle').value);
                document.getElementById('weight_div').style.display = 'block';
                document.getElementById('height_div').style.display = 'block';
                document.getElementById('width_div').style.display = 'block';
                document.getElementById('length_div').style.display = 'block';
            });
        }) </script>";
            }


        }elseif (isset($request->vehicle)){
            echo ' <div class="mb-2">Vehicle Types</div>
                   <select onchange="activateRegisterBtn()" name="vehicle_type" class="input w-full border flex-1 your_car">
                   <option disabled selected>Vehicle Types</option>';
            foreach (\App\Models\VehicleType::where('vehicle_id', $request->vehicle)->select('id', 'name_'.$request->lang)->get() as $vehicle_type) {
                echo '<option value="'.$vehicle_type->id.'">'.$vehicle_type['name_'.$request->lang].'</option>';
            }
            echo '</select>';
        }

    }

    public function register(Request $request){
        $this->validate($request, [
            'role' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users',
            'phone_number' => 'required|unique:phone_numbers',
            'passcode' => 'required|min:8|same:confirm_password',
        ]);

        $user = new User();

        $user->name = $request->first_name."_".$request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->passcode);

        if ($request->who_are_you == 'jur'){
            $this->validate($request, [
                'company_name' => 'required',
            ]);
            $user->company_name = $request->company_name;
        }

        if ($user->save()) {
            if ($request->role == 'carrier') {
                $this->validate($request, [
                    'vehicle_number' => 'min:100|required',
                    'who_are_you' => 'required',
                    'vehicle_model' => 'required',
                    'delivery_type' => 'required',
                    'vehicle' => 'required',
                    'vehicle_type' => 'required',
                    'weight' => 'required',
                    'height' => 'required',
                    'width' => 'required',
                    'length' => 'required',
                ]);

                $trailer_size = new TrailerSize();

                $trailer_size->weight = $request->weight;
                $trailer_size->height = $request->height;
                $trailer_size->width = $request->width;
                $trailer_size->length = $request->length;

                if ($trailer_size->save()){

                    $carrier = new Carrier();

                    $carrier->vehicle_model_id = $request->vehicle_model;
                    $carrier->delivery_type_id = $request->delivery_type;
                    $carrier->vehicle_type_id = $request->vehicle_type;
                    $carrier->vehicle_number = $request->vehicle_number;
                    $carrier->trailer_size_id = $trailer_size->id;
                    $carrier->user_id = $user->id;

                    if ($carrier->save() && DB::table('phone_numbers')->insert(array('user_id'=>$user->id,'phone_number'=>$request->phone_number)) && DB::table('role_user')->insert(array('user_id'=>$user->id,'role_id'=>User::CARRIER))) {
                        Auth::login($user);
                        return redirect()->route('home', $request->lang)->with(['success' => 'You Logged In Successfully!']);
                    }
                }
            }
            elseif ($request->role == 'declarant') {

                $declarant = new Declarant();

                $declarant->declaration = $request->declaration;
                $declarant->settlement_fee = $request->settlement_fee;
                $declarant->registration_certificate = $request->registration_certificate;
                $declarant->obtaining_license = $request->obtaining_license;
                $declarant->obtaining_permits = $request->obtaining_permits;
                $declarant->unusual_cargo = $request->unusual_cargo;
                $declarant->insurance = $request->insurance;
                $declarant->status = $request->status;
                $declarant->user_id = $user->id;

                if ($declarant->save() && DB::table('phone_numbers')->insert(array('user_id'=>$user->id,'phone_number'=>$request->phone_number)) && DB::table('role_user')->insert(array('user_id'=>$user->id,'role_id'=>User::DECLARANT))) {
                Auth::login($user);
                return redirect()->route('home', $request->lang)->with(['success' => 'You Logged In Successfully!']);
                }

            }
            elseif ($request->role == 'client') {
                if (DB::table('phone_numbers')->insert(array('user_id'=>$user->id,'phone_number'=>$request->phone_number)) && DB::table('role_user')->insert(array('user_id'=>$user->id,'role_id'=>User::CLIENT))) {
                    Auth::login($user);
                    return redirect()->route('home', $request->lang)->with(['success' => 'You Logged In Successfully!']);
                }
            }
        }
    }

    public function login(Request $request){

        if (isset($request->email)){
            $this->validate($request, [
//                'email' => 'email|required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|exists:users,email',
            ]);
        }elseif (isset($request->phone_number)){
            $this->validate($request, [
                'phone_number' => 'required|max:100',
            ]);
        }

        $this->validate($request, [
            'password' => 'required|min:3',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('home',$request->lang)->with(['success' => 'true']);
        }
    }

    public function logout($locale){
        Auth::logout();
        return redirect()->route('home',$locale);
    }
}
