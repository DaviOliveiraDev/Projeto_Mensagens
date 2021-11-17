<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class Lido extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLido()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/meusAvisos')
                    ->type('email', 'josee2@dusk.com')
                    ->type('password', '123123123')
                    ->press('@login')
                    ->press('Ler')
                    ->pause(3000)
                    ->press('@lido')
                    ->assertPathIs('/meusAvisos');
        });
    }
}
