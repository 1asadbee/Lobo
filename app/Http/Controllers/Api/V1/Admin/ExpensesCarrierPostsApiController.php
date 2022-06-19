<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpensesCarrierPostRequest;
use App\Http\Requests\UpdateExpensesCarrierPostRequest;
use App\Http\Resources\Admin\ExpensesCarrierPostResource;
use App\Models\ExpensesCarrierPost;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpensesCarrierPostsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expenses_carrier_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpensesCarrierPostResource(ExpensesCarrierPost::with(['user', 'carrier_post'])->get());
    }

    public function store(StoreExpensesCarrierPostRequest $request)
    {
        $expensesCarrierPost = ExpensesCarrierPost::create($request->all());

        return (new ExpensesCarrierPostResource($expensesCarrierPost))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ExpensesCarrierPost $expensesCarrierPost)
    {
        abort_if(Gate::denies('expenses_carrier_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpensesCarrierPostResource($expensesCarrierPost->load(['user', 'carrier_post']));
    }

    public function update(UpdateExpensesCarrierPostRequest $request, ExpensesCarrierPost $expensesCarrierPost)
    {
        $expensesCarrierPost->update($request->all());

        return (new ExpensesCarrierPostResource($expensesCarrierPost))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ExpensesCarrierPost $expensesCarrierPost)
    {
        abort_if(Gate::denies('expenses_carrier_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensesCarrierPost->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
