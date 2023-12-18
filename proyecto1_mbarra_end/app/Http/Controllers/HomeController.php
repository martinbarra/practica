<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cancione;
use App\Models\Like;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        if ($searchTerm) {
            $cancionesFiltro = Cancione::withCount('likes')
                ->where('nombre', 'like', "%$searchTerm%")
                ->orWhere('album', 'like', "%$searchTerm%")
                ->orderByDesc('likes_count')
                ->paginate();
        } else {
            $cancionesFiltro = null;
        }

        $canciones = Cancione::withCount('likes')->orderByDesc('likes_count')->paginate();

        return view('home', compact('canciones', 'cancionesFiltro', 'searchTerm'));
    }


    public function like($id){

      if (Auth::check()) {
        $cancione_id = $id;
        $user_id = Auth::user()->id;


    
      $like = new like();
      $like->cancione_id = $cancione_id;
      $like->user_id = $user_id;
      $like->like = 1;
      $like->save();
      return back();
    }
}
public function dislike($id) {
  if (Auth::check()) {
      $cancione_id = $id;
      $user_id = Auth::user()->id;

      // Buscar el like del usuario actual para esta canción
      $like = Like::where('cancione_id', $cancione_id)
                  ->where('user_id', $user_id)
                  ->first();

      // Verificar si se encontró un like y eliminarlo
      if ($like) {
          $like->delete();
      }

      return back();
  }
}




}