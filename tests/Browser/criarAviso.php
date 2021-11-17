<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class criarAviso extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCriarAviso()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->type('email', 'teste@gmail.com')
            ->type('password', '123123123')
            ->press('@login')
            ->clickLink('Avisos')
            ->press('@criarAviso')
            ->type('aviso', 'Aviso Teste')
            ->check('user_id')
            ->press('Cadastrar')
            ->pause(5000)
            ->assertPathIs('/avisos');
        });
    }
}
