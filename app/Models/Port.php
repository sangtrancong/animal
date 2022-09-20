<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Port extends Model
{
    use Sluggable;
    protected $table="port";
    protected $fillable = [
        'id', 'title','short_content','content','image','status','category_id','created_at','updated_at'];
    use HasFactory;
    public function category(){
        return $this->hasOne('App\Models\Category','id','category_id');

    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function visits()
    {
        return visits($this)->relation();
    }

}
