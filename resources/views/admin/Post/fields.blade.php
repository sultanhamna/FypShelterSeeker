<div class="form-group mb-3  ">
    <b>
        {!! Form::label('propertyPost', 'Property Post',['class' => 'form-label',]) !!}
    </b>
    &nbsp;
    <b> <small>** Buy , Rent **</small></b>
        {!! Form::text('property_post', !empty($data->property_post) ? $data->property_post : null, [
             'class' => 'form-control',
             'id' => 'propertyPost',
         ])
        !!}
         <span class="text-danger">
            @error('property_post')
                {{ $message }}
            @enderror
        </span>
</div>
</br>
<div class="mb-3 text-center">
    <button class="btn  submitCategory  login-btn" type="submit"> <b> {{ (!empty( $data) ? 'Update Post' : 'Add Post' )}} </b></button>
</div>
