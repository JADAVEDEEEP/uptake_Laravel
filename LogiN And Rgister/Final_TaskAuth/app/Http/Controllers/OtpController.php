<?php

namespace App\Http\Controllers;

use App\Jobs\SendOtpJob;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

 
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

 
        $otp = rand(100000, 999999);

   
        $user = User::where('email', $request->email)->first();
        $user->otp = $otp;
        $user->otp_expires_at = Carbon::now()->addMinutes(10);
        $user->save();

       
        Mail::send('emails.otp', ['otp' => $otp], function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Your OTP Code');
        });

        return redirect()->route('verify-otp.form')->with('success', 'OTP sent to your email.');
    }

   
    public function showVerifyOtpForm()
    {
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || $user->otp !== $request->otp) {
            return back()->with('error', 'Invalid OTP.');
        }

        if (Carbon::now()->gt($user->otp_expires_at)) {
            return back()->with('error', 'OTP has expired.');
        }

        
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        return redirect()->route('reset')->with('success', 'OTP verified. Set a new password.');
    }

   
    public function showResetPasswordForm()
    {
        return view('auth.reset-password');
    }

   
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Password reset successful. Please login.');
    }
}
