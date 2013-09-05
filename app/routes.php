<?php

Route::group(array('prefix' => 'api/v1', 'before' => 'basic.once'), function() {

    Route::resource('cliente', 'ClienteController');

    App::error(function (Exception $e, $code) {
        return Response::json( array('message' => $e->getTrace()), 400);
    });

});