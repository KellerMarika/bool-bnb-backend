<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',

        'title',
        'address',
        'latitude',
        'longitude',
        'cover_img',
        'description',
        'rooms_qty',
        'beds_qty',
        'bathrooms_qty',
        'mq',
        'daily_price',
        'visible',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function views(){
        return $this->hasMany(View::class);
    }
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }

    public function subscriptions(){
        return $this->belongsToMany(Subscription::class)->withPivot("expiration_date")->withTimestamps();
    }
}
