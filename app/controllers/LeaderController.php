<?php


class LeaderController extends BaseController {

	/**
	 * Returns all Leaders
	 *
	 * @return Response
	 */
	public function all() {
		try {
			$leaders = Leader::with('locations')->get();
		} catch (Exception $e) {
			Log::error($e);
			return Response::json(['message' => 'Sorry! There was a problem retrieving the leaders'], 404);
		}
		return Response::json(['data' => $leaders], 200);
	}

	/**
	 * Creates a Leader resource
	 * @return Response 
	 */
	public function store()
	{
		$firstName = Input::get('firstName');
		$lastName = Input::get('lastName');
		$email = Input::has('email') ? Input::get('email') : '';
		$locationIdCollection = Input::has('locationIdCollection') ? Input::get('locationIdCollection') : [];

		$leader = new Leader;
		$leader->firstName = $firstName;
		$leader->lastName = $lastName;
		$leader->email = $email;
		$leader->save();

		if (!empty($locationIdCollection)) {
			$leader->locations()->attach($locationIdCollection);	
		}
		
		$leader->load('locations');

		return Response::json(['data' => $leader, 'message' => 'Leader was created'], 201);
	}

	/**
	 * Search leaders by query parameter
	 *
	 * @return response
	 */
	public function search() {

		try {
			$q = Input::get('query');
			$query = DB::table('leaders');
			$searchTerms = explode(' ', $q);
			
			foreach($searchTerms as $term) {	
				$query->where('firstName', 'LIKE', '%'. $term .'%')
			          ->orWhere('lastName', 'LIKE', '%' . $term . '%');
			}
			$results = $query->get();
		} catch (Exception $e) {
			Log::error($e);

			return Response::json(['message' => 'There was an error'], 404);
		}

		return Response::json(['data' => $results], 200);
	}


	public function assignToLocation()
	{

		try {
			$leaderId = Input::get('leaderId');
			$locationId = Input::get('locationId');
			$leader = Leader::find($leaderId);
			$leader->locations()->attach($locationId);
		} catch (Exception $e) {
			Log::error($e);

			return Response::json(['message' => 'Something went wrong'], 400);
		}

		$leader->load('locations');

		return Response::json(['data' => $leader], 200);
	}

	/**
	 * Bulk-updates assigned locations for a specified leader
	 *
	 *
	 */
	public function updateLocations()
	{

		try {
			$locations = Input::get('locations');
			$leaderId = Input::get('leaderId');
			$leader = Leader::find($leaderId);
			$leader->locations()->sync($locations);

		} catch (Exception $e) {
			return Response::json(['message' => 'Something went wrong updating the locations'], 400);
		}

		$payload = $leader->locations;

		return Response::json(['message' => 'locations updated', 'data' => $payload], 200);

	}

	public function unassignToLocation()
	{
		try {			
			$leaderId = Input::get('leaderId');
			$locationId = Input::get('locationId');
			$leader = Leader::find($leaderId);
			$leader->locations()->detach($locationId);
		} catch (Exception $e) {
			Log::error($e);

			return Response::json(['message' => 'Something went wrong'], 400);
		}

		$leader->load('locations');

		return Response::json(['data' => $leader], 200);		
	}
}