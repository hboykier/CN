<?php namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\DomainRequest;
use App\Models\Domain;
use Illuminate\Support\Facades\Input;

class DomainsController extends Controller {

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$domains = Domain::all();
        return view('admin.domain.list', compact('domains'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $domain = new Domain();
        return view('admin.domain.edit', compact ('domain'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(DomainRequest $request)
	{
        $domain = new Domain($request->all());
        $domain->save();
        $route=Input::get('save')!=null ? 'admin.domain.index' : 'admin.domain.create';
        return \Redirect::route($route)->withSuccess(trans('app.has.been.created',['entity' => trans('app.domain'), 'code' => $domain->code]));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $domain = Domain::findOrFail ($id);
        return view('admin.domain.edit', compact ('domain'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(DomainRequest $request, $id)
	{
        $domain = Domain::findOrFail($id);
        $domain->fill($request->all());
		$domain->multivalue = Input::get('multivalue')!=null?true:false;
        $domain->save();
        return \Redirect::route('admin.domain.index')->withSuccess(trans('app.has.been.updated',['entity' => trans('app.domain'), 'code' => $domain->code]));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $domain = Domain::findOrFail($id);
        $domain->delete();
        return \Redirect::route('admin.domain.index')->withSuccess(trans('app.has.been.deleted',['entity' => trans('app.domain'), 'code' => $domain->code]));
    }

}
