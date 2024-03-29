<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Calendar extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function links() : HasMany
    {
        return $this->hasMany(CalendarLink::class);
    }
}
