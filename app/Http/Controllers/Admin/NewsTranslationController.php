<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsTranslation;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Helpers\AuditHelper;
use Illuminate\Support\Facades\Auth;
class NewsTranslationController extends Controller
{
    /**
     * Translation Form
     */
   public function form(Request $request, News $news)
{
    $languages = Language::where('status', 'active')
        ->orderBy('sort_order')
        ->orderBy('name')
        ->get();


    $translations = $news->translations()
        ->get()
        ->keyBy('language_code');


    $currentLanguage = $request->get('language', 'fa');


    $translation = $translations[$currentLanguage] ?? null;


    return view('admin.news.translation', compact(
        'news',
        'languages',
        'translations',
        'translation'
    ));
}


    /**
     * Create Or Update Translation
     */
    public function storeOrUpdate(Request $request, News $news)
    {
        $validated = $request->validate([
            'language_code' => 'required|string|max:10',

            'title' => 'required|string|max:255',

            'slug' => 'nullable|string|max:255',

            'summary' => 'nullable|string',

            'content' => 'nullable|string',

            'meta_title' => 'nullable|string|max:255',

            'meta_description' => 'nullable|string',
        ]);


       $translation = NewsTranslation::updateOrCreate(
            [
                'news_id' => $news->id,
                'language_code' => $validated['language_code'],
            ],
            [
                'title' => $validated['title'],
                'slug' => $validated['slug'] ?? null,
                'summary' => $validated['summary'] ?? null,
                'content' => $validated['content'] ?? null,
                'meta_title' => $validated['meta_title'] ?? null,
                'meta_description' => $validated['meta_description'] ?? null,
            ]
        );

        AuditHelper::log(

            Auth::user(),

            'news_translations',

            $translation->wasRecentlyCreated ? 'insert' : 'update',

            'News Translation',

            $translation->id,

            $translation->title,

            $translation->wasRecentlyCreated
                ? 'News translation created.'
                : 'News translation updated.',

            array_keys($validated),

            null,

            $translation->fresh()->toArray()

        );

        return redirect()
            ->route('admin.news.translation.form', $news->id)
            ->with('success', 'Translation saved successfully.');
    }    /**
     * Delete Translation
     */
    public function destroy(News $news, NewsTranslation $translation)
    {
        // جلوگیری از حذف ترجمه خبر دیگر
        if ($translation->news_id != $news->id) {
            abort(404);
        }

            AuditHelper::log(

                Auth::user(),

                'news_translations',

                'delete',

                'News Translation',

                $translation->id,

                $translation->title,

                'News translation deleted.',

                null,

                $translation->toArray(),

                null

            );
        $translation->delete();


        return redirect()
            ->route('admin.news.translation.form', $news->id)
            ->with('success', 'Translation deleted successfully.');
    }

}