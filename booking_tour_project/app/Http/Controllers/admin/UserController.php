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
        try {
            $input['password'] = bcrypt($request->password);
            User::create($input);
            return redirect()->route('user.index')->with(['success' => __('admin_user.create_cc')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('admin_user.create_fail')]);
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
        if (!$user) {
            abort(404);
        }
        $roles = Role::all();
        $data['roles'] = $roles;
        $data['user'] = $user;
        return view('admin.pages.users.detail')->with($data);
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
        $input = $request->all();
        try {
            $user = User::find($id);
            if (!$user) {
                abort(404);
            }
            if (!$input['password']) {
                $input['password'] = bcrypt($input['password']);
            }
            $user->fill($input);
            $user->save();
            return redirect()->back()->with(['success' => __('admin_user.update_cc')]);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => __('admin_user.update_fail')]);
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
                'message' => __('admin_user.delete_cc')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => __('admin_user.delete_fail')
            ]);
        }
    }
}
