<?php

namespace App\Exceptions;

use Exception;

class UserNotFound extends Exception
{
    protected $message;
    protected $code;

    public function __construct($message = "User Not Found", $code = 404)
    {
        parent::__construct($message, $code);
    }

    // Optional: customize what is returned to the user
    public function render($request)
    {
        return response()->json([
            'error'   => true,
            'message' => $this->getMessage(),
        ], 404);
    }
}
