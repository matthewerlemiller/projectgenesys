<?php


class LeaderController extends BaseController {

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
				$query->where('LeaderFirstName', 'LIKE', '%'. $term .'%')
			          ->orWhere('LeaderLastName', 'LIKE', '%' . $term . '%');
			}

			$results = $query->get();

		} catch (Exception $e) {
			
			Log::error($e);

			return Response::json(['message' => 'There was an error'], 404);

		}

		return Response::json(['data' => $results], 200);

	}

}