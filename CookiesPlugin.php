<?php
namespace Craft;

class CookiesPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Cookies');
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'Megalomaniac';
    }

    function getDeveloperUrl()
    {
        return 'http://www.megalomaniac.com';
    }

    public function hasCpSection()
    {
        return false;
    }
}