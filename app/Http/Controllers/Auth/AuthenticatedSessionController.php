<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\Property;
use App\Models\Partner;
use App\Models\Location;
use App\Models\PropertyType;
use App\Models\Faq;
use App\Models\User;
use App\Models\ApplicationSetting;



class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {    $users = User::all();
        $applicationSettings = ApplicationSetting::all();
        return view('auth.login',  compact('users', 'applicationSettings'), [
            'users'=>User::all(),
            'property_types' => PropertyType::all(),
            'locations' => Location::all(),
            'partners' => Partner::all(),
            'faqs' => Faq::whereStatus(0)->get(),
            'properties' => Property::with(['location', 'user'])->get(),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        if ($request->user()->role == 'admin') {
            return redirect()->route('admin-dashboard');
        } else {
            $applicationSettings = ApplicationSetting::all();
            $users = User::all(); 
            $users = User::all(); 
            return redirect()->route('user-dashboard', compact('applicationSettings'));
        }
    }


    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}