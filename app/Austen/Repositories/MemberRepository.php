<?php namespace Austen\Repositories;

use Log;
use Member;
use Rank;
use Carbon\Carbon;
use Status;
use BadBehaviorEvent;

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

		} catch (Exception $e) {
			
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

			if (isset($input['imagePath'])) {
				$image = $input['imagePath']	;
			} else {
				$image = false;
			}
			$phone = $input['phone'];
			$email = $input['email'];
			$address = $input['address'];
			
			$parent1Name = $input['parent1Name'];
			$parent2Name = $input['parent2Name'];
			$parent1Phone = $input['parent1Phone'];

			// Parse Phone numbers to remove dashes and parenthesis.
			$phone = preg_replace('/\D+/', '', $phone);
			$parent1Phone = preg_replace('/\D+/', '', $parent1Phone);

			$member = new Member;
			$member->firstName = $firstName;
			$member->lastName = $lastName;
			if ($image) {
				$member->image = $image;	
			}
			$member->phone = $phone;
			$member->address = $address;
			$member->email = $email;
			$member->parent1Name = $parent1Name;
			$member->parent2Name = $parent2Name;
			$member->parent1Phone = $parent1Phone;
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
			if (isset($input['email'])) $member->email = $input['email'];
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
			if (isset($input['leadsKidsMinistry'])) $member->leadsKidsMinistry = $input['leadsKidsMinistry'];
			if (isset($input['leadsHighSchoolSmallGroup'])) $member->leadsHighSchoolSmallGroup = $input['leadsHighSchoolSmallGroup'];
			if (isset($input['attendsSummerCamp'])) $member->attendsSummerCamp = $input['attendsSummerCamp'];
			if (isset($input['attendsWinterCamp'])) $member->attendsWinterCamp = $input['attendsWinterCamp'];
			if (isset($input['attendsFutureQuest'])) $member->attendsFutureQuest = $input['attendsFutureQuest'];

			$member->update();

		} catch (Exception $e) {
			
			Log::error($e);

			return false;

		}

		return $member->load('sessions.lesson.rank', 'school');

	}


	public function rank($member) 
	{

		$sorter = [];

		foreach($member->sessions as $i => $session) {

			if ($i < 1) {

				$sorter[] = $session->lesson;

			} else {

				$offset = $i - 1;

				if ($session->lesson->id > $sorter[$offset]->id) {

					$sorter[] = $session->lesson;

				} else {

					array_splice($sorter, $offset, 0, $session->lesson);

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