<?php 

	class MemberController extends BaseController {

		// GET /addmember
		// Check for logged in user, proceed to addmember view if true,
		// if false redirect to login.
		public function getAddMember() {

			if(Auth::check()) {
				return View::make('addmember');	
			} else {
				return Redirect::to('login');
			}
			
		}

		public function submitNewMember() {

			return Redirect::to('addmember');

		}

	}