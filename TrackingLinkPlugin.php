<?php
/**
 * Tracking Link plugin for Craft CMS
 *
 * Convert tracking numbers from USPS, UPS, FedEx, DHL, and OnTrac to the appropriate URL format
 *
 * @author    Joshua Turner
 * @copyright Copyright (c) 2017 Joshua Turner
 * @link      joshuaturner.co
 * @package   TrackingLink
 * @since     1.0.0
 */

namespace Craft;

class TrackingLinkPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Tracking Link');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Convert tracking numbers from USPS, UPS, FedEx, DHL, and OnTrac to the appropriate URL format');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/joshua-turner/craft-trackinglink/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Joshua Turner';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'joshuaturner.co';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }
}