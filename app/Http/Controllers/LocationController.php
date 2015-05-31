<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Location;
use App\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;



class LocationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$locaties = Location::all();
		return view("locations.index", compact('locaties'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$location = new Location;
		$educations = Education::all();
		return view('locations.create', compact('location', 'educations'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$location = Location::create($input);
		isset($input['educations']) ? $location->educations()->sync($input['educations']) :  $location->educations()->sync($input['educations']);
		return Redirect::route('locaties.index')->with('message', 'Locatie Opgeslagen.');
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
		$location = Location::findOrFail($id);
		$educations = Education::all();
		return view('locations.edit', compact('location','educations'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$location = Location::findOrFail($id);
		$input = array_except(Input::all(), '_method');
		$location->update($input);
		isset($input['educations']) ? $location->educations()->sync($input['educations']) :  $location->educations()->sync($input['educations']);
		return Redirect::route('locaties.index')->with('message', 'Locatie Opgeslagen.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$location = Location::findOrFail($id);
		$location->delete();
		return Redirect::route('locaties.index')->with('message', 'Locatie Deleted.');
	}

}
