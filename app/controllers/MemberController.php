<?php

use Carbon\Carbon;

class MemberController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		
		if (!Auth::check()) { return Redirect::to('login');  }

		// Gather Member information from database
		$members = Member::all();

		// Send data to view.
		return View::make('listmembers')->withMembers($members);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {

		if(Auth::check()) {

			return View::make('addmember');	

		} else {

			return Redirect::to('login');
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

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
		// $valid_exts = array('jpeg', 'jpg', 'png', 'gif');
		// $max_size = 2000 * 1024;
		// $path = public_path() . '/img/uploads/';
		// $ext = $mImage->guessClientExtension();
		// $size = $mImage->getClientSize();
		// $name = $mImage->getClientOriginalName();

		// $imagePath = 'img/uploads/' . $name;

		// if (in_array($ext, $valid_exts) AND $size < $max_size) {
		//     // move uploaded file from temp to uploads directory
		//     if ($mImage->move($path,$name)) {
		//         $status = 'Image successfully uploaded!';
		//     } else {
		//         $status = 'Upload Fail: Unknown error occurred!';
		//     }

		// } else {
		//     $status = 'Upload Fail: Unsupported file format or It is too large to upload!';
		// }

		// New image upload
		// $image = Input::file('file');

		$imageName = $mImage->getClientOriginalName();
		$uploadPath = public_path() . '/img/uploads/' . $imageName;
		Image::make($mImage)->resize('800',null, function($constraint){ $constraint->aspectRatio();})->save($uploadPath);
		$imagePath = asset('/img/uploads/' . $imageName);
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



		// TODO : implement functionality to allow an optional automatic check 
		// in of member after creation. 

		return Redirect::route('dashboard');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {

		if (!Auth::check()) { return Redirect::to('login');  }

		$member = Member::find($id);
		$memberLastCheckIn = $member->checklogs()->orderBy('CheckLogId', 'desc')->get()->first()["CheckInDateTime"];
		$memberCheckedIn = $memberLastCheckIn ? Carbon::parse($memberLastCheckIn)->isToday() : false;

		return View::make('viewmember')->with(['member' => $member, 'memberCheckedIn' => $memberCheckedIn]);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		
		$member = Member::find($id);

		return View::make('editmember')->withMember($member);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
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
		$mFirstParentName = Input::get('Parent1NameFirst');
		$mSecondParentName = Input::get('Parent2NameFirst');
		$mParent1Phone1 = Input::get('Parent1Phone1');
		$mParent1Phone2 = Input::get('Parent1Phone2');
		$mParent2Phone1 = Input::get('Parent2Phone1');
		$mParent2Phone2 = Input::get('Parent2Phone2');
		$mEmergNameFirst = Input::get('EmergNameFirst');
		$mEmergNameLast = Input::get('EmergNameLast');
		$mEmergPhone1 = Input::get('EmergPhone1');
		$mEmergPhone2 = Input::get('EmergPhone2');
		$mPermissionSlip = Input::get('PermissionSlip');
		$mBaptized = Input::get('Baptized');
		$mBaptizedDate = Input::get('BaptizedDate');
		$mSaved = Input::get('Saved');
		$mSkatepark = Input::get('Skatepark');
		$mSchool = Input::get('School');
		$mHsGroup = Input::get('M_HsGroup');
		$mHsSmGroup = Input::get('M_HsSmGroup');
		$mJrGroup = Input::get('M_JrGroup');
		$mHigherGround = Input::get('M_HigherGround');
		$mBusMinistry = Input::get('M_BusMinstry');
		$mWorshipLead = Input::get('M_WorshipLead');
		$mKidsMinistry = Input::get('M_KidsMinistry');
		$mSmGroupLead = Input::get('M_SmGroupLead');
		$mLeaderCore = Input::get('M_LeaderCore');
		$mSummerCamp = Input::get('E_SummerCamp');
		$mWinterCamp = Input::get('E_WinterCamp');
		$mFutureQuest = Input::get('E_FutureQuest');

		// Parse Phone numbers to remove dashes and parenthesis.
		$mPhone = preg_replace('/\D+/', '', $mPhone);
		$mParent1Phone1 = preg_replace('/\D+/', '', $mParent1Phone1);
		$mParent1Phone2 = preg_replace('/\D+/', '', $mParent1Phone2);
		$mParent2Phone1 = preg_replace('/\D+/', '', $mParent2Phone1);
		$mParent2Phone2 = preg_replace('/\D+/', '', $mParent2Phone2);
		$mEmergPhone1 = preg_replace('/\D+/', '', $mEmergPhone1);
		$mEmergPhone2 = preg_replace('/\D+/', '', $mEmergPhone2);
		
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
		$member->Parent1Phone1 = $mParent1Phone1;
		$member->Parent1Phone2 = $mParent1Phone2;
		$member->Parent2Phone1 = $mParent2Phone1;
		$member->Parent2Phone2 = $mParent2Phone2;
		$member->EmergNameFirst = $mEmergNameFirst;
		$member->EmergNameLast = $mEmergNameLast;
		$member->EmergPhone1 = $mEmergPhone1;
		$member->EmergPhone2 = $mEmergPhone2;
		$member->PermissionSlip = $mPermissionSlip;
		$member->Baptized = $mBaptized;
		$member->BaptizedDate = $mBaptizedDate;
		$member->Saved = $mSaved;
		$member->Skatepark = $mSkatepark;
		$member->School = $mSchool;
		$member->M_HsGroup = $mHsGroup;
		$member->M_HsSmGroup = $mHsSmGroup;
		$member->M_JrGroup = $mJrGroup;
		$member->M_HighGround = $mHigherGround;
		$member->M_BusMinistry = $mBusMinistry;
		$member->M_WorshipLead = $mWorshipLead;
		$member->M_KidsMinistry = $mKidsMinistry;
		$member->M_SmGroupLead = $mSmGroupLead;
		$member->M_LeaderCore = $mLeaderCore;
		$member->E_SummerCamp = $mSummerCamp;
		$member->E_WinterCamp = $mWinterCamp;
		$member->E_FutureQuest = $mFutureQuest;

		$member->update();

		return Redirect::route('viewMember', ['id' => $id]);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {

		// TODO : create ability to delete members.
	}


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

		foreach($results as $result) {

			$member = Member::find($result->MemberId);
			$memberLastCheckIn = $member->checklogs()->orderBy('CheckLogId', 'desc')->get()->first()["CheckInDateTime"];
			$memberCheckedIn = $memberLastCheckIn ? Carbon::parse($memberLastCheckIn)->isToday() : false;
			$result->CheckedIn = $memberCheckedIn;
		}
		
		return Response::json(['data' => $results], 200);
		
	}

}
