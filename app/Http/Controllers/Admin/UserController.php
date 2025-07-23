<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $route = 'admin.users';

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::query();

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('role', fn($row) => cVar('roles', $row->role))
                ->addColumn('image', fn($row) => sprintf(
                    '<a href="%1$s" target="_blank"><img src="%1$s" width="30"></a>',
                    getImgUrl('user', $row->image)
                ))
                ->addColumn('is_active', fn($row) => view('button', ['type' => 'active', 'route' => hpnToUscr($this->route), 'row'  => $row]))
                ->addColumn('action', function ($row) {
                    return view('button', ['type'  => 'ajax-edit', 'route' => $this->route, 'row'   => $row]) .
                        view('button', ['type'  => 'ajax-delete', 'route' => $this->route, 'row'   => $row]);
                })
                ->rawColumns(['image', 'is_active', 'action'])
                ->make(true);
        }

        return view('admin.user.index');
    }


    public function activeStatus(User $user)
    {
        $user->is_active = ! $user->is_active;
        try {
            $user->save();

            return response()->json(['message' => 'The status has been updated'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again.'], 500);
        }
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('image')) {
            $data['image'] = processAndStoreImage($request->image, 'user', [300, 300]);
        }

        try {
            User::create($data);

            return response()->json(['message' => 'The information has been inserted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again.'], 500);
        }
    }

    public function edit(Request $request, User $user)
    {
        if ($request->ajax()) {
            $route = route($this->route . '.update', $user->id);
            $modal = view('admin.user.edit', ['user' => $user, 'route' => $route])->render();

            return response()->json(['modal' => $modal], 200);
        }

        return abort(403, 'Unauthorized action.');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        return response()->json(['message' => 'The information has been updated'], 200);
        $data = $request->validated();

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        if ($request->hasFile('image')) {
            $data['image'] = processAndStoreImage($request->file('image'), 'user', [300, 300], $user->image);
        }

        try {
            $user->update($data);

            return response()->json(['message' => 'The information has been updated'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops, something went wrong. Please try again later.'], 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            imgUnlink('user', $user->image);
            $user->delete();

            return response()->json(['message' => 'The information has been deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops something went wrong, Please try again'], 500);
        }
    }
}
