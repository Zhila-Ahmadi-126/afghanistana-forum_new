<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable = [
    'name',
    'code',
    'status',
    'sort_order',
];
public function legalSystemTranslations()
{
    return $this->hasMany(LegalSystemTranslation::class);
}
}
