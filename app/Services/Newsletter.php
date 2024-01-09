<?php

namespace App\Services;
use App\Services\MailchimpNewsletter;
interface Newsletter
{

    public function subscribe(string $email, string $list = null);
}
