<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model {

	 use SoftDeletes;

    protected $dates = ['deleted_at'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'educations';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

	public function modules()
    {
        return $this->belongsToMany('App\Module');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
