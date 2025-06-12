<?php

namespace App\Http\Controllers;

// C: Amal : File with all details to All logic to load the Home Page
// 25Jun11 AT : Added HomePagePopUp linked to to wo_homepagepopup
// 25Jun12 AT : Renamed the file to HomeSlider.php 


use App\Models\HomeContactUs;
use Illuminate\Http\Request;
use App\Models\TblAdervitiserModule;
use App\Models\HomeSlider;
use Illuminate\Support\Facades\Validator;
use App\Models\TrkHomeSections;
use App\Models\HomePagePopUp;

class HomeController extends Controller
{
    // public function __construct();
    public function index()
    {
        $home_sections = TrkHomeSections::where('vendor_id', app('client')->id)
            ->where('status', 1)
            ->get()
            ->toArray();

        $home_sections = array_column($home_sections, 'section_name');
  
        $advertisers = TblAdervitiserModule::where('status', 'Active')->get()->toArray();
        $sliders     = HomeSlider::where('status', 1)
            ->where('client_id', app('client')->id)
            ->get()->toArray();
            
        $homePagePopUp = HomePagePopUp::where('status', 1)
                        ->where('client_id', app('client')->id)
                        ->first();

        return view('home', compact('advertisers', 'sliders', 'home_sections','homePagePopUp'));
    }

    public function saveContactUs(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|min:10|max:500',
            'newsletter' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->to(url()->previous() . '#contact-us-sections')
                ->withErrors($validator)
                ->withInput();
        }


        HomeContactUs::create([
            'client_id' => app('client')->id, // or pass null if not logged in
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'newsletter' => $request->has('newsletter'),
        ]);

        return redirect()->to(url()->previous() . '#contact-us-sections')->with('success', 'Thank you for contacting us!');
    }
}
