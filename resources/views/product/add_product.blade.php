@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm Sản Phẩm</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ URL::to('/insert-product') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">Tên Sản Phẩm</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>

                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_code" class="col-md-4 col-form-label text-md-right">Mã Sản Phẩm</label>

                            <div class="col-md-6">
                                <input id="product_code" type="text" class="form-control @error('product_code') is-invalid @enderror" name="product_code" value="{{ old('product_code') }}" required autocomplete="product_code">

                                @error('product_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_nsx" class="col-md-4 col-form-label text-md-right">Nhà Sản Xuất</label>

                            <div class="col-md-6">
                                <input id="product_nsx" type="text" class="form-control @error('product_nsx') is-invalid @enderror" name="product_nsx" value="{{ old('product_nsx') }}" required autocomplete="product_nsx">

                                @error('product_nsx')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right">Giá Sản Phẩm</label>

                            <div class="col-md-6">
                                <input id="product_price" type="number" class="form-control @error('product_price') is-invalid @enderror" name="product_price" required autocomplete="new-product_price">

                                @error('product_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_image" class="col-md-4 col-form-label text-md-right">Hình Ảnh</label>

                            <div class="col-md-6">
                                <input id="product_image" type="file"  name="product_image" required autocomplete="new-product_image">

                                @error('product_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_type" class="col-md-4 col-form-label text-md-right">Loại Sản Phẩm</label>

                            <div class="col-md-6">
                                <input id="product_type" type="text" class="form-control" name="product_type" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Thêm Sản Phẩm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
            <br><br>
        </div>
        
        <div class="card">
            <div class="card-header">Danh Sách Sản Phẩm</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Loại Sản Phẩm</th>
                        <th>Nhà Sản Xuất</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Giá Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Quản Lý</th>
                    </tr>
                    @foreach ( $productModels as $productList )
                    
                    <tr>
                        <td>{{$productList->product_name}}</td>
                        <td>{{$productList->product_type}}</td>
                        <td>{{$productList->product_nsx}}</td>
                        <td>{{$productList->product_code}}</td>
                        <td>{{$productList->product_price}}</td>
                        <td>{{$productList->product_image}}</td>
                        <td>
                        <a href="{{ URL::to('delete-product/'.$productList->id) }}">Xoá</a> | <a href="{{ URL::to('edit-product/'.$productList->id) }}">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
