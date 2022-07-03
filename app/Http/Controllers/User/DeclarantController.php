<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Declarant;
use App\Models\DeclarantsDescription;
use Illuminate\Http\Request;

class DeclarantController extends Controller
{
    public function addDeclarant(Request $request)
    {
        $this->validate($request, [
            'declaration' => '',
            'settlement_fee' => '',
            'registration_certificate' => '',
            'obtaining_license' => '',
            'obtaining_permits' => '',
            'unusual_cargo' => '',
            'insurance' => '',
            'status' => '',
            'description' => 'required',
            'currency_id' => 'required',
            'price' => 'required'
        ]);

        $declarant = new Declarant();

        $declarant->user_id = auth()->user()->id;
        $declarant->declaration = $request->declaration == 'on' ? 1 : 0;
        $declarant->settlement_fee = $request->settlement_fee == 'on' ? 1 : 0;
        $declarant->registration_certificate = $request->registration_certificate == 'on' ? 1 : 0;
        $declarant->obtaining_license = $request->obtaining_license == 'on' ? 1 : 0;
        $declarant->obtaining_permits = $request->obtaining_permits == 'on' ? 1 : 0;
        $declarant->unusual_cargo = $request->unusual_cargo == 'on' ? 1 : 0;
        $declarant->insurance = $request->insurance == 'on' ? 1 : 0;
        $declarant->status = $request->status == 'on' ? 1 : 0;
        $declarant->price = $request->price;
        $declarant->currency_id = $request->currency_id;


        if ($declarant->save()) {

            $declarant_description = new DeclarantsDescription();

            $declarant_description->description = $request->description;

            $declarant_description->declarant_id = $declarant->id;

            if ($declarant_description->save()) {
                return redirect()->back()->with(['success' => 'Documents Sent']);
            } else
                return redirect()->back()->with(['fail' => 'Error Data']);
        }

    }


    public function declarants(Request $request)
    {

        if ($request->search == 1) {

            $declarants = Declarant::where('id', '!=', 0);

            if (isset($request->declaration) && $request->declaration == 1) {
                $declarants->where('declaration', $request->declaration);
            } else {
                $declarants->where('declaration', '!=', 1);
            }

            if (isset($request->settlement_fee) && $request->settlement_fee == 1) {
                $declarants->where('settlement_fee', $request->settlement_fee);
            } else {
                $declarants->where('settlement_fee', null);
            }

            if (isset($request->registration_certificate) && $request->registration_certificate == 1) {
                $declarants->where('registration_certificate', $request->registration_certificate);
            } else {
                $declarants->where('registration_certificate', null);
            }

            if (isset($request->obtaining_license) && $request->obtaining_license == 1) {
                $declarants->where('obtaining_license', $request->obtaining_license);
            } else {
                $declarants->where('obtaining_license', null);
            }

            if (isset($request->obtaining_permits) && $request->obtaining_permits == 1) {
                $declarants->where('obtaining_permits', $request->obtaining_permits);
            } else {
                $declarants->where('obtaining_permits', null);
            }

            if (isset($request->unusual_cargo) && $request->unusual_cargo == 1) {
                $declarants->where('unusual_cargo', $request->unusual_cargo);
            } else {
                $declarants->where('unusual_cargo', null);
            }

            if (isset($request->insurance) && $request->insurance == 1) {
                $declarants->where('insurance', $request->insurance);
            } else {
                $declarants->where('insurance', null);
            }

            if ($request->price_from != '' || $request->price_from != '') {
                if ($request->price_from == '') {
                    $request->price_from = 0;
                }

                if ($request->price_to == '') {
                    $request->price_to = 0;
                }

                $declarants->where('price', '>=', $request->price_from)->where('price', '<=', $request->price_to);
            }

            return view('user.declarants.index', ['declarants' => $declarants->orderBy('created_at', 'desc')->paginate(15)]);
        } else {
            return view('user.declarants.index', ['declarants' => Declarant::orderBy('created_at', 'desc')->paginate(15)]);
        }

    }

    public function countDeclarants()
    {
        echo \App\Models\Declarant::orderBy('created_at', 'desc')->count();
    }
}
