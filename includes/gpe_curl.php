<?php

/* $params = ['Area'=> 'Maternal Health', 'Data%20Source' => 'NFHS-4'];
//$curldata = getcurldata("health_theme_names", $params);
$curldata = getcurldata("indicator_names", $params); */
function getcurldata($url, $params){
	
	
	$host = "https://bmgf.gramener.com/harvard-website/";
	
	
	$post_string = "";
	$headers = [];
	$ch = curl_init();
	array_push($headers,'Content-Type: application/json');
	
	
		if (count($params)>0){
			foreach ($params as $key => &$val) {
				if (is_array($val)) $val = implode(',', $val);
				$post_params[] = $key.'='.urlencode($val);
			}
			$post_string = implode('&', $post_params);
		}
		if(!empty($post_string)){
			$curlURL = $host . $url."?".$post_string;
		}else{
			$curlURL = $host . $url;
		}
		//echo $curlURL;
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$curlURL);
	
	//debug($curlURL);
	//debug($ch);
	
	$result=curl_exec($ch);
	$error=curl_error($ch);
	$info = curl_getinfo($ch);
	$res = json_decode ($result);
	
	return $res;
}