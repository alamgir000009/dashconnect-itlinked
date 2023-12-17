{{ Form::model($location, ['route' => ['location.update', $location->id], 'method' => 'PUT']) }}

    <div class="form-group">
        {{ Form::label('', __('Name'), ['class' => 'form-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'required' => '']) }}
    </div>
    <div class="form-group">
        {{ Form::label('', __('Address'), ['class' => 'form-label']) }}
        {{ Form::textarea('address', null, ['class' => 'form-control autogrow' ,'rows'=>'1' ,'style'=>'resize: none' ,'required' => '']) }}
    </div>
    
    <div class="form-group">
        {{ Form::label('', __(' Employee'), ['class' => 'form-label']) }}
        {!! Form::select('employees[]', $employees ,!empty($location->employees) ? explode(',',$location->employees) : null, ['required' => false, 'multiple' => 'multiple', 'id'=>'choices-multiple-employees' ,'class'=> 'form-control multi-select choices']) !!}
        
    </div>
    {{-- <div class="col-12 form-group">
        {{ Form::label('employee', __('Employee'),['class'=>'col-form-label']) }}
        {{ Form::select('employees[]', $employees,null, array('class' => 'form-control multi-select choices','id'=>'choices-multiple1','multiple'=>'','required'=>'required')) }}
    </div> --}}
    <div class="modal-footer border-0 p-0">
        <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
        <button type="submit" class="btn  btn-primary">{{ __('Upadte') }}</button>
    </div>
{{ Form::close() }}
