<?php  

	class DevController extends BaseController {

		public function setAdmin() {
			
			$user = new User;

			$user->username = 'admin';
			$user->password = Hash::make('projectgenesys');
			$user->save();

			return "Admin Set";
		}


	}