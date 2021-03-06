@inject('countries', App\Http\Utilities\Country)
{{ csrf_field() }}


<div class="form-group">
    <label form="street">Street:</label>
    <input type="text" name="street" id ="street" class="form-control" value="{{old('street')}}" required>
</div>
<div class="form-group">
    <label form="city">City:</label>
    <input type="text" name="city" id ="city" class="form-control" value="{{old('city')}}" required>
</div>
<div class="form-group">
    <label form="zip">Zip/Postal Code:</label>
    <input type="text" name="zip" id ="zip" class="form-control" value="{{old('zip')}}" required>
</div>
<div class="form-group">
    <label form="country">Country:</label>
    <select name="country" id ="country" class="form-control" >
        @foreach ($countries::all() as $country => $code)
            <option value="{{ $code }}">{{ $country }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label form="state">State:</label>
    <input type="text" name="state" id ="state" class="form-control" value="{{old('state')}}" required>
</div>

<hr>

<div class="form-group">
    <label form="price">Sale Price:</label>
    <input type="text" name="price" id ="price" class="form-control" value="{{old('price')}}" required>
</div>
<div class="form-group">
    <label form="description">Home Description:</label>
    <textarea type="text" name="description" id ="description" class="form-control" rows="10" {{old('description')}}"></textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Create Flyer</button>
</div>


