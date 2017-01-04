<?php


class AuthTest extends TestCase
{
    /**
     * Test Auth.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
           ->visit('dashboard')
           ->seePageIs('/notifications')
           ->dontSee('Error')
           ->dontSee('Exception');
    }
}
