<?php

namespace App\Models;

use App\Models\Scopes\CreatedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'priorite', 'description', 'status', 'echeance'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    protected $casts = [
        'echeance' => 'date',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new CreatedScope);
    }
}
