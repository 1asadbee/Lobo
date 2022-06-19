<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDeclarantRequest;
use App\Http\Requests\StoreDeclarantRequest;
use App\Http\Requests\UpdateDeclarantRequest;
use App\Models\Declarant;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeclarantsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('declarant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $declarants = Declarant::with(['user'])->get();

        return view('admin.declarants.index', compact('declarants'));
    }

    public function create()
    {
        abort_if(Gate::denies('declarant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.declarants.create', compact('users'));
    }

    public function store(StoreDeclarantRequest $request)
    {
        $declarant = Declarant::create($request->all());

        return redirect()->route('admin.declarants.index');
    }

    public function edit(Declarant $declarant)
    {
        abort_if(Gate::denies('declarant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $declarant->load('user');

        return view('admin.declarants.edit', compact('declarant', 'users'));
    }

    public function update(UpdateDeclarantRequest $request, Declarant $declarant)
    {
        $declarant->update($request->all());

        return redirect()->route('admin.declarants.index');
    }

    public function show(Declarant $declarant)
    {
        abort_if(Gate::denies('declarant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $declarant->load('user');

        return view('admin.declarants.show', compact('declarant'));
    }

    public function destroy(Declarant $declarant)
    {
        abort_if(Gate::denies('declarant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $declarant->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeclarantRequest $request)
    {
        Declarant::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
