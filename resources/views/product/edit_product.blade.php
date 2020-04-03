@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa Sản Phẩm</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ URL::to('/update-product/'.$product_edit->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">Tên Sản Phẩm</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ $product_edit->product_name }}" 
                                required autocomplete="product_name" autofocus>

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
                                <input id="product_code" type="text" class="form-control @error('product_code') is-invalid @enderror" name="product_code" value="{{ $product_edit->product_code }}" 
                                required autocomplete="product_code">

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
                                <input id="product_nsx" type="text" class="form-control @error('product_nsx') is-invalid @enderror" name="product_nsx" value="{{ $product_edit->product_nsx }}" 
                                required autocomplete="product_nsx">

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
                                <input id="product_price" type="number" class="form-control @error('product_price') is-invalid @enderror" name="product_price"  value="{{ $product_edit->product_price }}"
                                required autocomplete="new-product_price">

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
                                <input id="product_image" type="file"  name="product_image" autocomplete="new-product_image" value="{{ $product_edit->product_image }}">

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
                            <input id="product_type" type="text" class="form-control" name="product_type" value="{{ $product_edit->product_type }}" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Sản Phẩm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
