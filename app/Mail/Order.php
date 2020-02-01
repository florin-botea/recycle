<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class Order extends Mailable
{
    use Queueable, SerializesModels;
	
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $message = $this->view('.emails.order')->with('order', $request->all())
			->from($request->email, $request->name)
			->subject('Comanda noua de pe '.substr($request->root(), 7));
		if ( $_FILES['photos'] ){
			foreach( $_FILES['photos']['tmp_name'] as $i => $photo ){
				$message->attach($photo, ['as' => $_FILES['photos']['name'][$i]]);
			}
		}
		return $message;
    }
}
