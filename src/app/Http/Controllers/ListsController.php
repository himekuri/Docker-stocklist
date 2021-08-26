<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class ListsController extends Controller
{
    public function index(Request $request)
    {
        // 未ログインの場合はwelcomeページを表示
        if (!\Auth::check()){
            return view('welcome');
        }

        // 認証済みユーザを取得
        $user = \Auth::user();

        $select = 'default';
        $select = $request->shops_sort;

        // 買い出し先一覧を取得
        $shops = $user->shops();

        if($select == 'name_asc'){
            $sorted_shops = $shops->orderBy('name', 'asc')->get();
        } elseif($select == 'name_desc') {
            $sorted_shops = $shops->orderBy('name', 'desc')->get();
        } else {
            $sorted_shops = $shops->orderBy('number', 'asc')->get();
        }
        // アイテム一覧を取得
        $items = $user->items()->whereIn('status',[1,2])->get();


        // 買い出し一覧ビューでそれを表示
        return view('lists.index', [
            'items' => $items,
            'shops' => $sorted_shops,
            'select' => $select
        ]);

    }

    public function update(Request $request)
    {
        $checked_ids = $request->input('cheked_item');

        if(!empty($checked_ids)){
            foreach($checked_ids as $id){
                $item = Item::findOrFail($id);
                $item->status = 0;
            }
            $item->save();
        }

        return back();
    }

    public function filter(Request $request)
    {
         // 認証済みユーザを取得
        $user = \Auth::user();

        // アイテム一覧を取得
        $items = $user->items()->whereIn('status',[2])->orderBy('created_at', 'asc')->get();

        $select = 'default';
        $select = $request->shops_sort;

        // 買い出し先一覧を取得
        $shops = $user->shops();

        if($select == 'name_asc'){
            $sorted_shops = $shops->orderBy('name', 'asc')->get();
        } elseif($select == 'name_desc') {
            $sorted_shops = $shops->orderBy('name', 'desc')->get();
        } else {
            $sorted_shops = $shops->orderBy('number', 'asc')->get();
        }

        // 買い出し一覧ビューでそれを表示
        return view('lists.filter', [
            'items' => $items,
            'shops' => $sorted_shops,
            'select' => $select
        ]);

    }
}
