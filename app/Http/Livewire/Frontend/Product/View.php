<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component


{
    public $category, $product, $productColorSelectedQuantity, $quantityCount = 1, $productColorId;


    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;

        if ($this->productColorSelectedQuantity == 0) {
            $this->productColorSelectedQuantity = 'outOfStock';
        }
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            // dd($productId);
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                //check for product color quantity and insert 
                if ($this->product->productColors()->count() > 1) {
                    if ($this->productColorSelectedQuantity != NULL) {

                        if(Cart::where('user_id',auth()->user()->id)
                            ->where('product_id',$productId)
                            ->where('product_color_id',$this->productColorId)
                            ->exists())
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Already Exists',
                                    'type' => 'warning',
                                    'status' => 200
                                ]);
                            }
                            else{
                               
                                $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                                if ($productColor->quantity > 0) {
                                    if ($productColor->quantity >= $this->quantityCount) {
                                        //insert product to cart
                                        Cart::create([
                                            'user_id' => auth()->user()->id,
                                            'product_id' => $productId,
                                            'product_color_id' => $this->productColorId,
                                            'quantity' => $this->quantityCount
                                        ]);
                                        $this->emit('CartAddedUpdated');
                                        $this->dispatchBrowserEvent('message', [
                                            'text' => 'Product Added to Cart',
                                            'type' => 'success',
                                            'status' => 200
                                        ]);
                                    } else {
                                        $this->dispatchBrowserEvent('message', [
                                            'text' => 'Only ' . $productColor->quantity . ' Quantity Available',
                                            'type' => 'warning',
                                            'status' => 404
                                        ]);
                                    }
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Out of Stock',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            }

                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Your Product Color',
                            'type' => 'info',
                            'status' => 404
                        ]);
                    }
                } else {
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Already Exists',
                            'type' => 'warning',
                            'status' => 200
                        ]);

                    }else{

                        if ($this->product->quantity > 0) 
                        {
                            if ($this->product->quantity > $this->quantityCount) {
                                //insert product to cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Added to Cart',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out of Stock',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        } else 
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Only' . $this->product->quantity . 'Quantity Available',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Does Not Exists',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to add to cart',
                'type' => 'success',
                'status' => 200
            ]);
        }
    }


    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }

    public function  addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Item Already Added');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Item Already Added',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            } else {
                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message', 'Item Added To Wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Item Added To Wishlist',
                    'type' => 'success',
                    'status' => 200
                ]);
                return false;
            }
        } else {
            session()->flash('message', 'Please Login to Continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to Continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    public function  decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function  incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }
}
