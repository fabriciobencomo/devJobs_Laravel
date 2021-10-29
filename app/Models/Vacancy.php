<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'skills', 'description', 'category_id', 'experience_id', 'location_id', 'wage_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
    
    public function wage()
    {
        return $this->belongsTo(Wage::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function candidates(){
        return $this->hasMany(Candidate::class);
    }


}
