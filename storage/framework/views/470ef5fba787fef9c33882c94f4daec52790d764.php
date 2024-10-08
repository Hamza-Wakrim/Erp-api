<div class="card bg-none card-box">
    <?php echo e(Form::open(array('url' => 'support','enctype'=>"multipart/form-data"))); ?>

    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('subject', __('Subject'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('subject', '', array('class' => 'form-control ','required'=>'required'))); ?>

        </div>
        <?php if(\Auth::user()->type=='company'): ?>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('user',__('Support for User'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('user',$users,null,array('class'=>'form-control select2'))); ?>

            </div>
        <?php endif; ?>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('priority',__('Priority'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::select('priority',$priority,null,array('class'=>'form-control select2'))); ?>

        </div>

        <div class="form-group col-md-6">
            <?php echo e(Form::label('end_date', __('End Date'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::date('end_date', '', array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('attachment',__('Attachment'),['class'=>'form-control-label'])); ?>

            <div class="choose-file form-group">
                <label for="document" class="form-control-label">
                    <div><?php echo e(__('Choose file here')); ?></div>
                    <input type="file" class="form-control" name="attachment" id="attachment" data-filename="attachment_create">
                </label>
                <p class="attachment_create"></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('description', __('Description'),['class'=>'form-control-label'])); ?>

            <?php echo Form::textarea('description', null, ['class'=>'form-control','rows'=>'3']); ?>

        </div>
    </div>
    <div class="col-md-12">
        <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH D:\main_file2\resources\views/support/create.blade.php ENDPATH**/ ?>