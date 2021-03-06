<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;
use Tests\Browser\Components\Navbar;

class Login extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/login';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
                // ->assertSee('B' + '3')
                ->assertSee('Login')
                ->assertSee('Register')
                ->assertSee('E-Mail Address')
                ->assertInputValue('#email', '')
                ->assertSee('Password')
                ->assertInputValue('#password','')
                ->assertSeeIn('.btn', 'Login');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@email' => 'input[name=email]',
            '@password' => 'input[name=password]',
        ];
    }
}
