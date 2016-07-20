<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use App\User;
use App\Contributor;
use App\ShoppingList;

Route::get('/', function () {
    $lists = ShoppingList::where('user_id', Auth::id())
        ->orderBy('created_at', 'asc')
        ->get();

    return view('welcome', [
        'lists' => $lists
    ]);
});

Route::auth();

Route::get('/home', 'HomeController@index');

/**
 * Add a new list
 */
Route::post('/list', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $list = new ShoppingList;
    $list->user_id = Auth::id();
    $list->name = $request->name;
    $list->save();

    return redirect('/');
});

/**
 * Delete a list
 */
Route::delete('/list/{id}', function ($id) {
    ShoppingList::findOrFail($id)->delete();

    return redirect('/');
});

/**
 * Share a list
 */
Route::post('/invite', function (Request $request) {
    $email = $request->email;
    $matches = User::where('email', $email)->get();

    if(count($matches) > 0) {
        $user_id = $matches[0]->id;

        // TODO Verify that this isn't the owner's ID, and that they aren't already a contributor.

        $contributor = new Contributor;
        $contributor->user_id = $user_id;
        $contributor->list_id = $request->list_id;
        $contributor->save();

        // TODO Email contributor to accept invite.

        // TODO Show a success message
        
        return Redirect::back();
    }
    else {
        return Redirect::back()
            ->withErrors("Could not find user with email address $email.");
    }
});

/**
*
* View a list
*/
Route::get('/list/{id}', function ($id) {
    $list = ShoppingList::findOrFail($id);

    return view('list', [
        'list' => $list
    ]);
});