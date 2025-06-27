<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempMemb;
use App\Models\CmnStreet;
use App\Mail\MembershipConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendOtpMail;
use App\Models\wo_users; 
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserProfile;


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
        'street' => 'required|string|max:50', // Matches your VARCHAR(50)
        'post_code' => ['required', 'regex:/^[A-Za-z0-9 ]{6,8}$/'],
        'email' => 'required|email', // Remove 'unique:temp_memb,email'
        // 'email' => 'required|email|unique:temp_memb,email',
        'terms' => 'accepted',
    ]);



    // Create the membership record
$temp = TempMemb::create([
    'title' => $request->title,
    'first_name' => $request->first_name,
    'last_name' => $request->last_name,
    'house_no' => $request->house_no,
    'street_name' => $request->street,  // Primary street field
    'street_id' => null,                // Explicit null (now allowed)
    'line3' => $request->line3,
    'post_code' => strtoupper(trim($request->post_code)),
    'email' => $request->email,
    'mobile' => '',                     // Empty string (from earlier fix)
    'terms_accepted' => true,
    'ip_address' => $request->ip(),
    'user_agent' => $request->userAgent(),
    'otp' => '', // Empty string instead of null
]);

return back()
        ->withInput()  // Preserves form input if validation fails
        ->with([
            'show_payment' => true,
            'payment_url' => 'https://buy.stripe.com/8x27sNaVfdpP0V35odbMQ00'
        ]);

//     // Send confirmation email
//     Mail::to($request->email)->send(new MembershipConfirmation($temp));

//     return redirect()->route('membership.success')->with([
//         'email' => $request->email,
//         'payment_url' => 'https://buy.stripe.com/8x27sNaVfdpP0V35odbMQ00'
//     ]);

// return redirect()->route('membership.success')->with([
//         'email' => $request->email,
//         'payment_url' => 'https://buy.stripe.com/8x27sNaVfdpP0V35odbMQ00'
//     ]);

}


    
    public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required|digits:6',
    ]);

    $temp = TempMemb::where('email', $request->email)->first();

    if (!$temp) {
        return back()->with('error', 'Temporary record not found.');
    }

    if (now()->gt($temp->otp_expires_at)) {
        return back()->with('error', 'OTP has expired.');
    }

    if ($request->otp !== $temp->otp) {
        return back()->with('error', 'Invalid OTP entered.');
    }

    // Create the user in default 'users' table
    $user = User::create([
        'name' => $temp->first_name . ' ' . $temp->last_name,
        'email' => $temp->email,
        'password' => bcrypt('TempPass' . rand(1000, 9999)), // Random password or leave null if not needed
    ]);

    // Create the profile in 'user_profiles' table (if you’re using it)
    if (class_exists(UserProfile::class)) {
        $user->profile()->create([
            'title' => $temp->title,
            'first_name' => $temp->first_name,
            'last_name' => $temp->last_name,
            'house_no' => $temp->house_no,
            'street_id' => $temp->street_id,
            'line3' => $temp->line3,
            'post_code' => $temp->post_code,
            'mobile' => $temp->mobile,
            'terms_accepted' => $temp->terms_accepted,
            'meeting_attendance' => $temp->meeting_attendance ?? false,
        ]);
    }

    // Delete temp record
    $temp->delete();

    return redirect()->route('membership.form')->with('success', 'OTP verified and membership enrolled!');
    
// try {
//     Mail::to($user->email)->send(new \App\Mail\MembershipConfirmedMail($user));
// } catch (\Exception $e) {
//     \Log::error("Mail failed: " . $e->getMessage());
//     // Don't interrupt the flow
// }

// return redirect()->route('membership.confirmed');

// return redirect()->route('membership.form')->with('success', 'OTP verified. Membership confirmed.');


    
}
   
public function resendOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    try {
        $otp = 123456;
        $email = $request->email;

        $existing = TempMemb::where('email', $email)->first();

        if ($existing) {
            $existing->update([
                'otp' => $otp,
                'otp_expires_at' => now()->addMinutes(5),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        } else {
            TempMemb::create([
                'email' => $email,
                'otp' => $otp,
                'otp_expires_at' => now()->addMinutes(5),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'terms_accepted' => false,
            ]);
        }

        // Return JSON response for AJAX
        return response()->json(['success' => true]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Server error: ' . $e->getMessage()
        ], 500);
    }
}

}

