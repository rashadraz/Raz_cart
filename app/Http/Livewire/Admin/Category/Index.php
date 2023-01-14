<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;
    
        

    public function deleteCategory($category_id)
    {   
        $this->category_id = $category_id;
    }

    public function destroyCategory(){
        $category = Category::find($this->category_id);

        if($path = 'uploads/categories/'.$category->image)
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        return redirect('admin/category')->with('message','Category deleted successfully.');
        // session()->flash('message', 'Category deleted successfully.');
        // $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $categories = Category::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
}
