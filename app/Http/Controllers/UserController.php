<?php

namespace App\Http\Controllers;

use App\Jobs\User\CreateAnonomousUser;
use App\Jobs\Journey\StartJourney;
use App\Http\Controllers\Controller;
use App\Models\{Tree, User};
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function onboard(Tree $tree, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email'  => 'required|email|unique:users,email',
            'accept' => 'required|accepted'
       ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->all());
        }

        // Create Anonomous user
        $user = $this->dispatch(new CreateAnonomousUser($request->get('email')));

        $journey = $this->dispatch(new StartJourney($tree, $user));  

        return redirect("journeys/{$journey->getRouteKey()}");
    }

    public function getByEmail(Tree $tree, Request $request)
    {
    	$validator = \Validator::make($request->all(), [
			'email'  => 'required|email'
       ]);

        if ($validator->fails()) {
		    return redirect()->back()->withErrors($validator->errors()->all());
        }

        // Create Anonomous user
        $user = User::where("email", $request->get('email'))->first();

        $journey = $user->journeys()->first();

        if(is_null($journey))
        {
            return redirect()->back()->withErrors(["Journey doesnot exist."]);
        }

        return redirect("journeys/{$journey->getRouteKey()}");
    }


}
