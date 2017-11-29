<?php
/**
 * Tracking Link plugin for Craft CMS
 *
 * Tracking Link Variable
 *
 * @author    Joshua Turner
 * @copyright Copyright (c) 2017 Joshua Turner
 * @link      joshuaturner.co
 * @package   TrackingLink
 * @since     1.0.0
 */

namespace Craft;

class TrackingLinkVariable
{
    private static $providers = [
		[
            'name' => 'UPS',
			'url' => 'http://wwwapps.ups.com/WebTracking/processInputRequest?TypeOfInquiryNumber=T&InquiryNumber1=',
			'pattern' => '/\b(1Z ?[0-9A-Z]{3} ?[0-9A-Z]{3} ?[0-9A-Z]{2} ?[0-9A-Z]{4} ?[0-9A-Z]{3} ?[0-9A-Z]|T\d{3} ?\d{4} ?\d{3})\b/i'
		],
		[
            'name' => 'USPS',
			'url' => 'https://tools.usps.com/go/TrackConfirmAction?qtc_tLabels1=',
			'pattern' => '/\b((420 ?\d{5} ?)?(91|92|93|94|01|03|04|70|23|13)\d{2} ?\d{4} ?\d{4} ?\d{4} ?\d{4}( ?\d{2})?)\b/i'
		],
		[
            'name' => 'USPS',
			'url' => 'https://tools.usps.com/go/TrackConfirmAction?qtc_tLabels1=',
			'pattern' => '/\b((M|P[A-Z]?|D[C-Z]|LK|E[A-C]|V[A-Z]|R[A-Z]|CP|CJ|LC|LJ) ?\d{3} ?\d{3} ?\d{3} ?[A-Z]?[A-Z]?)\b/i'
		],
		[
            'name' => 'USPS',
			'url' => 'https://tools.usps.com/go/TrackConfirmAction?qtc_tLabels1=',
			'pattern' => '/\b(82 ?\d{3} ?\d{3} ?\d{2})\b/i'
		],
		[
            'name' => 'FedEx',
			'url' => 'http://www.fedex.com/Tracking?language=english&cntry_code=us&tracknumbers=',
			'pattern' => '/\b(((96\d\d|6\d)\d{3} ?\d{4}|96\d{2}|\d{4}) ?\d{4} ?\d{4}( ?\d{3})?)\b/i'
		],
		[
            'name' => 'OnTrac',
			'url' => 'http://www.ontrac.com/trackres.asp?tracking_number=',
			'pattern' => '/\b(C\d{14})\b/i'
		],
		[
            'name' => 'DHL',
			'url' => 'http://www.dhl.com/content/g0/en/express/tracking.shtml?brand=DHL&AWB=',
			'pattern' => '/\b(\d{4}[- ]?\d{4}[- ]?\d{2}|\d{3}[- ]?\d{8}|[A-Z]{3}\d{7})\b/i'
		],
    ];

    public function getUrl($trackingNumber)
    {
        foreach (self::$providers as $provider) {
            $match = [];
            preg_match($provider['pattern'], $trackingNumber, $match);
            if (count($match)) {
                return [
                    'name' => $provider['name'],
                    'url' => $provider['url'] . preg_replace('/\s/', '', strtoupper($match[0]))
                ];
            }
        }

        if (substr($trackingNumber, 0, 1) === '0') {
            return $this->getUrl(ltrim($trackingNumber, '0'));
        }

        return false;
    }
}