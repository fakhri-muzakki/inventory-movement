<?php

namespace App\Filament\Auth;

use Filament\Auth\Pages\Login as BaseLogin;

class Login extends BaseLogin
{
    protected string $view = 'filament.auth.login';

    public function hydrate(): void
    {
        if (! $this->form->getState('email')) {
            $this->form->fill([
                'email' => 'admin@gmail.com',
                'password' => 'password',
            ]);
        }
    }
}
