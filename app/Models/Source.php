<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Source extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'sources';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function sourceAnswers()
    {
        return $this->belongsToMany(Answer::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
