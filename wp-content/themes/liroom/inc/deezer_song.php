<?php
/**
 * Deezer song shortcode
 */

 
function deeser_song($song,$album,$band ){
	$rez = '';
	$groupOfAlbum = array();
	$groupAlbum = array();
	$groupSong = array();
	
	$artists = sendCurl('https://api.deezer.com/search/artist?q="'.urlencode($band).'"');
	//error_log(print_r($artists,true));
	foreach ($artists['data'] as $key=>$artist){
		if(strtolower($artist['name']) == strtolower($band)) {
			$groupOfAlbum = $artist;
		}
	}
	if(empty($groupOfAlbum)) return '';
	
	$gID = $groupOfAlbum['id'];
	
	$albums = sendCurl('https://api.deezer.com/search/album?q="'.urlencode($album).'"');
	
	foreach ($albums['data'] as $key=>$al){
		if($al['artist']['id'] == $gID &&  strtolower($al['title']) == strtolower($album)) {
			$groupAlbum = $al;
		}
	}
	if(empty($groupAlbum)) return '';
	
	$tracklist = sendCurl($groupAlbum['tracklist']);
	
	foreach ($tracklist['data'] as $key=>$track){
		if(strtolower($track['title']) == strtolower($song)) {
			$groupSong = $track;
		}
	}
	if(empty($groupSong)) return '';
	
	//error_log(print_r($groupSong,true));

	return $groupSong['id'];
}


	
/**
*	Send post request to the manage server
*	
*	@param string $url - sending url
*	@param string $postvars - string with postvars ready for post action
*	
*	@return array $content - result variable
*/ 	
function sendCurl($callUrl) 
{
		$ch = curl_init();
		$headers = array("Accept: application/json");
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
		curl_setopt($ch, CURLOPT_URL, $callUrl);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		
		/*curl_setopt($ch, CURLOPT_URL, $callUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
		curl_setopt($ch,CURLOPT_TIMEOUT, 20);*/
		$data = curl_exec($ch);
		curl_close ($ch);	
		$result = json_decode($data, true);
		
		/*if(curl_error($ch))
		{
			throw new WW_Model_Exception('Curl error: ' . curl_error($ch), 1);
		}*/
		
		
		return $result; 
}   
 
?>
