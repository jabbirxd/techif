<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Catagory;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()  
    {
        $sliders = Slider::where('status','0')->get();
        return view('frontend.index',compact('sliders'));
    }

    public function contact() 
    {
        return view('contact');
    }

     public function catagories()  
    {
        $catagories=Catagory::where('status','0')->get();
        return view('frontend.collections.catagory.index',compact('catagories'));
    }

    public function products($catagory_slug)  
    {
        $catagory= Catagory::where('slug',$catagory_slug)->first();
        if($catagory){
            
            return view('frontend.collections.products.index',compact('catagory'));
        }else{
            return redirect()->back();
        }
        
    }
    public function productView(string $catagory_slug, string $product_slug)
    {
        $catagory= Catagory::where('slug',$catagory_slug)->first();
        if($catagory){
            $product = $catagory->products()->where('slug',$product_slug)->where('status','0')->first();
            if($product)
            {
                return view('frontend.collections.products.view',compact('product','catagory'));

            }else{
                return redirect()->back();
            }
            
        }else{
            return redirect()->back();
        }
    }
    public function thankyou()
    {
        return view('frontend.thank-you');  
    }

    public function newArrivals()
    {
        // Show recent products as "New Arrivals"
        $newProducts = Product::where('status','0')
                        ->orderBy('created_at','desc')
                        ->paginate(24);

        return view('frontend.new-arrivals', compact('newProducts'));
    }

    public function featuredProducts()
    {
        $featuredProducts = Product::where('is_featured', true)->where('status', '0')->get();
        return view('frontend.collections.featured', compact('featuredProducts'));
    }
}
