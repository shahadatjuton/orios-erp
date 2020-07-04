<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendAppointmentLetter extends Notification
{
    use Queueable;
    public $application;
    public $date;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($application , $date)
    {
        $this->application = $application;
        $this->date = $date;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Dear '. $this->application->user->name.'!')
                    ->subject('Appointment Letter')
                    ->line('This is to inform you that you are selected for '.$this->application->designation.
                        ' post under '. $this->application->department. ' department.')
                    ->line('You are warmly welcome to join with us on '. $this->date.
                        'We are eagerly waiting for your join. Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
