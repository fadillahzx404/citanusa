<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Laravel\Scout\Searchable;

class Units extends Model
{
    public $table = 'm_units';
    use HasFactory;
    use HasUuids;
    use Searchable;
    protected $fillable = ['id', 'name', 'slug'];

    public function departments()
    {
        return $this->hasMany(Departments::class, 'unit_id');
    }

    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }
}
