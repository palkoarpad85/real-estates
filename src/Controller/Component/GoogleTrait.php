<?php
namespace App\Controller\Component;
trait GoogleTrait {

protected function googleaddresscordinate($data){

        $locality      = "">
        $street        = "";
        $street_number = "";
        $public_spacce = "";


        if (isset($data['locality'])) {
            $locality = $data['locality'].",".$data['country'];
        }
        if (isset($data['route'])) {
            $route = explode(" ", $data['route']);
            foreach ($route as $value) {
                $street.=$value."+";
            }
            $locality=$locality."+".$street;
        }
        if (isset($data['street_number'])) {
            $locality=$locality.$data['street_number'];
        }


        $url = "https://maps.google.com/maps/api/geocode/json?address=$locality&key=".\Cake\Core\Configure::read('Api.GoogleMapsKey');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $json_a = json_decode($response, true);


        if ($json_a["status"]=="ZERO_RESULTS") {
            return $json_a=null;
        }
        else {
            return $json_a;
        }


    }

    protected function getstate($latitude){

       
        $lan=$latitude['results']['0']['geometry']['location']['lat'];
        $lng=$latitude['results']['0']['geometry']['location']['lng'];
        
         $url="https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lan.",".$lng."&key=".\Cake\Core\Configure::read('Api.GoogleMapsKey');
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
         $pages = curl_exec($ch);
         curl_close($ch);
        $json = json_decode($pages, true);
 
        $statearray=null;
        for ($i=0; $i <count($json['results']) ; $i++) {
            $state=$json['results'][$i]['address_components']['0']['types'][0];

            if ($state=="administrative_area_level_1") {
                $statearray=$json['results'][$i]['address_components']['0']['long_name'];
                $i=count($json['results']);
            }

        }
        $state = explode(" ", $statearray);

        return $state[0];
    }

    protected function getcity($json_a){

        $city=null;
        for ($i=0; $i <count($json_a['results']); $i++) {
            for ($j=0; $j <count($json_a['results'][$i]['address_components']) ; $j++) {
                $types=$json_a['results'][$i]['address_components'][$j]['types']['0'];
                if ($types=="locality") {
                    $city=$json_a['results'][$i]['address_components'][$j]['long_name'];
                }
            }
        }

        return $city;
    }

    protected function getstreet($json_a){
        $street=null;
        for ($i=0; $i <count($json_a['results']); $i++) {
            for ($j=0; $j <count($json_a['results'][$i]['address_components']) ; $j++) {
                $types=$json_a['results'][$i]['address_components'][$j]['types']['0'];
                if ($types=="route") {
                    $street=$json_a['results'][$i]['address_components'][$j]['long_name'];
                }
            }
        }

        return $street;
    }

    protected function gethousenumber($json_a){

        $street_number=null;
        for ($i=0; $i <count($json_a['results']); $i++) {
            for ($j=0; $j <count($json_a['results'][$i]['address_components']) ; $j++) {
                $types=$json_a['results'][$i]['address_components'][$j]['types']['0'];
                if ($types=="street_number") {
                    $street_number=$json_a['results'][$i]['address_components'][$j]['long_name'];
                }
            }
        }

        return $street_number;

    }

    protected function getzipCode($json_a){

        $lan=$json_a['results']['0']['geometry']['location']['lat'];
        $lng=$json_a['results']['0']['geometry']['location']['lng'];
        $url="https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lan.",".$lng."&key=".\Cake\Core\Configure::read('Api.GoogleMapsKey');
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
         $pages = curl_exec($ch);
         curl_close($ch);
        $json = json_decode($pages, true);

        $zipCode=null;

        for ($i=0; $i <count($json['results']); $i++) {
            for ($j=0; $j <count($json['results'][$i]['address_components']) ; $j++) {
                $types=$json['results'][$i]['address_components'][$j]['types']['0'];

                if ($types=="postal_code") {
                    $zipCode=$json['results'][$i]['address_components'][$j]['long_name'];
                }
            }
        }

        return $zipCode;

    }

    protected function getDistrict($json_a){

        $district=null;
        $lan=$json_a['results']['0']['geometry']['location']['lat'];
        $lng=$json_a['results']['0']['geometry']['location']['lng'];

        $url="http://api.opencagedata.com/geocode/v1/json?q=".$lan."+".$lng."&key=".\Cake\Core\Configure::read('Api.OpenCageDataKey');
        $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
         $pages = curl_exec($ch);
         curl_close($ch);
        
        $json = json_decode($pages, true);

        if ((isset($json["results"]["0"]["components"]["city"])) && ($json["results"]["0"]["components"]["city"]=="Budapest")) {

            $district=$json["results"]["0"]["components"]["suburb"];
            $district= preg_replace("/[^0-9,.]/", "", $district);
        }

        elseif(isset($json["results"]["0"]["components"]["village"])) {
            $district=$json["results"]["0"]["components"]["village"];

        }
        elseif(isset($json["results"]["0"]["components"]["town"])) {
            $district=$json["results"]["0"]["components"]["town"];

        }
        elseif(isset($json["results"]["0"]["components"]["suburb"])) {
            $district=$json["results"]["0"]["components"]["suburb"];

        }
        else{
            $district=null;
        }

        return $district;
    }

}
