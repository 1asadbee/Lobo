<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDeclarantsDescriptionRequest;
use App\Http\Requests\StoreDeclarantsDescriptionRequest;
use App\Http\Requests\UpdateDeclarantsDescriptionRequest;
use App\Models\Declarant;
use App\Models\DeclarantsDescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeclarantsDescriptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('declarants_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $declarantsDescriptions = DeclarantsDescription::with(['declarant'])->get();

        return view('admin.declarantsDescriptions.index', compact('declarantsDescriptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('declarants_description_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $declarants = Declarant::pluck('declaration', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.declarantsDescriptions.create', compact('declarants'));
    }

    public function store(StoreDeclarantsDescriptionRequest $request)
    {
        $declarantsDescription = DeclarantsDescription::create($request->all());

        return redirect()->route('admin.declarants-descriptions.index');
    }

    public function edit(DeclarantsDescription $declarantsDescription)
    {
        abort_if(Gate::denies('declarants_description_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $declarants = Declarant::pluck('declaration', 'id')->prepend(trans('global.pleaseSelect'), '');

        $declarantsDescription->load('declarant');

        return view('admin.declarantsDescriptions.edit', compact('declarants', 'declarantsDescription'));
    }

    public function update(UpdateDeclarantsDescriptionRequest $request, DeclarantsDescription $declarantsDescription)
    {
        $declarantsDescription->update($request->all());

        return redirect()->route('admin.declarants-descriptions.index');
    }

    public function show(DeclarantsDescription $declarantsDescription)
    {
        abort_if(Gate::denies('declarants_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $declarantsDescription->load('declarant');

        return view('admin.declarantsDescriptions.show', compact('declarantsDescription'));
    }

    public function destroy(DeclarantsDescription $declarantsDescription)
    {
        abort_if(Gate::denies('declarants_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $declarantsDescription->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeclarantsDescriptionRequest $request)
    {
        DeclarantsDescription::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
