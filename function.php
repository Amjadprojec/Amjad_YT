<?php 
const class_version = "1.0.3";
function cetak($content){
  echo h.'[+] '.k.$content.n;
}
function Curl($u, $h = 0, $p = 0,$mode = 0) {
	while(true){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $u);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_COOKIE,TRUE);
		curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
	    curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
		if($mode){
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST,$mode);
		}
		if($p) {
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $p);
		}
		if($h) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
		}
		curl_setopt($ch, CURLOPT_HEADER, true);
		$r = curl_exec($ch);
		$c = curl_getinfo($ch);
		if(!$c) return "Curl Error : ".curl_error($ch); else{
			$hd = substr($r, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
			$bd = substr($r, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
			curl_close($ch);
			return array($hd,$bd);
		}
	}
}
function Timer($tmr){date_default_timezone_set("UTC");$timr = time()+$tmr;while(true){print "\r                                                  \r";$res=$timr-time();if($res < 1) {break;}print date('H:i:s',$res);sleep(1);}}
function msg($str, $j = 10){
    $simbol = ['-', '/', '|', '\\'];
    for($i = $j; $i > 0; $i--){
        foreach($simbol as $n => $s){
            print p."                 [".k.$s.p."] ".h.$str." ".k.str_repeat("➤", $n).r;
            usleep(100000);
        }
    }
    print "                           ".r;
}

function TimeZone(){$rpi = json_decode(file_get_contents("http://ip-api.com/json"),1);if($rpi){$tz = $rpi["timezone"];date_default_timezone_set($tz);return $rpi["country"];}else{date_default_timezone_set("UTC");return "UTC";}}  
