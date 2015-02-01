<?php


class SessionController extends BaseController {

	public function get($memberId)
	{

		try {
			
			$sessions = Session::where('memberId', '=', $memberId)->with('lesson', 'leader')->orderBy('created_at', 'desc')->get();

		} catch (Exception $e) {
			
			Log::error($e);

			return Response::json(['message' => 'There was a problem retrieving sessions.'], 404);

		}

		return Response::json(['data' => $sessions], 200);

	}

}