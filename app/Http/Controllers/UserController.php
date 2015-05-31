<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller {

	protected $rules = [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'docent_code' => 'required',
			'password' => 'required|confirmed|min:6',
		];
	protected $editRules = [
			'name' => 'required|max:255',
			'docent_code' => 'required',
			'password' => 'required|confirmed|min:6',
		];
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$users = User::all();
		return view("gebruikers.index", compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$user = new User;
		return view("gebruikers.create", compact('user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = Input::all();
		User::create(
			[
				'name' => $input['name'],
				'docent_code' => $input['docent_code'],
				'password' => bcrypt($input['password']),
				'email' => $input['email']
			]
		);
		return Redirect::route('gebruikers.index')->with('message', 'Gebruiker Opgeslagen.');
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
		$user = User::findOrFail($id);
		return view("gebruikers.edit", compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$user = User::findOrFail($id);
		$this->validate($request, $this->editRules);
		$input = array_except(Input::all(), '_method');
		
		$user->update(
			[
				'name' => $input['name'],
				'docent_code' => $input['docent_code'],
				'password' => bcrypt($input['password'])
			]
		);

		return Redirect::route('gebruikers.index')->with('message', 'Gebruiker Opgeslagen.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return m_responsekeys(conn, identifier)
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$user->delete();
		return Redirect::route('gebruikers.index')->with('message', 'Gebruiker Deleted.');
	}

}
