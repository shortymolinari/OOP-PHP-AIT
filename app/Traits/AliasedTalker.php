<?php

namespace App\Traits;

require 'vendor/autoload.php';

use App\Traits\A;
use App\Traits\B;

class AliasedTalker {

    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
        B::bigTalk as talk;
        getProtected as public;
    }

}