<?php

namespace App\Jobs;

use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user, $otp;

    public function __construct(User $user, $otp)
    {
        $this->user = $user;
        $this->otp = $otp;
    }

    public function handle()
    {
        Mail::to($this->user->email)->send(new OtpMail($this->otp));
    }
}
