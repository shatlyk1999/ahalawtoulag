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


class PaymentController extends Controller
{


    public function payment()
    {
        return 1;
    }

}
