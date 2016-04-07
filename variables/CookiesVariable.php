<?php
namespace Craft;

class CookiesVariable
{

/* --------------------------------------------------------------------------------
	Variables
-------------------------------------------------------------------------------- */

    function set($name = "", $value = "", $expire = 0, $path = "/", $domain = "", $secure = false, $httponly = false)
    {
		craft()->cookies_utils->set($name, $value, $expire, $path, $domain, $secure, $httponly);
    } /* -- set */

    function get($name)
    {
		return craft()->cookies_utils->get($name);
    } /* -- get */

    function setSecure($name = "", $value = "", $expire = 0, $path = "/", $domain = "", $secure = false, $httponly = false)
    {
		craft()->cookies_utils->setSecure($name, $value, $expire, $path, $domain, $secure, $httponly);
    } /* -- setSecure */

    function getSecure($name)
    {
		return craft()->cookies_utils->getSecure($name);
    } /* -- getSecure */

}