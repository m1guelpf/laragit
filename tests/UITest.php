<?php


class UITest extends TestCase
{
    /**
     * Test the UI.
     *
     * @return void
     */
    public function testUI()
    {
        $this->visit('/')
           ->see('LaraGit')
           ->see('Github')
           ->see('Using')
           ->dontSee('Error')
           ->dontSee('Exception');
        // Login checks
        $this->visit('/')
          ->click('Login')
          ->seePageIs('/login')
          ->dontSee('Error')
          ->dontSee('Exception');
        // Auth checks
        $this->visit('dashboard')
           ->seePageIs('/login')
           ->dontSee('Error')
           ->dontSee('Exception');
    }
}
