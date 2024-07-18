<div class="form-group mb-3  ">
    <b>
        {!! Form::label('propertyType', 'Property Type',['class' => 'form-label',]) !!}
    </b>
        {!! Form::text('property_type', !empty($data->property_type) ? $data->property_type : null, [
             'class' => 'form-control',
             'id' => 'propertyType',
         ])
        !!}
         <span class="text-danger">
            @error('property_type')
                {{ $message }}
            @enderror
        </span>
</div>
</br>
<div class="mb-3 text-center">
    <button class="btn  submitCategory  login-btn" type="submit"> <b> {{ (!empty( $data) ? 'Update Type' : 'Add Type' )}} </b></button>
</div>
