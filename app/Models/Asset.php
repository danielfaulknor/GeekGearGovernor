<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\CrudTrait;
use Venturecraft\Revisionable\RevisionableTrait;

class Asset extends Model
{
    use CrudTrait, RevisionableTrait;
    use SoftDeletes;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

	protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
 	protected $casts = [
        'photos' => 'array'
    ];

    /*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	public function getUrlWithLink() {
		if (is_null($this->url)) return "No Link";
        return '<a href="'.url($this->url).'" target="_blank">Link</a>';
    }

    /*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
	public function category() 
	{
		return $this->hasOne(\App\Models\Category::class, 'id', 'category_id');
	}
    /*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
	public function setPhotosAttribute($value)
    {
        $attribute_name = "photos";
        $disk = "uploads";
        $destination_path = "assets";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
