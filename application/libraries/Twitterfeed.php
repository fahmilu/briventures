<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('phpass-0.1/PasswordHash.php');

class Twitterfeed
{
	function buildBaseString($baseURI, $method, $params) {
	    $r = array();
	    ksort($params);
	    foreach($params as $key=>$value){
	        $r[] = "$key=" . rawurlencode($value);
	    }
	    return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
	}

	function buildAuthorizationHeader($oauth) {
	    $r = 'Authorization: OAuth ';
	    $values = array();
	    foreach($oauth as $key=>$value)
	        $values[] = "$key=\"" . rawurlencode($value) . "\"";
	    $r .= implode(', ', $values);
	    return $r;
	}

	function returnTweet(){
	    // $oauth_access_token         = "60483812-SMmKopUFutApOgVsj2i8RlJZgIESNJM2jrk7Zs";
	    // $oauth_access_token_secret  = "X3tqJ4bXLANqwHi1HdAJiqbjb33xO42swTzTnqZAo4";
	    // $consumer_key               = "q35SxVNSu9hd4uvpqXQ";
	    // $consumer_secret            = "jBiHZ48VX2i21NnQXFNqFCl78SR88rGHBhwEHHYrI";

	    // $twitter_timeline           = "user_timeline";  //  mentions_timeline / user_timeline / home_timeline / retweets_of_me

	    // //  create request
	    //     $request = array(
	    //         'screen_name'       => '7ElevenID',
	    //         'count'             => '1'
	    //     );

	    // $oauth = array(
	    //     'oauth_consumer_key'        => $consumer_key,
	    //     'oauth_nonce'               => time(),
	    //     'oauth_signature_method'    => 'HMAC-SHA1',
	    //     'oauth_token'               => $oauth_access_token,
	    //     'oauth_timestamp'           => time(),
	    //     'oauth_version'             => '1.0'
	    // );

	    // //  merge request and oauth to one array
	    //     $oauth = array_merge($oauth, $request);

	    // //  do some magic
	    //     $base_info              = $this->buildBaseString("https://api.twitter.com/1.1/statuses/$twitter_timeline.json", 'GET', $oauth);
	    //     $composite_key          = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
	    //     $oauth_signature            = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
	    //     $oauth['oauth_signature']   = $oauth_signature;

	    // //  make request
	    //     $header = array($this->buildAuthorizationHeader($oauth), 'Expect:');
	    //     $options = array( CURLOPT_HTTPHEADER => $header,
	    //                       CURLOPT_HEADER => false,
	    //                       CURLOPT_URL => "https://api.twitter.com/1.1/statuses/$twitter_timeline.json?". http_build_query($request),
	    //                       CURLOPT_RETURNTRANSFER => true,
	    //                       CURLOPT_SSL_VERIFYPEER => false);

	    //     $feed = curl_init();
	    //     curl_setopt_array($feed, $options);
	    //     $json = curl_exec($feed);
	    //     curl_close($feed);

	    // return json_decode($json, true);
	    return true;
	}

	function ago($time){
		// echo $time.'<br />';
		// echo date('Y-m-d H:i:s', time());
		$time = strtotime($time);
	   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	   $lengths = array("60","60","24","7","4.35","12","10");

	   $now = time();

	       $difference     = $now - $time;
	       $tense         = "ago";

	   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
	       $difference /= $lengths[$j];
	   }

	   $difference = round($difference);

	   if($difference != 1) {
	       $periods[$j].= "s";
	   }

	   return "$difference $periods[$j] ago ";
	}
}

/* End of file Twitterfeed.php */
/* Location: ./application/libraries/Twitterfeed.php */