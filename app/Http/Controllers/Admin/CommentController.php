<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\AuditHelper;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // =========================
    // INDEX
    // =========================

    public function index(Request $request)
    {
        $comments = Comment::query()

            ->when($request->search, function ($query) use ($request) {

                $query->where(function ($q) use ($request) {

                    $q->where('name', 'like', '%' . $request->search . '%')
                      ->orWhere('email', 'like', '%' . $request->search . '%')
                      ->orWhere('message', 'like', '%' . $request->search . '%');

                });

            })

            ->when($request->status, function ($query) use ($request) {

                $query->where(
                    'status',
                    $request->status
                );

            })

            ->orderByDesc('created_at')

            ->paginate(10)

            ->withQueryString();

        return view(
            'admin.comments.index',
            compact('comments')
        );
    }
// =========================
// EDIT
// =========================

public function edit($id)
{
    $comment = Comment::findOrFail($id);

    return view(
        'admin.comments.edit',
        compact('comment')
    );
}
// =========================
// UPDATE
// =========================

public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,approved,rejected',
    ]);

    $comment = Comment::findOrFail($id);

    $oldData = $comment->toArray();

    $comment->update([
        'status' => $request->status,
    ]);

    AuditHelper::log(
        Auth::user(),
        'comments',
        'update',
        'Comment',
        $comment->id,
        $comment->name,
        'Comment status updated.',
        ['status'],
        $oldData,
        $comment->fresh()->toArray()
    );

    return redirect()
        ->route('admin.comments.index')
        ->with(
            'success',
            'Comment status updated successfully.'
        );
}

    // =========================
    // DELETE
    // =========================

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        AuditHelper::log(
            Auth::user(),
            'comments',
            'delete',
            'Comment',
            $comment->id,
            $comment->name,
            'Comment deleted.'
        );

        $comment->delete();

        return redirect()
            ->route('admin.comments.index')
            ->with(
                'success',
                'Comment deleted successfully.'
            );
    }
}