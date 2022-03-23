<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Args extends Model
{
    use HasFactory;

    /**
    * table args
    * @var string
    */
    protected $table = 'args';

    /** 
    * guarded
    */
    protected $guarded = [];

    /**
    * hasMany
    */
    public function args()
    {
    	return $this->hasMany(Args::class, 'parent_id', 'id');
    }
    
    /**
    * children
    */
    public function childsArgs()
	{
		return $this->hasMany(Args::class, 'parent_id')->with('args');
	}
}
