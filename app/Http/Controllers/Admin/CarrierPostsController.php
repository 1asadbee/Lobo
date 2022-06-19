<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCarrierPostRequest;
use App\Http\Requests\StoreCarrierPostRequest;
use App\Http\Requests\UpdateCarrierPostRequest;
use App\Models\CarrierPost;
use App\Models\Currency;
use App\Models\State;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarrierPostsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('carrier_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrierPosts = CarrierPost::with(['user', 'from', 'to', 'currency'])->get();

        return view('admin.carrierPosts.index', compact('carrierPosts'));
    }

    public function create()
    {
        abort_if(Gate::denies('carrier_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $froms = State::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tos = State::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.carrierPosts.create', compact('currencies', 'froms', 'tos', 'users'));
    }

    public function store(StoreCarrierPostRequest $request)
    {
        $carrierPost = CarrierPost::create($request->all());

        return redirect()->route('admin.carrier-posts.index');
    }

    public function edit(CarrierPost $carrierPost)
    {
        abort_if(Gate::denies('carrier_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $froms = State::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tos = State::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carrierPost->load('user', 'from', 'to', 'currency');

        return view('admin.carrierPosts.edit', compact('carrierPost', 'currencies', 'froms', 'tos', 'users'));
    }

    public function update(UpdateCarrierPostRequest $request, CarrierPost $carrierPost)
    {
        $carrierPost->update($request->all());

        return redirect()->route('admin.carrier-posts.index');
    }

    public function show(CarrierPost $carrierPost)
    {
        abort_if(Gate::denies('carrier_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrierPost->load('user', 'from', 'to', 'currency');

        return view('admin.carrierPosts.show', compact('carrierPost'));
    }

    public function destroy(CarrierPost $carrierPost)
    {
        abort_if(Gate::denies('carrier_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrierPost->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarrierPostRequest $request)
    {
        CarrierPost::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
