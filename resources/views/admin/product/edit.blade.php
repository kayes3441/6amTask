@extends('master.admin.master')
@section('body')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body" id="addForm">
            <h5 class="card-title text-primary mb-3">Edit Product </h5>
            <h5 class="text-success text-center">{{ Session::get('message') }}</h5>
            <form  action="{{ route('product.update',['id'=>$product->id]) }}" method="POST" id="formSubmit"  enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"style="width: 120px">Category</span>
                                </div>
                                <select class="form-control" name="category_id" >
                                    <option value="" selected disabled>--Select--</option>
                                    @foreach ($categories as $category )
                                        <option value="{{$category->id}}"{{$category->id == $product->category_id ? 'Selected' :' '}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="text-danger" id="category_id_error"></span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Product Name</span>
                                </div>
                                <input type="text" min="0" step="0.01" name="product_name" value="{{ $product->product_name }}" class="form-control" placeholder="Product Name" >
                            </div>
                            <span class="text-danger" id="product_name_error"></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 120px">Brand Name</span>
                            </div>
                            <label class="sr-only">Brand</label>
                            <select class="form-control" name="brand_id" id="brand_id" style="border-radius:4px" required>
                                <option value="">--Select Brand--</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}"{{$brand->id == $product->brand_id ? 'Selected' :' '}}>{{$brand->brand_name}}</option>
                                @endforeach
                                <option value="new">New Brand</option>
                            </select>
                            <input type="text" name="brand_name" class="form-control" style="display: none" id="newBrandName" placeholder="Brand Name" aria-label="Brand Name">
                        </div>
                        <span class="text-danger" id="brand_error"></span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Stock Amount</span>
                                </div>
                                <input type="number" min="0" step="0.01" name="stock_amount" value="{{ $product->stock_amount }}" class="form-control" placeholder="stock Amount" >
                            </div>
                            <span class="text-danger" id="stock_amount_error"></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Product Price</span>
                                </div>
                                <input type="number" min="0" step="0.01" name="price" value="{{ $product->price }}" class="form-control" placeholder="Price" >
                            </div>
                            <span class="text-danger" id="price_error"></span>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Description</span>
                                </div>
                                <textarea  min="0" step="0.01" name="description" value="" class="form-control" placeholder="Product Description" >{{ $product->description }}</textarea>
                            </div>
                            <span class="text-danger" id="description_error"></span>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Product Image</span>
                                </div>
                                <input type="file" min="0" step="0.01" name="product_image[]" multiple value="" class="form-control" placeholder="Product Images" >
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 120px">Images</span>
                                </div>
                                @foreach($productImages as $product_image)
                                    <img src="{{asset('/ProductImages/'.$product_image->image)}}" class="mx-2"  alt="" height="100" width="125">
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12 text-right">
                        <a href="{{ route('product.manage') }}" class="btn btn-warning mr-2"><i class="fa fa-back"></i> Back</a>
                        <a type="submit" class="btn btn-primary mr-2"><i class="fa fa-save"></i> Uptade</a>
{{--                            <button type="reset" class="btn btn-warning"><i class="fa fa-times-circle"></i> Reset</button>--}}
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

@section('js')
    @include('admin.product.script')
@endsection

