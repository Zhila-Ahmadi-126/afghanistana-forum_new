<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveMember extends Model
{
    protected $table = 'archive_members';

    protected $fillable = [
        'name',
        'surname',
        'section',
        'position',
        'country',
        'photo',
        'phone',
        'email',
        'short_description',
        'description',
    ];
    public function archives()
{
    return $this->hasMany(ArchiveCms::class, 'archive_member_id');
}
}