<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerPostsDescriptionRequest;
use App\Http\Requests\UpdateCustomerPostsDescriptionRequest;
use App\Http\Resources\Admin\CustomerPostsDescriptionResource;
use App\Models\CustomerPostsDescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerPostsDescriptionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_posts_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerPostsDescriptionResource(CustomerPostsDescription::with(['customer_post'])->get());
    }

    public function store(StoreCustomerPostsDescriptionRequest $request)
    {
        $customerPostsDescription = CustomerPostsDescription::create($request->all());

        return (new CustomerPostsDescriptionResource($customerPostsDescription))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CustomerPostsDescription $customerPostsDescription)
    {
        abort_if(Gate::denies('customer_posts_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerPostsDescriptionResource($customerPostsDescription->load(['customer_post']));
    }

    public function update(UpdateCustomerPostsDescriptionRequest $request, CustomerPostsDescription $customerPostsDescription)
    {
        $customerPostsDescription->update($request->all());

        return (new CustomerPostsDescriptionResource($customerPostsDescription))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CustomerPostsDescription $customerPostsDescription)
    {
        abort_if(Gate::denies('customer_posts_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerPostsDescription->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
