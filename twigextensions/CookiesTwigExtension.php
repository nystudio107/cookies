<?php 
namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class CookiesTwigExtension extends \Twig_Extension
{

/* --------------------------------------------------------------------------------
	Expose our filters and functions
-------------------------------------------------------------------------------- */

    public function getName()
    {
        return 'Cookies';
    }

/* -- Return our twig filters */

    public function getFilters()
    {
        return array(
            'setCookie' => new \Twig_Filter_Method($this, 'setCookie_filter'),
            'getCookie' => new \Twig_Filter_Method($this, 'getCookie_filter'),
            'setSecureCookie' => new \Twig_Filter_Method($this, 'setSecureCookie_filter'),
            'getSecureCookie' => new \Twig_Filter_Method($this, 'getSecureCookie_filter'),
        );
    } /* -- getFilters */

/* -- Return our twig functions */

    public function getFunctions()
    {
        return array(
            'setCookie' => new \Twig_Function_Method($this, 'setCookie_filter'),
            'getCookie' => new \Twig_Function_Method($this, 'getCookie_filter'),
            'setSecureCookie' => new \Twig_Function_Method($this, 'setSecureCookie_filter'),
            'getSecureCookie' => new \Twig_Function_Method($this, 'getSecureCookie_filter'),
        );
    } /* -- getFunctions */

/* --------------------------------------------------------------------------------
	Filters
-------------------------------------------------------------------------------- */

    public function setCookie_filter($name = "", $value = "", $expire = 0, $path = "/", $domain = "", $secure = false, $httponly = false)
    {
		craft()->cookies_utils->set($name, $value, $expire, $path, $domain, $secure, $httponly);
    } /* -- setCookie_filter */

    public function getCookie_filter($name)
    {
		return craft()->cookies_utils->get($name);
    } /* -- getCookie_filter */

    public function setSecureCookie_filter($name = "", $value = "", $expire = 0, $path = "/", $domain = "", $secure = false, $httponly = false)
    {
		craft()->cookies_utils->setSecure($name, $value, $expire, $path, $domain, $secure, $httponly);
    } /* -- setSecureCookie_filter */

    public function getSecureCookie_filter($name)
    {
		return craft()->cookies_utils->getSecure($name);
    } /* -- getSecureCookie_filter */

} /* -- CookiesTwigExtension */
