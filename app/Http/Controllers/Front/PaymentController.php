<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use Validator;
use App\Models\Normal;
use App\Models\OrderBus;
use App\Models\Payment;
use App\Models\OrderTruck;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class PaymentController extends Controller
{

    public function checkPayment(Request $request)
    {
        $message = "";
        // return 'geldi';
        $payment = Payment::where('response_order_id',$_GET['orderId'])->first();
            // $recipient = Recipient::where('id', $payment->recipient_id)->first();
            // $payment = $payment->payment;
            if ($payment) {
                $merchantInstance = DB::table('tbl_merchant2')
                ->where('id', '=', 2)
                ->first();
                // $column_name = $this->getUsernamePassword($payment);
                $username = $merchantInstance->username;
                $password = $merchantInstance->password;
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
                
                // $payRoute = $payment->return_url;
                if ($arr['ErrorCode'] == 0 && $arr['OrderStatus']  == 2) {
                    // $this->sendMessage($paymentOffer->phone,'Hormatly müşderi sizin tölegiňiz üstünlikli geçdi!');
                    $payment->status = 1;
                    $arr['cardholderName'] =$payment->create_username;
                    if (isset($arr['ErrorMessage'])) {
                        $message = $arr['ErrorMessage'];
                    } else {
                        $message = 'Payment was successful';
                    }
                    // return $payment->status;
                    $payment->save();
                    if($payment->payment_type_id == 1){
                        $mailData = OrderBus::where('id',$payment['merchant_order_number'])->get();
                    }

                    if($payment->payment_type_id == 2){
                        $mailData = OrderTruck::where('id',$payment['merchant_order_number'])->get();
                    }

                    $email = 'ahalob@sanly.tm';

                    Mail::to($email)->send(new EmailDemo($mailData));

        return redirect()->route('physical')->with('success', 'Sargydyňyz kabul edildi. Tiz wagtda siziň bilen habarlaşarys.');
                    // if ($payment->return_url){
                    // return redirect($payRoute.'?msg=success');
                    // }
                } else {
                    if (strlen(trim($message)) == 0)
                    $message .= 'Payment was not successful';
                    $payment->status = 2;
                    $payment->save();

                    // if ($payment->return_url){
                return redirect()->route('physical')->with('danger', 'Töleg amala aşmady');

                    // }
                }
                return redirect()->route('physical')->with('danger', $arr['ErrorCode']);
            }
            abort(404);
    }

    // public function payment()
    // {
    //     return 1;
    // }

}
