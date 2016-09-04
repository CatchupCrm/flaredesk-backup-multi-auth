<?php

Route::get('/staff/home', function () {
    dd(Auth::guard('staff')->user());
});

