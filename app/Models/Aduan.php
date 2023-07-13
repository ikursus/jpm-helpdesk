<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    // Maklumat nama table yang perlu dihubungi
    // Jika tidak mengikut ejaan dalam plural untuk nama table
    protected $table = 'aduan';

    protected $fillable = [
        'title',
        'description',
        'lampiran',
        'category',
        'user_id'
    ];

    // Method / Function untuk relation user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
