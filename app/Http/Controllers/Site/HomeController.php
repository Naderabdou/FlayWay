<?php

namespace App\Http\Controllers\Site;


use App\Models\User;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\CustomerReview;
use App\Models\StudyDestination;
use App\Models\TouristDestination;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ServiceOrder;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Events\DatabaseNotificationsSent;

class HomeController extends Controller
{
    public function index()
    {
        $studys = StudyDestination::all();
        $tourists = TouristDestination::all();
        $customerReview = CustomerReview::all();
        $services = Service::all();


        return view('site.home', compact('studys', 'tourists', 'customerReview', 'services'));
    }

    public function service_request(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
            'phone' => 'required',
            'service_name' => 'required',
            'message' => 'required',
        ]);
        $order = ServiceOrder::create($request->all());
        Notification::make()
            ->title('يريد العميل ' . $request->name . ' الحصول على خدمة ' . $request->service_name)
            ->actions([
                Action::make('view')
                    ->label('عرض الطلب')
                    ->button()
                    ->url(function ()  use ($order) {
                        return route('filament.admin.resources.service-orders.view', $order->id);
                    })
                    ->markAsRead()
            ])
            // ->broadcast(User::role('admin')->first());
            ->sendToDatabase(User::role('admin')->first());

        event(new DatabaseNotificationsSent(User::role('admin')->first()));


        return response()->json(['success' => __('تم ارسال الرسالة بنجاح وسوف يتم الرد عليك في اقرب وقت')]);

        return redirect()->back()->with('success', 'Your request has been sent successfully');
    }

    public function contact_request(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $contact = Contact::create($request->all());


        Notification::make()
            ->title('يريد العميل ' . $request->name . ' التواصل معك')
            ->actions([
                Action::make('view')
                    ->label('عرض الرسالة')
                    ->button()
                    ->url(function () use ($contact) {
                        return route('filament.admin.resources.contacts.view', $contact->id);
                    })
                    ->markAsRead()

            ])
            // ->broadcast(User::role('admin')->first());
            ->sendToDatabase(User::role('admin')->first());

        event(new DatabaseNotificationsSent(User::role('admin')->first()));


        return response()->json(['success' => __('تم ارسال الرسالة بنجاح وسوف يتم الرد عليك في اقرب وقت')]);
    }

    public function lang($lang)
    {

        session()->put('lang', $lang);
        return redirect()->back();
    }
}
