<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;

class Pin extends Model
{
    use HasFactory, Likeable;

    const STATUS_PUBLISH = 'yes';
    const STATUS_DRAFT = 'no';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image',
        'is_publish'
    ];

    protected $casts = [
        'is_publish' => 'boolean',
    ];

    public function toPublish()
    {
        $this->update(['is_publish' => 1]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeDraft($query)
    {
        return $query->whereIsPublish(0);
    }

    public function scopePublish($query)
    {
        return $query->whereIsPublish(1);
    }

    public function setImageAttribute($value)
    {
        if (!is_string($value) && is_object($value)) {
            $filename = Str::random(20) . "." . $value->getClientOriginalExtension();
            $value = \Storage::disk('pin')->put($filename, \File::get($value)) ? $filename : 'default.png';
        }

        $this->attributes['image'] = $value;
    }

    public function getImageAttribute($value)
    {
        return url('storage/pin/' . $value);
    }

    public function getIsPublishAttribute($value)
    {
        return $value == 1 ? self::STATUS_PUBLISH : self::STATUS_DRAFT;
    }
}
