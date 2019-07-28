<?php
$bastk_dir = "C:/xampp/htdocs/earsip/file/bastk";
$semua_dir = "C:/xampp/htdocs/earsip/file";
$ss = folderSize($semua_dir);
$fs = folderSize($bastk_dir);
$ds = formatBytes($ss,2);
echo "ukuran storage BASTK :".formatBytes($fs,2);echo "<br>";
echo "ukuran storage FILE ALL : " .$ds; echo "<br>";
echo "Percentage relative to 400 gb : ".(($ds/400000)*100)."%";





/*Untuk mengambil size folder */
function folderSize ($dir)
{
    $size = 0;
    foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : folderSize($each);
    }
    return $size;
}
/* Untuk mengatur Format */
function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 

    // Uncomment one of the following alternatives
    $bytes /= pow(1024, $pow);
  

    return round($bytes, $precision) . ' ' . $units[$pow]; 
} 

?>