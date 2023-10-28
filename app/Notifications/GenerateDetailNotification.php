<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GenerateDetailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $data;
    public $level;
    public $nama;
    public $pic;

    public function __construct($data,$level,$nama,$pic)
    {
        $this->data = $data;
        $this->level = $level;
        $this->nama = $nama;
        $this->pic = $pic;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $data = [
            'id' => $this->data->id_meeting,
            'pic' => $this->data->pic,
            'title' => 'MoM Baru',
            'messages' => 'Status '. $this->data->status,
        ];
    
        if ($notifiable->hasRole('ADMIN')) {
            // Jika pengguna memiliki peran "ADMIN," atur hasil yang berbeda
            $data['title'] = 'Update';
            $data['messages'] = 'Data ' .$this->data->point_of_meeting. ' telah diupdate oleh ' . $this->nama. ' '.$this->pic;
        }
    
        $data['url'] = route('detail' . $this->level . '.index', $this->data->id_meeting);
    
        return $data;
    }
}
