<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpensesCustomerPostRequest;
use App\Http\Requests\UpdateExpensesCustomerPostRequest;
use App\Http\Resources\Admin\ExpensesCustomerPostResource;
use App\Models\ExpensesCustomerPost;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpensesCustomerPostsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expenses_customer_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpensesCustomerPostResource(ExpensesCustomerPost::with(['user', 'customer_post'])->get());
    }

    public function store(StoreExpensesCustomerPostRequest $request)
    {
        $expensesCustomerPost = ExpensesCustomerPost::create($request->all());

        return (new ExpensesCustomerPostResource($expensesCustomerPost))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ExpensesCustomerPost $expensesCustomerPost)
    {
        abort_if(Gate::denies('expenses_customer_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpensesCustomerPostResource($expensesCustomerPost->load(['user', 'customer_post']));
    }

    public function update(UpdateExpensesCustomerPostRequest $request, ExpensesCustomerPost $expensesCustomerPost)
    {
        $expensesCustomerPost->update($request->all());

        return (new ExpensesCustomerPostResource($expensesCustomerPost))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ExpensesCustomerPost $expensesCustomerPost)
    {
        abort_if(Gate::denies('expenses_customer_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensesCustomerPost->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
