{{ Form::open(['url' => 'saturationdeduction', 'method' => 'post']) }}
{{ Form::hidden('employee_id', $employee->id, []) }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('title', __('Title'), ['class' => 'form-label']) }}
                {{ Form::text('title', null, ['class' => 'form-control ', 'required' => 'required', 'placeholder' => 'Enter Title']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('deduction_option', __('Deduction Options'), ['class' => 'form-label']) }}
                {{ Form::select('deduction_option', $deduction_options, null, ['class' => 'form-control ', 'required' => 'required', 'placeholder' => 'Select Deduction Option']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('type', __('Type'), ['class' => 'form-label']) }}
                {{ Form::select('type', $saturationdeduc, null, ['class' => 'form-control amount_type ', 'required' => 'required', 'placeholder' => 'Select Type']) }}
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('amount', __('Amount'), ['class' => 'form-label amount_label']) }}
                {{ Form::number('amount', null, ['class' => 'form-control ', 'required' => 'required', 'placeholder' => 'Enter Amount', 'min' => '0']) }}
            </div>
        </div> --}}
        <div class="row main-div-threshoul">
            <div class="dynamic-fields-row row">
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('range_start[]', __('Start Range'), ['class' => 'form-label']) }}
                        {{ Form::number('range_start[]', null, ['class' => 'form-control ', 'required' => 'required', 'placeholder' => 'Enter Range Start', 'min' => '0']) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('range_end[]', __('End Range'), ['class' => 'form-label']) }}
                        {{ Form::number('range_end[]', null, ['class' => 'form-control ', 'required' => 'required', 'placeholder' => 'Enter Range End', 'min' => '0']) }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('deduction_amount[]', __('Deduction'), ['class' => 'form-label']) }}
                        {{ Form::number('deduction_amount[]', null, ['class' => 'form-control ', 'required' => 'required', 'placeholder' => 'Deduction value', 'min' => '0', 'max' => '100']) }}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('', __('Action'), ['class' => 'form-label']) }}
                        <br>
                        <div class="btn-group mt-1" role="group">
                            {{ Form::button('<i class="ti ti-plus"></i>', ['type' => 'button', 'class' => 'btn btn-sm btn-primary', 'onclick' => 'rowDuplicate()']) }}
                            {{ Form::button('<i class="ti ti-minus"></i>', ['type' => 'button', 'class' => 'btn btn-sm btn-danger', 'onclick' => 'removeCurrentRow()']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
    {{ Form::submit(__('Create'), ['class' => 'btn  btn-primary']) }}
</div>
{{ Form::close() }}

<script>
    function rowDuplicate() {

        var newRow = $(".dynamic-fields-row:first").clone();

        // Clear values in the cloned row
        $(newRow).find('input[type="number"]').val('');

        // Replace the existing row with the new row
        $(".main-div-threshoul").append(newRow);
    }

    function removeCurrentRow() {
        if ($('.dynamic-fields-row').length > 1) {
            // Find the closest dynamic-fields-row and remove it
            $(event.target).closest('.dynamic-fields-row').remove();
        }
    }
</script>
