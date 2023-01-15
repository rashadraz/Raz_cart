<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4>Brands List
                    <a href="#" data-bs-toggle="modal" data-bs-target="#AddBrandModal" class="btn btn-primary btn-sm float-end text-white" >Add Brands</a>
                </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand )
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                <td>
                                    @if($brand->category)
                                    {{$brand->category->name}}
                                    @else
                                    No Category
                                    @endif
                                </td>
                                <td>{{$brand->slug}}</td>
                                <td>{{$brand->status == 1 ? 'Visible' : 'Hidden'}}</td>
                                <td>
                                    <a href="#" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-success btn-sm text-white">Edit</a>
                                    <a href="#" wire:click="deleteBrand({{$brand->id}})" class="btn btn-danger btn-sm text-white"  data-bs-toggle="modal" data-bs-target="#deleteBrand" >Delete</a>
                                </td>
                            </tr>
                                
                            @empty

                            <tr>
                                <td colspan="5">No Brands Found</td>
                            </tr>
                                
                            @endforelse
                            
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">{{ $brands->links() }}</div>
</div>


@push('script')
<script>
    window.addEventListener('close-modal',event => {
        $('#AddBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrand').modal('hide');
    });
    </script>

@endpush
