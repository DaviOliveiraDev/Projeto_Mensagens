<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class excluirAviso extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExcluirAviso()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->type('email', 'teste@gmail.com')
            ->type('password', '123123123')
            ->press('@login')
            ->clickLink('Avisos')
            ->clickLink('Excluir')
            ->assertPathIs('/avisos');
        });
    }
}
