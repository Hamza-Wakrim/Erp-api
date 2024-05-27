<div class="card bg-none card-box">
    <?php echo e(Form::model($category, array('route' => array('product-category.update', $category->id), 'method' => 'PUT'))); ?>

    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('name', __('Category Name'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('name', null, array('class' => 'form-control font-style','required'=>'required'))); ?>

        </div>
        <div class="form-group  col-md-12">
            <div class="input-group">
                <?php echo e(Form::label('type', __('Category Type'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('type',$types,null, array('class' => 'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('color', __('Category Color'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('color', null, array('class' => 'form-control jscolor','required'=>'required'))); ?>

            <p class="small"><?php echo e(__('For chart representation')); ?></p>
        </div>
        <div class="col-md-12 text-right">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH D:\main_file2\resources\views/productServiceCategory/edit.blade.php ENDPATH**/ ?>