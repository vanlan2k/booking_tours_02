<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\ProfileRequest;
use App\Http\Requests\web\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(10);
        $data['users'] = $users;
        return view('admin.pages.users.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $data['roles'] = $roles;
        return view('admin.pages.users.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            $input['password'] = bcrypt($request->password);
            $input['role_id'] = 3;
            User::create($input);
            DB::commit();
            return redirect()->route('user.index')->with(['success' => __('register.regis_succsess')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => __('register.regis_fail')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $data['roles'] = $roles;
        $data['user'] = $user;
        return view('admin.pages.users.detail')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        DB::beginTransaction();
        $input = $request->all();
        try {
            $user = User::find($id);
            if (!$user) {
                abort(404);
            }
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->phone = $input['phone'];
            $user->role_id = $input['role_id'];
            if (!$input['password']) {
                $user->password = bcrypt($input['password']);
            }
            if ($input['avata']) {
                $user->avata = $input['avata'];
            }
            $user->save();
            DB::commit();
            return redirect()->back()->with(['success' => __('register.update_ss')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => __('register.update_f')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                abort(404);
            }
            $user->delete();
            return response()->json([
                'error' => false,
                'message' => "Delete success"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => "Delete success"
            ]);
        }
    }
}
