<?php
	if (isset($_POST))
	{
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$extension = end(explode(".", $_FILES["upload"]["name"]));
		if ((($_FILES["upload"]["type"] == "image/gif")
		|| ($_FILES["upload"]["type"] == "image/jpeg")
		|| ($_FILES["upload"]["type"] == "image/jpg")
		|| ($_FILES["upload"]["type"] == "image/pjpeg")
		|| ($_FILES["upload"]["type"] == "image/x-png")
		|| ($_FILES["upload"]["type"] == "image/png"))
		// && ($_FILES["upload"]["size"] < 100000)
		&& in_array($extension, $allowedExts))
		{
		  if ($_FILES["upload"]["error"] > 0)
		  {
		    // echo "Return Code: " . $_FILES["upload"]["error"] . "<br>";
		    $data['error'] = "Return Code: " . $_FILES["upload"]["error"] . "<br>";
		  }
		  else
		  {
		    // echo "Upload: " . $_FILES["upload"]["name"] . "<br>";
		    // echo "Type: " . $_FILES["upload"]["type"] . "<br>";
		    // echo "Size: " . ($_FILES["upload"]["size"] / 1024) . " kB<br>";
		    // echo "Temp file: " . $_FILES["upload"]["tmp_name"] . "<br>";

		    // if (file_exists("images/" . $_FILES["upload"]["name"]))
		    // {
		    //   // echo $_FILES["upload"]["name"] . " already exists. ";
		    // 	$data['error'] = $_FILES["upload"]["name"] . " already exists. ";
		    // }
		    // else
		    // {
		      $data['filename'] = $_FILES["upload"]["name"];
		      $data['filepath'] = "images/" . $_FILES["upload"]["name"];
		      list($width, $height) = getimagesize($data['filepath']);
		      $data['height'] = $height * 0.85;
		      $data['width'] = $width * 0.83;
		      move_uploaded_file($_FILES["upload"]["tmp_name"], $data["filepath"]);
		      // echo "Stored in: " . "upload/" . $_FILES["upload"]["name"];
		      // $data['error'] = "Stored in: " . "upload/" . $_FILES["upload"]["name"];
		    // }
		  }
		}
		else
		{
		  // echo "Invalid file";
		  $data['error'] = "Invalid file";
		}
	}
	// var_dump($_FILES);
	echo json_encode($data);
?>