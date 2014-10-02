<?php 

class MemberController extends BaseController {

	/**
	 * GET /member/{id}
	 *
	 * show SINGLE Member information page.
	 * @param string $id
	 */

	public function viewMember($id) {

		if (!Auth::check()) { return Redirect::to('login');  }

		$member = Member::find($id);

		return View::make('viewmember')->withMember($member);
	}

	/**
	 * GET /member/{id}/edit
	 *
	 * show SINGLE Member EDIT page.
	 * @param string $id
	 */

	public function getEditMember($id) {

		$member = Member::find($id);

		return View::make('editmember')->withMember($member);
	}

	/**
	 * PUT /member/{id}/edit
	 *
	 * PUT SINGLE Member EDIT page.
	 * @param string $id
	 */

	public function postEditMember($id) {

		//TODO : Improve Edit functionality and validation.

		// Collect the data from the form.
		$mFirstName = Input::get('NameFirst');
		$mLastName = Input::get('NameLast');
		$mGender = Input::get('Gender');

		if (Input::hasFile('ImagePath')) {
			$mImage = Input::file('ImagePath');	
		} else {
			$mImage = false;
		}
		
		$mPhone = Input::get('NumberPhone');
		$mEmail = Input::get('AddressEmail');
		$mAddress = Input::get('AddressHome');
		// $mCity = Input::get('city');
		$mFirstParentName = Input::get('Parent1NameFirst');
		$mSecondParentName = Input::get('Parent2NameFirst');
		$mParentContact = Input::get('Parent1Phone1');

		// Parse Phone numbers to remove dashes and parenthesis.
		$mPhone = preg_replace('/\D+/', '', $mPhone);
		$mParentContact = preg_replace('/\D+/', '', $mParentContact);

		// Concatonate City onto Address input
		// $mAddress = $mAddress . " " . $mCity;

		$imagePath = null;

		// Parse and Process Image Upload if applicable
		if($mImage) {

			$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
			$max_size = 2000 * 1024;
			$path = public_path() . '/img/uploads/';
			$ext = $mImage->guessClientExtension();
			$size = $mImage->getClientSize();
			$name = $mImage->getClientOriginalName();

			$imagePath = 'img/uploads/' . $name;

			if (in_array($ext, $valid_exts) AND $size < $max_size) {
			    // move uploaded file from temp to uploads directory
			    if ($mImage->move($path,$name)) {
			        $status = 'Image successfully uploaded!';
			    } else {
			        $status = 'Upload Fail: Unknown error occurred!';
			    }

			} else {
			    $status = 'Upload Fail: Unsupported file format or It is too large to upload!';
			}

		}
				
		// Assign the data and save to model.
		$member = Member::findOrFail($id);
		$member->NameFirst = $mFirstName;
		$member->NameLast = $mLastName;
		$member->Gender = $mGender;
		if($imagePath != null){ $member->ImagePath = $imagePath; }
		$member->NumberPhone = $mPhone;
		$member->AddressHome = $mAddress;
		$member->AddressEmail = $mEmail;
		$member->Parent1NameFirst = $mFirstParentName;
		$member->Parent2NameFirst = $mSecondParentName;
		$member->Parent1Phone1 = $mParentContact;
		$member->update();

		return Redirect::route('viewMember', ['id' => $id]);
	}


	/**
	 * GET /member/create
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
	 * POST /member/create
	 *
	 * Collect data from the Add New Members form,
	 * process, and save to database.
	 *
	 */

	public function submitNewMember() {

		// Collect the data from the form.
		$mFirstName = Input::get('firstname');
		$mLastName = Input::get('lastname');
		$mImage = Input::file('image-upload');
		$mPhone = Input::get('phone');
		$mEmail = Input::get('email');
		$mAddress = Input::get('address');
		// $mCity = Input::get('city');
		$mFirstParentName = Input::get('parent-name-1');
		$mSecondParentName = Input::get('parent-name-2');
		$mParentContact = Input::get('parent-contact');

		// Parse Phone numbers to remove dashes and parenthesis.
		$mPhone = preg_replace('/\D+/', '', $mPhone);
		$mParentContact = preg_replace('/\D+/', '', $mParentContact);

		// Concatonate City onto Address input
		// $mAddress = $mAddress . " " . $mCity;

		// Parse and Process Image Upload
		$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
		$max_size = 2000 * 1024;
		$path = public_path() . '/img/uploads/';
		$ext = $mImage->guessClientExtension();
		$size = $mImage->getClientSize();
		$name = $mImage->getClientOriginalName();

		$imagePath = 'img/uploads/' . $name;

		if (in_array($ext, $valid_exts) AND $size < $max_size) {
		    // move uploaded file from temp to uploads directory
		    if ($mImage->move($path,$name)) {
		        $status = 'Image successfully uploaded!';
		    } else {
		        $status = 'Upload Fail: Unknown error occurred!';
		    }

		} else {
		    $status = 'Upload Fail: Unsupported file format or It is too large to upload!';
		}
		
		// Assign the data and save to model.
		$member = new Member;
		$member->NameFirst = $mFirstName;
		$member->NameLast = $mLastName;
		$member->ImagePath = $imagePath;
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
	 * GET member/list
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
		return View::make('listmembers')->withMembers($members);
	}


	/**
	 * POST /member/search
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










