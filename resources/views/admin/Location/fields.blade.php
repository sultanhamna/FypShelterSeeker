<div class="form-group mb-3">
    <b>
        {!! Form::label('propertyLocation', 'Property Location', ['class' => 'form-label']) !!}
    </b>
    &nbsp;
    <b><small>** WapdaTown, SatelliteTown, CityHousing **</small></b>
    {!! Form::text('property_location', !empty($data->property_location) ? $data->property_location : null, [
        'class' => 'form-control',
        'id' => 'propertyLocation',
    ]) !!}
    <span class="text-danger">
        @error('property_location')
            {{ $message }}
        @enderror
    </span>
</div>

<div class="form-group mb-3">
    <b>
        {!! Form::label('locationLatitude', 'Latitude', ['class' => 'form-label']) !!}
    </b>
    {!! Form::number('location_latitude', !empty($data->location_latitude) ? $data->location_latitude : null, [
        'class' => 'form-control',
        'id' => 'locationLatitude',
        'step' => 'any',// Allows any decimal value
    ]) !!}
    <span class="text-danger">
        @error('location_latitude')
            {{ $message }}
        @enderror
    </span>
</div>

<div class="form-group mb-3">
    <b>
        {!! Form::label('locationLongitude', 'Longitude', ['class' => 'form-label']) !!}
    </b>
    {!! Form::number('location_longitude', !empty($data->location_longitude) ? $data->location_longitude : null, [
        'class' => 'form-control',
        'id' => 'locationLongitude',
        'step' => 'any',// Allows any decimal value
    ]) !!}
    <span class="text-danger">
        @error('location_longitude')
            {{ $message }}
        @enderror
    </span>
</div>

<div class="mb-3 text-center">
    <button class="btn submitCategory login-btn" type="submit">
        <b>{{ !empty($data) ? 'Update Location' : 'Add Location' }}</b>
    </button>
</div>
