<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use App\Models\OrderBus;
use App\Models\Payment;
use App\Models\OrderTruck;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;



class ApiMainServiceController extends Controller
{
    public function buses() 
    {
        return response()->json([
            'bus1' => [
                'name' => 'Hundaý New Super Aero Citi',
                'seats' => 27,
                'price' => 130,
                'byujet_price' => 80,
            ],
            'bus2' => [
                'name' => 'Iran-Hodro 0-457',
                'seats' => 34,
                'price' => 110,
                'byujet_price' => 70,
            ],
            'bus3' => [
                'name' => 'PAZ-32054',
                'seats' => 23,
                'price' => 85,
                'byujet_price' => 50,
            ],
        ]);
    }

    public function trucks() 
    {
        return response()->json([
            'truck1' => [
                'name' => 'KAMAZ-6520',
                'capacity' => 20,
                'price' => 130,
            ],
            'truck2' => [
                'name' => 'KAMAZ-65115',
                'capacity' => 15,
                'price' => 105,
            ],
            'truck3' => [
                'name' => 'KAMAZ-65117',
                'capacity' => 14,
                'price' => 115,
            ],
            'truck3' => [
                'name' => 'Mersedes Bens',
                'capacity' => 27,
                'price' => 160,
            ],
        ]);
    }

    public function order_bus(Request $request){
        $order_bus = new OrderBus;
        $order_bus->roly = $request->fizik_yuridik;
        $order_bus->name = $request->name;
        if($request->edaraady != null){
            $order_bus->edaraady = $request->edaraady;
        }
        else{
            $order_bus->edaraady = 'null';
        };
        $order_bus->email = $request->email;
        $order_bus->orderphone = $request->phone;
        $order_bus->from = $request->from;
        $order_bus->to = $request->to;
        $order_bus->datetime = $request->datetime;
        $order_bus->duration =$request->duration;
        $order_bus->personnumber = $request->personNumber;
        $order_bus->note = $request->note;
        if($order_bus->save()){
            $payService = new Payment();
            $payService->amount = $request->price;
            $payService->amount = (int)$payService->amount * 100;    
            
            $url_params = [];
            
            $randomString = Str::random(6);
            $full = substr($randomString, 0, 6);
            $order_num = $full.date("dmYHis");
            
            $url_params['orderNumber'] = $order_num;
            $payService->submitted_order_number = $url_params['orderNumber'];
            $amount = $payService->amount;
            //$amount = 1;
            $url_params['currency'] = 934;
            $url_params['language'] = 'ru';
            $username = '202161001030';
            $password = 'Jnd84Vs20GsncKm';
            $returnUrl = $request->successUrl;
            //$returnUrl = 'https://ahalawtoulag.com.tm/checkpayment?orderId='.$payService->submitted_order_number;
            $url_params['description'] = $payService->description;
            $url_params['merchantOrderNumber'] = 2;
            $url_params['sessionTimeoutSecs'] = 300;
            $client = new Client();
            $response = $client->post('https://mpi.gov.tm/payment/rest/register.do', [
                'form_params' => [
                    'password' => $password,
                    'userName' => $username,
                    'pageView' => 'DESKTOP',
                    'sessionTimeoutSecs' => 600,
                            'description' => 'sargyt',
                            'orderNumber' => $payService->submitted_order_number,
                            'amount'   => $amount,
                            'currency'     => '934',
                            'language'       => 'ru',
                            'returnUrl'       => url($returnUrl),
                            'failUrl'       => url($returnUrl),
                        ],
                    ]);
                    $arr = json_decode($response->getBody(), true);
                    // if ($arr['errorCode'] == 0) {
                        $payService['description'] =  "Order Bus";
                        $payService['response_order_id'] =  $arr['orderId'];        
                        $payService['response_form_url'] =  $arr['formUrl'];        
                        $payService['response_error_code'] =  $arr['errorCode'];
                        $payService['merchant_id'] =  2;
                        $payService['merchant_order_number'] =  $order_bus->id;
                        $payService['payment_type_id'] =  1; //Order Bus;
                        $payService->save();
                        if ($arr['errorCode'] == 0) {
                            $arr['success'] = true;
                            $arr['message'] = 'OK';
                        } else {
                            $arr['success'] = false;
                        }
                        return $arr;
        }
        
    }


    public function order_truck(Request $request)
    {
        $order_truck = new OrderTruck;
        
        $order_truck->roly = $request->fizik_yuridik;
        $order_truck->name = $request->name;
        if($request->edaraady != null){
            $order_truck->edaraady = $request->edaraady;
        }
        else{
            $order_truck->edaraady = 'null';
        };
        $order_truck->email = $request->email;
        $order_truck->orderphone = $request->phone;
        $order_truck->from = $request->from;
        $order_truck->to = $request->to;
        $order_truck->datetime = $request->datetime;
        $order_truck->yuk_gornush = $request->yuk_gornush;
        $order_truck->yuk_agram = $request->yuk_agram;
        $order_truck->note = $request->note;
        if($order_truck->save()){
        $payService = new Payment();
        $payService->amount = $request->price;
        $payService->amount = (int)$payService->amount * 100;

        $url_params = [];
            
        $randomString = Str::random(6);
        $full = substr($randomString, 0, 6);
        $order_num = $full.date("dmYHis");       
        $url_params['orderNumber'] = $order_num;
        $payService->submitted_order_number = $url_params['orderNumber'];
        $amount = $payService->amount;
        $url_params['currency'] = 934;
        $url_params['language'] = 'ru';
        $username = '202161001030';
        $password = 'Jnd84Vs20GsncKm';
        $returnUrl = $request->successUrl;
        //$returnUrl = 'https://ahalawtoulag.com.tm/checkpayment?orderId='.$payService->submitted_order_number;
        $url_params['description'] = $payService->description;
        $url_params['merchantOrderNumber'] = 2;
        $url_params['sessionTimeoutSecs'] = 300;
        $client = new Client();
        $response = $client->post('https://mpi.gov.tm/payment/rest/register.do', [
            'form_params' => [
                'password' => $password,
                'userName' => $username,
                'pageView' => 'DESKTOP',
                'sessionTimeoutSecs' => 600,
                        'description' => 'sargyt',
                        'orderNumber' => $payService->submitted_order_number,
                        'amount'   => $amount,
                        'currency'     => '934',
                        'language'       => 'ru',
                        'returnUrl'       => url($returnUrl),
                        'failUrl'       => url($returnUrl),
                    ],
                ]);
                $arr = json_decode($response->getBody(), true);
                // if ($arr['errorCode'] == 0) {
                    $payService['description'] =  "Order Truck";
                    $payService['response_order_id'] =  $arr['orderId'];        
                    $payService['response_form_url'] =  $arr['formUrl'];        
                    $payService['response_error_code'] =  $arr['errorCode'];
                    $payService['merchant_id'] =  2;
                    $payService['merchant_order_number'] =  $order_truck->id;
                    $payService['payment_type_id'] = 2; //Order Truck;
                    $payService->save();
                    return $arr; 
        }
    }

    public function checkpayment(Request $request)
    {
        $message = "";
        if(isset($_GET['orderId'])) {
            $payment = Payment::where('response_order_id',$_GET['orderId'])->first();
            if ($payment) {
                $username = '202161001030';
                $password = 'Jnd84Vs20GsncKm';
                $client  = new Client();
                $response = $client->post('https://mpi.gov.tm/payment/rest/getOrderStatus.do', [
                    'form_params' => [
                        'password' => $password,
                        'userName' => $username,
                        'orderId' => $payment->response_order_id,
                        'language'       => 'ru',
                    ],
                    'verify' => false,
                ]);

                $arr = json_decode($response->getBody(), true);

                if ($arr['ErrorCode'] == 0 && $arr['OrderStatus']  == 2) {
                    $payment->status = 1;
                    if (isset($arr['ErrorMessage'])) {
                        $message = $arr['ErrorMessage'];
                    } else {
                        $message = 'Payment was successful';
                    }
                    $payment->save();
                    if($payment->payment_type_id == 1){
                        $mailData = OrderBus::where('id',$payment['merchant_order_number'])->get();
                    }
        
                    if($payment->payment_type_id == 2){
                        $mailData = OrderTruck::where('id',$payment['merchant_order_number'])->get();
                    }
        
                    $email = 'ahalob@sanly.tm';
        
                    Mail::to($email)->send(new EmailDemo($mailData));
                    return response()->json([
                        "success" => true,
                        'message' => 'Sargydyňyz kabul edildi. Tiz wagtda siziň bilen habarlaşarys',
                    ]);
                } else {
                    if (strlen(trim($message)) == 0)
                    $message .= 'Payment was not successful';
                    $payment->status = 2;
                    $payment->save();        
                        return response()->json([
                            "success" => false,
                            'message' => 'Töleg amala aşmady',
                        ]);        
                }
            }
            abort(404);
        }

    }

    public function order_bus_yuridiki(Request $request){     
        // $validator = Validator::validate($request->all(),
        // [
        //     'awtobus_yuk' => 'required',
        //     'fizik_yuridik'=>'required',
        //     'datetime'=>'required',
        //     'name'=>'required',
        //     'from'=>'required',
        //     'to'=>'required',
        //     'phone'=>'required',
        //     'duration'=>'required',
        //     'email' => 'required|email',
        //     'personNumber'=>'required',
        //     'note'=>'required',
        //     'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        //     'awto'=>'required',
        // ]);
        $order_bus = new OrderBus;
        $order_bus->roly = $request->fizik_yuridik;
        $order_bus->name = $request->name;
        if($request->edaraady != null){
            $order_bus->edaraady = $request->edaraady;
        }
        else{
            $order_bus->edaraady = 'null';
        };
        $order_bus->email = $request->email;
        $order_bus->orderphone = $request->phone;
        $order_bus->from = $request->from;
        $order_bus->to = $request->to;
        $order_bus->datetime = $request->datetime;
        $order_bus->duration =$request->duration;
        $order_bus->personnumber = $request->personNumber;
        $order_bus->note = $request->note;
        if ($order_bus->save()) {
            $mailData = $request->all();

            $email = 'ahalob@sanly.tm';
    
            Mail::to($email)->send(new EmailDemo($mailData));
            return response()->json([
                "success" => true,
                'message' => 'Sargydyňyz kabul edildi. Tiz wagtda siziň bilen habarlaşarys',
            ]);
        } else {
            return response()->json([
                "success" => false,
                'message' => 'Sargydyňyz kabul edilmedi',
            ]);
        } 
    }

    public function order_truck_yuridiki(Request $request){
        $order_truck = new OrderTruck;
        
        $order_truck->roly = $request->fizik_yuridik;
        $order_truck->name = $request->name;
        if($request->edaraady != null){
            $order_truck->edaraady = $request->edaraady;
        }
        else{
            $order_truck->edaraady = 'null';
        };
        $order_truck->email = $request->email;
        $order_truck->orderphone = $request->phone;
        $order_truck->from = $request->from;
        $order_truck->to = $request->to;
        $order_truck->datetime = $request->datetime;
        $order_truck->yuk_gornush = $request->yuk_gornush;
        $order_truck->yuk_agram = $request->yuk_agram;
        $order_truck->note = $request->note;
        if ($order_truck->save()) {
        $mailData = $request->all();
        $email = 'ahalob@sanly.tm';
        Mail::to($email)->send(new EmailDemo($mailData));
        return response()->json([
            "success" => true,
            'message' => 'Sargydyňyz kabul edildi. Tiz wagtda siziň bilen habarlaşarys',
        ]);
        } else {
            return response()->json([
                "success" => false,
                'message' => 'Sargydyňyz kabul edilmedi',
            ]);
        } 
    }

}
