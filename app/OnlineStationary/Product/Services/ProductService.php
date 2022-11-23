<?php


namespace OnlineStationary\Product\Services;



use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use OnlineStationary\Category\Models\Category;
use OnlineStationary\Product\Exports\ExportProduct;
use OnlineStationary\Product\Imports\ImportProduct;
use OnlineStationary\Product\Models\Image;
use OnlineStationary\Product\Models\Product;

class ProductService
{
    const Path = 'images/';
    public function index()
    {
        $products = Product::with('category')->get();

        return view('Admin.product.index',compact('products'));
    }
    public function show($id)
    {
        $categories = Category::select('name','id')->get();
        return view('Admin.product.add',compact('categories'));
    }

    public function store($request)
    {
        try {
           $product = Product::create([
                'name' => $request->product_name,
                'details' => $request->product_details,
                'price' => $request->product_price,
                'quantity' => $request->product_quantity,
                 'category_id'=>$request->category
            ]);

           /*      $product = new Product();
                $product->name = $request->product_name;
                $product->details = $request->product_details;
                $product->price = $request->product_price;
                $product->quantity = $request->product_quantity;
                $product->save();*/

            $this->saveImage($request->images,$product->id);

            return response()->json(['status'=>true]);
        }catch (\Exception $e)
        {
            return response()->json(['status'=>false]);
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::select('name','id')->get();
        return view('Admin.product.edit',compact('product','category'));
    }

    public function update($request)
    {

        try {
           /* $product = Product::findOrFail($request->id)->update([
                'name' => $request->product_name,
                'details' => $request->product_details,
                'price' => $request->product_price,
                'quantity' => $request->product_quantity,
            ]);*/
            $product =  Product::findOrFail($request->id);
            $product->name = $request->product_name;
            $product->details = $request->product_details;
            $product->price = $request->product_price;
            $product->quantity = $request->product_quantity;
            $product->category_id = $request->category;
            $product->save();

            if (!empty($request->images)) {
                $image = Image::where('product_id', $request->id)->get();
                $this->deleteImageFromSource($image, $request->id);
                $this->deleteImage($request->id);
            }

            $this->saveImage($request->images, $product->id);
            return redirect()->route('product.index');
        }catch (\Exception $e)
        {
            return redirect()->back();

        }
    }

    public function delete($request)
    {
        $product = Product::with('images')->find($request->id);
        $image = Image::where('product_id',$request->id)->get();

        if(!$product)
            return redirect()->route('admin.index');
        $this->deleteImageFromSource($image,$product->id);
        $product->delete();
        return redirect()->route('product.index');
    }

    public function import($request)
    {
        if($request->hasFile('file')) {
            $excel = Excel::import(new ImportProduct,$request->file);
            return redirect()->route('product.index');
        }
        else
            return redirect()->route('product.index');
    }
    public function export()
    {
        return Excel::download(new ExportProduct(),'product.xlsx');
    }

    public function ShowImages($id)
    {
        $product = Product::with('images')->findOrFail($id);
        //$img = $product->images[0]->toArray();
       // return $product->images[0]->toArray();
        /*return $img['name'];
        foreach ($product->images as $key => $value)
            return $key . $value;*/
        return view('Admin.product.show',compact('product'));

        /*echo $image;
        echo '<br><br>';
        foreach ($image as $images)
            echo $images;
            return $images->name;*/
       // return response()->json($product);
       //return $product;

    }

    private function saveImage($images,$product_id)
    {
        if(!empty($images)) {

            foreach ($images as $image) {
                $image->storeAs('images/' . $product_id, $image->getClientOriginalName(), 'public');
                $image->move(public_path('images/' . $product_id), $image->getClientOriginalName());

                $img = new Image();
                $img->name = $image->getClientOriginalName();
                $img->product_id = $product_id;
                $img->save();
            }
        }
    }

    private function deleteImageFromSource($images,$product_id)
    {
        foreach ($images as $item) {
            if (file_exists(self::Path . $product_id . '/' . $item->name))
                unlink(self::Path . $product_id . '/' . $item->name);
        }
        return true;
    }
    private function deleteImage($id)
    {
        return Image::where('product_id',$id)->delete();
    }
}
