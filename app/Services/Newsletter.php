<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{

    public function subscribe(string $email){
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us17'
        ]);

        return $mailchimp->lists->addListMember('6db64e0a4b', [
            "email_address" => $email,
            "status" => "subscribed"
        ]);

    }

}
