<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    /**
 * The attributes that aren't mass assignable.
 *
 * @var array
 */
    //protected $guarded = [];

    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];


    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
    protected $fillable = [];
}
