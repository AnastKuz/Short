<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Link;

class LinksController extends Controller
{
    public function index() {
        $links = Link::all();
        return view('link', ['links'=>$links]);
    }

    /*takes given url and shortens it*/
    public function shorten(Request $request) {
        $random_token = Str::random(6);
        DB::table('links')->insert([
            'original_link'=>$request['original_link'],
            'short_link'=>URL::to('/').'/'.$random_token,
        ]);
        return URL::to('/').'/'.$random_token;
    }

    /*redirects from short link to original one*/
    public function fetchLink($link) {
        $short_link = URL::to('/').'/'. $link;
        $query = DB::table('links')->where('short_link', '=', $short_link);

        if ($query->exists()) {
            return redirect($query->value('original_link'));
        } else {
            return redirect('/link');
        }
    }
}
