<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
	protected $fillable = ['user_id', 'user_type', 'provider_user_id', 'provider'];

    public function user()
    {
		if ($this->user_type == "paciente")
            return $this->belongsTo(User::class);
		else
            return $this->belongsTo(Medico::class);
    }
}
