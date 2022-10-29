<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use GuzzleHttp\Client;

class Payment extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    const STATUS_PENDING = 0,
    STATUS_SUCCESS = 1,
    STATUS_FAILED = 2,
    STATUS_REFUNDED = 3;

    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_modified';

    public $fillable = ['description', 'merchant_order_number', 'merchant_success_url', 'merchant_failure_url', 'submitted_order_number', 'response_order_id', 'response_form_url',
                        'response_error_code', 'status_response_json', 'amount', 'currency_code','status','date_finished','date_merchant_alerted','edited_username','create_username','merchant_id','payment_type_id'];
                        
    protected $table = 'tbl_payment';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function getStatusOptions()
    {
        return array(
            self::STATUS_PENDING => 'PENDING',
            self::STATUS_SUCCESS => 'SUCCESS',
            self::STATUS_FAILED => 'STATUS_FAILED',
            self::STATUS_REFUNDED => 'STATUS_REFUNDED',
        );
    }

    public function getStatusText()
    {
        $options = $this->getStatusOptions();
        return isset($options[$this->status]) ? $options[$this->status] : '';
    }

    public static function getOrderStatusResponseCodes()
    {
        return array(
            0 => 'Заказ зарегистрирован, но не оплачен',
            1 => 'Предавторизованная сумма захолдирована (для двухстадийных платежей)',
            2 => 'Проведена полная авторизация суммы заказа',
            3 => 'Авторизация отменена',
            4 => 'По транзакции была проведена операция возврата',
            5 => 'Инициирована авторизация через ACS банка-эмитента',
            6 => 'Авторизация отклонена',
        );
    }

    public static function getResponseErrorCodeOptions()
    {
        return array(
            0 => 'Обработка запроса прошла без системных ошибок',
            1 => 'Неверный номер заказа',
            2 => 'Заказ с таким номером уже обработан',
            3 => 'Неизвестная валюта',
            4 => 'Отсутствует сумма / Номер заказа не может быть пуст / URL возврата не может быть пуст',
            5 => 'Неверно указано значение одного из параметров / Неверная сумма / Пользователь должен сменить свой пароль',
            7 => 'Системная ошибка',
        );
    }

    public function getErrorCodeText()
    {
        $options = $this->getResponseErrorCodeOptions();
        return isset($options[$this->response_error_code]) ? $options[$this->response_error_code] : '';
    }



    public function formatBankRegisterUrl()
    {
        $merchantInstance = DB::table('tbl_merchant2')
        ->where('id', '=', 2)
        ->first();
        if ($merchantInstance) {
            // $next_order_number = $merchantInstance->getNextOrderNumber();
            // if ($next_order_number > 0) {


                $url_params = [];

                $randomString = Str::random(6);
                $full = substr($randomString, 0, 6);
                $order_num = $full.date("dmYHis");

                $url_params['orderNumber'] = $order_num;
                $this->submitted_order_number = $url_params['orderNumber'];
                $amount = $this->amount;
                //$amount = 1;
                $url_params['currency'] = 934;
                $url_params['language'] = $merchantInstance->language;
                $username = $merchantInstance->username;
                $password = $merchantInstance->password;
                //$returnUrl = URL::to('payment' , $extra = [$this->submitted_order_number,'status' => 1], $secure = 'https');
                $returnUrl = 'https://ahalawtoulag.com.tm/checkpayment?orderId='.$this->submitted_order_number;
               // $url_params['failUrl'] = URL::to('payment' , $extra = [$this->submitted_order_number,'status' => 1], $secure = 'https');

                // $url_params['returnUrl'] = URL::to('payment' , $extra = ['merchant_order_number' => $this->merchant_order_number,'status' => 1], $secure = 'https');
                // $url_params['failUrl'] = URL::to('payment' , $extra = ['merchant_order_number' => $this->merchant_order_number,'status' => 2], $secure = 'https');
                // $url_params['returnUrl'] = Url::ensureScheme(Yii::$app->urlManager->createAbsoluteUrl(['/payment/payment-response', 'merchant_order_number' => $this->merchant_order_number, 'status' => PaymentWrapper::STATUS_SUCCESS]), 'https');
                //$url_params['failUrl'] = Url::ensureScheme(Yii::$app->urlManager->createAbsoluteUrl(['/payment/payment-response', 'merchant_order_number' => $this->merchant_order_number, 'status' => PaymentWrapper::STATUS_FAILED]), 'https');
                $url_params['description'] = $this->description;
                $url_params['merchantOrderNumber'] = $this->merchant_order_number;
                $url_params['sessionTimeoutSecs'] = 300;
                $client = new Client();
                $response = $client->post('https://mpi.gov.tm/payment/rest/register.do', [
                    'form_params' => [
                        'password' => $password,
                        'userName' => $username,
                        'pageView' => 'DESKTOP',
                        'sessionTimeoutSecs' => 600,
                        'description' => 'sargyt',
                        'orderNumber' => $this->submitted_order_number,
                        'amount'   => $amount,
                        'currency'     => '934',
                        'language'       => 'ru',
                        'returnUrl'       => url($returnUrl),
                        'failUrl'       => url($returnUrl),
                    ],
                ]);
                $arr = json_decode($response->getBody(), true);
                if ($arr['errorCode'] == 0) {
                    // $payment = Payment::create([
                    //     'merchant_id' => $arr['orderId'],
                    //     'url' => $arr['formUrl'],
                    //     'payment_offer_id' => $payment->id,
                    // ]);
                    // $payment->merchant_id = $arr['orderId'];
                    // $payment->url = $arr['formUrl'];
                    // $payment->save();
                    // $this->clear($request);
                    // return $arr['formUrl'];
                    //return redirect($arr['formUrl']);
                    // return redirect($bankResponse['formUrl'])
                    // $response = [];


                    $response = [
                        'response_order_id' => $this->submitted_order_number,
                        'status'=>'success',
                        'form_url'=>$arr['formUrl']
                    ];
                    return $response;
                } else {
                    $response = [
                        'status'=>'fail',
                        'detail'=>'server error, try again!',
                        'detail'=>$arr,
                    ];
                    return $response;
                    // return response()->json([
                    //     'status'=>'fail',
                    //     'detail'=>'server error, try again!',
                    //     'detail'=>$arr,
                    // ],200);
                }
             
               // return 'https://mpi.gov.tm/payment/rest/register.do?orderNumber=pRcG7K19102022042945&amount='.$amount.'¤cy=934&language=ru&userName='.$useername.'&password='.$password.'&returnUrl=&failUrl=https%3A%2F%2Fasgabat.awto%2Fpayment%2Fa%2Fpayment-response%3Fstatus%3D2&sessionTimeoutSecs=300';

                //$url_params['sessionTimeoutSecs'] = isset(Yii::$app->params['onlinePayment.sessionTimeoutSecs']) ? (int)Yii::$app->params['onlinePayment.sessionTimeoutSecs'] : 0;
                //return 'https://mpi.gov.tm/payment/rest/register.do?' . http_build_query($url_params);
           // }
        }
        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
