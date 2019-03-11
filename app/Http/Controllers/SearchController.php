<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;


class SearchController extends Controller
{
    public function index(Request $request)
    {
       
    	if($request->has('search'))
    	{
    		$users=User::search($request->search)->get();
    	}
    	else{
    		$users=User::get();
    	}

    	return view('index', compact('users'));
    }

    public function searchtext(Request $request)
    {
    	$search=$request->search;

        $users=Post::search($search)->get();
        foreach($users as $user)
        {
            echo '
               <tr>
                    <td>'.$user->id.'</td>
                    <td>'.$user->name.'</td>
                    <td>'.$user->email.'</td>
                </tr>
            
         ';
        }


    }
}
