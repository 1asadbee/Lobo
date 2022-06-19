<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpensesDeclarantPostRequest;
use App\Http\Requests\UpdateExpensesDeclarantPostRequest;
use App\Http\Resources\Admin\ExpensesDeclarantPostResource;
use App\Models\ExpensesDeclarantPost;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpensesDeclarantPostsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expenses_declarant_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpensesDeclarantPostResource(ExpensesDeclarantPost::with(['user', 'declarant_post'])->get());
    }

    public function store(StoreExpensesDeclarantPostRequest $request)
    {
        $expensesDeclarantPost = ExpensesDeclarantPost::create($request->all());

        return (new ExpensesDeclarantPostResource($expensesDeclarantPost))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ExpensesDeclarantPost $expensesDeclarantPost)
    {
        abort_if(Gate::denies('expenses_declarant_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpensesDeclarantPostResource($expensesDeclarantPost->load(['user', 'declarant_post']));
    }

    public function update(UpdateExpensesDeclarantPostRequest $request, ExpensesDeclarantPost $expensesDeclarantPost)
    {
        $expensesDeclarantPost->update($request->all());

        return (new ExpensesDeclarantPostResource($expensesDeclarantPost))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ExpensesDeclarantPost $expensesDeclarantPost)
    {
        abort_if(Gate::denies('expenses_declarant_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensesDeclarantPost->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
