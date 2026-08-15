<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalFileTranslation extends Model
{

    use HasFactory;



    protected $table = 'legal_files_translations';





    protected $fillable = [

        'legal_file_id',

        'language_id',

        'title',

        'short_description',

        'description',

        'meta_title',

        'meta_description',

        'created_by',

    ];







    /*
    |--------------------------------------------------------------------------
    | Legal File
    |--------------------------------------------------------------------------
    */


    public function file()
    {

        return $this->belongsTo(

            LegalFileCms::class,

            'legal_file_id'

        );

    }







    /*
    |--------------------------------------------------------------------------
    | Language
    |--------------------------------------------------------------------------
    */


    public function language()
    {

        return $this->belongsTo(

            Language::class,

            'language_id'

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



}