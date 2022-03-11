<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'user_id', 'post_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function report()
    {
        return $this->hasMany(report::class);
    }
}
