<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lisence extends Model
{
    use HasFactory;
    protected $fillable = ["id_lisence", "type_lisence", "description_lisence", "id_sector", "id_user"];
    public function sector()
    {
        return $this->belongsTo(Sector::class); // 1-1
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
