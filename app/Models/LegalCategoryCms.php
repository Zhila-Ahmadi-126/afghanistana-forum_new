<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\LegalFileCms;
class LegalCategoryCms extends Model
{

    use HasFactory;


    protected $table = 'legal_categories_cms';



    protected $fillable = [

        'legal_document_id',
        'parent_id',
        'image',
        'pdf_file',
        'status',
        'sort_order',
        'created_by',

    ];





    public function document()
    {

        return $this->belongsTo(
            LegalDocumentCms::class,
            'legal_document_id'
        );

    }





    public function parent()
    {

        return $this->belongsTo(
            LegalCategoryCms::class,
            'parent_id'
        );

    }





    public function children()
    {

        return $this->hasMany(
            LegalCategoryCms::class,
            'parent_id'
        );

    }





    public function translations()
    {

        return $this->hasMany(
            LegalCategoryTranslation::class,
            'legal_category_id'
        );

    }





    public function translation()
    {

        return $this->hasOne(
            LegalCategoryTranslation::class,
            'legal_category_id'
        );

    }





    public function creator()
    {

        return $this->belongsTo(
            User::class,
            'created_by'
        );

    }
public function files()
{
    return $this->hasMany(
        LegalFileCms::class,
        'legal_category_id'
    )
    ->where('status', 'published')
    ->orderBy('sort_order');
}

}