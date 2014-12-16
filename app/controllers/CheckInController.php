<?php 

use Carbon\Carbon;

class CheckInController extends BaseController {

	public function checkIn($id) {

		try {
			
			$checklog = new Checklog;
			$checklog->MemberId = $id;
			$checklog->CheckInDateTime = Carbon::now();
			$checklog->CheckOutDateTime = Carbon::tomorrow();
			$checklog->LocationId = Auth::user()->LocationId;
			$checklog->save();

		} catch (Exception $e) {
			
			return Response::json(['message' => 'Something went wrong with this check-in =['], 404);

		}

		return Response::json(['message' => 'Check-in Successful!'], 200);

	}

	public function getCheckedIn() {

		if (!Auth::user()->Admin) {

			// $checkedInMembers = Auth::user()->checklogs()->whereBetween('created_at', [Carbon::now(), Carbon::now()->subDay()])->get();
			$checkedInMembers = Auth::user()->checklogs()->where('created_at', '>', Carbon::today())->with('member')->get();			

		}

		return Response::json(['data' => $checkedInMembers], 200);

		

	}

}