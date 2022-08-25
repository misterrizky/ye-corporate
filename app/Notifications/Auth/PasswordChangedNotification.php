<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordChangedNotification extends Notification
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
        return (new MailMessage)->subject('Yada Ekidanta | Password Changed')->from('noreply@yadaekidanta.com')->view('email.auth.password_changed',compact('notifiable'));
    }
    public function toArray($notifiable)
    {
        return [
            'tipe' => 'Password Changed',
            'nama' => $notifiable->name,
            'pesan' => "Hi ".$notifiable->name.", Sorry to hear you’re having trouble logging into ".config('app.name').". We got a message that you forgot your password."
        ];
    }
}
