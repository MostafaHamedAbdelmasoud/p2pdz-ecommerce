<?php

namespace App\Jobs;

use App\Mail\MailToUsers;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendMails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data , $msg)
    {
        $this->data = $data;
        $this->message = $msg;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        foreach($this->data as $_data){
            Mail::to($_data->email)->send(new MailToUsers($this->message ));
        }
    }
}
