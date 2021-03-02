<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SupportController extends Controller
{

    public function postIndividualName(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'billNo'=>'required',
        ]);

        $data = [
            'function'=>'getIndividualNameByBillNo',
            'billNo'=>$request->billNo,
        ];
        //dd($data);

        $this->data['getIndividualNameByBillNo']= json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data);
        return view('support.individual-details')->with($this->data);
    }


    public function getIndividualName(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            return view('support.individual');
        }
    }
    public function getBillDetails(Request $request)
    {
        $url = $this->url = config('global.health');
        $request->validate([
            'idNo'=>'required',
        ]);

        $data = [
            'function'=>'getBillByIdNo',
            'idNo'=>$request->idNo,
        ];
        //dd($data);

        $this->data['getBillByIdNo']= json_decode($this->food_hygiene_alex_to_curl($url, $data));

            if($this->data['getBillByIdNo']->status === 200 && $this->data['getBillByIdNo']->success===true){
                return view('support.bill-details')->with($this->data);
            }else{
                return Redirect::back()->withErrors($this->data['getBillByIdNo']->message);
            }
    }


    public function saveMobile(Request $request)
    {
        $url = $this->url = config('global.health');
        $request->validate([
            'corporateId'=>'required',
            'telephone1'=>'required',
            'telephone2'=>'required',
        ]);

        $data = [
            'function'=>'updateCorporateTelephone',
            'corporateId'=>$request->corporateId,
            'telephone1'=>$request->telephone1,
            'telephone2'=>$request->telephone2,
        ];
        //dd($data);

        $updateCorporateTelephone= json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=>$updateCorporateTelephone]);
    }


    public function supportMobile()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
        return view('support.mobile');
        }
    }

    public function getBillById()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
        return view('support.bills');
        }

    }
    public function Support()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
        return view('support.index');
        }

    }

    public function updateIndividualNumber(Request $request)
    {
        $url = $this->url = config('global.health');
        $request->validate([
            'idNo'=>'required',
            'phoneNumber'=>'required'
        ]);

        $data = [
            'function'=>'updateIndividualPhoneNumber',
            'idNo'=>$request->idNo,
            'phoneNumber'=>$request->phoneNumber,
        ];
        //dd($data);

        $updateIndividualPhoneNumber= json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=>$updateIndividualPhoneNumber]);

    }
    public function updateIndividualName(Request $request)
    {
        $url = $this->url = config('global.health');

        $request->validate([
            'idNo'=>'required',
            'firstName'=>'required',
            'otherNames'=>'required'
        ]);

        $data = [
            'function'=>'updateNames',
            'idNo'=>$request->idNo,
            'firstName'=>$request->firstName,
            'otherNames'=>$request->otherNames,
        ];
        //dd($data);

        $updateIndividualPhoneName= json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=>$updateIndividualPhoneName]);

    }


    public function updateIndividualCorporate(Request $request)
    {
        $url = $this->url = config('global.health');
        $request->validate([
            'corporateId'=>'required',
            'idNo'=>'required',
        ]);

        $data = [
            'function'=>'updateIndividualCorporate',
            'corporateId'=>$request->corporateId,
            'idNo'=>$request->idNo,
        ];
        //dd($data);

        $updateIndividualCorporate= json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=>$updateIndividualCorporate]);

    }
    public function mergeStatus(Request $request)
    {
        $url = $this->url = config('global.health');
        $request->validate([
            'businessID'=>'required',
        ]);

        $data = [
            'function'=>'statusNotApproved',
            'businessID'=>$request->businessID,
        ];
        //dd($data);

        $statusNotApproved= json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=>$statusNotApproved]);

    }
    public function pullReceipt(Request $request)
    {
        $url = $this->url = config('global.health');
        $request->validate([
            'billNo'=>'required',
        ]);

        $data = [
            'function'=>'getReceipt',
            'billNo'=>$request->billNo,
        ];
        //dd($data);

        $pullReceipt= json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=>$pullReceipt]);

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
