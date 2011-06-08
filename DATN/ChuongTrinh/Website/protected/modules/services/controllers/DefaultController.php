<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $geoIp = new EGeoIP();

        $geoIp->locate('123.26.33.119'); // use your IP

        echo 'Information regarding IP: <b>' . $geoIp->ip . '</b><br/>';
        echo 'City: ' . $geoIp->city . '<br>';
        echo 'Region: ' . $geoIp->region . '<br>';
        echo 'Area Code: ' . $geoIp->areaCode . '<br>';
        echo 'DMA: ' . $geoIp->dma . '<br>';
        echo 'Country Code: ' . $geoIp->countryCode . '<br>';
        echo 'Country Name: ' . $geoIp->countryName . '<br>';
        echo 'Continent Code: ' . $geoIp->continentCode . '<br>';
        echo 'Latitude: ' . $geoIp->latitude . '<br>';
        echo 'Longitude: ' . $geoIp->longitude . '<br>';
        echo 'Currency Symbol: ' . $geoIp->currencySymbol . '<br>';
        echo 'Currency Code: ' . $geoIp->currencyCode . '<br>';
        echo 'Currency Converter: ' . $geoIp->currencyConverter . '<br/>';

        echo 'Converting $10.00 to ' . $geoIp->currencyCode . ': <b>' . $geoIp->currencyConvert(10) . '</b><br/>';
    }

}