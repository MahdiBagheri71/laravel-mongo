<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;

class TestController extends Controller
{
    public function index()
    {
//        activity()->log("Start Create User ");

        $user = User::factory(1)->create();



        dd($user->toArray(),Activity::all()->toArray());
    }
}
