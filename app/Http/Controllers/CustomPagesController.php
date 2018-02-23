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
}
