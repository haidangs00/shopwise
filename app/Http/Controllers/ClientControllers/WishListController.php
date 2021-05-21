<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WishList;
use Auth;

class WishListController extends Controller
{
    public function addToList($id)
    {
        $userId = Auth::user()->id;
        $items = WishList::where('user_id', $userId)->get();
        if (!$items->contains('product_id', $id)) {
            $created = WishList::create([
                'product_id' => $id,
                'user_id' => $userId
            ]);

            if ($created) {
                return response()->json(['status' => true, 'message' => 'Đã thích sản phẩm!']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Sản phẩm đã có trong danh sách!']);
        }
    }

    public function removeFromList($id)
    {
        $userId = Auth::user()->id;
        $item = WishList::where(['product_id' => $id, 'user_id' => $userId])->first();
        $deleted = $item->delete();
        if ($deleted) {
            return redirect()->back();
        }
    }
}
