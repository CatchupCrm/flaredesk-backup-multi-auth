<?php

Route::get('/staff/home', function () {
echo "staff home";
    dd(Auth::guard('staff')->user());
});

