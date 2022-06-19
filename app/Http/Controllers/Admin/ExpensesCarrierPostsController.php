<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExpensesCarrierPostRequest;
use App\Http\Requests\StoreExpensesCarrierPostRequest;
use App\Http\Requests\UpdateExpensesCarrierPostRequest;
use App\Models\CarrierPost;
use App\Models\ExpensesCarrierPost;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpensesCarrierPostsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expenses_carrier_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensesCarrierPosts = ExpensesCarrierPost::with(['user', 'carrier_post'])->get();

        return view('admin.expensesCarrierPosts.index', compact('expensesCarrierPosts'));
    }

    public function create()
    {
        abort_if(Gate::denies('expenses_carrier_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carrier_posts = CarrierPost::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.expensesCarrierPosts.create', compact('carrier_posts', 'users'));
    }

    public function store(StoreExpensesCarrierPostRequest $request)
    {
        $expensesCarrierPost = ExpensesCarrierPost::create($request->all());

        return redirect()->route('admin.expenses-carrier-posts.index');
    }

    public function edit(ExpensesCarrierPost $expensesCarrierPost)
    {
        abort_if(Gate::denies('expenses_carrier_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carrier_posts = CarrierPost::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expensesCarrierPost->load('user', 'carrier_post');

        return view('admin.expensesCarrierPosts.edit', compact('carrier_posts', 'expensesCarrierPost', 'users'));
    }

    public function update(UpdateExpensesCarrierPostRequest $request, ExpensesCarrierPost $expensesCarrierPost)
    {
        $expensesCarrierPost->update($request->all());

        return redirect()->route('admin.expenses-carrier-posts.index');
    }

    public function show(ExpensesCarrierPost $expensesCarrierPost)
    {
        abort_if(Gate::denies('expenses_carrier_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensesCarrierPost->load('user', 'carrier_post');

        return view('admin.expensesCarrierPosts.show', compact('expensesCarrierPost'));
    }

    public function destroy(ExpensesCarrierPost $expensesCarrierPost)
    {
        abort_if(Gate::denies('expenses_carrier_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expensesCarrierPost->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpensesCarrierPostRequest $request)
    {
        ExpensesCarrierPost::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
