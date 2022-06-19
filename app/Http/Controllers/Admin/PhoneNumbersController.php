<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPhoneNumberRequest;
use App\Http\Requests\StorePhoneNumberRequest;
use App\Http\Requests\UpdatePhoneNumberRequest;
use App\Models\PhoneNumber;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PhoneNumbersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('phone_number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $phoneNumbers = PhoneNumber::with(['user'])->get();

        return view('admin.phoneNumbers.index', compact('phoneNumbers'));
    }

    public function create()
    {
        abort_if(Gate::denies('phone_number_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.phoneNumbers.create', compact('users'));
    }

    public function store(StorePhoneNumberRequest $request)
    {
        $phoneNumber = PhoneNumber::create($request->all());

        return redirect()->route('admin.phone-numbers.index');
    }

    public function edit(PhoneNumber $phoneNumber)
    {
        abort_if(Gate::denies('phone_number_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $phoneNumber->load('user');

        return view('admin.phoneNumbers.edit', compact('phoneNumber', 'users'));
    }

    public function update(UpdatePhoneNumberRequest $request, PhoneNumber $phoneNumber)
    {
        $phoneNumber->update($request->all());

        return redirect()->route('admin.phone-numbers.index');
    }

    public function show(PhoneNumber $phoneNumber)
    {
        abort_if(Gate::denies('phone_number_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $phoneNumber->load('user');

        return view('admin.phoneNumbers.show', compact('phoneNumber'));
    }

    public function destroy(PhoneNumber $phoneNumber)
    {
        abort_if(Gate::denies('phone_number_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $phoneNumber->delete();

        return back();
    }

    public function massDestroy(MassDestroyPhoneNumberRequest $request)
    {
        PhoneNumber::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
