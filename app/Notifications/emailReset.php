<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class emailReset extends Notification
{
    use Queueable;
   public $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        //
        $this->token=$token;
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
                        ->greeting('Hola! '.$notifiable->name)
                        ->line('hemos enviado un link para restablecer su contraseña!')
                        ->action('Resetear contraseña', url(config('app.url').route('password.reset',$this->token,false)))
                        ->line('si no fue usted quien quiere reestablecer su contraseña solo ignore este mensaje!')
                        ->subject('aceros 8 de julio')->salutation('¡saludos!');
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
