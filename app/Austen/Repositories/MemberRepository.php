<?php namespace Austen\Repositories;

use Log;

class MemberRepository {

	public function rank($member) {

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

}