<?
/*
���� ������ �ֱ� �Խù� ��Ų. (2006-06-21)
������: �����( http://tolove.mireene.co.kr )
�� ������ �������� ���ʽÿ�.
���� ����, ����� �����Դϴ�. �����Ͻ÷��� �� �ּҷ� ������ �ּ���.
*/
// GDüũ.
function gdVersion($user_ver = 0) {
if (! extension_loaded('gd')) { return; }
static $gd_ver = 0;
if ($user_ver == 1) { $gd_ver = 1; return 1; }
if ($user_ver !=2 && $gd_ver > 0 ) { return $gd_ver; }

if (function_exists('gd_info')) {
$ver_info = @gd_info();
preg_match('/\d/', $ver_info['GD Version'], $match);
$gd_ver = $match[0];
return $match[0];
}

if (preg_match('/phpinfo/', ini_get('disable_functions'))) {
if ($user_ver == 2) {
$gd_ver = 2;
return 2;
} else {
$gd_ver = 1;
return 1;
}
}

ob_start();
phpinfo(8);
$info = ob_get_contents();
ob_end_clean();
$info = stristr($info, 'gd version');
preg_match('/\d/', $info, $match);
$gd_ver = $match[0];
return $match[0];
}

if ($gdv = gdVersion()) {
if ($gdv >=2) {
} else {
exit ("GD ������ �ʹ� ���� ����� �� �����ϴ�.<br />ȣ���� ȸ�翡 �����Ͽ� GD2.0 �̻����� ���׷��̵� ��û�ϼ���.");
}
} else {
exit ("�ش� ������ GD�� ��ġ �Ǿ� ���� �ʽ��ϴ�..<br />ȣ���� ȸ�翡 �����Ͽ� GD2.0 �̻����� ��ġ ��û�ϼ���.");
}

// �ѱ����� �Լ�.
function corea($file) 
{
	if(preg_match("/\\\\/", realpath($_SERVER['SCRIPT_FILENAME'])) && function_exists('iconv'))
	{
		if(preg_match("/Apache\/2/", $_SERVER['SERVER_SOFTWARE']))
		{
			$file = iconv("CP949", "UTF-8", $file);
		}
	}
	
	$file = rawurlencode($file);
	$file = str_replace("%2F", "/", $file);
	$file = str_replace("%3A", ":", $file);
	$file = str_replace("%7E", "~", $file);
	return $file;
}

// ����� �Լ�.
function resize_thumb($srcFile, $dstFile, $dstWidth = 120, $dstHeight = 120, $jpegQuality = 80)
{
	// ������ �����ϴ��� üũ.
	if (!file_exists($srcFile))
	{
		echo "{$srcFile} ������ �������� �ʽ��ϴ�.!";
		return;
	}
	
	list($srcWidth, $srcHeight, $type, ) = getimagesize($srcFile);
	
	// �̹��� Ÿ��.
	switch ($type)
	{
		case 1 :
		$srcHandle = imagecreatefromgif($srcFile);
		break;
		
		case 2 :
		$srcHandle = imagecreatefromjpeg($srcFile);
        break;
		
		case 3 :
		$srcHandle = imagecreatefrompng($srcFile);
		break;
		
		default :
        echo 'jpg,png,gif ������ ������ �ƴմϴ�.';
		return;
	}
	
	if (!$srcHandle)
	{
		echo 'imagecreatefrom�Լ��� ����� �� �����ϴ�.';
		return;
	}
	
	if ($srcHeight < $srcWidth)
	{
		$ratio = (double)($srcHeight / $dstHeight);
		$cpyWidth = round($dstWidth * $ratio);
		
		if ($cpyWidth > $srcWidth)
		{
			$ratio = (double)($srcWidth / $dstWidth);
			$cpyWidth = $srcWidth;
			$cpyHeight = round($dstHeight * $ratio);
			$xOffset = 0;
			$yOffset = round(($srcHeight - $cpyHeight) / 2);
		}
		else
		{
			$cpyHeight = $srcHeight;
			$xOffset = round(($srcWidth - $cpyWidth) / 2);
			$yOffset = 0;
		}
	}
	else
	{
		$ratio = (double)($srcWidth / $dstWidth);
		$cpyHeight = round($dstHeight * $ratio);
		if ($cpyHeight > $srcHeight)
		{
			$ratio = (double)($srcHeight / $dstHeight);
			$cpyHeight = $srcHeight;
			$cpyWidth = round($dstWidth * $ratio);
			$xOffset = round(($srcWidth - $cpyWidth) / 2);
			$yOffset = 0;
		}
		else
		{
			$cpyWidth = $srcWidth;
			$xOffset = 0;
			$yOffset = round(($srcHeight - $cpyHeight) / 2);
		}
	}

    $dstHandle = imagecreatetruecolor($dstWidth, $dstHeight);

	//����� �����.
    if (!imagecopyresampled($dstHandle, $srcHandle, 0, 0, $xOffset, $yOffset, $dstWidth, $dstHeight, $cpyWidth, $cpyHeight))
	{
        echo 'imagecopyresampled�Լ��� ����� �� �����ϴ�.';
		return;
    }
	
	// �̹��� Ÿ��.
	switch ($type)
	{
		case 1 :
		imagegif($dstHandle, $dstFile);
		break;
		
		case 2 :
		imagejpeg($dstHandle, $dstFile, $jpegQuality);
		break;
		
		case 3 :
		imagepng($dstHandle, $dstFile);
		break;
		
		default :
        echo 'jpg,png,gif ������ ������ �ƴմϴ�.';
		return;
	}

	// �޸𸮿��� ����.
	imagedestroy($srcHandle);
	imagedestroy($dstHandle);
	return true;
}

// ����.
function order_num($a, $b)
{
	global $order;
	if ($a[$order] == $b[$order]) return 0;
	return ($a[$order] > $b[$order]) ? -1 : 1;
}

// �Խù� �Լ�.
function latest_webgin($board_id, $category, $title, $titlecut=10, $memo_cut=300, $num=20, $thumb_x=120, $thumb_y=120, $widthno=2)
{
	global $admin_table, $_zb_path, $_zb_url;
	if(!is_dir("{$_zb_path}lat_bbs_thweb")) {
	echo 'lat_bbs_thweb������ ���������ʽ��ϴ�.';
	return;
	}
	if(!isset($category)){
	$category=1;
	}
	
	$ory = array();
		
	$board_id = explode(",", $board_id);
	foreach ($board_id as $id)
	{
		$result = mysql_query("select * from zetyx_board_{$id} where category='$category' order by no desc limit 0,$num") or die(mysql_error());
		while ($data = mysql_fetch_array($result))
		{
			$ort['reg_date'] = $data['reg_date'];
			$ort['hit'] = $data['hit'];
			$ort['vote'] = $data['vote'];
			$ort['board_name'] = $id;
			$ort['no'] = $data['no'];
			$ort['file_name1'] = $data['file_name1'];
			$ort['file_name2'] = $data['file_name2'];
			$ort['s_file_name1'] = $data['s_file_name1'];
			$ort['s_file_name2'] = $data['s_file_name2'];
			$ort['total_comment'] = $data['total_comment'];
			$ort['name'] = strip_tags(stripslashes($data['name']));
			$ort['subject'] = cut_str(strip_tags(stripslashes($data['subject'])), $titlecut);
			$ort['memo'] = cut_str(strip_tags(stripslashes($data['memo'])), $memo_cut);
			$ory[] = $ort;
			unset($ort);
		}
}

// ����.
if ($ory) usort($ory, "order_num");
?>

<style type="text/css">
<!--
body,td {font-size:9pt;font-family:tahoma,Verdana,Arial,����;}
a.aa:link,a.aa:visited { color:#000000; text-decoration:none; }
a.aa:hover { color:#368817;text-decoration:none; }

.table1_th {width:100%;}
.table2_th {width:100%;height:32px;background-color:#f9f9f9;}

.td1_th {border-width:1px;border-color:#e1e1e1;border-style:solid;background-color:#ffffff;}

.span1_th {font-size:9pt;font-family:tahoma,Verdana,Arial,����;font-weight:bold;color:#000000;}
-->
</style>
<table cellspacing="0" cellpadding="0" class="table1_th">
  <tr> 
   <td valign="top" align="left">
<table cellspacing="3" cellpadding="5" class="table2_th">
  <tr> 
   <td align="left" class="td1_th"> 
    <span class="span1_th"><?=$title?></span></td> 
  </tr> 
</table>
<table cellspacing="0" cellpadding="0" border="0" width="100%" style="table-layout:fixed;">
<tr>
<?
if(!$ory)
{
	echo '<td></td>';
}

$i = 1;
$ii = 0;
foreach($ory as $tmp)
{
	// ���� ���� Ȯ���� ����.
	$file1 = substr(strrchr($tmp['file_name1'], '.'), 1);
	$file2 = substr(strrchr($tmp['file_name2'], '.'), 1);
	
	// ����� ������ ���ٸ� ����.
	if (!is_dir("{$_zb_path}data/thumb_img/{$tmp['board_name']}"))
	{
		@mkdir($_zb_path."data/thumb_img",0777);
		@mkdir($_zb_path."data/thumb_img/{$tmp['board_name']}",0777);
	}

	// �̹��� �������� üũ. file1
	if (preg_match("/(gif|jpe?g|png)/i", $file1))
	{
		$filename = $tmp['file_name1'];
		$sfilename = $tmp['s_file_name1'];
		$dir = $_zb_path.$filename;
		$thumb_dir = "{$_zb_path}data/thumb_img/{$tmp['board_name']}/th{$tmp['no']}{$sfilename}";
		$thumb_url = "{$_zb_url}data/thumb_img/{$tmp['board_name']}/th{$tmp['no']}{$sfilename}";

		// ����� �̹����� ��. ����� �ٸ� ��� ���� ������� ����. �ٽ� ����. file1
		if (file_exists($thumb_dir))
		{
			$thumb_img = @getimagesize($thumb_dir);
			if (($thumb_img[0] != $thumb_x) || ($thumb_img[1] != $thumb_y))
			{
				$opendir = @opendir("{$_zb_path}data/thumb_img/{$tmp['board_name']}/");
				while((false!==($file=@readdir($opendir))))
				if($file!="." and $file !="..")
				{
					@chmod($thumb_dir, 0777);
					@unlink($thumb_dir);
				}
				
				@closedir($opendir);
			}
		}
		
		// ����� ����. file1
		if (!file_exists($thumb_dir))
		{
		resize_thumb($dir, $thumb_dir, $thumb_x, $thumb_y, 80);
		}
	}

	// �̹��� �������� üũ. file2
	elseif (preg_match("/(gif|jpe?g|png)/i", $file2))
	{
		$filename = $tmp['file_name2'];
		$sfilename = $tmp['s_file_name2'];
		$dir = $_zb_path.$filename;
		$thumb_dir = "{$_zb_path}data/thumb_img/{$tmp['board_name']}/th{$tmp['no']}{$sfilename}";
		$thumb_url = "{$_zb_url}data/thumb_img/{$tmp['board_name']}/th{$tmp['no']}{$sfilename}";

		// ����� �̹����� ��. ����� �ٸ� ��� ���� ������� ����. �ٽ� ����. file2
		if (file_exists($thumb_dir))
		{
			$thumb_img = @getimagesize($thumb_dir);
			if (($thumb_img[0] != $thumb_x) || ($thumb_img[1] != $thumb_y))
			{
				$opendir = @opendir("{$_zb_path}data/thumb_img/{$tmp['board_name']}/");
				while((false!==($file=@readdir($opendir))))
				if($file!="." and $file !="..")
				{
					@chmod($thumb_dir, 0777);
					@unlink($thumb_dir);
				}
				
				@closedir($opendir);
			}
		}

		// ����� ����. file2
		if (!file_exists($thumb_dir))
		{
		resize_thumb($dir, $thumb_dir, $thumb_x, $thumb_y, 80);
		}
}
else $thumb_dir = '';

// �Խ��� Ÿ��Ʋ,ī�װ�.
$setup = mysql_fetch_array(mysql_query("select use_category,title,use_alllist from {$admin_table} where name='{$tmp['board_name']}'"));
$category = strip_tags(stripslashes($setup['use_category']));
$title_name = strip_tags(stripslashes($setup['title']));
$target = ($setup['use_alllist']) ? "{$_zb_url}zboard.php" : "{$_zb_url}view.php";

// �ڸ�Ʈ ����.
$comment = ($tmp['total_comment']) ? "({$tmp['total_comment']})" : "";

//24�ð��ȿ� �ö�±��� �ִٸ� newǥ��.
$time = 60*60*24;
$new = (time() - $tmp['reg_date'] < $time) ? " <img src='{$_zb_url}lat_bbs_thweb/images/new.gif' style='border:0px;vertical-align: middle;' alt='' />" : "";

$id = $tmp['board_name']; // �Խ��� ���̵�.
$subject = $tmp['subject']; // �� ����.
$no = $tmp['no']; // ��ȣ.
$memo = $tmp['memo']; // �� ����.
$memo .= ".<a href='{$target}?id={$id}&amp;no={$no}' class='aa' style='font-size: 11px'>more</a>"; //more
$name = $tmp['name']; // �۾���.
$reg_date = date('m-d', $tmp['reg_date']); // ��¥.
$vote = $tmp['vote']; // ��õ.

if(preg_match("/([^0-9a-z\.\-\_])/i", $sfilename)) 
{
	$thumb_url = corea($thumb_url);
}

if($ii != 0 && $ii%$widthno == 0)
{
	echo "</tr><tr><td colspan='{$widthno}' height='6'></td></tr><tr>";
}
?>

<td valign="top" align="left" style="padding-left: 4px;padding-top: 4px">
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td valign="top">
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td valign="top"<?if (file_exists($thumb_dir)) {?> style="padding:2px;border:1px solid #D9D9D9;"<?}?>>
<?if (file_exists($thumb_dir)) {?><a href="<?=$target?>?id=<?=$id?>&amp;no=<?=$no?>"><img src="<?=$thumb_url?>" border="0" alt="" /></a><?}?>
</td>
</tr>
</table>
</td>
<td align="left" valign="top" style="padding-left: 4px;padding-top: 2px;padding-right: 4px;">
<a href="<?=$target?>?id=<?=$id?>&amp;no=<?=$no?>" class="aa"><b><?=$subject.$new?></b></a><br /><?=$memo?>
</td>
</tr>
</table>
</td>

<?
if($i >= 1) break;
$ii++;
$i++;
}
unset($ory);
echo '</tr></table></td></tr></table>';
}
?>