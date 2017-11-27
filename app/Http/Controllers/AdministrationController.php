<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\User;
use Datatables;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gp.user_administration');
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
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        if (!empty($request->id)){
            $this->update($request,$request->id);
        }else{
            User::create($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::whereNotIn('name',['superadmin','super'])->get();

        return Datatables::of($user)->addColumn('option', function ($user) {
            return '<button type="button" class="btn btn-info btn120 btn-outline btn-sm " onclick="edit(' . $user['id'] . ')" ><i class="fa fa-pencil"></i> EDIT </button>
             <button type="button" class="btn btn-danger btn120 btn-outline btn-sm " onclick="deleteUser(' . $user['id'] . ')"><i class="fa fa-times"></i> DELETE </button>';
        })->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::find($id)->fill($request->all())->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //User::destroy($id);
        if (User::find($id)->username != 'admin' || User::find($id)->username != 'superadmin'){
            User::destroy($id);
            return response('DELETED',200);
        }

        return response(['message' => 'Not Allowed'],500);
    }
}
