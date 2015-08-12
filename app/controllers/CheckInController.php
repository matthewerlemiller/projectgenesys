<?php 

use Carbon\Carbon;

class CheckInController extends BaseController {

	public function checkIn($id) {

		try {
			
			$checklog = new Checklog;
			$checklog->memberId = $id;
			$checklog->checkInDateTime = Carbon::now();
			$checklog->checkOutDateTime = Carbon::tomorrow();
			$checklog->locationId = Auth::user()->id;
			$checklog->save();

		} catch (Exception $e) {
			
			Log::error($e);

			return Response::json(['message' => 'Something went wrong with this check-in =['], 404);

		}

		return Response::json(['message' => 'Check-in Successful!'], 200);

	}

	public function getCheckedIn() {

		if (!Auth::user()->admin) {

			// $checkedInMembers = Auth::user()->checklogs()->whereBetween('created_at', [Carbon::now(), Carbon::now()->subDay()])->get();
			$checkedInMembers = Auth::user()->checklogs()->where('created_at', '>=', Carbon::today())->with('member')->orderBy('id', 'desc')->get();			

			// foreach ($checkedInMembers as $checklog) {
				
			// 	$tester = $checklog->created_at;

			// 	Log::info($tester->isToday());

			// }
		}

		return Response::json(['data' => $checkedInMembers], 200);

		

	}

}