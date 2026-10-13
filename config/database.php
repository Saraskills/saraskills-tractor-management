<?php

return [
    'default' => env('APP_ENV', 'production') === 'testing' ? 'testing' : 'mysql',
];
