<div class="form-group mb-3  ">
    <b>
        {!! Form::label('propertySize', 'Area Size',['class' => 'form-label',]) !!}
    </b>
    &nbsp;
    <b> <small>** 5 Marla , 3 Kanal , 2 Acr **</small></b>
        {!! Form::text('property_size', !empty($data->property_size) ? $data->property_size : null, [
             'class' => 'form-control',
             'id' => 'propertySize',
         ])
        !!}
        <span class="text-danger">
            @error('property_size')
                {{ $message }}
            @enderror
        </span>
</div>
</br>
<div class="mb-3 text-center">
    <button class="btn  submitCategory  login-btn" type="submit"> <b> {{ (!empty( $data) ? 'Update Size' : 'Add Size' )}} </b></button>
</div>

