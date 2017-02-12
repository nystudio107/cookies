# Cookies plugin for Craft CMS

A simple plugin for setting and getting cookies from within [Craft CMS](http://buildwithcraft.com) templates.

Related: [Cookies for Craft 3.x](https://github.com/nystudio107/craft3-cookies)

This plugin is inspired the [Lj_cookies](https://github.com/lewisjenkins/craft-lj-cookies) plugin, and functions similarly, but adds the ability to get and set secure cookies using the craft->security() framework, and it also provides Twig filters and functions as well as Craft variables for setting & getting cookies.

**Installation**

1. Download & unzip the file and place the `cookies` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/khalwat/cookies.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3. Install plugin in the Craft Control Panel under Settings > Plugins
4. The plugin folder should be named `cookies` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

## Setting cookies

All three of these methods accomplish the same thing:

	{# Set the cookie using 'setCookie' function #}
    {{ setCookie( NAME, VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY) }}
    
	{# Set the cookie using 'setCookie' filter #}
    {{ NAME | setCookie( VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY) }}

	{# Set the cookie using 'set' variable #}
    {% do craft.cookies.set( NAME, VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY) %}

They all act as a wrapper for the PHP `setcookie` function:

More info: (http://php.net/manual/en/function.setcookie.php)

All of the parameters except for `NAME` are optional.  The `PATH` defaults to `/` if not specified

**Examples**

    {{ setCookie('marvin', 'martian', now | date_modify("+1 hour").timestamp ) }}
    {# Sets a cookie to expire in an hour. #}

    {% 'marvin' | setCookie('martian', now | date_modify("+30 days").timestamp ) %}
    {# Sets a cookie to expire in 30 days. #}
	
    {% do craft.cookies.set('marvin', 'martian', '', '/foo/' ) %}
    {# Cookie available within /foo/ directory and sub-directories. #}

## Setting Secure cookies

All three of these methods accomplish the same thing:

	{# Set the cookie using 'setSecureCookie' function #}
    {{ setSecureCookie( NAME, VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY) }}
    
	{# Set the cookie using 'setSecureCookie' filter #}
    {{ NAME | setSecureCookie( VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY) }}

	{# Set the cookie using 'setSecure' variable #}
    {% do craft.cookies.setSecure( NAME, VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY) %}

This function works the same as `setCookie` but instead of using the PHP `setcookie` function, it uses the `craft()->request->getCookies()->add` to add the cookies via Craft.  It also utilizes `craft->security` framework to encrypt and validate the cookie contents between requests.

All of the parameters except for `NAME` are optional.  The `PATH` defaults to `/` if not specified

**Examples**

    {{ setSecureCookie('marvin', 'martian', now | date_modify("+1 hour").timestamp ) }}
    {# Sets a cookie to expire in an hour. #}

    {{ 'marvin' | setSecureCookie('martian', now | date_modify("+30 days").timestamp ) }}
    {# Sets a cookie to expire in 30 days. #}
	
    {% do craft.cookies.setSecure('marvin', 'martian', '', '/foo/' ) %}
    {# Cookie available within /foo/ directory and sub-directories. #}

## Retrieving cookies

Both of these methods accomplish the same thing:

	{# Get the cookie using 'getCookie' function #}
    {{ getCookie( NAME ) }}
    
	{# Get the cookie using 'get' variable #}
    {% do craft.cookies.get( NAME ) %}

**Example**

    {{ getCookie('marvin') }}
	{# Get the cookie using 'getCookie' function #}

    {{ craft.cookies.get('marvin') }}
	{# Get the cookie using 'get' variable #}

	{% if getCookie('marvin') %}
		{% set myCookie = getCookie('marvin') %}
		{{ myCookie }}
	{% endif %}

## Retrieving Secure cookies

Both of these methods accomplish the same thing:

	{# Get the cookie using 'getSecureCookie' function #}
    {{ getSecureCookie( NAME ) }}
    
	{# Get the cookie using 'getSecure' variable #}
    {% do craft.cookies.getSecure( NAME ) %}

**Example**

    {{ getSecureCookie('marvin') }}
	{# Get the cookie using 'getSecureCookie' function #}

    {{ craft.cookies.getSecure('marvin') }}
	{# Get the cookie using 'getSecure' variable #}

	{% if getSecureCookie('marvin') %}
		{% set myCookie = getSecureCookie('marvin') %}
		{{ myCookie }}
	{% endif %}

This function works the same as `getCookie` but it uses `craft()->request->getCookie()` to retrieve the cookies via Craft.  It also utilizes `craft->security` framework to decrypt and validate the cookie contents between requests.

**Example**

    {{ getSecureCookie('marvin') }}
	{# Get the cookie using 'getSecureCookie' function #}

    {{ craft.cookies.getSecure('marvin') }}
	{# Get the cookie using 'getSecure' variable #}

	{% if getSecureCookie('marvin') %}
		{% set myCookie = getSecureCookie('marvin') %}
		{{ myCookie }}
	{% endif %}
	
## Deleting cookies

All three of these methods accomplish the same thing:

	{# Delete a cookie by passing no VALUE to 'setCookie' function #}
    {{ setCookie( NAME ) }}
    
	{# Delete a cookie by passing no VALUE to 'setCookie' filter #}
    {{ NAME | setCookie() }}

	{# Delete a cookie by passing no VALUE to 'set' variable #}
    {% do craft.cookies.set( NAME ) %}

## Deleting Secure cookies

All three of these methods accomplish the same thing:

	{# Delete a cookie by passing no VALUE to 'setSecureCookie' function #}
    {{ setSecureCookie( NAME ) }}
    
	{# Delete a cookie by passing no VALUE to 'setSecureCookie' filter #}
    {{ NAME | setSecureCookie() }}

	{# Delete a cookie by passing no VALUE to 'setSecure' variable #}
    {% do craft.cookies.setSecure( NAME ) %}

## Changelog

### 1.0.4 -- 2016.04.06

* [Fixed] Saner default values for cookies
* [Improved] Updated the README.md

### 1.0.3 -- 2016.03.08

* [Fixed] We now set the expiration date to the past if we're deleting a cookie, to force browsers to remove it
* [Improved] Updated the README.md

### 1.0.2 -- 2015.11.23

* Added support for Craft 2.5 new plugin features
* Updated the README.md

### 1.0.1 -- 2015.04.25

* Added Twig filters and functions for setting/getting cookies
* Moved the core functionality to services
* Updated the documentation

### 1.0.0 -- 2015.04.24

* Initial release
