<?php

Route::group(array('prefix' => 'api/v1', 'before' => 'basic.once'), function()
{
    Route::resource('cliente', 'ClienteController');
});