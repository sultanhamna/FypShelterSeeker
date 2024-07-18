<div class="form-group mb-3">
    <b>   {!! Form::label('category_id', 'Select category', ['class' => 'form-label ']) !!}  </b>
    {!! Form::select('category_id',
         ['' => 'Select any Category'] + $categories->pluck('category_name', 'id')->all(),
        !empty($data->category_id) ? $data->category_id : null,
        ['class' => 'form-control', 'id' => 'category_id']
    ) !!}
</div>
<div class="form-group mb-3">
    <b>  {!! Form::label('type_id', 'Select Type', ['class' => 'form-label']) !!}  </b>
    {!! Form::select('type_id',
        ['' => 'Select any Type'] + $types->pluck('property_type', 'id')->all(),
        !empty($data->type_id) ? $data->type_id : null,
        ['class' => 'form-control', 'id' => 'type_id']
    ) !!}
</div>

<div class="form-group mb-3">
    <b>   {!! Form::label('location_id', 'Select Location', ['class' => 'form-label']) !!}  </b>
    {!! Form::select('location_id',
       ['' => 'Select any Location'] +   $locations->pluck('property_location', 'id')->all(),
        !empty($data->location_id) ? $data->location_id : null,
        ['class' => 'form-control', 'id' => 'location_id']
    ) !!}
</div>

<div class="form-group mb-3">
    <b>   {!! Form::label('status_id', 'Select Status', ['class' => 'form-label']) !!}  </b>
    {!! Form::select('status_id',
        ['' => 'Select any Status'] +  $statuses->pluck('property_status', 'id')->all(),
        !empty($data->status_id) ? $data->status_id : null,
        ['class' => 'form-control', 'id' => 'status_id']
    ) !!}
</div>

<div class="form-group mb-3">
    <b>   {!! Form::label('area_size_id', 'Select Size', ['class' => 'form-label']) !!}   </b>
    {!! Form::select('area_size_id',
        ['' => 'Select any Size']+ $sizes->pluck('property_size', 'id')->all(),
        !empty($data->area_size_id) ? $data->area_size_id : null,
        ['class' => 'form-control', 'id' => 'area_size_id']
    ) !!}
</div>
<div class="form-group mb-3">
    <b>   {!! Form::label('post_id', 'Select Post', ['class' => 'form-label']) !!}   </b>
    {!! Form::select('post_id',
       ['' => 'Select any Post'] + $posts->pluck('property_post', 'id')->all(),
        !empty($data->post_id) ? $data->post_id : null,
        ['class' => 'form-control', 'id' => 'post_id']
    ) !!}
</div>

<div class="form-group  mb-3">
    <b>
        {!! Form::label('property_images', 'Property Image',['class' => 'form-label',])!!}
    </b>
    {!! Form::file('property_images', [
        'class' => 'form-control',
        'id' => 'property_images',
    ])
    !!}
</div>
@if (!empty($data))
@if($data->Images->count() > 0)
    @foreach($data->Images as $image)
        <img style="height:100px;width:100px;border-radius:100%" src="{{asset('storage/'.  $image->property_images)}}"/>
    @endforeach
@endif
@endif
</br>
<div class="mb-3 text-center">
    <button class="btn  submitCategory  login-btn" type="submit"> <b> {{ ( !empty( $data) ? 'Update Property' : 'Add Property' )}} </b></button>
</div>
