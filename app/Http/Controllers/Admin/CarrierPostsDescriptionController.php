<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCarrierPostsDescriptionRequest;
use App\Http\Requests\StoreCarrierPostsDescriptionRequest;
use App\Http\Requests\UpdateCarrierPostsDescriptionRequest;
use App\Models\CarrierPost;
use App\Models\CarrierPostsDescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarrierPostsDescriptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('carrier_posts_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrierPostsDescriptions = CarrierPostsDescription::with(['carrier_post'])->get();

        return view('admin.carrierPostsDescriptions.index', compact('carrierPostsDescriptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('carrier_posts_description_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrier_posts = CarrierPost::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.carrierPostsDescriptions.create', compact('carrier_posts'));
    }

    public function store(StoreCarrierPostsDescriptionRequest $request)
    {
        $carrierPostsDescription = CarrierPostsDescription::create($request->all());

        return redirect()->route('admin.carrier-posts-descriptions.index');
    }

    public function edit(CarrierPostsDescription $carrierPostsDescription)
    {
        abort_if(Gate::denies('carrier_posts_description_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrier_posts = CarrierPost::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carrierPostsDescription->load('carrier_post');

        return view('admin.carrierPostsDescriptions.edit', compact('carrierPostsDescription', 'carrier_posts'));
    }

    public function update(UpdateCarrierPostsDescriptionRequest $request, CarrierPostsDescription $carrierPostsDescription)
    {
        $carrierPostsDescription->update($request->all());

        return redirect()->route('admin.carrier-posts-descriptions.index');
    }

    public function show(CarrierPostsDescription $carrierPostsDescription)
    {
        abort_if(Gate::denies('carrier_posts_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrierPostsDescription->load('carrier_post');

        return view('admin.carrierPostsDescriptions.show', compact('carrierPostsDescription'));
    }

    public function destroy(CarrierPostsDescription $carrierPostsDescription)
    {
        abort_if(Gate::denies('carrier_posts_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrierPostsDescription->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarrierPostsDescriptionRequest $request)
    {
        CarrierPostsDescription::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
