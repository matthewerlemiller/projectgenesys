<?php namespace Austen\Repositories;

use Log;
use Member;
use Rank;
use Carbon\Carbon;
use Status;
use BadBehaviorEvent;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MemberRepository {

	public function all()
	{
		$members = Member::all();
		return $members;
	}

	public function find($id) 
	{
		try {	
			$member = Member::findOrFail($id);
			$memberLastCheckIn = $member->checklogs()->orderBy('id', 'desc')->get()->first()["checkInDateTime"];
			$memberCheckedIn = $memberLastCheckIn ? Carbon::parse($memberLastCheckIn)->isToday() : false;
		} catch (ModelNotFoundException $e) {
			Log::error($e);
			return false;
		}
		return array('member' => $member, 'memberCheckedIn' => $memberCheckedIn);
	}

	/**
	 * API Endpoint. Fetches all relevant data for displaying
	 * member page and for associated behaviors and actions.
	 *
	 */
	public function get($memberId) 
	{
		try {
		
			$member = Member::findOrFail($memberId);
			$member->load('sessions.lesson.rank', 'school');

			$rank = $this->rank($member);

			if ($rank === false) {
				$rank = Rank::where('name', '=', 'New')->first();
			}

			$member->rank = $rank;

		} catch (Exception $e) {
			Log::error($e);
			return false;
		}

		return $member;
	}

	public function store($input) 
	{

		try {
			
			$firstName = $input['firstName'];
			$lastName = $input['lastName'];

			if (isset($input['image'])) {
				$image = $input['image']	;
			} else {
				$image = false;
			}

			$birthDate = $input['birthDate'];
			$phone = $input['phone'];
			$address = $input['address'];
			$city = $input['city'];
			$zip = $input['zip'];
			$emergencyContactName = $input['emergencyContactName'];
			$emergencyContactPhone = $input['emergencyContactPhone'];
			

			// Parse Phone numbers to remove dashes and parenthesis.
			$phone = preg_replace('/\D+/', '', $phone);
			// $parent1Phone = preg_replace('/\D+/', '', $parent1Phone);

			$member = new Member;
			$member->firstName = $firstName;
			$member->lastName = $lastName;
			if ($image) {
				$member->image = $image;	
			}
			$member->birthDate = $birthDate; 
			$member->phone = $phone;
			$member->address = $address;
			$member->city = $city;
			$member->zip = $zip;
			$member->emergencyContactName = $emergencyContactName;
			$member->emergencyContactPhone = $emergencyContactPhone;
			
				
			$member->save();

		} catch (Exception $e) {
			
			Log::erorr($e);

			return false;

		}	

		return $member;

	}

	public function update($input) {

		try {
								
			$member = Member::findOrFail($input['id']);
			$member->firstName = $input['firstName'];
			$member->lastName = $input['lastName'];
			if (isset($input['gender'])) $member->gender = $input['gender'];
			if (isset($input['birthDate'])) $member->birthDate = $input['birthDate'];
			if (isset($input['phone'])) $member->phone = preg_replace('/\D+/', '', $input['phone']);
			if (isset($input['address'])) $member->address = $input['address'];
			if (isset($input['city'])) $member->city = $input['city'];
			if (isset($input['zip'])) $member->zip = $input['zip'];
			if (isset($input['email'])) $member->email = $input['email'];
			if (isset($input['image'])) $member->image = $input['image'];
			if (isset($input['parent1Name'])) $member->parent1Name = $input['parent1Name'];
			if (isset($input['parent2Name'])) $member->parent2Name = $input['parent2Name'];
			if (isset($input['parent1Phone'])) $member->parent1Phone = preg_replace('/\D+/', '', $input['parent1Phone']);
			if (isset($input['parent2Phone'])) $member->parent2Phone = preg_replace('/\D+/', '', $input['parent2Phone']);
			if (isset($input['emergencyContactName'])) $member->emergencyContactName = $input['emergencyContactName'];
			if (isset($input['emergencyContactPhone'])) $member->emergencyContactPhone = preg_replace('/\D+/', '', $input['emergencyContactPhone']);;
			if (isset($input['permissionSlip'])) $member->permissionSlip = $input['permissionSlip'];
			if (isset($input['baptized'])) $member->baptized = $input['baptized'];
			if (isset($input['baptizedDate'])) $member->baptizedDate = $input['baptizedDate'];
			if (isset($input['saved'])) $member->saved = $input['saved'];
			if (isset($input['skatepark'])) $member->skatepark = $input['skatepark'];
			if (isset($input['schoolId'])) $member->schoolId = $input['schoolId'];	
			if (isset($input['attendsHighSchoolGroup'])) $member->attendsHighSchoolGroup = $input['attendsHighSchoolGroup'];
			if (isset($input['attendsHighSchoolSmallGroup'])) $member->attendsHighSchoolSmallGroup = $input['attendsHighSchoolSmallGroup'];
			if (isset($input['attendsJrHighGroup'])) $member->attendsJrHighGroup = $input['attendsJrHighGroup'];
			if (isset($input['attendsHigherGround'])) $member->attendsHigherGround = $input['attendsHigherGround'];
			if (isset($input['attendsLeadershipCore'])) $member->attendsLeadershipCore = $input['attendsLeadershipCore'];
			if (isset($input['leadsBusMinistry'])) $member->leadsBusMinistry = $input['leadsBusMinistry'];
			if (isset($input['leadsWorship'])) $member->leadsWorship = $input['leadsWorship'];
			if (isset($input['leadsKidsClub'])) $member->leadsKidsClub = $input['leadsKidsClub'];
			if (isset($input['attendsKidsClub'])) $member->attendsKidsClub = $input['attendsKidsClub'];
			if (isset($input['leadsKidsChurch'])) $member->leadsKidsChurch = $input['leadsKidsChurch'];
			if (isset($input['attendsKidsChurch'])) $member->attendsKidsChurch = $input['attendsKidsChurch'];
			if (isset($input['leadsHighSchoolSmallGroup'])) $member->leadsHighSchoolSmallGroup = $input['leadsHighSchoolSmallGroup'];
			if (isset($input['attendsHighSchoolSummerCamp'])) $member->attendsHighSchoolSummerCamp = $input['attendsHighSchoolSummerCamp'];
			if (isset($input['attendsHighSchoolWinterCamp'])) $member->attendsHighSchoolWinterCamp = $input['attendsHighSchoolWinterCamp'];
			if (isset($input['attendsJrHighSummerCamp'])) $member->attendsJrHighSummerCamp = $input['attendsJrHighSummerCamp'];
			if (isset($input['attendsJrHighWinterCamp'])) $member->attendsJrHighWinterCamp = $input['attendsJrHighWinterCamp'];
			if (isset($input['attendsYvRetreat'])) $member->attendsYvRetreat = $input['attendsYvRetreat'];
			if (isset($input['attendsFutureQuest'])) $member->attendsFutureQuest = $input['attendsFutureQuest'];
			if (isset($input['attendsFutureQuest'])) $member->attendsFutureQuest = $input['attendsFutureQuest'];
			if (isset($input['attendsSundaySchool'])) $member->attendsSundaySchool = $input['attendsSundaySchool'];
			if (isset($input['leadsSundaySchool'])) $member->leadsSundaySchool = $input['leadsSundaySchool'];
			if (isset($input['attendsMission910'])) $member->attendsMission910 = $input['attendsMission910'];
			if (isset($input['leadsJrStaff'])) $member->leadsJrStaff = $input['leadsJrStaff'];

			$member->update();

		} catch (Exception $e) {
			
			Log::error($e);

			return false;

		}

		$member->load('sessions.lesson.rank', 'school');

		$rank = $this->rank($member);

		if ($rank === false) {
			$rank = Rank::where('name', '=', 'New')->first();
		}

		$member->rank = $rank;

		return $member;

	}


	public function rank($member) 
	{
		$sorter = [];

		foreach($member->sessions as $i => $session) {
			if ($i < 1) {
				array_push($sorter, $session->lesson);
			} else {
				if ($session->lesson->id > $sorter[count($sorter) - 1]->id) {
					array_push($sorter,$session->lesson);
				} else {
					array_unshift($sorter, $session->lesson);
				}
			}
		}

		if (count($sorter) < 1) {
			return false;
		}

		$pop = array_pop($sorter);

		return $pop->rank;

	} 


	public function destroy($id) 
	{

		try {
			$member = Member::findOrFail($id);
			$member->delete();
		} catch (Exception $e) {
			Log::error($e);
			return false;
		}

		return true;

	}


	/**
	 * Returns status object when member Id is passed
	 *
	 * @param integer $id
	 **/
	public function status($id) 
	{
		try {			
			$member = Member::where('id', '=', $id)->with('badBehaviorEvents.status')->get();
			$member = $member[0];		
			$badBehaviorEvents = $member->badBehaviorEvents;

			if (count($badBehaviorEvents)) {
				foreach($badBehaviorEvents as $event) {
					if ($event->status->name === 'Suspended') {
						return $event->status;
					}
				}
				return $badBehaviorEvents[0]->status;
			}
			$goodStatus = Status::where('name', '=', 'Good')->first();

			return $goodStatus;

		} catch (Exception $e) {		
			Log::error($e);

			return false;
		}

	}

	/**
	 * Creates a kick out event for member with $id. Returns
	 * true if successful, returns false if unsuccessful.
	 *
	 * @param integer $id
	 * @return boolean
	 **/
	public function kickout($id, $comments) 
	{
		try {
			$kickoutStatus = Status::where('name', '=', 'Kicked Out')->first();

			$badBehaviorEvent = new BadBehaviorEvent;
			$badBehaviorEvent->statusId = $kickoutStatus->id;
			$badBehaviorEvent->memberId = $id;
			$badBehaviorEvent->comments = $comments;
			$badBehaviorEvent->save();


		} catch (Exception $e) {
		
			Log::error($e);

			return false;

		}

		return true;

	}


}