<?php

namespace App\Notifications\Master\Event;

use App\Models\HRM\Employee;
use App\Models\Master\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DeleteEventNotification extends Notification
{
    use Queueable;
    protected $events,$employee;
    public function __construct($events,Employee $employee)
    {
        $this->events = $events;
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
            'pesan' => "Hi ".$this->employee->name.", ".$this->events->name." just deleted by ".$this->employee->name." at ".date('d F Y, g:i a')."."
        ];
    }
}
