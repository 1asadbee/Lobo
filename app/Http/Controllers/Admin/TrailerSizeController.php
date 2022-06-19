<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrailerSizeRequest;
use App\Http\Requests\StoreTrailerSizeRequest;
use App\Http\Requests\UpdateTrailerSizeRequest;
use App\Models\TrailerSize;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrailerSizeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trailer_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trailerSizes = TrailerSize::with(['user'])->get();

        return view('admin.trailerSizes.index', compact('trailerSizes'));
    }

    public function create()
    {
        abort_if(Gate::denies('trailer_size_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trailerSizes.create', compact('users'));
    }

    public function store(StoreTrailerSizeRequest $request)
    {
        $trailerSize = TrailerSize::create($request->all());

        return redirect()->route('admin.trailer-sizes.index');
    }

    public function edit(TrailerSize $trailerSize)
    {
        abort_if(Gate::denies('trailer_size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trailerSize->load('user');

        return view('admin.trailerSizes.edit', compact('trailerSize', 'users'));
    }

    public function update(UpdateTrailerSizeRequest $request, TrailerSize $trailerSize)
    {
        $trailerSize->update($request->all());

        return redirect()->route('admin.trailer-sizes.index');
    }

    public function show(TrailerSize $trailerSize)
    {
        abort_if(Gate::denies('trailer_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trailerSize->load('user');

        return view('admin.trailerSizes.show', compact('trailerSize'));
    }

    public function destroy(TrailerSize $trailerSize)
    {
        abort_if(Gate::denies('trailer_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trailerSize->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrailerSizeRequest $request)
    {
        TrailerSize::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
