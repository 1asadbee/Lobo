<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhoneNumberRequest;
use App\Http\Requests\UpdatePhoneNumberRequest;
use App\Http\Resources\Admin\PhoneNumberResource;
use App\Models\PhoneNumber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PhoneNumbersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('phone_number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PhoneNumberResource(PhoneNumber::with(['user'])->get());
    }

    public function store(StorePhoneNumberRequest $request)
    {
        $phoneNumber = PhoneNumber::create($request->all());

        return (new PhoneNumberResource($phoneNumber))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PhoneNumber $phoneNumber)
    {
        abort_if(Gate::denies('phone_number_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PhoneNumberResource($phoneNumber->load(['user']));
    }

    public function update(UpdatePhoneNumberRequest $request, PhoneNumber $phoneNumber)
    {
        $phoneNumber->update($request->all());

        return (new PhoneNumberResource($phoneNumber))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PhoneNumber $phoneNumber)
    {
        abort_if(Gate::denies('phone_number_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $phoneNumber->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
