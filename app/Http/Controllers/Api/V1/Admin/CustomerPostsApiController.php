<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerPostRequest;
use App\Http\Requests\UpdateCustomerPostRequest;
use App\Http\Resources\Admin\CustomerPostResource;
use App\Models\CustomerPost;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerPostsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerPostResource(CustomerPost::with(['user', 'from', 'to', 'delivery_type', 'vehicle_type', 'load_type', 'currency'])->get());
    }

    public function store(StoreCustomerPostRequest $request)
    {
        $customerPost = CustomerPost::create($request->all());

        return (new CustomerPostResource($customerPost))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CustomerPost $customerPost)
    {
        abort_if(Gate::denies('customer_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerPostResource($customerPost->load(['user', 'from', 'to', 'delivery_type', 'vehicle_type', 'load_type', 'currency']));
    }

    public function update(UpdateCustomerPostRequest $request, CustomerPost $customerPost)
    {
        $customerPost->update($request->all());

        return (new CustomerPostResource($customerPost))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CustomerPost $customerPost)
    {
        abort_if(Gate::denies('customer_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerPost->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
