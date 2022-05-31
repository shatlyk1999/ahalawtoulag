<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Rules\PhoneNumber;
use App\Http\Controllers\Controller;
use App\Contact;
use Validator;
use App\Category;
use App\Slider;
use App\News;
use App\Article;
use App\Service;
use App\ServiceItem;
use App\Normative;
use App\Metrica;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // view()->share('category', Category::inRandomOrder()->get());
        view()->share('info', Article::get());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // $currentURL = $request->url();

        // $currentURL = $request->fullUrl();
        // dd(now());

        // $info = Article::get();
        // $data['info'] = $info;
        switch (App::getLocale()){
            
            case 'tm':
                $lang = 1;
                break;
            
            case 'en':
                $lang = 3;
                break;     
            
            case 'ru':
                $lang = 2;
                break;
                        
        }
        $slider=Slider::whereLang($lang)->get();
        $data['slider']=$slider;
        $serviceitems=ServiceItem::get();
        $data['serviceitems']=$serviceitems;
        $news = News::orderBy('date', 'DESC')->limit(3)->get();
        $data['news']=$news;
        return view('front.home', ['data' => $data]);
    }

    public function Category($slug)
    {
        $category=Category::whereSlug($slug)->first() ?? abort(404, 'Beyle sahypa tapylmady');
        $data['categories']=$category;
        return view('front.home', $data);
    }

    public function Normative()
    {
        $normative = Normative::orderBy('date', 'DESC')->paginate(12);
    
        return view('front.items.normative', compact('normative'));
        
    }

    // public function News()
    // {
    //     $news = News::paginate(12);
    //     $data['news'] = $news;

    //     return view('front.items.news_items', $data);
    // }
    public function News(Request $request)
    {
        // dd($request->date);
        $news['news'] = News::when($request->date, function ($q, $v){
            // dd($v);
            $q->where('date', '>=', $v)
            ->where('date', '<', "$v 23:59:59");
        })->orderBy('date', 'DESC')->paginate(12);

        // dd($news['news']);
        // if($request->has('date')){
        //     $date = $request->get('date');
        // $news = News::where('created_at',$date)->get();
        // $data['news']=$news;
        // // dd($data);die;
        // return view('front.items.news_items', $data);
        // }else{
        //     $news = News::paginate(12);
        //     $data['news'] = $data;
        //     // dd($data);die;
            
        // }

        return view('front.items.news_items', $news); 
    }

    public function newsView($id)
    {
        // $news = News::where($id)->first();
        $news = News::find($id);

        return view('front.items.news-view', compact('news'));
    }

    public function about()
    {
        $info = Article::get();
        $data['info'] = $info;
        // dd($info);die;
        return view('front.items.about', $data);
    }

    public function Services(){
        $services = Service::find(1);
        $data['services']=$services;
        $serviceitems=ServiceItem::get();
        $data['serviceitems']=$serviceitems;
        // dd($services);die;
        return view('front.items.services', $data);
    }

    public function Contact(){
        $info = Article::get();
        $data['info'] = $info;
        return view('front.items.contactpage', $data);
    }

    public function contactpost(Request $request)
    {
        $rules=[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => ['required', new PhoneNumber()],
            'textarea' => 'required|min:5'
        ];
        $validate=Validator::make($request->post(), $rules);

        if($validate->fails()){
            return redirect()->route('home')->withErrors($validate)->withInput();
        }

        $contact = new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone=$request->phone;
        $contact->textarea=$request->textarea;
        $contact->save();

        return redirect()->route('home')->with('success', 'Biz bilen habarlaşanyňyz üçin sagboluň. Size iň tiz wagtyň içinde jogap bereris.');
    }

    public function Statistica(Request $request)
    {
        $metrica = Metrica::when($request->date, function ($q, $v){
            // dd($v);
            $q->where('date', '>=', $v)
            ->where('date', '<', "$v 23:59:59");
        })->orderBy('date', 'DESC')->paginate(100);
        $filterDate = $request->date;

        return view('stat.metrica', compact('metrica', 'filterDate'));
    }

}
