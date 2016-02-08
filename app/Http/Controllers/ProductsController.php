<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Gate;
use App;
use Auth;


class ProductsController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);

        Auth::loginUsingId(1);
        // Auth::logout();

        $this->authorize('show-product', $product);
        // $this->authorize('update', $product);

        return view('product.show', compact('product'));
    }
}
