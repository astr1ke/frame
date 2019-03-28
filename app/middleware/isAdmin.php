<?php

namespace Middleware;

class isAdmin
{

    public function handler() {
        global $auth;
        if ($auth->hasRole(\Delight\Auth\Role::ADMIN)) {
            return true;
        } else {
            return redirect('/');
        }
    }
}