<?php

echo "Masukkan FBID\nInput : ";
$fbid = trim(fgets(STDIN));
echo "Masukkan SESSIONID\nInput : ";
$sessionid = trim(fgets(STDIN));
echo "Masukkan Jumlah\nInput : ";
$jumlah = trim(fgets(STDIN));


for($i = 1; $i <= $jumlah; $i++){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://dragon.scratch-cube.xyz/DC-FOOD/Dragoncityx2.php");
	curl_setopt($ch, CURLOPT_HEADER, array( 'Accept: /',
											'Accept-Language: id-ID,en-US;q=0.9',
											'Accept-Encoding: gzip, deflate',
											'Connection: keep-alive',
											'Content-Length: 84',
											'Origin: http://scratch-cube.xyz',
											'X-Requested-With: XMLHttpRequest',
											'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
											'Host: scratch-cube.xyz',
											'Pragma: no-cache',
											'Cache-Control: no-cache'
                                            ));
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/68.0.3440.91 Mobile Safari/537.36');
	curl_setopt($ch, CURLOPT_REFERER, 'http://dragon.scratch-cube.xyz/DC-FOOD/Dragoncityx2.php');
	curl_setopt($ch, CURLOPT_COOKIE, 's4umtid2=775962;c1x84460=1;__cfduid=df4c40d139de34e36550da305fa63a8941536919477;PHPSESSID=0s4crgl6tang156a1m132rg953');
	curl_setopt($ch, CURLOPT_POSTFIELDS,"facebookID=".$fbid."&sessionID=".$sessionid."&externalID=".$fbid."&mode=gold");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$output = curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($httpcode == 200){
		 $explode = explode("\n", $output);
		 echo "Sukses : ".$explode[0]."|".strip_tags($explode[12])."\n";
		 $fopen = fopen("sukses.txt", "a+");
		 fwrite($fopen, "Sukses : ".$explode[0]."|".strip_tags($explode[12]).PHP_EOL);
		 fclose($fopen);
		sleep(5);
	}else{
		$explode = explode("\n", $output);
		echo "Gagal, Error: ".$explode[0]."\n";
		$fopen = fopen("gagal.txt", "a+");
		fwrite($fopen, "Gagal, Error: ".$explode[0].PHP_EOL);
		fclose($fopen);
		sleep(5);
	}
	curl_close($ch);
}
?>