<div class="form-group mb-3  ">
 <b>
    {!! Form::label('propertyLocation', 'Property Location',['class' => 'form-label',]) !!}
 </b>
     {!! Form::text('property_location', !empty($data->property_location) ? $data->property_location : null, [
         'class' => 'form-control',
         'id' => 'propertyLocation',
     ])
     !!}
     <span class="text-danger">
        @error('property_location')
            {{ $message }}
        @enderror
    </span>
</div>
</br>
<div class="mb-3 text-center">
    <button class="btn  submitCategory  login-btn" type="submit"> <b> {{ (!empty( $data) ? 'Update Location' : 'Add Location' )}} </b></button>
</div>
