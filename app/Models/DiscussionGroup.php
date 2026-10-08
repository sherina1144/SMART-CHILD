<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscussionGroup extends Model
{
    protected $fillable = ['title', 'description', 'active_members'];

    public function threads() {
        return $this->hasMany(Thread::class);
    }
}