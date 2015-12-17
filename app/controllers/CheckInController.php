<?php 

use Carbon\Carbon;

class CheckInController extends BaseController {

	/**
	 * Creates a Checklog
	 * Should recieve an object with locationId and memberId properties
	 */
	public function store() 
	{
		$locationId = Input::get('locationId');
		$memberId = Input::get('memberId');

		if ($locationId == Auth::user()->id || Auth::user()->admin) {
			try {			
				$checklog = new Checklog;
				$checklog->memberId = $memberId;
				$checklog->checkInDateTime = Carbon::now();
				$checklog->checkOutDateTime = Carbon::tomorrow();
				$checklog->locationId = $locationId;
				$checklog->save();
			} catch (Exception $e) {			
				Log::error($e);
				return Response::json(['message' => 'Something went wrong with this check-in =['], 404);
			}
			return Response::json(['message' => 'Check-in Successful!'], 201);
		}
		return Response::json(['message' => 'You are not authorized to make this Checkin'], 401);
	}

	/**
	 * Get today's checked in members
	 *
	 * @return array Checklog
	 */
	public function getTodayByLocation($locationId) 
	{
		if (!Auth::user()->admin) {
			$checkedInMembers = Auth::user()->checklogs()->where('created_at', '>=', Carbon::today())->with('member')->orderBy('id', 'desc')->get();			
		} else {
			$checkedInMembers = Checklog::where('locationId', '=', $locationId)->where('created_at', '>=', Carbon::today())->with('member')->orderBy('id', 'desc')->get();			
		}

		return Response::json(['data' => $checkedInMembers], 200);
	}

	/**
	 * Returns JSON data to populate d3 heatmap.
	 * If location id provided, will return checkin data relevant to location.
	 * Else will return data for all checkins
	 *
	 * @param int $locationId 
	 */
	public function getHeatmapData($locationId = false) 
	{
		$data = [];
		$location = Location::find($locationId);

		if (!$location->admin) {
			$checkins = Checklog::where('locationId', '=', $locationId)->get();

			foreach($checkins as $checkin) {
				$timestamp = $checkin->checkInDateTime;
				$timestamp = strtotime($timestamp);
				$data[$timestamp] = 1;
			}
		} else {
			foreach(Checklog::all() as $checkin) {
				$timestamp = $checkin->checkInDateTime;
				$timestamp = strtotime($timestamp);
				$data[$timestamp] = 1;
			}
		}

		return Response::json(['data' => $data], 200);
	}

	/**
	 * Returns data for totals chart
	 *
	 */
	public function getTotalsData($locationId = false) 
	{

		$data = [];

		if ($locationId) {
			$location = Location::find($locationId);
			$all = count($location->checklogs()->get());
			$week = count($location->checklogs()->where('created_at', '>=', Carbon::now()->subWeek())->get());
			$month = count($location->checklogs()->where('created_at', '>=', Carbon::now()->subMonth())->get());
			$day = count($location->checklogs()->where('created_at', '>=', Carbon::today())->get());
		} else {
			$all = count(Checklog::all());
			$week = count(Checklog::where('created_at', '>=', Carbon::now()->subWeek())->get());
			$month = count(Checklog::where('created_at', '>=', Carbon::now()->subMonth())->get());
			$day = count(Checklog::where('created_at', '>=', Carbon::today())->get());
		}

		$data['all'] = $all;
		$data['week'] = $week;
		$data['month'] = $month;
		$data['day'] = $day;

		return Response::json(['data' => $data], 200);
	}

	/**
	 * Returns formatted checkin data relating to specified member.
	 * @param  integer $memberId [description]
	 * @return Response with array of checkin data
	 */
	public function getMemberData($memberId)
	{ 
		$interval = Request::query('interval');
		$checklogs = Member::find($memberId)->checklogs()->take(7)->skip($interval * 7)->get();

		return Response::json(['data' => $checklogs], 200);
	}

}