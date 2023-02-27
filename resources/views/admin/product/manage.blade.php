@extends('master.admin.master')
@section('add-css')
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Manage Product Datatable</h4>
                <h6 class="text-success text-center">{{Session::get('message')}}</h6>
                <table class="table table-nowrap dataTable no-footer" id="datatable" role="grid" aria-describedby="DataTables_Table_0_info" style="position: relative;">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Stock Amount</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $product->product_name}}</td>
                            <td>{{ $product->category->name}}</td>
                            <td>{{ $product->brand->brand_name}}</td>
                            <td>{{ $product->stock_amount}}</td>
                            <td>Tk.{{ $product->price}}</td>
                            <td>{{ $product->status ==1 ?'Available':'Unavailable' }}
                            <td>
                                <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this..');">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    @include('admin.product.script')
@endsection

