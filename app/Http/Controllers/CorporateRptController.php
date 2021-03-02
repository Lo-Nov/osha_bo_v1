<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CorporateRptController extends Controller
{

    public function healthBill()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else {
            $url = config('global.health');
            $data = [
                'function' => 'getBills',
                'to'=>'',
                'form'=>''
            ];

            $this->data['getBills'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('reports.bills')->with($this->data);
        }
    }
public function receipts()
{
    if (Session::get('resource')[0]['is_login'] != 1) {
        Session::put('url', url()->current());
        return redirect()->route('login');
    }else {
        $url = config('global.health');
        $data = [
            'function' => 'getReceipts',
            'to'=>'',
            'form'=>''
        ];

        $this->data['getReceipts'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data);
        return view('reports.receipts')->with($this->data);
    }
}


    public function nonactiveLicenses(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else {
            $url = config('global.health');
            $data = [
                'function' => 'getNonActiveCertsHygiene',
            ];

            $this->data['getNonActiveCertsHygiene'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('corporates.nonactive-licenses')->with($this->data);
        }
    }
    public function activeLicenses(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else {
            $url = config('global.health');
            $data = [
                'function' => 'getActiveCertsHygiene',
            ];

            $this->data['getActiveCertsHygiene'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('corporates.active-licenses')->with($this->data);
        }
    }
    public function activeCerts(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else {
            $url = config('global.health');
            $data = [
                'function' => 'getActiveCerts',
            ];

            $this->data['getActiveCerts'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('corporates.active-certs')->with($this->data);
        }
    }
    public function licenseExpiry30Days(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else {
            $url = config('global.health');
            $data = [
                'function' => 'getCertsExpiryIn30DaysHygiene',
            ];

            $this->data['getCertsExpiryIn30DaysHygiene'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('corporates.licenss-expiry-30-days')->with($this->data);
        }
    }

    public function certExpiry30Days(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else {
            $url = config('global.health');
            $data = [
                'function' => 'getCertsExpiryIn30Days',
            ];

            $this->data['getCertsExpiryIn30Days'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('corporates.expiry-30-days')->with($this->data);
        }
    }

    public function nonactiveCerts(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else {
            $url = config('global.health');
            $data = [
                'function' => 'getNonActiveCerts',
            ];

            $this->data['getNonActiveCerts'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('corporates.nonactive-certs')->with($this->data);
        }
    }


    function payme_to_curl($url, $data){

        //        $headers = array
        //        (
        //            'Content-Type: application/json',
        //            'Content-Length: ' . strlen( json_encode($data) )
        //        );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST" );
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false );
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1 );
                curl_setopt($ch, CURLOPT_ENCODING, "" );
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
                curl_setopt($ch, CURLOPT_TIMEOUT, 0 );
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // Skip SSL Verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // Skip SSL Verification

        //        curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers );

                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                $output = curl_exec($ch);
                $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                /*if($httpcode != 200)
                    {
                    $this->session->set_flashdata( "error", "An error has ocurred . Try again" );
                    redirect('land');
                    }
                */
                curl_close($ch);
                return $output;


            }


    function food_hygiene_alex_to_curl($url, $data)
    {

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST" );
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1 );
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                $output = curl_exec($ch);
                $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                curl_close($ch);
                return $output;

               }

            function food_hygiene_alex_array_to_curl($url, $data){

                        $headers = array
                       (
                            'Content-Type: application/json',
                            'Content-Length: ' . strlen( json_encode($data) )
                       );

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST" );
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1 );
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                //        curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers );

                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        $output = curl_exec($ch);
                        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        /*if($httpcode != 200)
                            {
                            $this->session->set_flashdata( "error", "An error has ocurred . Try again" );
                            redirect('land');
                            }
                        */
                        curl_close($ch);
                        return $output;

                    }

    function to_curl($url, $data){

        $headers = array
        (
            'Content-Type: application/json',
            'Content-Length: ' . strlen( json_encode($data) )
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST" );
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1 );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers );

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        /*if($httpcode != 200)
            {
            $this->session->set_flashdata( "error", "An error has ocurred . Try again" );
            redirect('land');
            }
        */
        curl_close($ch);
        return $output;

    }
}
