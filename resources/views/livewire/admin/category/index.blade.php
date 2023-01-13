<!-- Modal -->
<div>
<div wire:ignore.self class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    Are you sure you want to delete this category?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary text-white">Yes , Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif

        <div class="card-header">

            <h3>Category
                <a href="{{ url('admin/category/create') }}" class="btn btn-primary float-end btn-sm text-white">Add
                    Category</a>
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped ">
                <thead class="">
                    <tr class="table-info">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->status == 1 ?  'Hidden' : 'Visible' }}</td>
                            <td>
                                <div>
                                    <a href="{{ url('admin/category/' . $category->id . '/edit') }}" class="">
                                        <div class="ui animated button positive" tabindex="0">
                                            <div class="visible content text-white">Edit</div>
                                            <div class="hidden content">
                                                <i class="edit icon text-white"></i>
                                            </div>
                                    </a>
                                </div>
                                <a href="#" wire:click="deleteCategory({{$category->id}})" class="btn  btn-inverse-danger" data-bs-toggle="modal" data-bs-target="#removeModal"
                                   >Delete
                                    {{-- <div class="ui animated button negative" tabindex="0">
                                        <div class="visible content text-white" wire:click="deleteCategory({{$category->id}})"  data-bs-toggle="modal" data-bs-target="#removeModal">Delete</div>
                                        <div class="hidden content" wire:click="deleteCategory({{$category->id}})"  data-bs-toggle="modal" data-bs-target="#removeModal">
                                            <i class="eraser icon text-white"></i>

                                        </div> --}}
                                </a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>


            </table>



            <div class="d-flex justify-content-center">{{ $categories->links() }}</div>
        </div>
    </div>
</div>
</div>




@push('script')
<script>
    window.addEventListener('close-modal',event => {
        $('#removeModal').modal('hide');
    });
    </script>

@endpush
