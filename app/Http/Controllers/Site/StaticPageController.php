<?php

namespace App\Http\Controllers\Site;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Middleware\Lang;
use App\Models\LanguageStudy;
use App\Models\StudyDestination;
use App\Settings\GeneralSettings;
use App\Models\TouristDestination;
use App\Http\Controllers\Controller;

class StaticPageController extends Controller
{
    public function about()
    {
        $setting = app(GeneralSettings::class);
        return view('site.about', compact('setting'));
    }

    public function services()
    {
        $services = Service::all();

        return view('site.services', compact('services'));
    }

    public function hotel()
    {
        $services = Service::all();

        return view('site.hotel', compact( 'services'));
    }

    public function language($slug)
    {
        $showLang = LanguageStudy::where('slug', $slug)->first();
        if (!$showLang) {
            abort(404);
        }
        $allLang = LanguageStudy::where('id', '!=', $showLang->id)->get();
        return view('site.language', compact('showLang', 'allLang'));
    }

    public function study()
    {
        return view('site.study');
    }
    public function summer_camp()
    {
        return view('site.summer_camp');
    }
    public function university_visa()
    {
        $services = Service::all();
        $StudyDestination = StudyDestination::all();

        return view('site.university_visa', compact('services', 'StudyDestination'));
    }
    public function courses()
    {
        return view('site.courses');
    }

    public function contact()
    {
        return view('site.contact');
    }


    public function tourism_study($slug)
    {
        $studys= StudyDestination::where('slug', $slug)->firstOrFail();

        return view('site.tourismStudy', compact('studys'));
    }

    public function tourism_destinations($slug)
    {
        $services = Service::all();

        $tourist = TouristDestination::where('slug', $slug)->firstOrFail();

        return view('site.tourism-offer', compact('tourist', 'services'));
    }

    public function all_destinations(){

        $tourists = TouristDestination::all();

        return view('site.all_destinations', compact('tourists'));
    }
}
