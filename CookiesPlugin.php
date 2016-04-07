<?php
namespace Craft;

class CookiesPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Cookies');
    }

    public function getDescription()
    {
        return 'A simple plugin for setting and getting cookies from within Craft CMS templates.';
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/khalwat/cookies/blob/master/README.md';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/khalwat/cookies/master/releases.json';
    }

    public function getVersion()
    {
        return '1.0.4';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    function getDeveloper()
    {
        return 'nystudio107';
    }

    function getDeveloperUrl()
    {
        return 'http://nystudio107.com';
    }

    public function hasCpSection()
    {
        return false;
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.cookies.twigextensions.CookiesTwigExtension');

        return new CookiesTwigExtension();
    }
}