<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

     // all users
    public function index()
    {
        $users = User::all()->toArray();

        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

     // add user
    public function store(Request $request)
    {
//        $user = new User([
//            'name' => $request->input('name'),
//            'birthday' => $request->input('birthday'),
//            'position' => $request->input('position')
//        ]);
//
//        $user->save();
//
//        return response()->json('Сотрудник добавлен');


        $user = User::create([
            'name' => $request['name'],
            'birthday' => $request['birthday'],
            'position' => $request['position']
        ]);

        return $this->sendResponse($user, 'Сотрудник создан');

            }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function show($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
        // update user
    public function update($id, Request $request)
    {
        $user = User::find($id);

        $user->update($request->all());

        return response()->json('User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    // delete user
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json('Запись удалена');
    }
}
