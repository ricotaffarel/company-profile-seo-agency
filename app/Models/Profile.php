<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_footer_1',
        'title_footer_2',
        'title_footer_3',
        'title_footer_4',
        'desc_title_footer_4',
        'address',
        'city',
        'country',
        'postal_code',
        'phone',
        'email',
        'vision',
        'mission',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'link_map',
        'copy_right',
        'image', //logo
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => asset('/storage/profile/' . $image),
        );
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
