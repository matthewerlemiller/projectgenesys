<?php namespace Austen\Repositories;

use Log;
use Member;
use Rank;
use Carbon\Carbon;

class MemberRepository {


	public function all()
	{

		$members = Member::all();

		return $members;

	}

	public function find($id) 
	{

		try {
		
			$member = Member::find($id);
			$memberLastCheckIn = $member->checklogs()->orderBy('Id', 'desc')->get()->first()["CheckInDateTime"];
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
			$member->load('sessions.lesson.rank');

			$rank = $this->rank($member);

			if ($rank === false) {

				$rank = Rank::where('Name', '=', 'New')->first();

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
			
			$mFirstName = $input['firstname'];
			$mLastName = $input['lastname'];

			if (isset($input['imagePath'])) {
				$mImage = $input['imagePath']	;
			} else {
				$mImage = false;
			}
			$mPhone = $input['phone'];
			$mEmail = $input['email'];
			$mAddress = $input['address'];
			
			$mFirstParentName = $input['parent-name-1'];
			$mSecondParentName = $input['parent-name-2'];
			$mParentContact = $input['parent-contact'];

			// Parse Phone numbers to remove dashes and parenthesis.
			$mPhone = preg_replace('/\D+/', '', $mPhone);
			$mParentContact = preg_replace('/\D+/', '', $mParentContact);

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

		} catch (Exception $e) {
			
			Log::erorr($e);

			return false;

		}	

		return $member;

	}

	public function rank($member) 
	{

		$sorter = [];

		foreach($member->sessions as $i => $session) {

			if ($i < 1) {

				$sorter[] = $session->lesson;

			} else {

				$offset = $i - 1;

				if ($session->lesson->Id > $sorter[$offset]->Id) {

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



}