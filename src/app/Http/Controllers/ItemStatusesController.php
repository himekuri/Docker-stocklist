<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class ItemStatusesController extends Controller
{
    public function update(Request $request, $id)
    {
        // idの値でアイテムを検索して取得
        $item = Item::findOrFail($id);
        $status = $request -> status;

        //「買い出し」「残りわずか」「在庫あり」でstatusを変える
        if($status == 'none') {
            $item->status = 2;
        } else if($status == 'few') {
            $item->status = 1;
        } else if($status == 'many') {
            $item->status = 0;
        }
        $item->save();
        return back();
    }
}
