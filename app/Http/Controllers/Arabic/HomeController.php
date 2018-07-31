<?php

namespace App\Http\Controllers\Arabic;

use App\Models\About;
use App\Models\Category;
use App\Models\ContactInfo;
use App\Models\ContactUs;
use App\Models\Country;
use App\Models\EventRequest;
use App\Models\Events;
use App\Models\Founder;
use App\Models\Product;
use App\Models\SiteInfo;
use App\Models\Slider;
use App\Models\State;
use App\Models\SubCategory;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $sub_categories = SubCategory::all()->where('view','=','1');
        $states     = State::all();
        $products = Product::all()->where('view','=','1');
        $categories = Category::all()->where('view' ,'=','1');
        $sliders = Slider::all();
        return view('site_ar.index', compact('countries','states','sub_categories' , 'products', 'categories' , 'sliders'));
    }

    public function about()
    {
        $countries = Country::all();
        $states     = State::all();
        $item = About::all()->first();
        return view('site_ar.about', compact('countries','states',  'item'));
    }

    public function infinity()
    {
        $countries = Country::all();
        $states = State::all();
        $item = About::find(2);

        return view('site_ar.infinity', compact('countries','states', 'item'));
    }

    public function founders()
    {
        $countries = Country::all();
        $states = State::all();
        $items = Founder::all();
        $item = About::find(2);
        return view('site_ar.founders', compact('countries', 'states','items','item'));
    }

    public function events()
    {
        $countries = Country::all();
        $states = State::all();
        $events = Events::all()->where('status','=',1);

        $events_array = array();
        foreach ($events as $event) {
            if(strtotime($event->date) >= Carbon::now()->timestamp ){
                array_push($events_array,$event);
            }
        }
        return view('site_ar.events', compact('countries','states'))->with('events',$events_array);
    }

    public function processes()
    {
        $countries = Country::all();
        $states = State::all();
        $item = About::find(3);
        return view('site_ar.processes', compact('countries','states', 'item'));
    }

    public function contact()
    {
        $countries = Country::all();
        $states    = State::all();
        $item = ContactInfo::all()->first();

        return view('site_ar.contact', compact('countries','states','item'));
    }

    public function add_contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|string',
            'message' => 'required|string',
            'subject' => 'required|string',
        ]);


        $message = new ContactUs();
        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->mail = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->date = Carbon::now();
        $message->view = 0;
        $message->save();

        session()->flash('message','تم إرسال رسالتك بنجاح');
        return redirect()->back();
    }

    public function search_events(Request $request){

        $items = Events::where('status', '=', '1');
        $items->Where('name_ar', 'LIKE', '%' . $request->name . '%');
        $countries = Country::all();
        $states = State::all();
        $events = $items->get();


        $events_array = array();
        foreach ($events as $event) {
            if(strtotime($event->date) >= Carbon::now()->timestamp ){
                array_push($events_array,$event);
            }
        }
        return view('site_ar.events', compact('countries','states'))->with('events',$events_array);
    }
    public function request_events(Request $request){
        $this->validate($request,array(
           'name' => 'required',
            'phone' => 'required',
            'mail' => 'required',
        ));

        $event_check = EventRequest::all()->where('user_id','=',auth()->user()->id)->where('event_id','=',$request->event_id);
        if($event_check->count() > 0){
            session()->flash('error','لقد قمت بالفعل بالتسجيل فى هذا الحدث سوف نتواصل معك قريبا');
            return redirect()->back();
        }

        $event = new EventRequest();
        $event->name = $request->name;
        $event->phone = $request->phone;
        $event->mail = $request->mail;
        $event->event_id = $request->event_id;
        $event->user_id = auth()->user()->id;
        $event->save();

        session()->flash('message','لقد قمت بالتسجيل معنا فى الحدث سوف نتواصل معك قريبا');
        return redirect()->back();
    }

}
