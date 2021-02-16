<?php
namespace App\Services;
use Carbon\Carbon;
use GuzzleHttp\Client;
class WaNotification
{
    public $api_send_url = 'http://sms114.xyz/sms/api_whatsapp_send_json.php';
    public $api_key = '438fb3cfbe95482d481d91dc7688a02a';
    public $wa_id = 'EFKT';
    public function __construct() {
//        $this->api_key = config('flip.secret_key');
//        $this->api_url = config('flip.api_url');
    }

    public function send($datapacket = []) {
        $result = [
            'success' => false,
            'status' => 0,
            'status_text' => 'Not send!',
            'response' => null
        ];
        if(count($datapacket)>0) {
            $client = new Client();
            $response = $client->post($this->api_send_url, [
                'json' => [
                    'apikey' => $this->api_key,
                    'waid' => $this->wa_id,
                    'datapacket' => $datapacket,
                ]
            ]);
            $responseObj = json_decode($response->getBody()->getContents());
            $globalstatus = $responseObj->sending_respon[0]->globalstatus??0;
            $globalstatustext = $responseObj->sending_respon[0]->globalstatustext??'';

            $result['success'] = ($globalstatus==10);
            $result['status'] = $globalstatus;
            $result['status_text'] = $globalstatustext;
            $result['response'] = $responseObj;
        }
        return $result;
    }
}
