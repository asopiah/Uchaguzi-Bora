<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ward extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'wards';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'county_id',
        'constituency_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function wardAnswers()
    {
        return $this->belongsToMany(Answer::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }

    public function constituency()
    {
        return $this->belongsTo(Constituency::class, 'constituency_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
