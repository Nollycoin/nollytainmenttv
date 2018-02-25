<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class CustomPagesController extends Controller
{
    public function savePage(Request $request)
    {
        $this->validate($request, [
            'page_name' => 'required',
            'page_content' => 'required|min:10' //TODO:: confirm
        ]);


        $page = new Page();

        $page->page_name = $request->get('page_name');
        $page->page_content = $request->get('page_content');

        $page->save();

        return redirect(route('_pages'));
    }

    public function updatePage(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        if ($request->has('page_name'))
            $page->page_name = $request->get('page_name');

        if ($request->has('page_content'))
            $page->page_content = $request->get('page_content');

        $page->update();

        return redirect(route('_edit_page', ['id' => $page->id]))->with('success', 'Page Updated successfully');
    }

    public function deletePage($id)
    {
        $page = Page::findOrFail($id);

        $page->delete();

        return 'true';
    }
}
