<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $template;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$subject = 'Broadcast new Message',$template ='dynamic_email_template')
    {   
        $this->data = $data;
        $this->subject = $subject;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from('support@p2pdz.com',' P2PDZ support')->subject($this->subject)->view($this->template)->with('data', $this->data);
        //return $this->view('dynamic_email_template');
    }
}
