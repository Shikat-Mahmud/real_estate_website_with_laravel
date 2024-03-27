<?php

namespace App\Http\Controllers\Front;


use App\Models\ApplicationSetting;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\FaqSection;
use App\Models\FeturePropertySection;
use App\Models\HeroSection;
use App\Models\PartnerSection;
use App\Models\ProLocationSection;
use App\Models\Property;
use App\Models\Faq;
use App\Models\Partner;
use App\Models\Location;
use App\Models\AgentMessage;
use App\Models\Privacy;
use App\Models\PropertyType;
use App\Models\ProTypeSection;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function ask(){
        $faqs = Faq::all();
        $faqsection = FaqSection::all();

        return view('frontend.faq', compact('faqs','faqsection'));

    }

    public function about(){
        $abouts = About::all();
        return view('frontend.about', compact('abouts'));

    }
    public function term(){
        return view('frontend.term', [
            'terms'=>Term::all(),

        ]);
    }
    public function privacy(){
        $privacy = Privacy::first();
        return view('frontend.privacy', compact('privacy'));
    }
    public function home(){
        $paragraphContent = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed";
        return view('frontend.home.index', [
            'users'=>User::all(),
            'property_types' => PropertyType::all(),
            'locations' => Location::all(),
            'partners' => Partner::all(),
            'herosection' => HeroSection::all(),
            'protypesection' => ProTypeSection::all(),
            'prolocationsection' => ProLocationSection::all(),
            'feturepropertysection' => FeturePropertySection::all(),
            'partnersection' => PartnerSection::all(),
            'faqsection' => FaqSection::all(),
            'faqs' => Faq::where('status', 0)->take(5)->get(),
            'paragraphContent' => $paragraphContent,
            'properties' => Property::with(['location', 'user', 'property_status', 'property_type'])->get(),
        ]);
    }

    public function contact(){


        $applicationSettings = ApplicationSetting::first();

        return view('frontend.contact', compact('applicationSettings'), [
            'users'=>User::all(),
            'property_types' => PropertyType::all(),
            'locations' => Location::all(),
            'partners' => Partner::all(),
            'faqs' => Faq::whereStatus(0)->get(),
            'properties' => Property::with(['location', 'user'])->get(),
        ]);
    }


    public function PropertyDetails($id){

        $property = Property::with(['location', 'user', 'property_type', 'property_status'])->where('id',$id)->first();
        return view('frontend.home.propertydetails', compact('property'));

    }
    public function propertytype ()
    {
        return view('frontend.home.propertytype');

    }

    public function getPropertyByType ($id)
    {
        $propertiesByType = Property::with(['property_status', 'user'])
        ->where('property_type_id', $id)
        ->where('status', 0)
        ->paginate(5);
        return view('frontend.home.property_by_type', compact('propertiesByType'));

    }

    public function getPropertyByLocation ($id)
    {
        $propertiesByLocation = Property::with(['property_status', 'user'])
        ->where('location_id', $id)
        ->where('status', 0)
        ->paginate(5);
        return view('frontend.home.property_by_location', compact('propertiesByLocation'));
    }

    public function sendMessage(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $inputs = $request->all();
        AgentMessage::create($inputs);
        return redirect()->back()->with('success', 'Message sent successfully');
    }

    public function findProperty(Request $request)
{
    $query = Property::query()->where('status', 0);

    if ($request->filled('title')) {
        $query->where(function ($subQuery) use ($request) {
            $subQuery->where('title', 'like', '%' . $request->title . '%')
                ->orWhere('description', 'like', '%' . $request->title . '%');
        });
    }

    $query->when($request->filled('location_id'), function ($subQuery) use ($request) {
        $subQuery->where('location_id', $request->location_id);
    });

    $query->when($request->filled('type_id'), function ($subQuery) use ($request) {
        $subQuery->where('property_type_id', $request->type_id);
    });

    $query->when($request->filled('min_price'), function ($subQuery) use ($request) {
        $subQuery->where('price', '>=', $request->min_price);
    });

    $query->when($request->filled('max_price'), function ($subQuery) use ($request) {
        $subQuery->where('price', '<=', $request->max_price);
    });


    $searchProperties = $query->with(['location', 'user'])->paginate(5);
    return view('frontend.home.property_list', compact('searchProperties'));
}


}
