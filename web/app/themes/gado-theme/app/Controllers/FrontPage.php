<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
    public function customFields()
    {
        return get_post_meta(get_option('page_on_front'));
    }
}
