<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:10',
        ]);

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        // MESSAGGIO DI SUCCESSO
        session()->flash('success', 'Articolo pubblicato con successo ✨');

        // Dopo aver salvato l'articolo...
        return redirect()->route('dashboard')->with('success', 'Articolo pubblicato con successo ✨');

    }
}
