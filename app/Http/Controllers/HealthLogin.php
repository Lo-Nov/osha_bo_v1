<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HealthLogin extends Controller
{
    public function healthLogin(Request $request)
    {
        $this->url = config('global.url');
        $url = $this->url . 'Account/GetToken';
        $data = $request->validate([
            'user_name' => ['required', 'string', 'max:255'],
            'password' => 'required'
        ]);
        //dd($data);
        $data = json_decode(stripslashes($this->to_curl($url, $data)));
        //dd($data);
        $status = $data->status_code;
        $message = $data->message;
        $auth = $data->authentication_status;
        $role = $data->roles;


        if (empty($data)) {
            return Redirect::back()->withErrors(['There is a technical error encountered, Please try again ']);
        } else {
            if ($status == 200 && $role === "NCCGHEALTH" && $auth === true || $role === "NCCGHEALTHLAB" || $role === "NCCGHEALTHDOC" || $role === "NCCGHEALTHPRNT"  || $role==="HEALTH-BOOKINGS") {
                $product = collect([
                    'is_login' => 1,
                    'token' => $data->token,
                    'roles' => $data->roles,
                    'user_id' => $data->user_id,
                    'username' => $data->username,
                    'email' => $data->email,
                    'national_id' => $data->national_id,
                    'user_full_name' => $data->user_full_name,
                    'phone_number' => $data->msisdn,
                ]);

                Session::flush();
                Session::push('resource', $product);
                Session::put('token', $data->token);
                return redirect()->route('health-dashboard');
            } else if ($status === 200 && $role === "HEALTHRPT" && $auth === true ){
                $product = collect([
                    'is_login' => 1,
                    'token' => $data->token,
                    'roles' => $data->roles,
                    'user_id' => $data->user_id,
                    'username' => $data->username,
                    'email' => $data->email,
                    'national_id' => $data->national_id,
                    'user_full_name' => $data->user_full_name,
                    'phone_number' => $data->msisdn,
                ]);

                Session::flush();
                Session::push('resource', $product);
                Session::put('token', $data->token);
                return redirect()->route('health-reports');
            }else if($status == 200 && $role === "HEALTHSPRT" && $auth === true){
                $product = collect([
                    'is_login' => 1,
                    'token' => $data->token,
                    'roles' => $data->roles,
                    'user_id' => $data->user_id,
                    'username' => $data->username,
                    'email' => $data->email,
                    'national_id' => $data->national_id,
                    'user_full_name' => $data->user_full_name,
                    'phone_number' => $data->msisdn,
                ]);

                Session::flush();
                Session::push('resource', $product);
                Session::put('token', $data->token);
                return redirect()->route('support');
            }else if ($status === 200 && $role === "HEALTHBILLER" && $auth === true){
                $product = collect([
                    'is_login' => 1,
                    'token' => $data->token,
                    'roles' => $data->roles,
                    'user_id' => $data->user_id,
                    'username' => $data->username,
                    'email' => $data->email,
                    'national_id' => $data->national_id,
                    'user_full_name' => $data->user_full_name,
                    'phone_number' => $data->msisdn,
                ]);

                Session::flush();
                Session::push('resource', $product);
                Session::put('token', $data->token);
                return redirect()->route('health-biller');
            }else if ($status === 200 && $role === "HEALTHDIRAPPROVAL" && $auth === true){
                $product = collect([
                    'is_login' => 1,
                    'token' => $data->token,
                    'roles' => $data->roles,
                    'user_id' => $data->user_id,
                    'username' => $data->username,
                    'email' => $data->email,
                    'national_id' => $data->national_id,
                    'user_full_name' => $data->user_full_name,
                    'phone_number' => $data->msisdn,
                ]);

                Session::flush();
                Session::push('resource', $product);
                Session::put('token', $data->token);
                return redirect()->route('health-approvals');
            }else{
                return Redirect::back()->withErrors($message);

            }
        }
    }
    public function HealthForgotPassword()
    {
        return view('auth.forgot');
    }
    public function ForgotPassword(Request $request)
    {
        $this->url = config('global.url');
        $url = $this->url . 'Account/ForgotPassword';
        $data = $request->validate([
            'username' => ['required', 'string', 'max:255'],
        ]);
        $forgotPassword = json_decode($this->to_curl($url, $data));
            if ($forgotPassword->status_code !=200) {
                return redirect()->back()->withErrors($forgotPassword->message);
            }else{
                return redirect()->back()->withErrors($forgotPassword->message);
            }

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
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        return $output;
    }


    function get_curl( $url) {
        $request_headers = array();
        $request_headers[] = "application/json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($ch);

        if (curl_errno($ch))
        {
            print "Error: " . curl_error($ch);
        }
        else
        {
            return $output;

        }
    }
}
