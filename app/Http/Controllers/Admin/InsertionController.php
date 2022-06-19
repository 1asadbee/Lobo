<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInsertionRequest;
use App\Http\Requests\StoreInsertionRequest;
use App\Http\Requests\UpdateInsertionRequest;
use App\Models\Currency;
use App\Models\Insertion;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InsertionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('insertion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insertions = Insertion::with(['user', 'currency'])->get();

        return view('admin.insertions.index', compact('insertions'));
    }

    public function create()
    {
        abort_if(Gate::denies('insertion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.insertions.create', compact('currencies', 'users'));
    }

    public function store(StoreInsertionRequest $request)
    {
        $insertion = Insertion::create($request->all());

        return redirect()->route('admin.insertions.index');
    }

    public function edit(Insertion $insertion)
    {
        abort_if(Gate::denies('insertion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $insertion->load('user', 'currency');

        return view('admin.insertions.edit', compact('currencies', 'insertion', 'users'));
    }

    public function update(UpdateInsertionRequest $request, Insertion $insertion)
    {
        $insertion->update($request->all());

        return redirect()->route('admin.insertions.index');
    }

    public function show(Insertion $insertion)
    {
        abort_if(Gate::denies('insertion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insertion->load('user', 'currency');

        return view('admin.insertions.show', compact('insertion'));
    }

    public function destroy(Insertion $insertion)
    {
        abort_if(Gate::denies('insertion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insertion->delete();

        return back();
    }

    public function massDestroy(MassDestroyInsertionRequest $request)
    {
        Insertion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
