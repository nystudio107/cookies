### Cookies plugin for Craft CMS

A simple plugin for setting and retrieving cookies from within [Craft CMS](http://buildwithcraft.com) templates.

This plugin is based on the [Lj_cookies](https://github.com/lewisjenkins/craft-lj-cookies) plugin, and functions similarly, but adds the ability to get and set secure cookies using the craft->security() framework.

**Installation**

1. Unzip file 
2. Place `cookies` directory into your `craft/plugins` directory
3. Install plugin in the Craft Control Panel under Settings > Plugins

###Setting cookies###

    {% do craft.cookies.set( NAME, VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY) %}

This function acts as a wrapper for the PHP `setcookie` function:

More info: (http://php.net/manual/en/function.setcookie.php)

**Examples**

    {% do craft.cookies.set('marvin', 'martian', now | date_modify("+1 hour").timestamp ) %}
    {# Sets a cookie to expire in an hour. #}

    {% do craft.cookies.set('marvin', 'martian', now | date_modify("+30 days").timestamp ) %}
    {# Sets a cookie to expire in 30 days. #}
	
    {% do craft.cookies.set('marvin', 'martian', '', '/' ) %}
    {# Cookie available for entire domain. #}

    {% do craft.cookies.set('marvin', 'martian', '', '/foo/' ) %}
    {# Cookie available within /foo/ directory and sub-directories. #}

###Setting Secure cookies###

    {% do craft.cookies.setSecure( NAME, VALUE, DURATION, PATH, DOMAIN, SECURE, HTTPONLY) %}

This function works the same as `craft.cookies.set` but instead of using the PHP `setcookie` function, it uses the `craft->security` framework to encrypt and validate the cookie contents between requests.

**Examples**

    {% do craft.cookies.setSecure('marvin', 'martian', now | date_modify("+1 hour").timestamp ) %}
    {# Sets a cookie to expire in an hour. #}

    {% do craft.cookies.setSecure('marvin', 'martian', now | date_modify("+30 days").timestamp ) %}
    {# Sets a cookie to expire in 30 days. #}
	
    {% do craft.cookies.setSecure('marvin', 'martian', '', '/' ) %}
    {# Cookie available for entire domain. #}

    {% do craft.cookies.setSecure('marvin', 'martian', '', '/foo/' ) %}
    {# Cookie available within /foo/ directory and sub-directories. #}

###Retrieving cookies###

    {{ craft.cookies.get( NAME ) }}
	{# Note that we're using 'get' to retrieve. #}

**Example**

    {% do craft.cookies.set('marvin', 'martian', '', '/') %}
	{# Set the cookie using 'set' #}

    <p>Are you a, {{ craft.cookies.get('marvin') ? }}</p>
	{# Retrieve the cookie's value using 'get' #}

###Retrieving Secure cookies###

    {{ craft.cookies.getSecure( NAME ) }}
	{# Note that we're using 'getSecure' to retrieve. #}

This function works the same as `craft.cookies.get` but instead of using the PHP `setcookie` function, it uses the `craft->security` framework to decrypt and validate the cookie contents between requests.

**Example**

    {% do craft.cookies.setSecure('marvin', 'martian', '', '/') %}
	{# Set the cookie using 'setSecure' #}

    <p>Are you a, {{ craft.cookies.getSecure('marvin') ? }}</p>
	{# Retrieve the cookie's value using 'getSecure' #}
	
###Deleting cookies###

	{% do craft.cookies.set('myname', '') %}
	{# Delete a cookie by setting an empty value #}

**Tested on**

+ Craft 2.0 and later
