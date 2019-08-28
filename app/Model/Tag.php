<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Tag extends Model
{
    //
    protected $guarded=[];
    public static function getAll()
    {
        $tags = DB::table('tags')->get();
        return $tags;
    }
}
