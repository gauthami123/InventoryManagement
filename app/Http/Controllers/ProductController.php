<?php
namespace App\Http\Controllers;
use App\Repositories\ProductRepository;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $ProductRepository;


    public function __construct(ProductRepository $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }

    /**
     *
     * Shows Product Listing page
     *
     */
    public function index()
    {
        $products = $this->ProductRepository->getAll();
        return view('product/index')->with('products',$products);
    }

    /**
     *
     * Shows Add Product page
     *
     */
	public function create_product()
	{
	    $data =  array();
		$category=new Category();
		$data['categorylist']=$category->getcategorylist();
		return view('product/create')->with(['data'=>$data]);
	}

    /**
     *
     * Insert Product details
     *
     */
	public function create(Request $request )
	{
		$request->validate([
        'name' => 'required',
        'qty' => 'required',
        'category' => 'required',
        'product_img' => 'required|max:10000'
        ]);
		
		if ($request->input('product_img')) {
    return "in";
}
		$product = new Product();
		$product->product_name = $request->input('name');
		$product->quantity = $request->input('qty');
		$product->product_img = $request->input('product_img');
		$product->category_id = $request->input('category');
		$product->save();
		
		return redirect('/productlist')->with('message', 'Product Added Successfully!');
	}

    /**
     *
     * Shows a particular product details based on id
     *
     */
	public function edit($id)
	{
		$product = Product::find($id);
		$category=new Category();
		$data =  array();
        $data['product']  =  Product::find($id);
        $data['categorylist']=$category->getcategorylist();
		return view('product/create')->with(['data'=>$data]);
	}

    /**
     *
     * Update Product Details
     *
     */
    public function update($id, Request $request)
    {
		$request->validate([
        'name' => 'required',
        'qty' => 'required',
        'category' => 'required',
        'product_img' => 'required|max:10000'
        ]);
		
        $product = Product::find($id);
        $product->product_name = $request->input('name');
        $product->quantity = $request->input('qty');
        $product->product_img = $request->input('product_img');
        $product->category_id = $request->input('category');
        $product->save();
	    return redirect('/productlist')->with('message', 'Product Updated Successfully!');
    }

    /**
     *
     * Delete a product based on particular id
     *
     */
	public function destroy($id)
    {
	    $delete=$this->ProductRepository->delete($id);
	    if($delete==true)
	    {
		    return redirect('/productlist')->with('message', 'Product Deleted!');
	    }
	}

}