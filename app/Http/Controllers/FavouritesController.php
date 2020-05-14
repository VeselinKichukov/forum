<?php

namespace App\Http\Controllers;

use App\Favourite;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavouritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Reply $reply)
    {
        $reply->favourite();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Reply $reply
     * @return void
     */
    public function destroy(Reply $reply)
    {
        $reply->unfavourite();
    }
}
