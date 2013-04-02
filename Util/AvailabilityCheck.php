<?php

/*
 * This file is part of the PondTunesBundle.
 *
 * (c) Marcus Stöhr <dafish@soundtrack-board.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pond\TunesBundle\Util;

use Pond\Tunes\Lookup;
use Pond\Tunes\ResultSet;

class AvailabilityCheck
{
    /**
     * @var Lookup
     */
    protected $lookup;

    /**
     * Constructor
     *
     * @param Lookup $lookup
     */
    public function __construct(Lookup $lookup)
    {
        $this->lookup = $lookup;
    }

    /**
     * Check the availability of a product by id and country code
     *
     * @param string $lookupId
     * @param string $countryCode
     *
     * @return boolean
     */
    public function checkAvailability($lookupId, $countryCode)
    {
        /* @var $results ResultSet */
        $results = $this->lookup->setLookupId($lookupId)
            ->setCountry($countryCode)
            ->setResultFormat(Lookup::RESULT_ARRAY)
            ->request();

        return count($results) > 0;
    }
}
