<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testShouldSeePasswordValidationFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'Usuario')
                    ->type('email', 'usuarioee@teste.com')
                    ->type('password', '123123123')
                    ->type('password_confirmation', '123123123')
                    ->press('Register')
                    ->assertPathIs('/home');
        });
    }

}

