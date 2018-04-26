<?php 

//返回传来文件名的后缀
function get_type($fileName){
    $file = explode('.',$fileName);
    return end($file);
}
//检查路径不存在则创建
function mkdirs($dir, $mode = 0777)
{
    if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
    if (!mkdirs(dirname($dir), $mode)) return FALSE;
    return @mkdir($dir, $mode);
}	
 ?>