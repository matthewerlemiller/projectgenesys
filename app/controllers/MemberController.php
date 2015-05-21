<?php

use Carbon\Carbon;
use Austen\Repositories\ImageRepository;
use Austen\Repositories\MemberRepository;

class MemberController extends BaseController {

	protected $image;

	protected $member;

	public function __construct(ImageRepository $image, MemberRepository $member) {

		$this->image = $image;
		$this->member = $member;

	}


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

		if (Input::has('imagePath')) {
			$mImage = Input::get('imagePath');	
		} else {
			$mImage = false;
		}
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

		// Assign the data and save to model.
		$member = new Member;
		$member->NameFirst = $mFirstName;
		$member->NameLast = $mLastName;
		if ($mImage) {
			$member->ImagePath = $mImage;	
		}
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
		$memberLastCheckIn = $member->checklogs()->orderBy('Id', 'desc')->get()->first()["CheckInDateTime"];
		$memberCheckedIn = $memberLastCheckIn ? Carbon::parse($memberLastCheckIn)->isToday() : false;

		return View::make('member')->with(['member' => $member, 'memberCheckedIn' => $memberCheckedIn]);

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

		try {
			
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
				
				$imageName = $mImage->getClientOriginalName();
				$imageName = preg_replace('/\s+/', '', $imageName);
				$imageName = mt_rand(1,999999999) . $imageName;
				$uploadPath = public_path() . '/img/uploads/' . $imageName;
				Image::make($mImage)->resize('800',null, function($constraint){ $constraint->aspectRatio();})->save($uploadPath);
				$imagePath = asset('/img/uploads/' . $imageName);

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
			if ($mBaptizedDate != null) {
				$member->BaptizedDate = $mBaptizedDate;	
			}
			
			$member->Saved = $mSaved;
			$member->Skatepark = $mSkatepark;
			if ($mSchool != null) {
				$member->School = $mSchool;	
			}
			
			$member->M_HsGroup = $mHsGroup;
			$member->M_HsSmGroup = $mHsSmGroup;
			$member->M_JrGroup = $mJrGroup;
			$member->M_HigherGround = $mHigherGround;
			$member->L_BusMinistry = $mBusMinistry;
			$member->L_Worship = $mWorshipLead;
			$member->L_KidsMinistry = $mKidsMinistry;
			$member->L_HsSmGroup = $mSmGroupLead;
			$member->M_LeaderCore = $mLeaderCore;
			$member->E_SummerCamp = $mSummerCamp;
			$member->E_WinterCamp = $mWinterCamp;
			$member->E_FutureQuest = $mFutureQuest;

			$member->update();

		} catch (Exception $e) {
			
			Log::error($e);

		}

		return Redirect::route('member.show', $id);
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

		$searchTerms = explode(' ', $q);
		
		foreach($searchTerms as $term) {	
			$query->where('NameFirst', 'LIKE', '%'. $term .'%')
		          ->orWhere('NameLast', 'LIKE', '%' . $term . '%');
		}

		$results = $query->get();

		foreach($results as $result) {

			$member = Member::find($result->Id);
			$memberLastCheckIn = $member->checklogs()->orderBy('Id', 'desc')->get()->first()["CheckInDateTime"];

			if ($memberLastCheckIn) {

				$memberCheckedIn = Carbon::parse($memberLastCheckIn)->isToday() ? true : false;

			} else {

				$memberCheckedIn = false;
			}
			
			$result->CheckedIn = $memberCheckedIn;
		}
		
		return Response::json(['data' => $results], 200);
		
	}



	public function uploadImage() {

		$file = Input::file('file');

		$upload = $this->image->upload($file, 'img/uploads/', false);

		if ($upload === false) {

			return Response::json(['message' => 'There was an error uploading the image'], 404);

		}

		return Response::json(['data' => $upload['imagePath']], 200);

	}


	/**
	 * API Endpoint. Fetches all relevant data for displaying
	 * member page and for associated behaviors and actions.
	 *
	 */
	public function get($memberId) {

		try {
			
			$member = Member::findOrFail($memberId);
			$member->load('sessions.lesson.rank');

			$rank = $this->member->rank($member);

			if ($rank === false) {

				$rank = Rank::where('Name', '=', 'New')->first();

			}

			$member->rank = $rank;

		} catch (Exception $e) {
			
			Log::error($e);

			return Response::json(['message' => 'Sorry, there was an error'], 404);

		}

		return Response::json(['data' => $member], 200);

	}

}
