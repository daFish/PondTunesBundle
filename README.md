# PondTunesBundle
## About
The PondTunesBundle allows the integration of PondTunes library.

## Installation
Add the dependency for PondTunesBundle to your `composer.json`:


    "require": {
        "pond/tunes-bundle": "*",
    }

## Activation
Register the bundle in your `AppKernel.php`:

    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Pond\TunesBundle\PondTunesBundle(),
            // ...
        );
    }

## Usage
The bundle provides services for search and lookup the Apple iTunes Webservice.

    <?php
    namespace Acme\DemoBundle\Controller;

    use Pond\Tunes\Search;

    class ItunesController
    {
        public function searchAction()
        {
            $pondSearch = $this->get('pond_tunes.search');

            // searches for iPad Apps in germany with 'Angry'
            $pondSearch->setEntity(
                array(Search::MEDIATYPE_SOFTWARE => 'iPadSoftware')
            );
            $pondSearch->setCountry('de');
            $pondSearch->setTerms('angry');
            $pondSearch->setLimit(5);
            $pondSearch->setResultFormat(Search::RESULT_ARRAY);

            // contains search results
            $results = $pondSearch->request();

            return array('results' => $results);
        }
    }
