<?php

namespace Middleware;

class ifLogin
{
    public function handler() {
        global $auth;
        if ($auth->isLoggedIn()) {
            return true;
        } else {
            return redirect('/');
        }
    }
}