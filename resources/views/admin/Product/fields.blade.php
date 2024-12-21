<div class="form-group mb-3">
    <b>
        {!! Form::label('productLocation', 'Product Location', ['class' => 'form-label']) !!}
    </b>
    &nbsp;
    <b><small>** Khiali **</small></b>
    {!! Form::text('product_location', !empty($data->product_location) ? $data->product_location : null, [
        'class' => 'form-control',
        'id' => 'productLocation',
    ]) !!}
    <span class="text-danger">
        @error('product_location')
            {{ $message }}
        @enderror
    </span>
</div>

<div class="form-group mb-3">
    <b>
        {!! Form::label('timing', 'Product timing', ['class' => 'form-label']) !!}
    </b>
    &nbsp;
    <b><small>** 10 AM to 5 PM  **</small></b>
    {!! Form::text('timing', !empty($data->timing) ? $data->timing : null, [
        'class' => 'form-control',
        'id' => 'timing',
    ]) !!}
    <span class="text-danger">
        @error('timing')
            {{ $message }}
        @enderror
    </span>
</div>

<div class="form-group mb-3">
    <b>
        {!! Form::label('product_image', 'Product Image',['class' => 'form-label',])!!}
    </b>
    @if (!empty($data))
        @if($data->Pics->count() > 0)
            @foreach($data->Pics as $image)
                <div>
                    <img style="height:100px;width:100px;border-radius:100%" src="{{asset('storage/'.  $image->product_image)}}">
                </div>
            @endforeach
        @endif
    @endif
    {!! Form::file('product_image[]', [
        'class' => 'form-control',
        'id' => 'product_image',
        'multiple' => true,
    ])
    !!}
    <span class="text-danger">
        @error('product_image.*')
            {{ $message }}
        @enderror
    </span>
</div>
</br>

<div class="mb-3 text-center">
    <button class="btn submitCategory login-btn" type="submit" >
        <b>{{ !empty($data) ? 'Update Product' : 'Add Product' }}</b>
    </button>
</div>
