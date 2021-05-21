<?php

namespace App\Http\Controllers\ClientControllers;

use App\Helper\CompareHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function addCompare(CompareHelper $compare, $id, Request $request)
    {
        $product = Product::find($id);
        $added = $compare->add($product);

        if ($added) {
            return response()->json(['redirect' => route('clients.show_compare')]);
        }
        return response()->json(['message' => 'Chỉ được so sánh tối đa ' . $compare->limited . ' sản phẩm']);
    }

    public function showCompare()
    {
        return view('client.pages.compare');
    }

    public function deleteCompare(CompareHelper $compare, $id)
    {
        $deleted = $compare->delete($id);

        return redirect()->route('clients.show_compare');
    }

}
