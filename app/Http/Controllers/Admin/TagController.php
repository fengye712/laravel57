<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagPost;
use Illuminate\Http\Request;
use App\Model\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function __construct()
    {

    }

    //
    public function index(Tag $model)
    {
        $tags = Tag::getAll();
        return view('admin.tag.index', ['tags' => $tags]);
    }

    public function show()
    {

    }
    public function create()
    {
        return view('admin.tag.create');
    }
    public function store(TagPost $request,Tag $model)
    {
        $model->create($request->all());
        return redirect('/admin/tagindex');
    }
    public function edit()
    {

    }
}
