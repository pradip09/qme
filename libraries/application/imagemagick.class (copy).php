<?

class ImageMagick {
var $targetdir = '/var/www/quotation/uploads/product';
var $imagemagickdir = '/usr/local/bin';
var $temp_dir	 = '/var/www/quotation/uploads/product'; // httpd must be able to write there
var $file_history = array();
var $temp_file = '';
var $jpg_quality	= '60';
var $count	 = 0;
var $image_data = array();
var $error = '';
var $verbose = FALSE	;


/*
Constructor places uploaded file in $this->temp_dir
Gets the imagedata and stores it in $this->image_data
$filedata = $_FILES['file1']
*/

function ImageMagick($filedata) {
	//print_r($filedata);
$this->temp_file = time().ereg_replace("[^a-zA-Z0-9_.]", '_', $filedata['name']);
//print_r($this->temp_file);
if(!@rename($filedata['tmp_name'], $this->temp_dir.'/tmp'.$this->count.'_'.$this->temp_file))
//print_r($this->temp_dir.'/tmp'.$this->count.'_'.$this->temp_file);
die("Imagemagick: Upload failed");
$this->file_history[] = $this->temp_dir.'/tmp'.$this->count.'_'.$this->temp_file;
//print_r($this->file_history);

$this->GetSize();
}




/*

setTargetdir(string string)
Sets the dir to where the images are saved
httpd user must have write access there
*/

function setTargetdir($target) {
if($target == '')
$this->targetdir = $this->temp_dir;
else
$this->targetdir = $target;
if($this->verbose == TRUE) {
echo "Set target dir to '{$this->targetdir}'\n";
}
}




/*
string getFilename()
Returns the current filename
*/

function getFilename() {
return $this->temp_file;
}




/*
setVerbose(bool)
if set to TRUE, all information is displayed
*/

function setVerbose($v=FALSE) {
$this->verbose = $v;
if($v == TRUE) {
echo '<pre>';
}
}




/*
array GetSize()
returns the size of the image in an array
array[0] = x-size
array[1] = y-size
*/

function GetSize() {
	//print_r($this->temp_dir);
$command = $this->imagemagickdir."/identify -verbose '".$this->temp_dir.'/tmp'.$this->count.'_'.$this->temp_file."'";
//print_r($command);exit;
exec($command, $returnarray, $returnvalue);
if($returnvalue)
die("ImageMagick: Corrupt image");
else 
$num = count($returnarray);
//print $num;exit;
for($i=0;$i<$num;$i++)
$returnarray[$i] = trim($returnarray[$i]);
$this->image_data = $returnarray;
//print_r($this->image_data);exit;
$num = count($this->image_data);
for($i=0;$i<$num;$i++)
if(eregi('Geometry', $this->image_data[$i])) {
$tmp1 = explode(' ', $this->image_data[$i]);
$tmp2 = explode('x', $tmp1[1]);
$this->size = $tmp2;
return $tmp2;
}
}

/*
Resize(int value, int value, string string)
Resize the image to given size
possible values:
arg1 > x-size, unsigned int
arg2 > y-size, unsigned int
arg3 > resize method;
'keep_aspect' > changes only width or height of image
'fit' > fit image to given size
*/

function Resize($x_size, $y_size, $how='keep_aspect') {

if($this->verbose == TRUE) {
echo "Resize:\n";
}

$method = $how=='keep_aspect'?'>':($how=='fit'?'!':'');

if($this->verbose == TRUE) {
echo " Resize method: {$how}\n";
}

$command = "{$this->imagemagickdir}/convert -geometry '{$x_size}x{$y_size}{$method}' '{$this->temp_dir}/tmp{$this->count}_{$this->temp_file}' '{$this->temp_dir}/tmp".++$this->count."_{$this->temp_file}'";

if($this->verbose == TRUE) {
echo " Command: {$command}\n";
}

exec($command, $returnarray, $returnvalue);

if($returnvalue) {
$this->error .= "ImageMagick: Resize failed\n";
if($this->verbose == TRUE) {
echo "Resize failed\n";
}
} else {
$this->file_history[] = $this->temp_dir.'/tmp'.$this->count.'_'.$this->temp_file;
}
}


/*
Convert(string string)
Converts the image to any format using the given file extension
Defaults to jpg
*/

function Convert($format='jpg') {

if($this->verbose == TRUE) {
echo "Convert:\n";
}

$name = explode('.' , $this->temp_file);
$name = "{$name[0]}.{$format}";

if($this->verbose == TRUE) {
echo " Desired format: {$format}\n";
echo " Constructed filename: {$name}\n";
}

$command = "{$this->imagemagickdir}/convert -colorspace RGB -quality {$this->jpg_quality} '{$this->temp_dir}/tmp{$this->count}_{$this->temp_file}' '{$this->temp_dir}/tmp".++$this->count."_{$name}'";

if($this->verbose == TRUE) {
echo " Command: {$command}\n";
}

exec($command, $returnarray, $returnvalue);

$this->temp_file = $name;

if($returnvalue) {
$this->error .= "ImageMagick: Convert failed\n";
if($this->verbose == TRUE) {
echo "Convert failed\n";
}
} else {
$this->file_history[] = $this->temp_dir.'/tmp'.$this->count.'_'.$this->temp_file;
}
}




/*
string string Save(string string)
Saves the image to the targetdir, returning the filename
arg1 > set prefix, for example : 'thumb_'
*/

function Save($prefix='') {

if($this->verbose == TRUE) {
echo "Save:\n";
}

if(!@copy($this->temp_dir.'/tmp'.$this->count.'_'.$this->temp_file, $this->targetdir.'/'.$prefix.$this->temp_file)) {
$this->error .= "ImageMagick: Couldn't save to {$this->targetdir}/'{$prefix}{$this->temp_file}\n";
if($this->verbose == TRUE) {
echo "Save failed to {$this->targetdir}/{$prefix}{$this->temp_file}\n";
}
} else {
if($this->verbose == TRUE) {
echo " Saved to {$this->targetdir}/{$prefix}{$this->temp_file}\n";
}
}
return $prefix.$this->temp_file;
}




/*
Cleans up all the temp data in $this->tempdir
*/

function Cleanup() {

if($this->verbose == TRUE) {
echo "Cleanup:\n";
}

$num = count($this->file_history);

for($i=0;$i<$num;$i++) {
if(!unlink($this->file_history[$i])) {
$this->error .= "ImageMagick: Removal of temporary file '{$this->file_history[$i]}' failed\n";
if($this->verbose == TRUE) {
echo " Removal of temporary file '{$this->file_history[$i]}' failed\n";
}
} else {
if($this->verbose == TRUE) {
echo " Deleted temp file: {$this->file_history[$i]}\n";
}
}
}

if($this->verbose == TRUE) {
echo '</pre>';
}
}

}
?>
