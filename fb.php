<?php
function curl($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_5; en-US) AppleWebKit/534.13 (KHTML, like Gecko) Chrome/9.0.597.15 Safari/534.13");
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    $content = curl_exec($curl);
    curl_close($curl);
    return $content;
}
system("clear");
echo "                                                                                                    
 _____ _____    _____ _____ ____  _____ _____    ____  _____ _ _ _ _____ __    _____ _____ ____  _____ _____ 
|   __| __  |  |  |  |     |    \|   __|     |  |    \|     | | | |   | |  |  |     |  _  |    \|   __| __  |
|   __| __ -|  |  |  |-   -|  |  |   __|  |  |  |  |  |  |  | | | | | | |  |__|  |  |     |  |  |   __|    -|
|__|  |_____|   \___/|_____|____/|_____|_____|  |____/|_____|_____|_|___|_____|_____|__|__|____/|_____|__|__|

                                                VERSION 1.0.0
                                             CREATED BY R3D#@X0r
                                                                                                             
";
echo "\n\n";
echo "[#] Enter Video URL (https://www.facebook.com/user/video/id) : ";
$v = trim(fgets(STDIN, 1024));
echo "\n\n[#] Enter Video Name To Save As : ";
$name = trim(fgets(STDIN, 1024));
$url = str_replace('www', 'mbasic', $v);
$s = curl($url);
//echo $s;
$vurl = preg_match('/<a href=\"\/video_redirect\/\?src\=(.*?)\"/ims', $s, $matches) ? $matches[1] : null;
$vu = urldecode($vurl);
echo "\n\n[+] Downloading... \n\n\n";
$d = 'wget -O "' . $name . '.mp4" --user-agent="Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1092.0 Safari/536.6" "' . $vu . '" -q --show-progress';
system($d);
echo "\n\n[+] Done.. Saved As : " . $name . ".mp4\n\n";
exit(0);
?>
