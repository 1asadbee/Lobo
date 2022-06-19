<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerPostsDescriptionRequest;
use App\Http\Requests\StoreCustomerPostsDescriptionRequest;
use App\Http\Requests\UpdateCustomerPostsDescriptionRequest;
use App\Models\CustomerPost;
use App\Models\CustomerPostsDescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerPostsDescriptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_posts_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerPostsDescriptions = CustomerPostsDescription::with(['customer_post'])->get();

        return view('admin.customerPostsDescriptions.index', compact('customerPostsDescriptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_posts_description_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer_posts = CustomerPost::pluck('daten', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.customerPostsDescriptions.create', compact('customer_posts'));
    }

    public function store(StoreCustomerPostsDescriptionRequest $request)
    {
        $customerPostsDescription = CustomerPostsDescription::create($request->all());

        return redirect()->route('admin.customer-posts-descriptions.index');
    }

    public function edit(CustomerPostsDescription $customerPostsDescription)
    {
        abort_if(Gate::denies('customer_posts_description_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer_posts = CustomerPost::pluck('daten', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customerPostsDescription->load('customer_post');

        return view('admin.customerPostsDescriptions.edit', compact('customerPostsDescription', 'customer_posts'));
    }

    public function update(UpdateCustomerPostsDescriptionRequest $request, CustomerPostsDescription $customerPostsDescription)
    {
        $customerPostsDescription->update($request->all());

        return redirect()->route('admin.customer-posts-descriptions.index');
    }

    public function show(CustomerPostsDescription $customerPostsDescription)
    {
        abort_if(Gate::denies('customer_posts_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerPostsDescription->load('customer_post');

        return view('admin.customerPostsDescriptions.show', compact('customerPostsDescription'));
    }

    public function destroy(CustomerPostsDescription $customerPostsDescription)
    {
        abort_if(Gate::denies('customer_posts_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerPostsDescription->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerPostsDescriptionRequest $request)
    {
        CustomerPostsDescription::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
