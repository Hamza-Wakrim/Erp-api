<div class="card bg-none card-box">

<?php echo e(Form::open(['route' => 'zoom-meeting.store','id'=>'store-user','method'=>'post'])); ?>

<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('title', __('Topic'))); ?>

        <?php echo e(Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Meeting Title'), 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('projects', __('Project'))); ?>

        <?php echo e(Form::select('project_id', $projects, null, ['class' => 'form-control select2 project_select', 'id' => 'project_select', 'data-toggle' => 'select'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('projects', __('Users'))); ?>

        <select class="form-control select2 employee_select" id="user_id" name="user_id[]" multiple=>''>
            <option value=''> <?php echo e(__('Select User')); ?></option>
        </select>
    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('datetime', __('Start Date / Time'))); ?>

        <?php echo e(Form::text('start_date',null,['class' => 'form-control date', 'placeholder' => __('Select Date/Time'), 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('duration', __('Duration'))); ?>

        <?php echo e(Form::number('duration',null,['class' => 'form-control', 'placeholder' => __('Enter Duration'), 'required' => 'required'])); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('password', __('Password ( Optional )'))); ?>

        <?php echo e(Form::password('password',['class' => 'form-control', 'placeholder' => __('Enter Password')])); ?>

    </div>



    <div class="form-group col-md-6">
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" name="client_id" id="client_id" checked>
            <label class="custom-control-label form-control-label" for="client_id"><?php echo e(__('Invite Client For Zoom Meeting')); ?></label>
        </div>
    </div>
</div>


<div class="modal-footer">
    <button class="btn btn-sm btn-primary rounded-pill" type="submit" style="margin-bottom: 10px;" id="create-client"><?php echo e(__('Create')); ?><span class="spinner" style="display: none;"><i class="fa fa-spinner fa-spin"></i></span>
    </button>
</div>
<?php echo e(Form::close()); ?>

</div>

    <script type="text/javascript">
        $(document).on('change', '.project_select', function () {

            var project_id = $(this).val();

            getparent(project_id);
        });
        function getparent(bid) {
            $.ajax({
                url: `<?php echo e(url('zoom-meeting/projects/select')); ?>/${bid}`,
                type: 'GET',
                success: function (data) {
                    $('.employee_select').empty();
                    $.each(data, function (i, item) {
                        $('.employee_select').append('<option value="' + item.id + '">' + item.name + '</option>');
                    });
                    if (data == '') {
                        $('.employee_select').empty();
                    }
                }
            });
        }

        $(document).ready(function () {

            $('.date').daterangepicker({
                "singleDatePicker": true,
                "timePicker": true,
                "locale": {
                    "format": 'MM/DD/YYYY H:mm'
                },
                "timePicker24Hour": true,
            }, function(start, end, label) {
                console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            });
            getProjects($('#client_id').val());
        });

    </script>







<?php /**PATH D:\main_file2\resources\views/zoom-meeting/create.blade.php ENDPATH**/ ?>