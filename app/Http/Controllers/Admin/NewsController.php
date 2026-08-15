<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\AuditHelper;
use App\Models\News;
use App\Models\NewsTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    

    // =========================
    // INDEX
    // =========================

    public function index(Request $request)
    {

        $language = $request->language ?? 'en';

        $news = News::query()

            ->leftJoin('news_translations', function ($join) use ($language) {

                $join->on(
                    'news.id',
                    '=',
                    'news_translations.news_id'
                );

                $join->where(
                    'news_translations.language_code',
                    $language
                );

            })

            ->select(

                'news.*',

                'news_translations.title as translated_title'

            )

            ->when($request->search, function ($query) use ($request) {

                $query->where(

                    'news_translations.title',

                    'like',

                    '%'.$request->search.'%'

                );

            })

            ->when($request->status, function ($query) use ($request) {

                $query->where(

                    'news.status',

                    $request->status

                );

            })

            ->when($request->media_type, function ($query) use ($request) {

                $query->where(

                    'news.media_type',

                    $request->media_type

                );

            })

            ->orderByDesc('news.created_at')

            ->paginate(10)

            ->withQueryString();

        return view(

            'admin.news.index',

            compact('news')

        );

    }


    // =========================
    // CREATE PAGE
    // =========================

    public function create()
    {

        return view('admin.news.create');

    }


    // =========================
    // STORE
    // =========================

    public function store(Request $request)
    {

        $request->validate([

          

            'status' => 'required',

            'media_type' => 'required'

        ]);
        $imageName = null;

        if ($request->hasFile('featured_image')) {

            $image = $request->file('featured_image');

            $imageName = time() . '_' . $image->getClientOriginalName();

           $path = $image->store('news', 'public');

        }

        $news = News::create([

          
           

            'created_by' => Auth::id(),

            'status' => $request->status,

            'media_type' => $request->media_type,

           'featured_image' => $path,

            'media_url' => $request->media_url,

            'youtube_url' => $request->youtube_url,

            'source_name' => $request->source_name,

            'source_url' => $request->source_url,

            'published_at' => $request->published_at

        ]);

        AuditHelper::log(

            Auth::user(),

            'news',

            'insert',

            'News',

            $news->id,

            $news->title,

            'New news created.'

        );        
        // =========================
        // SAVE DEFAULT TRANSLATION
        // =========================

        NewsTranslation::create([

            'news_id' => $news->id,

            'language_code' => 'en',

          

        ]);

        return redirect()

            ->route('admin.news.index')

            ->with('success','News created successfully.');

    }


    // =========================
    // EDIT PAGE
    // =========================

    public function edit($id)
    {

        $news = News::findOrFail($id);

        return view(

            'admin.news.edit',

            compact('news')

        );

    }


    // =========================
    // UPDATE
    // =========================

   public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required',
        'media_type' => 'required',
    ]);

    $news = News::findOrFail($id);

    $oldData = $news->toArray();

    // اگر عکس جدید انتخاب نشده، همان عکس قبلی حفظ شود
    $imagePath = $news->featured_image;

    if ($request->hasFile('featured_image')) {

        // حذف عکس قبلی از Storage
        if ($news->featured_image) {
            Storage::disk('public')->delete($news->featured_image);
        }

        // ذخیره عکس جدید داخل:
        // storage/app/public/news
        $imagePath = $request->file('featured_image')
            ->store('news', 'public');
    }

    $news->update([
        'status' => $request->status,
        'media_type' => $request->media_type,
        'featured_image' => $imagePath,
        'media_url' => $request->media_url,
        'youtube_url' => $request->youtube_url,
        'source_name' => $request->source_name,
        'source_url' => $request->source_url,
        'published_at' => $request->published_at,
    ]);

    NewsTranslation::updateOrCreate(
        [
            'news_id' => $news->id,
            'language_code' => 'en',
        ],
        []
    );

    AuditHelper::log(
        Auth::user(),
        'news',
        'update',
        'News',
        $news->id,
        $news->title,
        'News updated.',
        array_keys($request->all()),
        $oldData,
        $news->fresh()->toArray()
    );

    return redirect()
        ->route('admin.news.index')
        ->with('success', 'News updated successfully.');
}

// =========================
// DELETE
// =========================
public function destroy(News $news)
{
    // حذف عکس از Storage
    if ($news->featured_image) {
        Storage::disk('public')->delete($news->featured_image);
    }

    AuditHelper::log(
        Auth::user(),
        'news',
        'delete',
        'News',
        $news->id,
        $news->title,
        'News deleted.'
    );

    // حذف ترجمه‌ها
    $news->translations()->delete();

    // حذف خود News
    $news->delete();

    return redirect()
        ->route('admin.news.index')
        ->with('success', 'News deleted successfully.');
}
    // =========================
    // AJAX SEARCH
    // =========================

    public function ajax(Request $request)
    {

        $language = $request->language ?? 'en';

        $news = News::query()

            ->leftJoin('news_translations', function ($join) use ($language) {

                $join->on(

                    'news.id',

                    '=',

                    'news_translations.news_id'

                );

                $join->where(

                    'news_translations.language_code',

                    $language

                );

            })

            ->select(

                'news.*',

                'news_translations.title as translated_title'

            )

            ->when($request->search, function ($query) use ($request) {

                $query->where(

                    'news_translations.title',

                    'like',

                    '%'.$request->search.'%'

                );

            })

            ->orderByDesc('news.created_at')

            ->limit(20)

            ->get();

        return response()->json($news);

    }

}