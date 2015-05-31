<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Education;
use Illuminate\Database\Eloquent\SoftDeletes;
class Module extends Model {

	 use SoftDeletes;

    protected $dates = ['deleted_at'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'modules';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'module_code', 'description', 'school_year', 'school_period'];

	public function educations()
    {
        return $this->belongsToMany('App\Education');
    }
}