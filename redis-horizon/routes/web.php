<?php

use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Jobs\TestJob;


Route::get('/', function () {
    // Redis::set('name', 'rene');
    // $name = Redis::get('name');

    // dd($name);


    return view('welcome');
});

Route::post('/', function () {
    Mail::to('test@test.com')->queue(new OrderShipped);

    return redirect('/');
});


Route::get('/jobs/{jobs}/{user}', function ($jobs, $user) {
    $user = User::find($user);

    for ($i = 0; $i <= $jobs; $i++) {
        TestJob::dispatch($user);
    }

    return redirect('/');
});
