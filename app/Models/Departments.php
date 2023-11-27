<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Laravel\Scout\Searchable;

class Departments extends Model
{
    public $table = 'm_departments';
    use HasFactory;
    use HasUuids;
    use Searchable;
    protected $fillable = ['id', 'name', 'unit_id', 'slug'];

    public function units()
    {
        return $this->belongsTo(Units::class, 'unit_id', 'id');
    }
    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'unit_id' => $this->unit_id,
        ];
    }
}
