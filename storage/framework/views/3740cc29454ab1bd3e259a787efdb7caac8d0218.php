<?php $__env->startSection('content'); ?>
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
    
                                <?php $__errorArgs = ['product_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    <form method="GET" action="/update-storage">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">Tên Sản Phẩm</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="product_name" 
                                value="<?php if(isset($result) && count($result)>0) echo $result[0]->product_name ?>" readonly>

                                <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_code" class="col-md-4 col-form-label text-md-right">Mã Sản Phẩm</label>

                            <div class="col-md-6">
                                <input id="product_code" type="text" class="form-control <?php $__errorArgs = ['product_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="product_code" 
                                value="<?php if(isset($result) && count($result)>0) echo $result[0]->product_code ?>" readonly>

                                <?php $__errorArgs = ['product_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_nsx" class="col-md-4 col-form-label text-md-right">Nhà Sản Xuất</label>

                            <div class="col-md-6">
                                <input id="product_nsx" type="text" class="form-control <?php $__errorArgs = ['product_nsx'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="product_nsx" 
                                value="<?php if(isset($result) && count($result)>0) echo $result[0]->product_nsx?>" readonly>

                                <?php $__errorArgs = ['product_nsx'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right">Giá Sản Phẩm</label>

                            <div class="col-md-6">
                                <input id="product_price" type="number" class="form-control <?php $__errorArgs = ['product_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="product_price" 
                                value="<?php if(isset($result) && count($result)>0) echo $result[0]->product_price ?>" readonly>

                                <?php $__errorArgs = ['product_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label for="product_image" class="col-md-4 col-form-label text-md-right">Hình Ảnh</label>

                            <div class="col-md-6">
                                <input id="product_image" type="file"  name="product_image"  autocomplete="new-product_image">

                                <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/quanlystore/resources/views/storage/add_storage.blade.php ENDPATH**/ ?>