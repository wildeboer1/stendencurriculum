<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Module;
use App\Education;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ModuleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$modules = Module::all();
		return view("modules.index", compact('modules'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$module = new Module;
		return view("modules.create", compact('module'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$module = Module::create($input);
		return Redirect::route('modules.index')->with('message', 'Module Opgeslagen.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$module = Module::findOrFail($id);
		return view("modules.edit", compact('module'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$module = Module::findOrFail($id);
		$input = array_except(Input::all(), '_method');
		$module->update($input);
		return Redirect::route('modules.index')->with('message', 'Module Opgeslagen.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$module = Module::findOrFail($id);
		$module->delete();
		return Redirect::route('modules.index')->with('message', 'Module Deleted.');
	}
}
