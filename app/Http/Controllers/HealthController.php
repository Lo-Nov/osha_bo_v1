<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HealthController extends Controller
{

    public function hitMap(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            return view('hitmap.index');
        }
    }

    public function pullHitMap(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'keyword'=>'required',
        ]);

        $data = [
            'function'=>'hitMap',
            'keyword'=>$request->keyword,
        ];
        //dd($data);

        $this->data['hitMap']= json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data);
        return view('hitmap.progress')->with($this->data);

    }
    public function Config(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            $url = $this->url = config('global.health');
            $data = [
                'function'=>'getTestPlan',
            ];
            $this->data['getTestPlan'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('settings.config')->with($this->data);
        }
    }
    public function saveKits(Request $request)
    {
        $url = $this->url = config('global.health');
        $request->validate([
            'labId'=>'required',
            'testKit'=>'required',
            'movementType'=>'required',
            'SKU'=>'required',
            'quantity'=>'required',
            'createdBy'=>'required'
        ]);

        $data = [
            'function'=>'addTestKitMovements',
            'labId'=>$request->labId,
            'testKit'=>$request->testKit,
            'movementType'=>$request->movementType,
            'SKU'=>$request->SKU,
            'quantity'=>$request->quantity,
            'createdBy'=>$request->createdBy
        ];
        //dd($data);

        $saveKits= json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=>$saveKits]);

    }
    public function testKits(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            $url = config('global.health');
            $data = [
                'function'=>'getSku',
            ];

            $this->data['getSku'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            $data = [
                'function'=>'getLabs',
            ];

            $this->data['getLabs'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));

            $data = [
                'function'=>'getTestKits',
            ];

            $this->data['getTestKits'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            $data = [
                'function'=>'getTestKitMovementsType',
            ];

            $this->data['getTestKitMovementsType'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('health.sku.test-kits')->with($this->data);
        }
    }
    public function ChangePassword(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{

            $request->validate([
                'old_password'=>'required',
                'new_password'=>'required'
            ]);

            $this->url = config('global.url');
            $url=$this->url. 'Account/ChangePassword';

            $data=[
                'user_id'=>$request->user_id,
                'old_password'=>$request->old_password,
                'new_password'=>$request->new_password
            ];
            $status = json_decode($this->to_curl($url,$data));

            if ($status->status_code !=200){
                return Redirect::back()->withErrors($status->message);
            }else{
                return Redirect::back()->withErrors('Your password change was'.' '. $status->message. ' '.'Remember to use it in your next login');
            }

        }
    }
    public function profile(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            return view('profile.index');
        }

    }
    public function getTestsById(){
    $url = config('global.health');
    $data = [
        'function'=>'getTestHeaders',
    ];

    $this->data['getTestHeaders'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
    //dd($this->data);
    return view('health.get-test-v2')->with($this->data);
}


public function getHeaders()
{
   $url = config('global.health');
   $data = [
       'function'=>'getTestHeadersApprovePrint',
   ];

   $this->data['getTestHeaders'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
    //dd($this->data);
   return view('health.headers')->with($this->data);
}



    public function getPatientTest()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }

            return view('health.get-test');
    }

    public function getTests(Request $request)
    {
        $url = $this->url = config('global.health');
        $request->validate([
            'billNo'=>'required',
        ]);

        $data = [
            'function'=>'getPatientTestByBillNumber',
            'billNo'=>$request->billNo,
        ];
        //dd($data);

        Session::put('billNo', $request->billNo);

        $this->data['getPatientTestByBillNumber'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data);

        Session::put('idNo',$this->data['getPatientTestByBillNumber']->data[0]->idNo);

        //dd($this->data['getPatientTestByBillNumber']);

        if ($this->data['getPatientTestByBillNumber']->success === true) {
            return view('health.test-results')->with($this->data);
           }else{

                return redirect()->back()->withErrors($this->data['getPatientTestByBillNumber']->message);
           }
    }

    public function updateTests($id, $testName, $testTypeId)
    {
        $url = $this->url = config('global.health');

        $id = $id;
        $testName = $testName;
        $testTypeId = $testTypeId;

        $data = [
            'function'=>'getLabs',
        ];
        //dd($data);

        $labs= json_decode($this->food_hygiene_alex_to_curl($url, $data));

        //dd($labs);
        if ($labs->success === true) {
            return view('health.update-results', compact('labs', 'id', 'testName','testTypeId'));
           }else{
                return redirect()->back()->withErrors($this->data['getLabs']->message);
           }
    }

    public function docUpdateTest(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }

        $url = config('global.health');
        $data = [
            'function'=>'getTestHeadersDoctor',
        ];

        $this->data['getTestHeaders'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data);

        return view('health.get-bill-details-v2')->with($this->data);
    }
    public function getBillTest(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }

        return view('health.get-bill-details');
    }


    public function saveFacLab(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'labId'=>'required',
            'labReferenceId'=>'required'
        ]);


        $data = [
            'function'=>'updateLabFac',
            'labId'=>$request->labId,
            'labReferenceId'=>$request->labReferenceId,
            'billNo'=>explode(',',Session::get('billNo'))[0],
            'idNo'=>Session::get('idNo')
        ];
        //dd($data);

        $updateLabFac= json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=>$updateLabFac]);





    }
    public function approveTest(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'id'=>'required',
            'approvedBy'=>'required',

        ]);


        $data = [
            'function'=>'approveTest',
            'id'=>$request->id,
            'approvedBy'=>$request->approvedBy,
            'condition'=>$request->condition,

        ];
        //dd($data);

        $approve= json_decode($this->food_hygiene_alex_to_curl($url, $data));

        return response()->json(['success'=>$approve]);
    }
    public function signature(){
        return view('health.signature');
    }

    public function uploadSignature(Request $request)
    {
        $url = $this->url = config('global.health');
        $request->validate([
            'username'=>'required',
            'fileToUpload'=>'mimes:jpeg,png|max:1014'
        ]);
        $extension = $request->fileToUpload->extension();
        $data = [

            'function'=>'uploadSignature',
            'username'=>$request->username,
            'fileToUpload'=>$extension
        ];
        //dd($data);

        $this->data['getTestInfo'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));

    }

    public function postBillTests(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'billId'=>'required',
        ]);

        $data = [
            'function'=>'getTestInfo',
            'billId'=>$request->billId,
        ];
        //dd($data);

        $this->data['getTestInfo'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));

        //dd($this->data);

        if ($this->data['getTestInfo']->success === true) {
            return view('health.bill-details')->with($this->data);
        }else{
            return redirect()->back()->withErrors($this->data['getTestInfo']->message);
        }



        //return response()->json(['success'=> $getTestInfo]);
    }


    public function deleteUser(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'id'=>'required',
        ]);

        $data = [
            'function'=>'deleteUser',
            'id'=>$request->id,
        ];
        //dd($data);

        $deleteUser = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=> $deleteUser]);

    }

    public function saveUser(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phoneNumber'=>'required',
            "role"=>'required'
        ]);

        $data = [
            'function'=>'addUser',
            'name'=>$request->name,
            'email'=>$request->email,
            'phoneNumber'=>$request->phoneNumber,
            'role'=>$request->role
        ];
        //dd($data);
        $addUser = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=> $addUser]);
    }


    public function updateApprovals(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'inspectionCode'=>'required',
            'status'=>'required',
            'approvedBy'=>'required',
            'comments'=>'required'
        ]);
        $data = [
            'function'=>'inspectionUpdateStatus',
            'status'=>$request->status,
            'inspectionCode'=>$request->inspectionCode,
            'comments'=>$request->comments,
            'approvedBy'=>$request->approvedBy,
        ];

        //dd($data);
        $inspectionApproveDecline = json_decode($this->food_hygiene_alex_to_curl($url, $data));

        //dd($inspectionApproveDecline);
        return response()->json(['success'=>$inspectionApproveDecline]);

    }

    public function updateCosting(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'inspectionCode'=>'required',
            'costing'=>'required',
            'approvedBy'=>'required',
        ]);

        $data = [
            'function'=>'inspectionCosting',
            'costing'=>$request->costing,
            'inspectionCode'=>$request->inspectionCode,
            'approvedBy'=>$request->approvedBy,
        ];
        //dd($data);
        $inspectionCosting = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=>$inspectionCosting]);

    }
    public function updateInspector(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'inspectionCode'=>'required',
            'inspector'=>'required',
            'inspectionDate'=>'required',
        ]);

        $data = [
            'function'=>'updateInspector',
            'inspector'=>$request->inspector,
            'inspectionCode'=>$request->inspectionCode,
            'inspectionDate'=>$request->inspectionDate,
        ];
        //dd($data);
        $updateInspector = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=>$updateInspector]);

    }
    public function updateInspection(Request $request){
    $url = $this->url = config('global.health');
    $request->validate([
        'description'=>'required',
        'teamLead'=>'required',
        'inspectionCode'=>'required',
    ]);

    $data = [
        'function'=>'uploadInspectionReport',
        'teamLead'=>$request->teamLead,
        'inspectionCode'=>$request->inspectionCode,
        'description'=>$request->description,
    ];
    //dd($data);

    $uploadInspectionReport = json_decode($this->food_hygiene_alex_to_curl($url, $data));
    return response()->json(['success'=>$uploadInspectionReport]);

}

    public function saveBookingConfirmation(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'id'=>'required',
            'testingDate'=>'required',
            'testerComments'=>'required',
            "confirmedBy"=>'required',
            'status'=>'required',
            'testerId'=>'required'
        ]);

        $data = [
            'function'=>'bookingConfirmation',
            'id'=>$request->id,
            'testingDate'=>$request->testingDate,
            'testerComments'=>$request->testerComments,
            'confirmedBy'=>$request->confirmedBy,
            'status'=>$request->status,
            'testerId'=>$request->testerId
        ];
        //dd($data);

        $bookingConfirmation = json_decode($this->food_hygiene_alex_to_curl($url, $data));

        //dd($bookingConfirmation);
        return response()->json(['success'=> $bookingConfirmation]);

    }
    public function saveUpdatesRetest(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'id'=>'required',
            'labResult'=>'required',
            'testTypeId'=>'required',
        ]);


        $data = [
            'function'=>'updatePatientRetestTest',
            'id'=>$request->id,
            'labResult'=>$request->labResult,
            'testTypeId'=>$request->testTypeId,
            'modifiedBy' => Session::get('resource')[0]['username']
        ];
        // dd($data);

        $updatePatientTest = json_decode($this->food_hygiene_alex_to_curl($url, $data));
//        dd($updatePatientTest);
        return response()->json(['success'=> $updatePatientTest]);

    }

    public function saveUpdates(Request $request){
        $url = $this->url = config('global.health');
        $request->validate([
            'id'=>'required',
            'labResult'=>'required',
            'testTypeId'=>'required',
            'testName'=>'required'
        ]);

        $data = [
            'function'=>'updatePatientTest',
            'id'=>$request->id,
            'labResult'=>$request->labResult,
            'testName'=>$request->testName,
            'testTypeId'=>$request->testTypeId,
            'modifiedBy' => Session::get('resource')[0]['username']
        ];

        $updatePatientTest = json_decode($this->food_hygiene_alex_to_curl($url, $data));
//        dd($updatePatientTest);
        return response()->json(['success'=> $updatePatientTest]);

    }

    public function getLabs()
    {
        $url = $this->url = config('global.health');

        $data = [
            'function'=>'getLabs',
        ];
        //dd($data);

        $labs= json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=>$labs]);


    }

    public function approvePrint(Request $request){
        $url = $this->url = config('global.health');

        $data = [
            'function'=>'approvePrint',
            'billId'=>$request->billId,
            'idNo'=>$request->idNo,
            'createdBy'=>$request->createdBy,
        ];

        //dd($data);

        $results = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($results);
        return response()->json(['success'=>$results]);

    }
    public function approveTests(Request $request){
        $url = $this->url = config('global.health');

        $data = [
            'function'=>'approveTest',
            'id'=>$request->id,
            'approvedBy'=>$request->approvedBy,
            "condition"=>$request->condition,
            "reason"=>$request->reason
        ];

        //dd($data);

        $results= json_decode($this->food_hygiene_alex_to_curl($url, $data));
        return response()->json(['success'=>$results]);

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
