<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset='utf-8' />
	</head>


<body>
	
<?	
// Content type
function resizeImage($source_file, $NewImageName, $max_width, $max_height)
{
	//$filename   = 'i9mxLDdfSmVGByeNTZf.jpg';
	//$NewImageName = "i9mxLDdfSmVGByeNTZf_thumb.jpg";
	 $imgsize = getimagesize($source_file);
    $width = $imgsize[0];
    $height = $imgsize[1];
    $mime = $imgsize['mime'];
 
    switch($mime){
        case 'image/gif':
            $image_create = "imagecreatefromgif";
            $image = "imagegif";
            break;
 
        case 'image/png':
            $image_create = "imagecreatefrompng";
            $image = "imagepng";
            $quality = 7;
            break;
 
        case 'image/jpeg':
            $image_create = "imagecreatefromjpeg";
            $image = "imagejpeg";
            $quality = 80;
            break;
 
        default:
            return false;
            break;
    }
	
    $dst_img = imagecreatetruecolor($max_width, $max_height);
    $src_img = $image_create($source_file);
     
    $width_new = $height * $max_width / $max_height;
    $height_new = $width * $max_height / $max_width;
    //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
    if($width_new > $width){
        //cut point by height
        $h_point = (($height - $height_new) / 2);
        //copy image
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
    }else{
        //cut point by width
        $w_point = (($width - $width_new) / 2);
        imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
    }
	
	
	//imagejpeg($dst_img,$NewImageName, 100);
	 $image($dst_img, $NewImageName, $quality);
	 
	return true;
}

			
		$filename = $_GET['filename'];
		$url = "/home/swave50/www/bbs/";
		preg_match('/[0-9]{10}/',$filename,$path);
		//echo $filename;
	if ($_GET[id]=="image"){
		$filename = str_replace('data/image/', '', $filename);
		$filename = str_replace('/home/swave50/www/bbs/', '', $filename);
		echo $filename;
		echo $path[0];
		$folder = "/home/swave50/www/bbs/data/image/resized/".$path[0]; 
		if(!is_dir($folder)) mkdir($folder);
		if(resizeImage("/home/swave50/www/bbs/data/image/".$filename, "/home/swave50/www/bbs/data/image/resized/".$filename, 300, 250)) echo "success";
		?>
		<script>window.location.href = 'zboard.php?id=image';</script>
		<?
	}elseif ($_GET[id] == "webzine"){
		//echo "match";
		$filename = str_replace('data/webzine/', '', $filename);
		echo $filename;
		if(resizeImage("data/webzine/".$filename, "data/webzine/resized/".$filename, 300, 250)) echo "success";
		?><script>window.location.href = 'zboard.php?id=webzine';</script><?
	}elseif ($_GET[id] == "icar"){
		//echo "match";
		$filename = str_replace('data/icar/', '', $filename);
			$filename = str_replace('home/swave50/www/bbs/', '', $filename);
		echo $filename;
		if(resizeImage("data/icar/".$filename, "data/icar/resized/".$filename, 300, 250)) echo "success";
		?>
		<script>window.location.href = 'zboard.php?id=icar';</script>
		<?
	}elseif ($_GET[id] == "battery"){
		//echo "match";
		$filename = str_replace('data/battery/', '', $filename);
		echo $filename;
		if(resizeImage("data/battery/".$filename, "data/battery/resized/".$filename, 300, 250)) echo "success";
			?>
		<script>window.location.href = 'zboard.php?id=battery';</script>
		<?
	}elseif ($_GET[id] == "forth"){
		//echo "match";
		$filename = str_replace('data/forth/', '', $filename);
		echo $filename;
		if(resizeImage("data/forth/".$filename, "data/forth/resized/".$filename, 300, 250)) echo "success";
		?>
		<script>window.location.href = 'zboard.php?id=forth';</script>
		<?
	}elseif ($_GET[id] == "doc"){
		//echo "match";
		$filename = str_replace('data/doc/', '', $filename);
		$filename = str_replace('/home/swave50/www/bbs/', '', $filename);
		echo $filename;
		if(resizeImage($url."data/doc/".$filename, $url."data/doc/resized/".$filename, 300, 250)) echo "success";
		?>
		<script>window.location.href = 'zboard.php?id=doc';</script>
		<?
	}
	else{
	if (resizeImage("data/doc/".$filename, "./data/doc/resized/", $filename, 300, 300)) echo "success";
	}
		



?>


</body>
</html>

		