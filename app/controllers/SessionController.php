<?php

use Carbon\Carbon;

class SessionController extends BaseController {

	/**
	 * Gets all sessions for a member
	 *
	 * @return response
	 */
	public function get($memberId) {

		try {
			
			$sessions = SessionLog::where('MemberId', '=', $memberId)->with('lesson', 'leader')->orderBy('created_at', 'desc')->get();

		} catch (Exception $e) {
			
			Log::error($e);

			return Response::json(['message' => 'There was a problem retrieving sessions.'], 404);

		}

		foreach($sessions as $session) {

			$date = Carbon::parse($session->created_at)->toFormattedDateString(); 

			$session->date = $date;

		}

		return Response::json(['data' => $sessions], 200);

	}

	/**
	 * Create a new Session
	 *
	 * @return Response
	 */
	public function store() {

		try {
			
			$memberId = Input::get('memberId');
			$lessonId = Input::get('lessonId');
			$leaderId = Input::get('leaderId');
			$notes = Input::get('notes');

			$session = new SessionLog;
			$session->MemberId = $memberId;
			$session->LessonId = $lessonId;
			$session->LeaderId = $leaderId;
			$session->notes = $notes;
			$session->save();

		} catch (Exception $e) {
			
			Log::error($e);

			return Response::json(['message' => 'Sorry, session could not be created.'], 404);

		}

		// Update leader lesson count
		try {
			
			$leader = Leader::findOrFail($leaderId);
			$leader->LessonCount++;
			$leader->save();

		} catch (Exception $e) {
			
			Log::error($e);

		}
		
		$session->load('lesson', 'leader', 'member');

		$date = Carbon::parse($session->created_at)->toFormattedDateString(); 

		$session->date = $date;
		
		return Response::json(['data' => $session, 'message' => 'Session Logged!'], 200);

	}
}