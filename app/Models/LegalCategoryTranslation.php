<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class LegalCategoryTranslation extends Model
{

    use HasFactory;



    protected $table = 'legal_categories_translations';




    protected $fillable = [

        'legal_category_id',
        'language_id',
        'title',
        'short_description',
        'description',
        'meta_title',
        'meta_description',
        'created_by',

    ];






    public function category()
    {

        return $this->belongsTo(
            LegalCategoryCms::class,
            'legal_category_id'
        );

    }





    public function language()
    {

        return $this->belongsTo(
            Language::class,
            'language_id'
        );

    }





    public function creator()
    {

        return $this->belongsTo(
            User::class,
            'created_by'
        );

    }


}