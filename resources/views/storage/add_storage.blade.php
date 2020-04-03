@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kiểm Tra</div>
                <div class="card-body">
                    <form action="/check-product" method="GET">
                        <div class="form-group row">
                            <label for="product_code" class="col-md-4 col-form-label text-md-right">Mã Sản Phẩm</label>
                            <div class="col-md-6">
                                <input id="product_code" type="text" value="" 
                                class="form-control" name="checkproduct_code"  required>
    
                                @error('product_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Check
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><br><br>
            <div class="card">
                <div class="card-header">Nhập Kho</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('success') }}
                        </div>
                    @endif
                    <form method="GET" action="/update-storage">
                        @csrf

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">Tên Sản Phẩm</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" 
                                value="<?php if(isset($result) && count($result)>0) echo $result[0]->product_name ?>" readonly>

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
                                <input id="product_code" type="text" class="form-control @error('product_code') is-invalid @enderror" name="product_code" 
                                value="<?php if(isset($result) && count($result)>0) echo $result[0]->product_code ?>" readonly>

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
                                <input id="product_nsx" type="text" class="form-control @error('product_nsx') is-invalid @enderror" name="product_nsx" 
                                value="<?php if(isset($result) && count($result)>0) echo $result[0]->product_nsx?>" readonly>

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
                                <input id="product_price" type="number" class="form-control @error('product_price') is-invalid @enderror" name="product_price" 
                                value="<?php if(isset($result) && count($result)>0) echo $result[0]->product_price ?>" readonly>

                                @error('product_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label for="product_image" class="col-md-4 col-form-label text-md-right">Hình Ảnh</label>

                            <div class="col-md-6">
                                <input id="product_image" type="file"  name="product_image"  autocomplete="new-product_image">

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
                                <input id="product_type" type="text" class="form-control" name="product_type" 
                                value="<?php if(isset($result) && count($result)>0) echo $result[0]->product_type ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_slht" class="col-md-4 col-form-label text-md-right">Số Lượng Hiện Tại</label>

                            <div class="col-md-6">
                                <input id="product_slht" type="number" class="form-control" name="product_slht" 
                                value="<?php if(isset($result) && count($result)>0) echo $result[0]->product_sl ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_slnt" class="col-md-4 col-form-label text-md-right">Số Lượng Nhập Thêm</label>

                            <div class="col-md-6">
                                <input id="product_slnt" type="number" class="form-control" name="product_slnt" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Nhập Kho
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
            <br><br>
        </div>
        
        
    </div>
</div>
@endsection
