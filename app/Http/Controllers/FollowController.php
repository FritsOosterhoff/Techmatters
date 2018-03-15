<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Follower;
use App\User;
class FollowController extends Controller
{
    //




      public function followUser(Request $request)
      {

        $follow = new Follower();
        $follow->user_id = Auth::id();
        $user = User::find($request->input('followable_id'));

        $user->followers()->save($follow);

        return response()->json($follow, 200);
      }


        public function unfollowUser(Request $request)
        {
          # code...
          $follow = Follower::where('user_id', '=', \Auth::id())->where('followable_id', '=', $request->input('followable_id'))->first();
          $follow->delete();
          return response()->json($follow, 200);

        }
}
