<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name','adress','real_adress','coord_x','coord_y','cui','nrc','phone','email','program','motto','about'];

	public function photos () {
		return $this->hasMany('\App\Gallery', 'company_id')->where('gallery', 'company');
	}
	
	public function services_photos () {
		return $this->hasMany('\App\Gallery', 'company_id')->where('gallery', 'services');
	}
	
	public function services () {
		return $this->hasMany('\App\Service', 'company_id');
	}
	
	public function rules () {
		return $this->hasMany('\App\Rule', 'company_id');
	}
}