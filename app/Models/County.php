<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class County extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'counties';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'county_code',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function countyConstituencies()
    {
        return $this->hasMany(Constituency::class, 'county_id', 'id');
    }

    public function countyWards()
    {
        return $this->hasMany(Ward::class, 'county_id', 'id');
    }

    public function countyAnswers()
    {
        return $this->belongsToMany(Answer::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
