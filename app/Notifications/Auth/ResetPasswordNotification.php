<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;
    public function __construct()
    {
        //
    }
    public function via($notifiable)
    {
        return ['mail','database','broadcast'];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)->subject('Yada Ekidanta | Reset Password Confirmation')->from('noreply@yadaekidanta.com')->view('email.reset_password',compact('notifiable'));
    }
    public function toArray($notifiable)
    {
        return [
            'tipe' => 'Reset Password Confirmation',
            'nama' => $notifiable->name,
            'pesan' => "Hi ".$notifiable->name.", Sorry to hear you’re having trouble logging into ".config('app.name').". We got a message that you forgot your password."
        ];
    }
}
