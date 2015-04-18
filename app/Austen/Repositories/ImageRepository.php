<?php 


namespace Austen\Repositories;

use Image;
use Log;

class ImageRepository {


	public function upload($file, $directory, $lossless = false) {

		$response = [];

		try {

			$image = $file->getRealPath();
			$imageName = $file->getClientOriginalName();
			// remove spaces
			$imageName = preg_replace('/\s+/', '', $imageName);
			// prepend random string of numbers to image name
			$imageName = mt_rand(1,999999999) . $imageName;
			$imagePath = public_path() . '/' . $directory . $imageName;

			// Check if image is a JPG : exif_read_data won't work on anything else.
			if (exif_imagetype($file) == 2) {

				$exif = exif_read_data($file);

				if (isset($exif['Orientation'])) {

					$orientation = $exif['Orientation'];

					$rotateImage = imagecreatefromJPEG($image);

					switch ($orientation) {

						case 3:
					    	$parsedImage = imagerotate($rotateImage, 180, 0);
					      	break;
						case 6:
					    	$parsedImage = imagerotate($rotateImage, -90, 0);
					      	break;
					   case 8:
				      		$parsedImage = imagerotate($rotateImage, 90, 0);
					      	break;
					    default :
					    	$parsedImage = $rotateImage;
					}

				} else {

					$parsedImage = $image;

				}

			} else {

				$parsedImage = $image;

			}

			if ($lossless = true) {

				Image::make($parsedImage)->resize('800',null, function($constraint){ $constraint->aspectRatio();})->save($imagePath);
				
			} else {

				Image::make($parsedImage)->save($imagePath);

			}

		} catch(Exception $e) {

			Log::error($e);

			return false;

		}

		$response['imagePath'] = asset($directory .  $imageName);

		return $response;

	}


}