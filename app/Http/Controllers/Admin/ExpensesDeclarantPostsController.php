<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExpensesDeclarantPostRequest;
use App\Http\Requests\StoreExpensesDeclarantPostRequest;
use App\Http\Requests\UpdateExpensesDeclarantPostRequest;
use App\Models\Declarant;
use App\Models\ExpensesDeclarantPost;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpensesDeclarantPostsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expenses_declarant_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensesDeclarantPosts = ExpensesDeclarantPost::with(['user', 'declarant_post'])->get();

        return view('admin.expensesDeclarantPosts.index', compact('expensesDeclarantPosts'));
    }

    public function create()
    {
        abort_if(Gate::denies('expenses_declarant_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $declarant_posts = Declarant::pluck('declaration', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.expensesDeclarantPosts.create', compact('declarant_posts', 'users'));
    }

    public function store(StoreExpensesDeclarantPostRequest $request)
    {
        $expensesDeclarantPost = ExpensesDeclarantPost::create($request->all());

        return redirect()->route('admin.expenses-declarant-posts.index');
    }

    public function edit(ExpensesDeclarantPost $expensesDeclarantPost)
    {
        abort_if(Gate::denies('expenses_declarant_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $declarant_posts = Declarant::pluck('declaration', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expensesDeclarantPost->load('user', 'declarant_post');

        return view('admin.expensesDeclarantPosts.edit', compact('declarant_posts', 'expensesDeclarantPost', 'users'));
    }

    public function update(UpdateExpensesDeclarantPostRequest $request, ExpensesDeclarantPost $expensesDeclarantPost)
    {
        $expensesDeclarantPost->update($request->all());

        return redirect()->route('admin.expenses-declarant-posts.index');
    }

    public function show(ExpensesDeclarantPost $expensesDeclarantPost)
    {
        abort_if(Gate::denies('expenses_declarant_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensesDeclarantPost->load('user', 'declarant_post');

        return view('admin.expensesDeclarantPosts.show', compact('expensesDeclarantPost'));
    }

    public function destroy(ExpensesDeclarantPost $expensesDeclarantPost)
    {
        abort_if(Gate::denies('expenses_declarant_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensesDeclarantPost->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpensesDeclarantPostRequest $request)
    {
        ExpensesDeclarantPost::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
