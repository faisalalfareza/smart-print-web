<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curl {

	public function native_curl($url, $data=null)
	{    
		// Set up and execute the curl process
		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

		if($data!=null){
			curl_setopt($curl_handle, CURLOPT_POST, 0);
			curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data);
		} else {
			curl_setopt($curl_handle, CURLOPT_HTTPGET, 1);
		}

		// Optional, delete this line if your API is open
		//curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);

		$buffer = curl_exec($curl_handle);
		curl_close($curl_handle);

		return json_decode($buffer);
	}

}