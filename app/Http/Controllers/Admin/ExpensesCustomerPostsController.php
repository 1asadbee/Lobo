<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExpensesCustomerPostRequest;
use App\Http\Requests\StoreExpensesCustomerPostRequest;
use App\Http\Requests\UpdateExpensesCustomerPostRequest;
use App\Models\CustomerPost;
use App\Models\ExpensesCustomerPost;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpensesCustomerPostsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expenses_customer_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensesCustomerPosts = ExpensesCustomerPost::with(['user', 'customer_post'])->get();

        return view('admin.expensesCustomerPosts.index', compact('expensesCustomerPosts'));
    }

    public function create()
    {
        abort_if(Gate::denies('expenses_customer_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customer_posts = CustomerPost::pluck('to_city', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.expensesCustomerPosts.create', compact('customer_posts', 'users'));
    }

    public function store(StoreExpensesCustomerPostRequest $request)
    {
        $expensesCustomerPost = ExpensesCustomerPost::create($request->all());

        return redirect()->route('admin.expenses-customer-posts.index');
    }

    public function edit(ExpensesCustomerPost $expensesCustomerPost)
    {
        abort_if(Gate::denies('expenses_customer_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customer_posts = CustomerPost::pluck('to_city', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expensesCustomerPost->load('user', 'customer_post');

        return view('admin.expensesCustomerPosts.edit', compact('customer_posts', 'expensesCustomerPost', 'users'));
    }

    public function update(UpdateExpensesCustomerPostRequest $request, ExpensesCustomerPost $expensesCustomerPost)
    {
        $expensesCustomerPost->update($request->all());

        return redirect()->route('admin.expenses-customer-posts.index');
    }

    public function show(ExpensesCustomerPost $expensesCustomerPost)
    {
        abort_if(Gate::denies('expenses_customer_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensesCustomerPost->load('user', 'customer_post');

        return view('admin.expensesCustomerPosts.show', compact('expensesCustomerPost'));
    }

    public function destroy(ExpensesCustomerPost $expensesCustomerPost)
    {
        abort_if(Gate::denies('expenses_customer_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensesCustomerPost->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpensesCustomerPostRequest $request)
    {
        ExpensesCustomerPost::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
