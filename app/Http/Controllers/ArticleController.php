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


    public function show(Article $article)
{
    // Questo comando passa la variabile $article alla vista 'show'
    return view('show', compact('article'));
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




    // 1. Mostra il form di modifica precompilato con i vecchi dati
public function edit(Article $article)
{
    return view('articles.edit', compact('article'));
}

// 2. Salva le modifiche nel database
public function update(Request $request, Article $article)
{
    // Validazione semplice dei dati
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    // Aggiorna l'articolo con i nuovi dati del form
    $article->update([
        'title' => $request->title,
        'content' => $request->content,
    ]);

    // Torna alla dashboard con un messaggio verde di successo
    return redirect()->route('dashboard')->with('success', 'Articolo modificato con successo!');
}



    public function destroy(Article $article)
{
    $article->delete(); // Cancella l'articolo dal database
    
    // Torna alla dashboard mostrando un messaggio di successo verde
    return redirect()->route('dashboard')->with('success', 'Articolo eliminato con successo!');
}


}
