<?php 

use Carbon\Carbon;

class CheckInController extends BaseController {

	public function checkIn($id) {

		$checklog = new Checklog;
		$checklog->MemberId = $id;
		$checklog->CheckInDateTime = Carbon::now();
		$checklog->CheckOutDateTime = Carbon::tomorrow();
		$checklog->Center = "El Cajon";
		$checklog->save();

		return Redirect::route('home');

	}

}