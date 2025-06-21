<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempMemb;
use App\Models\CmnStreet;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendOtpMail;

class MembershipController extends Controller
{
    public function showForm()
    {
        $streets = CmnStreet::all();
        return view('membership.form_mem', compact('streets'));
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'house_no' => 'required|string|max:10',
            'street_id' => 'required|exists:cmn_street,id',
            'post_code' => ['required', 'regex:/^[A-Za-z0-9 ]{6,8}$/'],
            'email' => 'required|email|unique:temp_memb,email',
            'mobile' => ['required', 'regex:/^(\+44\s?7\d{9}|07\d{9})$/'],
            'terms' => 'accepted',
        ]);

        $otp = rand(100000, 999999);

        $temp = TempMemb::create([
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'house_no' => $request->house_no,
            'street_id' => $request->street_id,
            'line3' => $request->line3,
            'post_code' => strtoupper(trim($request->post_code)),
            'email' => $request->email,
            'mobile' => $request->mobile,
            'terms_accepted' => true,
            'otp' => Hash::make($otp),
            'otp_expires_at' => now()->addMinutes(5),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        Mail::to($request->email)->send(new SendOtpMail($otp));

        return view('membership.enter_otp')->with('email', $request->email);
    }
}
