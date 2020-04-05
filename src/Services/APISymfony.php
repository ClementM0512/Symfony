<?php
namespace App\Services;

use Symfony\Component\HttpClient\HttpClient;

Class APISymfony {

    public function getSuspects(){

        $client =  HttpClient::create();
        $request = $client->request('GET', 'http://localhost:8000/12345/suspects');    

        $content = $request->getContent();

        return $content;
    }
}