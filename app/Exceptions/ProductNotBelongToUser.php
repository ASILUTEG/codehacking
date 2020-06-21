<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongToUser extends Exception
{
    //
    public function render()
    {
        return ['ERROR' => 'product Not Belong To user'];
        # code...
    }
}
