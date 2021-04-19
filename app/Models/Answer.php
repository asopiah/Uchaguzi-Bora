<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Answer extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'answers';

    protected $appends = [
        'photo',
        'file',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'question_id',
        'date',
        'event',
        'country_id',
        'other_place',
        'url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }

   /* public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }*/

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function counties()
    {
        return $this->belongsToMany(County::class);
    }

    public function sub_counties()
    {
        return $this->belongsToMany(SubCounty::class);
    }

    public function constituencies()
    {
        return $this->belongsToMany(Constituency::class);
    }

    public function wards()
    {
        return $this->belongsToMany(Ward::class);
    }

    public function offices()
    {
        return $this->belongsToMany(Office::class);
    }

    public function sources()
    {
        return $this->belongsToMany(Source::class);
    }

    public function getPhotoAttribute()
    {
        $files = $this->getMedia('photo');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function getFileAttribute()
    {
        return $this->getMedia('file');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function respondent()
    {
        return $this->belongsTo(Respondent::class, 'respondent_id');
    }
}
