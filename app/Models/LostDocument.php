<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname', 'lname', 'dob', 'profession', 
        'doc_number', 'email', 'phone_number', 
        'country', 'city', 'description', 'image_path', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
