<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Response;
use  GuzzleHttp \Client ;
class JsonController extends Controller
{
    public function jsonorder($id){
        $newOrder =  App\Order::findOrFail($id);
         if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }

        $nonceBase64 = base64_encode($nonce);
        $seed = date('c');
        $secretKey = "024h1IlD";
        $trankey =  base64_encode(sha1($nonce . $seed . $secretKey, true));

    // CREACION DE LA AUTENTICACION
          $auth = array(
                'login' => '6dd490faf9cb87a9862245da41170ff2',
                'tranKey' => $trankey,
                'nonce'=> $nonceBase64,
                'seed' => $seed,
            );

           $buyer = array(
                        'name'=>$newOrder->name,
                        'document'=>$newOrder->document,
                        'email'=>$newOrder->email,
                        'document'=>$newOrder->address,
                        'mobile'=>$newOrder->mobile
                    );
            $amount = array(
                        'currency'=>"COP",
                        'total'=>500000,
            );

           $payment = array(
                        'reference'=>"2106",
                        'description'=>"Producto 1 ",
                        'amount'=> $amount,
                    );
                $arguments  = json_encode (array(
                                'auth' => $auth,
                                'buyer' => $buyer,
                                'payment'=>$payment,
                                'expiration'=>date('c', strtotime('+1 hour')),
                                'ipAddress'=>"192.168.1.12",
                                'returnUrl'=>"http://127.0.0.1/prueba_tienda/public",
                                'userAgent'=> "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36",
                                'paymentMethod'=> null,
            ));

        $client = new Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);
        $response = $client->post('https://test.placetopay.com/redirection/api/session/',
                ['body' => $arguments]
        );
        $response = json_decode($response->getBody(), true);
        $RequestId=($response['requestId']);
        $newOrder->RequestID=$RequestId;
        $newOrder->save();
        $dir=($response['processUrl']);
        return redirect($dir);
    }

    public function answer($id){
        $newOrder =  App\Order::findOrFail($id);
        $RequestId=$newOrder->RequestID;
        if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }

        $nonceBase64 = base64_encode($nonce);
        $seed = date('c');
        $secretKey = "024h1IlD";
        $trankey =  base64_encode(sha1($nonce . $seed . $secretKey, true));

    // CREACION DE LA AUTENTICACION
          $auth =array(
                'login' => '6dd490faf9cb87a9862245da41170ff2',
                'tranKey' => $trankey,
                'nonce'=> $nonceBase64,
                'seed' => $seed,
            );
            $arguments  = json_encode(array(
                'auth' => $auth,));

            $client = new Client([
                'headers' => ['Content-Type' => 'application/json']
            ]);
            $response = $client->post("https://test.placetopay.com/redirection/api/session/$RequestId",
                    ['body' => $arguments]
            );
            $response = json_decode($response->getBody()->getContents(), true);
            $status=($response['status']);
            if(($status['status'])=="APPROVED"){
                $statusUpdate="PAYED";
            }else{
                $statusUpdate=($status['status']);
            }
            $newOrder->status=$statusUpdate;
            $newOrder->save();
            return view('newOrder');
    }
}
