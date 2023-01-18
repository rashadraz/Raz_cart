<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{

    public function removeWishlistItem( $wishlistId)
        {
            Wishlist::where('user_id',auth()->user()->id)->where('id',$wishlistId)->delete();
           session()->flash('message','Wish List Item removed');

           $this->dispatchBrowserEvent('message', [
            'text' =>'Wish List Item Removed Successfully',
            'type' => 'success',
            'status'=> 200
        ]);
        }


    public function render()
    {

        $wishlist = Wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',[
            'wishlist' => $wishlist
        ]);
    }
}
