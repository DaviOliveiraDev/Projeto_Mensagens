<?php

namespace Tests\Browser;

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
            $browser->maximize()
                    ->visit('/')
                    ->type('email', 'teste@gmail.com')
                    ->type('password', '123123123')
                    ->press('@login')
                    ->pause(1000)
                    ->clickLink('Avisos')
                    ->press('@criarAviso')
                    ->pause(1000)
                    ->keys('@aviso', 'Aviso Teste', '{TAB}', 'teste')
                    ->pause(2000)
                    ->check('user_id[]')
                    ->pause(1000)
                    ->scrollIntoView('@editar')
                    ->press('Cadastrar')
                    ->assertPathIs('/avisos');
        });
    }
}
