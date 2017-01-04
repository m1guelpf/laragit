<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'unread', 'reason', 'title', 'url', 'private', 'type',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'userid');
    }

    public function repo()
    {
        return $this->belongsTo('App\Repo', 'repoid');
    }
}
