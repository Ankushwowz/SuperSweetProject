<?php

namespace App\Http\Controllers;

use App\History;
use DB;
use Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function addhistory(Request $request, $id)
    {
        $userid = Auth::user()->id;
        //dd($userid);
        $actor = History::create([
            'user_id' => $userid,
            'film_id' => $id,
        ]);

        return TRUE;
        
    }
}
