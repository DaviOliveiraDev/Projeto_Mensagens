<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class editarAviso extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('email', 'teste@gmail.com')
                    ->type('password', '123123123')
                    ->press('@login')
                    ->clickLink('Avisos')
                    ->clickLink('Editar')
                    ->clear('aviso')
                    ->type('aviso', 'asdasdaasd')
                    ->pause(2000)
                    ->press('@editar')
                    ->assertPathIs('/avisos');
        });
    }
}
