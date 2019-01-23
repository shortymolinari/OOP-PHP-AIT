<?php

namespace App\Traits;

trait B {
    public function smallTalk() {
        return 'b';
    }
    public function bigTalk() {
        return 'B';
    }

    protected function getProtected()
    {
        return 'into the protected method';
    }
}