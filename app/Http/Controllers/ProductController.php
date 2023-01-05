<?php

namespace App\Http\Controllers;

use App\Models\image_products;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();

        // On transmet les product à la vue
        return view("dashboardAdmin", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("products.edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         // 1. La validation
    $this->validate($request, [
        'name' => 'required|string|max:255',
        "price" => 'required|max:1024',
        "content" => 'required',
    ]);

    // 2. On upload l'image dans "/storage/app/public/products"
    // $chemin_image = $request->picture->store(config('images.path') , 'public');
    $produit =  Product::create([
        "name" => $request->name,
        "price" => $request->price,
        "content" => $request->content,
    ]);
    $pictures = $request->picture ;
    foreach ($pictures as $key => $value) {
        $chemin_image = $value->storePublicly("products");
       image_products::create([
            "product_id" => $produit->id ,
            "image" => $chemin_image
       ]);
    }
    // 3. On enregistre les informations du product
   
    // 4. On retourne vers tous les products : route("products.index")
    return redirect(route("products.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view("show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       
            return view("products.edit", compact("product"));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        // 1. La validation

    // Les règles de validation pour "title" et "content"
    $rules = [
        'name' => 'required|string|max:255',
        "price" => 'required|max:1024',
        "content" => 'required',
    ];


    // 3. On met à jour les informations du product
    $product->update([
        "name" => $request->name,
        "content" => $request->content
    ]);
    $pictures = $request->picture ;
    foreach ($pictures as $key => $value) {

    // 2. On upload l'image dans "/storage/app/public/products"
    if ($value != "") {
        //On supprime l'ancienne image
        Storage::delete($value->getClientOriginalName());
        $chemin_image = $value->store("products");
    }
       image_products::create([
            "product_id" => $product->id ,
            "image" => $chemin_image
       ]);

    return redirect(route("products.index", $product));

    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        // On supprime l'image existant
    Storage::delete($product->picture);

    // On les informations du $product de la table "products"
    $product->delete();

    // Redirection route "products.index"
    return redirect(route('products.index'));
    }
}
