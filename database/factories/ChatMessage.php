<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\ChatMessage;

$factory->define(ChatMessage::class, function (Faker $faker) {
    return [
        'chat_message_id' =>1,
        'to_user_id' =>1,
        'from_user_id' =>2,
        'chat_message' =>5,
    ];
});
