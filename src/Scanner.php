<?php

namespace Jaylee\Test;

class Scanner {

    private $urls = [];
    private $httpClient;

    public function __construct(array $urls){
        $this->urls = $urls;
        $this->httpClient = new \GuzzleHttp\Client();
    }

    public function getInvalidUrls(){

        $invalidUrls = [];

        foreach( $this->urls as $url ){
            try {
                $statusCode = $this->getStatusCodeForUrl( $url );
            } catch(\Exception $e){
                $statusCode = 500;
            }

            if ( $statusCode >= 400 ){
                $invalidUrls[] = [
                    'url' => $url,
                    'status' => $statusCode
                ];
            }
        }

        return $invalidUrls;
    }

    public function getStatusCodeForUrl($url){

        $httpResponse = $this->httpClient->option($url);

        return $httpResponse->getStatusCode();
    }

}
