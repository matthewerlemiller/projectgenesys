<?php


class LessonController extends BaseController {

	/**
	 * Fetches all Lessons
	 *
	 * @return response
	 */
	public function get() {

		try {
			
			$lessons = Lesson::all();

		} catch (Exception $e) {
			
			return Response::json(['message' => 'Sorry, there was an error when tryng to fetch the lessons'], 404);

		}

		return Response::json(['data' => $lessons], 200);

	}

}