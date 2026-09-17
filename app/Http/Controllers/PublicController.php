<?php

namespace App\Http\Controllers;
use App\Models\Article; // 💡 Assicurati che questa riga sia presente in alto nel file, sotto il namespace!

use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function home () {
    return view('welcome');
}



public function dashboard()
{
    // 1. Recuperiamo tutti gli articoli dal database
    $articles = Article::all(); 

    // 2. Passiamo gli articoli alla vista della dashboard usando compact()
    return view('dashboard', compact('articles'));
}



}
