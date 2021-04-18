<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Respondent extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const GANDER_RADIO = [
        'F' => 'Female',
        'M' => 'Male',
    ];

    public $table = 'respondents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'age',
        'gander',
        'respondentcategory_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function respondentcategory()
    {
        return $this->belongsTo(RespondentCategory::class, 'respondentcategory_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
