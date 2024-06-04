<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetching all articles from the database
        $article = Article::all();
        //Pass the data to the view
        return view('article.index')->with('data', $article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'status' => 'required|string',
            'url' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'meta_tag_title' => 'string|max:255',
            'meta_tag_description' => 'string|max:255',
            'category' => 'string|max:255',
            'published_date' => 'required|date',
        ]);

        // Create the article
        Article::create($validated);

        // Redirect to the index page with a success message
        return redirect()->route('article.index')->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'status' => 'required|string',
            'url' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'meta_tag_title' => 'string|max:255',
            'meta_tag_description' => 'string',
            'category' => 'string|max:255',
            'published_date' => 'required|date',
        ]);

        // Find the article by ID
        $article = Article::findOrFail($id);

        // Update the article with validated data
        $article->update($validated);

        // Redirect to the index page with a success message
        return redirect()->route('article.index')->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the article by ID
        $article = Article::findOrFail($id);

        // Delete the article
        $article->delete();

        // Redirect to the index page with a success message
        return redirect()->route('article.index')->with('success', 'Article deleted successfully.');
    }
}
