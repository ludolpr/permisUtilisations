<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $fillable = ["id_sector", "name_sector", "description_sector"];
    public function sector()
    {
        return $this->hasMany(Lisence::class); // 1-n
    }
}
