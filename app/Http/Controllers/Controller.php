<?php

namespace App\Http\Controllers;

use App\Models\ChatModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller
{
    use AuthorizesRequests;
}
