<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = $request->validate([
            "role" => [ Rule::in(['admin', 'user']) ]
        ]);

        $user = User::find($id);
        $user->update($role);
        $user->save;

        $message = "Il nuovo ruolo dell'utente " . $user->name . " è " . $user->role;
        return redirect()->route("admin.users.index")->with("message", $message);
    }
}
