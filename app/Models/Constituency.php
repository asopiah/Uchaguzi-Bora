<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Constituency extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'constituencies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'county_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function constituencyWards()
    {
        return $this->hasMany(Ward::class, 'constituency_id', 'id');
    }

    public function constituencyAnswers()
    {
        return $this->belongsToMany(Answer::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
