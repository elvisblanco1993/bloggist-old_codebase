<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article ;

class ArticleController extends Controller
{
    //update blog entry
    public function update(Request $rt,$id=0)
    {
        try{
            $article = Article::findOrFail($id);
            if($article === null){
                return redirect()->back()->with([
                    'status'    => 'error',
                    'message'   => 'Invalid Blog'
                ]);
            }
            $validatedData = $rt->validate([
                'title' => 'required',
                'password' => 'required',
                'slug' => 'required',
                'body' => 'required',
            ]);
            $article->where('id',$id)->update($validatedData);
            return redirect()->back()->with([
                'status'    => 'success',
                'message'   => 'Blog Updated'
            ]);
        }catch(Exception $e){
            return redirect()->back()->with([
                'status'    => 'error',
                'message'   => $e->getMessageBag()
            ]);
        }
    }
    public function updateRating(Request $request)
    {
        request()->validate(['rate' => 'required']);

        $post = Article::find($request->id);


        $rating = new \willvincent\Rateable\Rating;

        $rating->rating = $request->rate;

        $rating->user_id = auth()->user()->id;


        $post->ratings()->save($rating);


        return redirect()->route("articles");

    }


}
