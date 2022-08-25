<?php

namespace App\Notifications\Master\Event;

use App\Models\HRM\Employee;
use App\Models\Master\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreateEventNotification extends Notification
{
    use Queueable;
    protected $event,$employee;
    public function __construct(Event $event,Employee $employee)
    {
        $this->event = $event;
        $this->employee = $employee;
    }
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }
    public function toMail($notifiable)
    {
        //
    }
    public function toArray($notifiable)
    {
        return [
            'tipe' => 'Event',
            'nama' => $this->employee->name,
            'pesan' => "Hi ".$this->employee->name.", ".$this->event->name." just created by ".$this->employee->name." at ".$this->event->start_at->format('d F Y, g:i a')." to ".$this->event->end_at->format('d F Y, g:i a')."."
        ];
    }
}
