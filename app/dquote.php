<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class dquote extends Model {

	protected $table = 'dquote';
	public $timestamps = false;

	public function sat()
	{
		return $this->belongsTo('\App\satuan','satuan','idsatuan');
	}
}
