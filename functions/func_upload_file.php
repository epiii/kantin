<?php
	function upload_file($menu_url){
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 2000000)
		&& in_array($extension, $allowedExts))
		  { 
		  if ($_FILES["file"]["error"] > 0)
			{
			echo("file nya error");
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
		  else{
				//echo "Upload: " . $_FILES["file"]["name"] . "<br>";
				//echo "Type: " . $_FILES["file"]["type"] . "<br>";
				//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
				//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

			
				move_uploaded_file($_FILES["file"]["tmp_name"],
				$menu_url);
				//echo "Stored in: " . $menu_url;
			  
			}
		  }
		else
		  {
		  echo "Sorry Invalid file"."<br />";
		  echo "tipe file : ".$_FILES["file"]["type"]."<br />";
		  echo "nama file : ".$_FILES["file"]["name"]."<br />";
		  echo "size : ".$_FILES["file"]["size"]."<br />";
		  }
	}

?>
