<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalFileCms extends Model
{

    use HasFactory;


    protected $table = 'legal_files_cms';



    protected $fillable = [

        'legal_category_id',

        'image',

        'pdf_file',

        'file_url',

        'status',

        'sort_order',

        'created_by',

    ];





    /*
    |--------------------------------------------------------------------------
    | Category
    |--------------------------------------------------------------------------
    */


    public function category()
    {

        return $this->belongsTo(

            LegalCategoryCms::class,

            'legal_category_id'

        );

    }





    /*
    |--------------------------------------------------------------------------
    | Translations
    |--------------------------------------------------------------------------
    */


    public function translations()
    {

        return $this->hasMany(

            LegalFileTranslation::class,

            'legal_file_id'

        );

    }





    /*
    |--------------------------------------------------------------------------
    | Creator
    |--------------------------------------------------------------------------
    */


    public function creator()
    {

        return $this->belongsTo(

            User::class,

            'created_by'

        );

    }





    /*
    |--------------------------------------------------------------------------
    | Default Translation
    |--------------------------------------------------------------------------
    */


    public function translation()
    {

        return $this->hasOne(

            LegalFileTranslation::class,

            'legal_file_id'

        )->whereHas('language', function($q){


            $q->where('code','en');


        });

    }



}