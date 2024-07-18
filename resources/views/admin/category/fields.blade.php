
<div class="form-group mb-3 ">
<b>
   {!! Form::label('categoryName', 'Category Name',['class' => 'form-label',]) !!}
</b>
    {!! Form::text('category_name', !empty($data->category_name) ? $data->category_name : null, [
        'class' => 'form-control',
        'id' => 'categoryName',
    ])
    !!}
    <span class="text-danger">
        @error('category_name')
            {{ $message }}
        @enderror
    </span>
</div>
<div class="form-group  mb-3">

 <b>{!! Form::label('categoryIcon', 'Category Icon',['class' => 'form-label',])!!} </b>
    {!! Form::file('category_icon', [
    'class' => 'form-control',
    'id' => 'categoryIcon',
    ])!!}
    <span class="text-danger">
        @error('category_icon')
            {{ $message }}
        @enderror
    </span>

@if (!empty($data))
    <img style="height:100px;width:100px;border-radius:100%" src="{{asset('storage/'.  $data->category_icon)}}"/>
@endif
</div>
</br>
<div class="mb-3 text-center">
    <button class="btn  submitCategory  login-btn" type="submit"> <b> {{ (!empty( $data) ? 'Update Category' : 'Add Category' )}} </b></button>
</div>


