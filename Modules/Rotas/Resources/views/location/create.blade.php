{{ Form::open(['url' => 'location', 'enctype' => 'multipart/form-data']) }}
    <div class="form-group">
        {{ Form::label('', __('Name'), ['class' => 'form-control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'required' => '']) }}
    </div>
    <div class="form-group">
        {{ Form::label('', __('Address'), ['class' => 'form-control-label']) }}
        {{ Form::textarea('address', null, ['class' => 'form-control autogrow' ,'rows'=>'1' ,'style'=>'resize: none' ,'required' => '']) }}
    </div>
    <div class="form-group">
        {{ Form::label('', __(' Employee'), ['class' => 'form-control-label']) }}
        {!! Form::select('employees[]', $employees, null, ['required' => false, 'multiple' => 'multiple', 'id'=>'choices-multiple-location_id' ,'class'=> 'form-control form-control choices']) !!}        
    </div>
    <div class="modal-footer border-0 p-0">
        <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
        <button type="submit" class="btn  btn-primary">{{ __('Create') }}</button>
    </div>
{{ Form::close() }}
