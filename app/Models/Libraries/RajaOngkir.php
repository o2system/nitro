<?php

/**
 * RajaOngkir
 *
 * RajaOngkir Wrapper ..
 *
 * @author Gemblue
 * @package Payment
 * @copyright 2019
 */

namespace App\Libraries;

class RajaOngkir
{
    public $cache = true;
    public $apikey = 'e6cfb22439c92260fddfb42beae9b20a';
    public $endpoint = 'https://pro.rajaongkir.com/api';
    public $return_as = 'json'; // Format json or array
    
    public function __construct()
    {
    }

    /**
     * Get all provinces in Indonesia
     *
     * @return array
     */
    public function getProvinces()
    {
        $response = $this->__request([
            'method' => 'GET',
            'uri' => '/province'
        ]);
        
        return $response;
    }

    /**
     * Get detail province by ID
     *
     * @return array
     */
    public function getDetailProvince($province_id = 1)
    {
        return $this->__request([
            'method' => 'GET',
            'uri' => '/province',
            'field' => [
                'id' => $province_id
            ]
        ]);
    }

    /**
     * Get cities by province ID
     *
     * @return array
     */
    public function getCitiesByProvince($province_id = 1)
    {
        return $this->__request([
            'method' => 'GET',
            'uri' => '/city',
            'field' => [
                'province' => $province_id
            ]
        ]);
    }

    /**
     * Get cost
     *
     * @return array
     */
    public function getCost($origin_id = 501, $destination_id = 114, $weight = 1700, $courier = 'jne')
    {
        return $this->__request([
            'method' => 'POST',
            'uri' => '/cost',
            'field' => [
                'origin' => $origin_id,
                'originType' => 'city',
                'destination' => $destination_id,
                'destinationType' => 'city',
                'weight' => $weight,
                'courier' => $courier
            ]
        ]);
    }

    /**
     * Save cache
     */
    public function saveCache($request, $response)
    {
        // Mekanisme simpan ke cache
    }

    /**
     * Is cached
     */
    public function getCache($request)
    {
        // Mekanisme get cache
    }

    private function __request($param)
    {
        $curl = curl_init();

        if ($param['method'] == 'POST') {
            curl_setopt_array($curl, [
                CURLOPT_URL => $this->endpoint . $param['uri'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => http_build_query($param['field']),
                CURLOPT_HTTPHEADER => [
                    "content-type: application/x-www-form-urlencoded",
                    "key: " . $this->apikey
                ],
            ]);
        } else {
            $url = $this->endpoint . $param['uri'];

            if (isset($param['field'])) {
                $query = http_build_query($param['field']);
                $url =  $this->endpoint . $param['uri'] . '?' . $query;
            }
            
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $param['method'],
                CURLOPT_HTTPHEADER => [
                    "key: " . $this->apikey
                ],
            ]);
        }

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        }
        if ($this->return_as == 'json') {
            return $response;
        }
            
        return json_decode($response, true);
    }
}
