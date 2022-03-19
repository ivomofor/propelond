<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname', 'given_name', 'dob', 'profession',
        'unique_identification_number', 'place_of_pick',
        'doc_type', 'status', 'description',
        'image_path', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
