<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_RADIO = [
        '1' => 'Active',
        '0' => 'Inactive',
    ];

    public $table = 'questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'question',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function questionAnswers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
