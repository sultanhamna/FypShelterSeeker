<div class="form-group mb-3  ">
    <b>
        {!! Form::label('propertyStatus', 'Property Status',['class' => 'form-label',]) !!}
    </b>
        {!! Form::text('property_status', !empty($data->property_status) ? $data->property_status : null, [
             'class' => 'form-control',
             'id' => 'propertyStatus',
         ])
        !!}
         <span class="text-danger">
            @error('property_status')
                {{ $message }}
            @enderror
        </span>
</div>
</br>
<div class="mb-3 text-center">
    <button class="btn  submitCategory  login-btn" type="submit"> <b> {{ (isset( $data) ? 'Update Status' : 'Add Status' )}} </b></button>
</div>
