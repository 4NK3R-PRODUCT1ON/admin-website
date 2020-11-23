<?php
// Author Name : LOL~4NK3R-EROR
// Information List : 4001 list
// contact here : Youtube Anker production


	

echo "\x1b[93m╔═══╦═══╦═╗╔═╦══╦═╗─╔╗╔═══╦══╦═╗─╔╦═══╦═══╦═══╗\n";
echo "\x1b[93m║╔═╗╠╗╔╗║║╚╝║╠╣╠╣║╚╗║║║╔══╩╣╠╣║╚╗║╠╗╔╗║╔══╣╔═╗║\n";
echo "\x1b[93m║║─║║║║║║╔╗╔╗║║║║╔╗╚╝║║╚══╗║║║╔╗╚╝║║║║║╚══╣╚═╝║\n";
echo "\x1b[93m║╚═╝║║║║║║║║║║║║║║╚╗║║║╔══╝║║║║╚╗║║║║║║╔══╣╔╗╔╝\n";
echo "\x1b[93m║╔═╗╠╝╚╝║║║║║╠╣╠╣║─║║║║║──╔╣╠╣║─║║╠╝╚╝║╚══╣║║╚╗\n";
echo "\x1b[93m╚╝─╚╩═══╩╝╚╝╚╩══╩╝─╚═╝╚╝──╚══╩╝─╚═╩═══╩═══╩╝╚═╝\n";
echo "\x1b[93m╔═════════════════════════════════╗\n";
echo "\x1b[93m║    Autor    : LOL~4NK3R-EROR    ║\n";
echo "\x1b[93m║    Info     : Di Buat 23-11-2020║\n";
echo "\x1b[93m║    Version  : 1                 ║\n";
echo "\x1b[93m║    Team     : L.A.S.S TEAM      ║\n";
echo "\x1b[93m╚═════════════════════════════════╝\n";
  

echo "\x1b[93mmasukan site  : ";
$target = trim(fgets(STDIN));
$list = "ezz_wordlist.txt";
if(!preg_match("/^http:\/\//",$target) AND !preg_match("/^https:\/\//",$target)){
	$targetnya = "http://$target";
}else{
	$targetnya = $target;
}

$buka = fopen("$list","r");
$ukuran = filesize("$list");
$baca = fread($buka,$ukuran);
$lists = explode("\r\n",$baca);

foreach($lists as $login){
	$log = "$targetnya/$login";
	$ch = curl_init("$log");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($httpcode == 200){
		 $handle = fopen("result.txt", "a+");
		fwrite($handle, "$log\n");
		print "\x1b[31;1m\n\n [".date('H:m:s')."] Mencoba : $log => Ditemukan\n";
	}else{
		print "\n[".date('H:m:s')."] Mencoba : $log => tidak di temukan";
	}
}
  
?>