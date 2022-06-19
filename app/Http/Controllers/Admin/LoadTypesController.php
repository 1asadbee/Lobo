<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLoadTypeRequest;
use App\Http\Requests\StoreLoadTypeRequest;
use App\Http\Requests\UpdateLoadTypeRequest;
use App\Models\LoadType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoadTypesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('load_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loadTypes = LoadType::all();

        return view('admin.loadTypes.index', compact('loadTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('load_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.loadTypes.create');
    }

    public function store(StoreLoadTypeRequest $request)
    {
        $loadType = LoadType::create($request->all());

        return redirect()->route('admin.load-types.index');
    }

    public function edit(LoadType $loadType)
    {
        abort_if(Gate::denies('load_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.loadTypes.edit', compact('loadType'));
    }

    public function update(UpdateLoadTypeRequest $request, LoadType $loadType)
    {
        $loadType->update($request->all());

        return redirect()->route('admin.load-types.index');
    }

    public function show(LoadType $loadType)
    {
        abort_if(Gate::denies('load_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loadType->load('loadTypeCustomerPosts');

        return view('admin.loadTypes.show', compact('loadType'));
    }

    public function destroy(LoadType $loadType)
    {
        abort_if(Gate::denies('load_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loadType->delete();

        return back();
    }

    public function massDestroy(MassDestroyLoadTypeRequest $request)
    {
        LoadType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
