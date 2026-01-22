<?php

use Illuminate\Foundation\Application;

var_dump("Booting...");

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
    )
    ->create();
