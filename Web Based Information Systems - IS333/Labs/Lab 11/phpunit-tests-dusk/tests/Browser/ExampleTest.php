<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ExampleTest extends DuskTestCase
{
    public function test_example(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8010')
                // ->waitForText('Let\'s get started')
                ->assertSee('Let\'s get started');
        });
    }
}