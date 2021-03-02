<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PDF;

class HealthBillerController extends Controller
{

    public function corporateBookings(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            $url = $this->url = config('global.health');
            $data = [
                'function'=>'getCorporateBookings',
            ];
            $this->data['getCorporateBookings'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('health.bookings.corporate-booking')->with($this->data);
        }
    }
    public function Inspected()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        } else {
            $url = $this->url = config('global.health');
            $data = [
                'function' => 'getInspections',
                'status' => 2,
                'from' => '2020-05-01',
                'to' => '2021-09-08'
            ];
            $this->data['getInspections'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('health.inspections.costs')->with($this->data);
        }
    }
    


    public function approvedInspections(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        } else {
            $url = $this->url = config('global.health');
            $data = [
                'function' => 'getInspections',
                'status' => 3,
                'from' => '2020-01-01',
                'to' => '2021-09-01'
            ];
            $this->data['getInspections'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('health.inspections.approved-inspection')->with($this->data);
        }
    }
    public function Approval(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        } else {
            $url = $this->url = config('global.health');
            $data = [
                'function' => 'getInspections',
                'status' => 7,
                'from' => '2020-01-01',
                'to' => '2021-09-01'
            ];
            $this->data['getInspections'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('health.inspections.approvals')->with($this->data);
        }
    }
    public function postInspections(Request $request){
        if (Session::get('resource')[0]['is_login'] !=1){
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            $url = $this->url = config('global.health');
            $data = [
                'function'=>'getInspections',
                'status'=>$request->status,
                'from'=>$request->from,
                'to'=>$request->to
            ];

            $this->data['getInspections'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('health.inspections.index')->with($this->data);
        }
    }

    public function inspectionResults()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            $url = $this->url = config('global.health');


            $data = [
                'function'=>'getInspections',
                'status'=>6,
                'from'=>'2020-05-01',
                'to'=>'2021-09-01'
            ];

            $this->data['getInspections'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('health.inspections.results')->with($this->data);
        }
    }
    public function getInspections(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            $url = $this->url = config('global.health');


            $data = [
                'function'=>'getInspections',
                'status'=>1,
                'from'=>'2020-05-01',
                'to'=>'2021-09-08'
            ];

            $this->data['getInspections'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('health.inspections.index')->with($this->data);
        }
    }
    public function healthApprovals(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            return view('health.bookings.main');
        }
    }
    public function overdueTest(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            $url = $this->url = config('global.health');


            $data = [
                'function'=>'getOverdueTestAlert',
            ];

            $this->data['getOverdueTestAlert'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            $data = [
                'function' => 'getInspectionStatus',
            ];
            $this->data['getInspectionStatus'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            $data = [
                'function' => 'getUsers',
                'role'=>'TESTER'
            ];
            $this->data['getUsers'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('health.bookings.overdue-tests')->with($this->data);
        }
    }


    public function users(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            $url = $this->url = config('global.health');


            $data = [
                'function'=>'getUsers',
            ];
            //$getUsers = Http::post($url, $data);

            //dd($getUsers);

            //$authenticated = json_decode($getUsers->body());


            $this->data['getUsers'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);

            return view('health.bookings.users')->with($this->data);
        }
    }
    public function postBookings(Request $request){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            $url = $this->url = config('global.health');


            $data = [
                'function'=>'getBookings',
                'businessID'=>'',
                'status'=>$request->status,
                'from'=>$request->from,
                'to'=>$request->to,
            ];
            //dd($data);

            $this->data['getBookings'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            $data = [
                'function' => 'getInspectionStatus',
            ];
            //dd($data);

            $this->data['getInspectionStatus'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            $data = [
                'function' => 'getUsers',
                'role'=>'TESTER'
            ];
            $this->data['getUsers'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));


            return view('health.bookings.index')->with($this->data);
        }
    }

    public function getHealthTests()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        } else {
            $url = $this->url = config('global.health');

            $data = [
                'function' => 'getTestPerStaff',
                'modifiedBy' => Session::get('resource')[0]['username']
            ];

            //dd($data);
            $this->data['getTestPerStaff'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('health.tests-done-by-tec')->with($this->data);
        }
    }

    public function getApprovedTests()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        } else {
            $url = $this->url = config('global.health');

            $data = [
                'function' => 'getDoctorApprovals',
                'approvedBy' => Session::get('resource')[0]['username']
            ];

            //dd($data);
            $this->data['getDoctorApprovals'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            return view('health.approvals-done-by-doc')->with($this->data);


        }
    }

    public function bookings()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        } else {
            $url = $this->url = config('global.health');

            $data = [
                'function' => 'getBookings',
                'businessID' => '',
                'status' => 1,
                'from' => '',
                'to' => '',
            ];
            //dd($data);

            $this->data['getBookings'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));

            $data = [
                'function' => 'getInspectionStatus',
            ];
            $this->data['getInspectionStatus'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);
            $data = [
                'function' => 'getUsers',
                'role'=>'TESTER'
            ];
            $this->data['getUsers'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));

            //dd($this->data);
            return view('health.bookings.index')->with($this->data);
        }
    }

        public function getInspection()
        {
            $url = $this->url = config('global.health');

            $data = [
                'function'=>'getInspectionStatus',
            ];
            //dd($data);

            $status= json_decode($this->food_hygiene_alex_to_curl($url, $data));
            return response()->json(['success'=>$status]);

        }


        public function healthRetest(Request $request)
        {
            $url = $this->url = config('global.health');
            $request->validate([
                'idNo'=>'required',
            ]);

            $data = [
                'function'=>'getIndividualTestHeader',
                'idNo'=>$request->idNo,
            ];
            //dd($data);

            $this->data['getIndividualTestHeader'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
            //dd($this->data);

            if ($this->data['getIndividualTestHeader']->success === true) {
                return view('health.retest.tests')->with($this->data);
            }else{

                return redirect()->back()->withErrors($this->data['getIndividualTestHeader']->message);
            }
        }
    public function reTest(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            return view('health.retest.index');
        }
    }
    public function multiFoodHandlerBill($idNo)
    {
        $url = config('global.food_hygiene');

        //dd($businessID);

        $data = [
            'function'=>'fetchBillDetails',
            'billNo' => $idNo
        ];


        $bill_info = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($bill_info);


        //To do

        if(empty($bill_info))
        {
            return redirect()->back()->withErrors("We're having trouble retrieving your bill. Please try again later");
        }
        if($bill_info->success !=true)
        {
            return response()->json($bill_info->message);
        }

        $bill = $bill_info->data;


        $data = [
            'bill' => $bill,
        ];

        //$pdf = PDF::loadView('bills.food-hygiene', $data);
        //return $pdf->stream('bill.pdf',array('Attachment'=>0));
        return view('biller.corporate.multi-bill-sheet', ['bill' => $bill]);
    }
    public function suspendCorporateIndvi(Request $request)
    {
        $url = $this->url = config('global.food_hygiene');

        $data = [
            'function'=>'removeIndividualsFromCorporate',
            'corporateId'=>Session::get('corporateId'),
            'idNo'=>$request->idNo,
        ];
        //dd($data);

        $suspend = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($suspend);
        return response()->json(['success'=>$suspend]);
    }
    public function getCorporateCert(Request $request)
    {
        $url = $this->url = config('global.food_hygiene');
        $request->validate([
            'idNo'=>'required',
        ]);

        $data = [
            'function'=>'getFoodHandlerCert',
            'idNo'=>$request->idNo,
        ];
        //dd($data);

        $this->data['getFoodHygieneLicence'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data['getFoodHygieneLicence']);
        if ($this->data['getFoodHygieneLicence']->success === true) {
            return view('biller.corporate.corporate-cert')->with($this->data);

        }else{
            return redirect()->back()->withErrors($this->data['getFoodHygieneLicence']->message);
        }
    }

    public function getSelectedBill(Request $request)
    {
        $url = $this->url = config('global.food_hygiene');
        $request->validate([
            'corporateId'=>'required',
            'ids'=>'required'
        ]);

        $data= [
            'function'=>'getSelectedCorporateFoodHandlerBill',
            'corporateId'=>$request->corporateId,
            'ids'=> implode(" , ", $request->ids),
        ];
        //dd($data);

        $this->data['getFoodHygieneBill'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data);

        if ($this->data['getFoodHygieneBill']->success === true) {
            return view('biller.corporate.multibill')->with($this->data);
        }else{
            return redirect()->back()->withErrors([$this->data['getFoodHygieneBill']->message]);
        }

    }

    public function getCorporateBill(Request $request)
    {
        $url = config('global.food_hygiene');
        //dd($url);
        $data = [
            'function'=> 'getCorporateFoodHandlerBill',
            'corporateId' => $request->corporateId
        ];
        //dd($data);
        Session::put('corporateId',$request->corporateId);

        $this->data['getFoodHygieneBill'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));

        if ($this->data['getFoodHygieneBill']->success === true) {
            return view('biller.corporate.corporate-bill')->with($this->data);
        }else{
            return redirect()->back()->withErrors([$this->data['getFoodHygieneBill']->message]);
        }

    }

    public function uploadCorpIndiv()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }
        return view('biller.corporate.upload');
    }

    public function addIndivCorporate()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            return view('biller.corporate.add-individual');
        }

    }

    public function getCorporateIndividuals(Request $request){
        $url = $this->url = config('global.food_hygiene');
        $data = [
            'function'=>'getCorporateIndividuals',
            'corporateId'=>$request->corporateId,
        ];

        //dd($data);
        Session::put('corporateId',$request->corporateId);
        $this->data['getCorporateIndividuals'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data);


        if ($this->data['getCorporateIndividuals']->success === true) {
            return view('biller.corporate.home')->with($this->data);
        }else{
            return view('biller.corporate.home')->with($this->data);

            // return redirect()->route('get-corporate')->withErrors($this->data['getCorporateIndividuals']->message);
        }
        //return response()->json(['success'=>$getCorporateIndividuals]);
    }



    public function GetCorporate()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }
        return view('biller.corporate.index');
    }


    public function renewFoodHygiene(Request $request)
    {
        $url = $this->url = config('global.food_hygiene');
        $request->validate([
            'businessID'=>'required',
        ]);

        $data=[
            'function'=>'renewFoodHygieneLicence',
            'businessID'=>$request->businessID
        ];

        //dd($data);
        $this->data['getFoodHygieneBill'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data['getFoodHygieneBill']);


        if ($this->data['getFoodHygieneBill']->success === true) {
            return view('biller.food hygiene.hygiene-bill')->with($this->data);
        }else{
            return redirect()->back()->withErrors($this->data['getFoodHygieneBill']->message);
        }


    }
    public function renewForm()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }

        return view('biller.renewals.food-hygiene');

    }
    public function printFoodHygieneCert(Request $request)
    {
        $url = $this->url = config('global.food_hygiene');
        $request->validate([
            'businessID'=>'required'
        ]);

        $data=[
            'function'=>'getFoodHygieneLicence',
            'businessID'=>$request->businessID,
        ];

        //dd($data);

        $this->data['getFoodHygieneLicence'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data);

        if ($this->data['getFoodHygieneLicence']->success === true) {
            return view('biller.food hygiene.license')->with($this->data);

        }else{
            return redirect()->back()->withErrors($this->data['getFoodHygieneLicence']->message);
        }



    }
    public function hygienePrints($pay_id)
    {
        return view('biller.food hygiene.hygiene-printable', compact('pay_id'));
    }


    public function printFoodHygieneBill($businessID)
    {
        $url = config('global.food_hygiene');

        //dd($businessID);

        $data = [
            'function'=>'getFoodHygieneBill',
            'businessID' => $businessID
        ];


        $bill_info = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($bill_info);

        if(empty($bill_info))
        {
            return redirect()->back()->withErrors("We're having trouble retrieving your bill. Please try again later");
        }
        if($bill_info->success !=true)
        {
            return response()->json($bill_info->message);
        }

        $bill = $bill_info->data;


        $data = [
            'bill' => $bill,
        ];

        //$pdf = PDF::loadView('bills.food-hygiene', $data);
        //return $pdf->stream('bill.pdf',array('Attachment'=>0));
        return view('biller.food hygiene.hygiene-bill-sheet', ['bill' => $bill]);
    }
    public function getFoodHygieneBill($businessID)
    {
        $url = config('global.food_hygiene');
        //dd($url);
        $data = [
            'function'=> 'getFoodHygieneBill',
            'businessID' => $businessID
        ];
        //dd($data);
        Session::put('businessID', $businessID);
        $this->data['getFoodHygieneBill'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));

        //dd($this->data);

        if ($this->data['getFoodHygieneBill']->success === true) {
            return view('biller.food hygiene.hygiene-bill')->with($this->data);
        }else{
            return redirect()->route('hygiene')->withErrors([$this->data['getFoodHygieneBill']->message]);
        }
    }
    public function registerFoodHygiene(Request $request)
    {
        $url = $this->url = config('global.food_hygiene');
        $request->validate([
            'businessName'=>'required',
            'businessID'=>'required',
            'telephone1'=>'required',
            'telephone2'=>'required',
            'address'=>'required',
            'postalCode'=>'required',
            'town'=>'required',
            'county'=>'required',
            'subCountyId'=>'required',
            'wardId'=>'required',
        ]);

        $data = [
            'function'=>'registerCorporates',
            'businessName'=>$request->businessName,
            'businessID'=>$request->businessID,
            'telephone1'=>$request->telephone1,
            'telephone2'=>$request->telephone2,
            'address'=>$request->address,
            'postalCode'=>$request->postalCode,
            'town'=>$request->town,
            'county'=>$request->county,
            'subCountyId'=>$request->subCountyId,
            'wardId'=>$request->wardId,
        ];
        //dd($data);

        $registerCorporates = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($registerCorporates);
        return response()->json(['success'=>$registerCorporates]);
        //dd($registerCorporates);
    }

    public function PullBusinessDetails(Request $request)
    {
        $url = $this->url = config('global.food_hygiene');
        $request->validate([
            'businessID'=>'required',
        ]);

        $data = [
            'function'=>'getSBPDetails',
            'businessID'=>$request->businessID,
        ];
        // dd($data);
        $this->data['getSBPDetails'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data);

        $this->url = config('global.sub_counties');
        $url = $this->url . '/sbp/subcountys';

        $this->data['subcounties'] = json_decode($this->get_curl($url));
        //dd($this->data['getSBPDetails']->success);
        if ($this->data['getSBPDetails']->success === false) {
            // dd('true');
            return Redirect::back()->withErrors([$this->data['getSBPDetails']->message]);
        }else{
            return view('biller.food hygiene.apply-food-hygiene')->with($this->data);
        }
    }
    public function hygieneBusiness()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }
        return view('biller.food hygiene.index');

    }
    public function renewFoodHandler(Request $request)
    {
        $url = $this->url = config('global.food_hygiene');
        $request->validate([
            'idNo'=>'required',
        ]);
        $data=[
            'function'=>'renewFoodHandler',
            'idNo'=>$request->idNo
        ];
        //dd($url);
        $this->data['getFoodHygieneBill'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data['getFoodHygieneBill']);
        if ($this->data['getFoodHygieneBill']->success === true) {
            return view('biller.food-handler-bill')->with($this->data);
        }else{
            return redirect()->back()->withErrors($this->data['getFoodHygieneBill']->message);
        }


    }

    public function renewHandler()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }

        return view('biller.renewals.index');

    }

    public function FoodHygieneBusinessDetails()
    {
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            return view('biller.business-details');
        }

    }
    public function handlerPrints($pay_id)
    {
        $this->url = config('global.healthapi');
        $url = $this->url . 'clinics';
        $data = [];

        $clinics = json_decode($this->clinics_curl($url, $data));


        return view('biller.clinics', compact('pay_id','clinics'));
    }
    public function getFoodHygieneReceipt($pay_id)
    {
        //$url = $this->url. 'getreceipt';
        $url = config('global.food_hygiene_pay_online');

        $data = [
            'function'=>'checkPaymentVerification',
            'account_reference' => $pay_id,
        ];


        $checkPaymentVerification = json_decode($this->payme_to_curl($url, $data));
        //dd($checkPaymentVerification);
        return response()->json(['success'=>$checkPaymentVerification]);
    }
    public function payFoodHygiene(Request $request)
    {
        // dd($request->all());
        $url = config('global.food_hygiene_pay_online');

        //$url = "https://payme.revenuesure.co.ke/index.php";
        //dd($url);

        $data = [
            'function'=>'CustomerPayBillOnlinePush',
            'PayBillNumber'=>367776,
            'Amount'=> $request->Amount,
            'PhoneNumber' => $request->phoneNumber,
            'AccountReference' => $request->paymentCode,
            'TransactionDesc' => $request->accNo,
        ];

        //dd($data);
        $payment_info = json_decode($this->payme_to_curl($url, $data));
        //dd($payment_info);
        return response()->json(['success'=>$payment_info]);

    }

    public function printFoodHandlerBill($idNo)
    {
        $url = config('global.food_hygiene');

        //dd($businessID);

        $data = [
            'function'=>'getFoodHandlerBill',
            'idNo' => $idNo
        ];


        $bill_info = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($bill_info);

        if(empty($bill_info))
        {
            return redirect()->back()->withErrors("We're having trouble retrieving your bill. Please try again later");
        }
        if($bill_info->success !=true)
        {
            return response()->json($bill_info->message);
        }

        $bill = $bill_info->data;

        $data = [
            'bill' => $bill,
        ];

        //$pdf = PDF::loadView('bills.food-hygiene', $data);
        //return $pdf->stream('bill.pdf',array('Attachment'=>0));
        return view('biller.food-handler-sheet', ['bill' => $bill]);
    }

    public function getFoodHandlerBill($idNo)
    {
        $url = config('global.food_hygiene');
        //dd($url);
        $data = [
            'function'=> 'getFoodHandlerBill',
            'idNo' => $idNo
        ];
        //dd($data);

        Session::put('idNo', $idNo);

        $this->data['getFoodHygieneBill'] = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($this->data);
        if ($this->data['getFoodHygieneBill']->success === true) {
            return view('biller.food-handler-bill')->with($this->data);
        }else{
            return redirect()->back()->withErrors([$this->data['getFoodHygieneBill']->message]);
        }

    }
    public function registerFoodHandler(Request $request)
    {
        $url = $this->url = config('global.food_hygiene');
        $request->validate([
            'firstName'=>'required',
            'otherNames'=>'required',
            'idNo'=>'required',
            'gender'=>'required',
            'selfEmployed'=>'required',
            'mobile'=>'required',
            'address'=>'required',
            'idType'=>'required',
            'postalCode'=>'required',
            'town'=>'required',
            'county'=>'required',
            'subcounty'=>'required',
            'ward'=>'required',
            'corporateId'=>'required',
            'workGroupId'=>'required',
        ]);

        $data = [
            'function'=>'registerIndividual',
            'firstName'=>$request->firstName,
            'otherNames'=>$request->otherNames,
            'idNo'=>$request->idNo,
            'gender'=>$request->gender,
            'selfEmployed'=>$request->selfEmployed,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'idType'=>$request->idType,
            'postalCode'=>$request->postalCode,
            'town'=>$request->town,
            'county'=>$request->county,
            'subCounty'=>$request->subcounty,
            'ward'=>$request->ward,
            'corporateId'=>$request->corporateId,
            'workGroupId'=>$request->workGroupId,
        ];
        //dd($data);

        $registerIndividual = json_decode($this->food_hygiene_alex_to_curl($url, $data));
        //dd($registerIndividual);
        return response()->json(['success'=>$registerIndividual]);
        //dd($registerCorporates);
    }

    public function getWards(Request $request)
    {
        $this->url = config('global.sub_counties');
        $url = $this->url . '/sbp/wards';
        $data =
            [
                'code' => $request->subcountyID,
            ];


        $ward_info  = json_decode($this->postal_curl($url, $data));
        //dd($ward_info);
        if(is_null($ward_info))
        {
            return redirect()->back()->withErrors('Something went wrong. Please try again.');
        }

        if($ward_info->status_code != 200)
        {
            return redirect()->back()->withErrors($ward_info->message);
        }

        return response()->json($ward_info->response_data);
    }


    public function healthClient(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{

            $this->url = config('global.sub_counties');
            $url = $this->url . '/sbp/subcountys';

            $this->data['subcounties'] = json_decode($this->get_curl($url));
            //dd($this->data);
            if ($this->data['subcounties']->status_code != 200) {
                return Redirect::back()->withErrors([$this->data['subcounties']->message]);
            }else{
                return view('biller.register-client')->with($this->data);
            }
        }
    }
    public function index(){
        if (Session::get('resource')[0]['is_login'] != 1) {
            Session::put('url', url()->current());
            return redirect()->route('login');
        }else{
            return view('biller.index');
        }
    }

    public function clinics_curl($url, $data){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_SSL_VERIFYHOST => FALSE,
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            // CURLOPT_POSTFIELDS => array('phone_number' => $data['phone_number'], 'BillNo' => $data['BillNo']),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
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

    public function get_curl( $url) {
        // append the header putting the secret key and hash
        $headers = array(
            'Content-Type: application/json',
            //
            // 'Authorization: Bearer ',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($ch);

        if (curl_errno($ch))
        {
            print "Error: " . curl_error($ch);
        }
        else
        {
            // Show me the result
            return $output;
        }

        curl_close($ch);
    }
    public function postal_curl($url, $data){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYHOST => FALSE,
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('code' => $data['code']),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        // dd($response);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
    function payme_to_curl($url, $data)
    {

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
}
