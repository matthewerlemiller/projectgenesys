<?php 

class MemberController extends BaseController {

	/**
	 * GET /addmember
	 *
	 * Check for logged in user, proceed to addmember view if true,
	 * if false redirect to login.
	 *
	 */
	
	public function getAddMember() {

		if(Auth::check()) {
			return View::make('addmember');	
		} else {
			return Redirect::to('login');
		}
		
	}

	/**
	 * POST /addmember
	 *
	 * Collect data from the Add New Members form,
	 * process, and save to database.
	 *
	 */

	public function submitNewMember() {

		// Collect the data from the form.
		$mFirstName = Input::get('firstname');
		$mLastName = Input::get('lastname');
		$mPhone = Input::get('phone');
		$mEmail = Input::get('email');
		$mAddress = Input::get('address');
		$mCity = Input::get('city');
		$mFirstParentName = Input::get('parent-name-1');
		$mSecondParentName = Input::get('parent-name-2');
		$mParentContact = Input::get('parent-contact');

		// Parse Phone numbers to remove dashes and parenthesis.
		$mPhone = preg_replace('/\D+/', '', $mPhone);
		$mParentContact = preg_replace('/\D+/', '', $mParentContact);

		// Concatonate City onto Address input
		$mAddress = $mAddress . " " . $mCity;
		
		// Assign the data and save to model.
		$member = new Member;
		$member->NameFirst = $mFirstName;
		$member->NameLast = $mLastName;
		$member->NumberPhone = $mPhone;
		$member->AddressHome = $mAddress;
		$member->AddressEmail = $mEmail;
		$member->Parent1NameFirst = $mFirstParentName;
		$member->Parent2NameFirst = $mSecondParentName;
		$member->Parent1Phone1 = $mParentContact;
		$member->save();

		return Redirect::route('listMembers');

	}

	/**
	 * GET /listmember
	 *
	 * Produce array of entire members list and
	 * send it to the listmembers view, where
	 * it will be displayed as a list.
	 * For admin only?
	 *
	 */

	public function listMembers() {

		if (!Auth::check()) { return Redirect::to('login');  }

		// Gather Member information from database
		$members = Member::all();

		// Send data to view.
		return View::make('listmembers',['members' => $members]);
	}


	/**
	 * GET /member/{id}
	 *
	 * show SINGLE Member information page.
	 * @param string $id
	 */

	public function viewMember($id) {

		if (!Auth::check()) { return Redirect::to('login');  }

		$member = Member::find($id);

		return View::make('viewmember',['member' => $member]);
	}


	/**
	 * POST Search members functionality.
	 *
	 * Display results based on First or Last name.
	 *
	 */

	public function searchMembers() {

		$q = Input::get('query');

		$query = DB::table('members');

		// Seperate multiple words in query and place in array.
		$searchTerms = explode(' ', $q);
		// Loop through the array and query for the string in the database.
		foreach($searchTerms as $term) {	
			$query->where('NameFirst', 'LIKE', '%'. $term .'%')
		          ->orWhere('NameLast', 'LIKE', '%' . $term . '%');
		}

		$results = $query->get();
		
		return $results;
		
	}


}










