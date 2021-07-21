<?php

	// upload file using move_uploaded_file function in php
	
	if (!empty($_FILES['file']['name'])) {

		$fileName = $_FILES['file']['name'];
		
		$fileExt = explode('.', $fileName);
		$fileActExt = strtolower(end($fileExt));
		$allowImg = array('png','jpeg','jpg');
		$fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
		$filePath = 'uploads/ordenes/'.$fileNew; 

		if (in_array($fileActExt, $allowImg)) {
		    if ($_FILES['file']['size'] > 0  && $_FILES['file']['error']==0) {  
			if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
		    	    echo '<img src="'.$filePath.'" style="width:320px;height:300px;"/>';
			}else{
			    echo "File is not uploaded try again";
			}	
		    }else{
		    	    echo "Unable to upload physical file";
		    }
		}else{	
		    echo "This type of image is not allow";
		}
	}

?>