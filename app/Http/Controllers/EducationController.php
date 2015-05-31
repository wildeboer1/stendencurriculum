<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Education;
use App\Module;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
class EducationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$educations = Education::all();

		return view("opleidingen.index", compact('educations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$education = new Education;
		$modules = Module::all();
		$users = User::all();
		return view("opleidingen.create", compact('education', 'modules', 'users'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input = Input::all();
		$education = Education::create($input);

		isset($input['modules']) ? $education->modules()->sync($input['modules']) : $education->modules()->sync([]);
		isset($input['users']) ? $education->users()->sync($input['users']) : $education->users()->sync([]);

		return Redirect::route('opleidingen.index')->with('message', 'Opleiding Opgeslagen.');
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
		$education = Education::findOrFail($id);
		$modules = Module::all();
		$users = User::all();
		return view("opleidingen.edit", compact('education', 'modules', 'users'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$education = Education::findOrFail($id);
		$input = array_except(Input::all(), '_method');

		$education->name = $input['name'];

		isset($input['modules']) ? $education->modules()->sync($input['modules']) :  $education->modules()->sync([]);
		isset($input['users']) ? $education->users()->sync($input['users']) : $education->users()->sync([]);
	
		return Redirect::route('opleidingen.index')->with('message', 'Opleiding Opgeslagen.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$education = Education::findOrFail($id);
		$education->delete();
		return Redirect::route('opleidingen.index')->with('message', 'Opleiding Deleted.');
	}

}
