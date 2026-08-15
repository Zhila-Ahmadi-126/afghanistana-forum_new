<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ArchiveMember;

class ArchiveMemberController extends Controller
{
   public function show($id)
{
$member = ArchiveMember::findOrFail($id);


$archives = $member->archives()
    ->with([
        'translations.language'
    ])
    ->orderBy('sort_order', 'asc')
    ->orderBy('id', 'desc')
    ->paginate(10)
    ->withQueryString();

$member->setRelation('archives', $archives);

return view(
    'website.archive-member.show',
    compact('member')
);


}

}