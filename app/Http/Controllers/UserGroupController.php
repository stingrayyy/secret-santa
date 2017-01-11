<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGroup as UserGroup;

class UserGroupController extends Controller
{
    
    /**
     * Checks for a unique hash and displays to the user who their recipient is
     * @param Request $request System request params
     * @return Returns the view for this page
     */
    public function View(Request $request)
    {
    	if(!isset($request->hash))
    	{
    		return view('usergroups.view', ['hash_found' => false]);
    	}
    	else
    	{
    		$user_group = UserGroup::where('visit_hash', $request->hash)->first();

    		if(empty($user_group))
    		{
    			return view('usergroups.view', ['hash_found' => false]);
    		}
    		else
    		{
				$santa = $user_group->santa->name;
	    		$recipient = $user_group->present_to_user->name;
    		}
    	}


    	return view('usergroups.view', [
    		'santa' => $santa,
    		'recipient' => $recipient,
    		'hash_found' => true
    	]);
    }
}
