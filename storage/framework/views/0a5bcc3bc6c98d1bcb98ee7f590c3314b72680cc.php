<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Debit Notes')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', '#bill', function () {

            var id = $(this).val();
            var url = "<?php echo e(route('bill.get')); ?>";

            $.ajax({
                url: url,
                type: 'get',
                cache: false,
                data: {
                    'bill_id': id,

                },
                success: function (data) {
                    $('#amount').val(data)
                },

            });

        })
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="all-button-box row d-flex justify-content-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create debit note')): ?>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="<?php echo e(route('bill.custom.debit.note')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Debit Note')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fas fa-plus"></i> <?php echo e(__('Create')); ?>

                </a>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable">
                            <thead>
                            <tr>
                                <th> <?php echo e(__('Bill')); ?></th>
                                <th> <?php echo e(__('Vendor')); ?></th>
                                <th> <?php echo e(__('Date')); ?></th>
                                <th> <?php echo e(__('Amount')); ?></th>
                                <th> <?php echo e(__('Description')); ?></th>
                                <th> <?php echo e(__('Action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($bill->debitNote)): ?>
                                    <?php $__currentLoopData = $bill->debitNote; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $debitNote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="font-style">
                                            <td class="Id">
                                                <a href="<?php echo e(route('bill.show',\Crypt::encrypt($debitNote->bill) )); ?>"><?php echo e(AUth::user()->billNumberFormat($bill->bill_id)); ?>

                                                </a>
                                            </td>
                                            <td><?php echo e((!empty($bill->vender)?$bill->vender->name:'-')); ?></td>
                                            <td><?php echo e(Auth::user()->dateFormat($debitNote->date)); ?></td>
                                            <td><?php echo e(Auth::user()->priceFormat($debitNote->amount)); ?></td>
                                            <td><?php echo e(!empty($debitNote->description)?$debitNote->description:'-'); ?></td>
                                            <td class="Action">
                                                <span>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit debit note')): ?>
                                                        <a data-url="<?php echo e(route('bill.edit.debit.note',[$debitNote->bill,$debitNote->id])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Debit Note')); ?>" href="#" class="edit-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit debit note')): ?>
                                                        <a href="#" class="delete-icon " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($debitNote->id); ?>').submit();">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => array('bill.delete.debit.note', $debitNote->bill,$debitNote->id),'id'=>'delete-form-'.$debitNote->id]); ?>

                                                        <?php echo Form::close(); ?>

                                                    <?php endif; ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\main_file2\resources\views/debitNote/index.blade.php ENDPATH**/ ?>