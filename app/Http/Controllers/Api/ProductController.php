<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductFrontResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(Request $request){
        $query = Product::query();
        if ($sort = $request->input('sort')) {
            $query->orderBy('price', $sort);
        }
        if ($sort = $request->input('sortData')) {
            $query->orderBy('created_at', $sort);
        }
        $perPage = 10;
        $page = $request->input('page', 1);
        $total = $query->count();
        $result = $query->offset(($page - 1) * $perPage)->limit($perPage)->get(['name','price','main_picture']);
        return [
            'data' => $result,
            'total' => $total,
            'page' => $page,
            'last_page' => ceil($total / $perPage)
        ];
    }
    public function show(Product $product){
        return new ProductResource($product);
    }
    public function store(StoreProductRequest $request){
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->main_picture = $request->main_picture;
        $product->description = $request->description;
        $product->images = $request->images;
        $product->save();
        Log::info("Product ID {$product->id} create successfully.");
        return response([
            'date'=>new ProductResource($product),
            'info'=>["Result"=>"Data has been saved", "Number product"=>"{$product->id}"]
        ], Response::HTTP_CREATED);
    }
    public function update(Product $product, StoreProductRequest $request){
        $product->update($request->all());
        return new ProductResource($product);
    }
    public function destroy(Product $product){
        $product->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function _construct(){
        $this->middleware('auth:api')->except('index','show');
    }
}
