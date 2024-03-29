<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductRequest;
use App\Http\Resources\product\productresource;
use App\Http\Resources\product\productcollection;
use App\Model\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Throw_;
use App\Exceptions\ProductNotBelongToUser;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }
    public function index()
    {
        return productcollection::collection(product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->detail = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stoc;
        $product->user_id = Auth::user()->id;
        $product->save();
        return response([
            'data' => new productresource($product), 201
        ]);

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return new productresource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        if (Auth::user()->id !== $product->user_id) {
            return response([
                'ERROR' => 'product Not Belong To user'
            ]);
        }
        $this->ProductUserCheck($product);
        $request['detail'] = $request->description;
        $request['stock'] = $request->stoc;
        $product->update($request->all());
        return response([
            'data' => new productresource($product), 201
        ]);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)

    {
        if (Auth::user()->id !== $product->user_id) {
            return response([
                'ERROR' => 'product Not Belong To user'
            ]);
        }
        $product->delete();
        //
    }


    public function ProductUserCheck($product)
    {
    }
}
