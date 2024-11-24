<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateRequest;

use App\Models\Member;

class MemberController extends Controller
{
    /**
     * トップ画面
     *
     * @return void
     */
    public function top()
    {
        $members = Member::sortable()->paginate(10);
        //$members = Member::all();
        return view('/top', compact('members'));
    }

    /**
     * 登録画面表示
     *
     * @return
     */
    public function register()
    {
        return view('register');
    }

    /**
     * 登録処理
     *
     * @param Request $request
     * @return
     */
    public function memberRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:members,phone|max:20',
            'email' => 'required|email|unique:members,email|max:255',
        ]);

        $member = new Member();
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->save();
        return redirect('/top');
    }

    /**
     * 編集画面
     *
     * @param Request $request
     * @return void
     */
    public function edit(Request $request)
    {
        $member = Member::where('id', $request->id)->first();

        return view('/edit', compact('member'));
    }

    /**
     * 会員編集機能
     *
     * @param Request $request
     * @return void
     */
    public function memberEdit(Request $request)
    {
        $member = Member::where('id', $request->id)->first();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->save();

        return redirect('/top');
    }

    /**
     * 削除機能
     *
     * @param Request $request
     * @return void
     */
    public function memberDelete(Request $request)
    {
        $member = Member::where('id', $request->id)->first();

        $member->delete();
        return redirect('/top');
    }

    /**
     * 検索機能
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Member::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('phone', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%");
        }

        $members = $query->paginate(10);

        return view('/top', compact('members', 'keyword'));
    }

    public function memberToggleStatus(Request $request)
    {
        $member = Member::findOrFail($request->id);
        $member->status = $member->status === 'active' ? 'inactive' : 'active';
        $member->save();

        return redirect('/top');
    }
}
