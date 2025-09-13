<?php

namespace App\Exceptions;

use Exception;

class InvalidCredential extends Exception
{
    protected $message;
    protected $code;

    public function __construct($message = "Invalid Credential", $code = 403)
    {
        parent::__construct($message, $code);
    }

    // Optional: customize what is returned to the user
    public function render($request)
    {
        return response()->json([
            'error'   => true,
            'message' => $this->getMessage(),
        ], 403);
    }
}
