<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use Validator;
use App\Models\Normal;
use App\Models\OrderBus;
use App\Models\OrderTruck;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;


class OrderController extends Controller
{
    public $request;

    public function __construct()
    {
        view()->share('info', Article::get());
    }


    public function index()
    {
        return view('front.order.index');
    }


    public function choose(Request $request)
    { 

        return view('front.order.choose');        //awtobus yada yuk
    }
    

    public function chekout(Request $request)
    { 
        // $request->session()->forget('test.cartype');
        // $request->session()->push('test.cartype', $request->roles);
        $awtobus_yuk = $request->roles;     //awtobus ya-da yuk
            
        return view('front.order.chekout', compact('awtobus_yuk'));        //fiziki-yuridiki ugratya
    }

    public function awto(Request $request)
    {
        $awtobus_yuk = $request->awtobus_yuk;
        $fizik_yuridik = $request->roles; 
        if($awtobus_yuk == 'yuk'){
            return view('front.order.yuk', compact('awtobus_yuk', 'fizik_yuridik'));            
        }
        if($awtobus_yuk == 'awtobus' && $fizik_yuridik == 'yuridiki'){
            return view('front.order.yuridiki_awto', compact('awtobus_yuk', 'fizik_yuridik'));            
        }
        return view('front.order.awto', compact('awtobus_yuk','fizik_yuridik'));
    }

    public function legal(Request $request)
    {
        $awtobus_yuk = $request->awtobus_yuk;
        // $request->session()->forget('test.fizyuridik');
        // $request->session()->push('test.fizyuridik', $request->roles);
        $fizik_yuridik = $request->fizik_yuridik;       //fizik-yada-yuridik
        $awto = $request->bus;
        if($awtobus_yuk == 'awtobus' && $fizik_yuridik == 'fiziki'){
            return view('front.order.order_bus', compact('awtobus_yuk', 'fizik_yuridik','awto'));            
        }
        elseif($request->awtobus_yuk == 'awtobus' && $fizik_yuridik == 'bus_byujet_dal'){
            return view('front.order.order_bus2', compact('awtobus_yuk', 'fizik_yuridik','awto')); 
        }
        elseif($request->awtobus_yuk == 'awtobus' && $fizik_yuridik == 'bus_byujet'){
            return view('front.order.order_bus2', compact('awtobus_yuk', 'fizik_yuridik','awto')); 
        }
        elseif($request->awtobus_yuk == 'yuk' && $fizik_yuridik == 'fiziki'){
            return view('front.order.order_truck', compact('awtobus_yuk', 'fizik_yuridik')); 
        }
        elseif($request->awtobus_yuk == 'yuk' && $fizik_yuridik == 'yuridiki'){
            return view('front.order.order_truck2', compact('awtobus_yuk', 'fizik_yuridik')); 
        }
        
    }

    public function budget(Request $request)
    {
        // $request->session()->forget('test.isbudget');
        // $request->session()->push('test.isbudget', $request->roles);
        // $a = $request->session()->pull('test');
        // dd($a);
        $budget = $request->roles;          // byujete degishli yada degishli dal

        return view('front.order.type_load');      //yukun gornusine ugradya   
    }

    
    public function weight(Request $request)
    {
        $normal = Normal::get();
        
        // $request->session()->forget('test.normal');
        // $request->session()->push('test.normal', $request->roles);
        $yuk_gornush  = $request->roles;        //yuku gornushi : adaty yada howply

        if($yuk_gornush == 'adaty'){
            return view('front.order.normal', compact('normal'));  //adaty yukun gornisine ugradya
        }
        else{
            return view('front.order.dangerous');       //howply yukun gornusine ugradya
        }
    }

    public function truck(Request $request)
    {

        // $f = $path = $request->storeAs(
        //     'avatars',
        //     $request->user()->id,
        //     's3'
        // );

        $yuk = $request->name;
        // $request->session()->forget('test.agram');
        // $request->session()->push('test.agram', $request->roles);

        $agram = $request->roles;
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
        $order_bus->save();

        $mailData = $request->all();

        $email = 'ahalob@sanly.tm';

        Mail::to($email)->send(new EmailDemo($mailData));

        return redirect()->route('physical')->with('success', 'Sargydyňyz kabul edildi. Tiz wagtda siziň bilen habarlaşarys.');
    }

    public function order_truck(Request $request){
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
        $order_truck->save();

        $mailData = $request->all();
        $email = 'ahalob@awtoulag.gov.tm';
        Mail::to($email)->send(new EmailDemo($mailData));

        return redirect()->route('physical')->with('success', 'Sargydyňyz kabul edildi. Tiz wagtda siziň bilen habarlaşarys');
    }

    public function physical(Request $request){
        return  view('front.order.physical');
    }
}
