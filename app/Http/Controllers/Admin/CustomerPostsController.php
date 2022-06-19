<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerPostRequest;
use App\Http\Requests\StoreCustomerPostRequest;
use App\Http\Requests\UpdateCustomerPostRequest;
use App\Models\Currency;
use App\Models\CustomerPost;
use App\Models\DeliveryType;
use App\Models\LoadType;
use App\Models\State;
use App\Models\User;
use App\Models\VehicleType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerPostsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerPosts = CustomerPost::with(['user', 'from', 'to', 'delivery_type', 'vehicle_type', 'load_type', 'currency'])->get();

        return view('admin.customerPosts.index', compact('customerPosts'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $froms = State::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tos = State::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $delivery_types = DeliveryType::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle_types = VehicleType::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $load_types = LoadType::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.customerPosts.create', compact('currencies', 'delivery_types', 'froms', 'load_types', 'tos', 'users', 'vehicle_types'));
    }

    public function store(StoreCustomerPostRequest $request)
    {
        $customerPost = CustomerPost::create($request->all());

        return redirect()->route('admin.customer-posts.index');
    }

    public function edit(CustomerPost $customerPost)
    {
        abort_if(Gate::denies('customer_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $froms = State::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tos = State::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $delivery_types = DeliveryType::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle_types = VehicleType::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $load_types = LoadType::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customerPost->load('user', 'from', 'to', 'delivery_type', 'vehicle_type', 'load_type', 'currency');

        return view('admin.customerPosts.edit', compact('currencies', 'customerPost', 'delivery_types', 'froms', 'load_types', 'tos', 'users', 'vehicle_types'));
    }

    public function update(UpdateCustomerPostRequest $request, CustomerPost $customerPost)
    {
        $customerPost->update($request->all());

        return redirect()->route('admin.customer-posts.index');
    }

    public function show(CustomerPost $customerPost)
    {
        abort_if(Gate::denies('customer_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerPost->load('user', 'from', 'to', 'delivery_type', 'vehicle_type', 'load_type', 'currency');

        return view('admin.customerPosts.show', compact('customerPost'));
    }

    public function destroy(CustomerPost $customerPost)
    {
        abort_if(Gate::denies('customer_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerPost->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerPostRequest $request)
    {
        CustomerPost::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
