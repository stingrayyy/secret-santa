<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;

class SantaGroupController extends Controller
{
    /**
     * Creates a new secret santa group and sends emails to all participants
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
    	/**
         * TODO add validation rules for each form field:
         * name: required,alpha and some symbols
         * email: required, email, unique across all email fields
         */
        /*$this->validate($request, [
    		'primary_name' => 'required',
    		'primary_email' => 'required|email',
    	]);*/

    	$users = array();

        // TODO change primary name/email to participant 01, increment other fields
        // TODO loop through participant fields to allow for a theoretically unlimited number of participants
        $users[] = array('name' => $request['primary_name'], 'email' => $request['primary_email']);

    	if($this->isUserSet($request['participant_name_01'], $request['participant_email_01']))
    		$users[] = array('name' => $request['participant_name_01'], 'email' => $request['participant_email_01']);

    	if($this->isUserSet($request['participant_name_02'], $request['participant_email_02']))
    		$users[] = array('name' => $request['participant_name_02'], 'email' => $request['participant_email_02']);

    	if($this->isUserSet($request['participant_name_03'], $request['participant_email_03']))
    		$users[] = array('name' => $request['participant_name_03'], 'email' => $request['participant_email_03']);

    	if($this->isUserSet($request['participant_name_04'], $request['participant_email_04']))
    		$users[] = array('name' => $request['participant_name_04'], 'email' => $request['participant_email_04']);

    	if($this->isUserSet($request['participant_name_05'], $request['participant_email_05']))
    		$users[] = array('name' => $request['participant_name_05'], 'email' => $request['participant_email_05']);

    	if($this->isUserSet($request['participant_name_06'], $request['participant_email_06']))
    		$users[] = array('name' => $request['participant_name_06'], 'email' => $request['participant_email_06']);

    	// How many users are there?
    	$total_users = count($users);
    	$indexes = array();

    	for($index = 0; $index < $total_users; $index++)
    	{
    		$unique_rand_found = false;

    		while(!$unique_rand_found)
    		{
    			$number = rand(0, $total_users - 1);

    			if(!(in_array($number, $indexes) || $number == $index))
    				$unique_rand_found = true; 
    		}

    		$indexes[] = $number;
    	}

        // Set up the group inside a transaction
        $hash = DB::transaction(function() use($total_users, $users, $indexes) 
        {
            // Loop through each record and add a new user
            for($index = 0; $index < $total_users; $index++)
            {
                // Check for an email first and load the user from the database
                $user = \App\User::where('email', $users[$index]['email'])->first();

                // User doesn't exist, 
                if(empty($user))
                {
                    $user = new \App\User;
                    $user->name = $users[$index]['name'];
                    $user->email = $users[$index]['email'];
                    $user->password = sha1(date('Y-m-d H:m:s'));

                    $user->save();
                }

                $users[$index]['db_id'] = $user->id;
            }

            // Set up a new santa group
    		$santa_group = new \App\SantaGroup;
    		$santa_group->group_name = $users[0]['name'] . '\'s Group';
            $santa_group->group_owner_id = $users[0]['db_id'];
    		$santa_group->save();

            // Get the application's root uri - to be used for links in the emails
            $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

            // Link users together in this group and send the santa user an email
            for($index = 0; $index < $total_users; $index++)
            {
                $user_group = new \App\UserGroup;

                $user_group->group_id = $santa_group->id;
                $user_group->user_id = $users[$index]['db_id'];
                $user_group->present_to_user_id = $users[$indexes[$index]]['db_id'];

                // Unique hash for users to review their match at a later date
                $hash = sha1($santa_group->id . $users[$index]['db_id'] . $users[$indexes[$index]]['db_id'] . date('Y-m-d H:m:s'));
                $user_group->visit_hash = $hash;
                $user_group->save();

                if($index === 0) $primary_user_hash = $hash;

                // Prepare and send an email to the current user with their unique hash
                $mail_subject = "You're a Secret Santa";
                $mail_message = "Hey " . $users[$index]['name'] . ",\n\n
                You've been added to " . $santa_group->owner->name . "'s secret santa group.\n\n
                Please click the link below to see who you've been matched with:\n\n"
                . $root . 'view/' . $user_group->visit_hash . "\n\n
                Thanks,\n
                Lee";

                @mail($users[$index]['email'], $mail_subject, $mail_message);
            }

            return $primary_user_hash;
    	});

        // On success redirect to the view page for this user
        return redirect()->route('view', ['hash' => $hash]);
    }

    /**
     * Checks if a user is available for adding to the pool
     * @param  String  $name  Participant's name
     * @param  String  $email Participant's email address
     * @return boolean        true if the user is fully set
     */
    private function isUserSet(String $name, String $email)
    {
    	if(!empty($name) && !empty($email))
    	{
    		return true;
    	}

    	return false;
    }
}
