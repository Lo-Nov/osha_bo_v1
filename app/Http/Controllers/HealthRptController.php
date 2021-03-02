<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HealthRptController extends Controller
{


    public function getAllApproved(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else {
            $url = config('global.health');
            $data = [
                'function' => 'getTestHeadersApproved',
                'createdBy'=> '',
            ];
            //dd($data);
            $this->data['getTestHeadersApproved'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return  view('reports.approved')->with($this->data);
        }
    }

    public function getApproved(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else {
            $url = config('global.health');
            $data = [
                'function' => 'getTestHeadersApproved',
                'createdBy'=> Session::get('resource')[0]['username'],
            ];
            //dd($data);
            $this->data['getTestHeadersApproved'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return  view('reports.approved')->with($this->data);
        }
    }
    public function healthPostTransactions(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else {
            $url = config('global.health');
            $data = [
                'function' => 'getTransactions',
                'from'=>$request->from,
                'to'=>$request->to
            ];
            //dd($data);
            $this->data['getTransactions'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);

            return view('reports.transactions')->with($this->data);
        }

    }
    public function healthTransactions(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            $url = config('global.health');
            $data = [
                'function'=>'getTransactions',
                'from'=>'',
                'to'=>''
            ];
            $this->data['getTransactions'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);

            return  view('reports.transactions')->with($this->data);
        }
    }
    public function indexFilter(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            $url = config('global.health');
            $data = [
                'function'=>'getSummary',
            ];

            $this->data['getSummary'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //  dd($this->data);

            $url = config('global.health');
            $data = [
                'function'=>'getDashboard',
                'from'=>$request->from,
                'to'=>$request->to
            ];

            $this->data['getDashboard'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('reports.home')->with($this->data);
        }
    }
    public function index(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }
        $url = config('global.health');
        $data = [
            'function'=>'getDashboard',
            'from'=>'',
            'to'=>''
        ];

        $this->data['getDashboard'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data);
        return view('reports.home')->with($this->data);
    }

    function food_hygiene_alex_to_curl($url, $data){
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
}
