@extends('layouts.admin')
@section('title', 'Admin Settings')

@section('content')


    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
            <div class="alert alert-success mb-3" >{{session('message')}}</div>
                
            @endif

            <form action="{{ url('/admin/settings') }}" method="POST">
                @csrf

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Website Name</label>
                                <input type="text" name="website_name" value="{{$setting->website_name ?? '' }}" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Website URL</label>
                                <input type="text" name="website_url"  value="{{$setting->website_url ?? '' }}" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Page Title</label>
                                <input type="text" name="page_title" value="{{$setting->page_title ?? ''}}"  class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Keywords</label>
                                <textarea rows="3" name="meta_keyword"  class="form-control">{{$setting->meta_keyword ?? ''}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Description</label>
                                <textarea rows="3" name="meta_description"   class="form-control">{{$setting->meta_description ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website - Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Address</label>
                                <input type="text" name="address"  value="{{$setting->address ?? ''}}" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone No 1</label>
                                <input type="text" name="phone1" value="{{$setting->phone1 ?? ''}}"  class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone No 2</label>
                                <input type="text" name="phone2" value="{{$setting->phone2 ?? ''}}"  class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email Id 1</label>
                                <input type="text" name="email1" value="{{$setting->email1 ?? ''}}"  class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email Id 2</label>
                                <input type="text" name="email2" value="{{$setting->email2 ?? ''}}"  class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Facebook (optional)</label>
                                <input type="text" name="facebook"  value="{{$setting->facebook ?? ''}}" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Twitter (optional)</label>
                                <input type="text" name="twitter"  value="{{$setting->twitter ?? ''}}" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Instagram (optional)</label>
                                <input type="text" name="instagram" value="{{$setting->instagram ?? ''}}"  class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Youtube (optional)</label>
                                <input type="text" name="youtube"  value="{{$setting->youtube ?? ''}}" class="form-control" />
                            </div>

                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary text-white"> Save Settings</button>
                </div>


            </form>

        </div>
    </div>


@endsection
