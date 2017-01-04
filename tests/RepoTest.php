<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotificationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function notificationsTest()
    {
        $notification = factory(App\Notification::class)->create();
        $repo = factory(App\Repo::class)->create();
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
             ->visit('dashboard')
             ->see($repo->full_name)
             ->see($notification->title)
             ->dontSee('Error')
             ->dontSee('Exception')
             ->click($notification->title)
             ->seePageIs('/notification//'.$notification->id);
      }
    }
