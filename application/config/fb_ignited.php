<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * --- Facebook Ignited ---
 * 
 * fb_appid	is the app id you recieved from dev panel
 * fb_secret	is the secret you recieved from dev panel
 * fb_canvas 	the value you put in 'Canvas Page' field in dev panel or the address of your app.
 * fb_apptype	set to either 'iframe' or 'connect' based on what platform your app is  *is running on.
 * fb_auth	is the default authentications, '' is basic authentication
 */


$config['fb_appid']		= '297827610331673';
$config['fb_secret']	= 'ab74c1607273abe209266abb1df30d6a';
$config['fb_canvas']	= 'daysbeauty';
$config['fb_apptype']	= 'iframe';
$config['fb_auth']		= 'email,publish_stream,user_location,user_birthday,user_likes';
