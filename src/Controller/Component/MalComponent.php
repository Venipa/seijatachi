<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class MalComponent extends Component {
    function search($anime) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://myanimelist.net/api/anime/search.xml?q=".$anime,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Basic YXZ1ZW5qYTpDOTYwMjI3OTM="
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "Error #:" . $err;
        } else {
            $response = html_entity_decode($response);

            $response = str_replace('&','&amp;', $response);
            $response = str_replace('ê','&ecirc;', $response);
            $response = str_replace('é','&eacute;', $response);

            return simplexml_load_string($response);
        }
    }
}