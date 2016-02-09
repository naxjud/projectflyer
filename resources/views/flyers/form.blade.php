@inject('countries', 'App\Http\Utilities\Country')

<div class="row">

    <div class="col-md-6">
        {{ csrf_field()}}
        <div class="form-group">
            <label for="street">Street:</label>
            <input type="text" name="street" id="street" class="form-control" value="{{old('street')}}" required>
        </div>
        <div class="form-group">
            <label for="city">city:</label>
            <input type="text" name="city" id="city" class="form-control" value="{{old('city')}}" required>
        </div>
        <div class="form-group">
            <label for="zip">zip:</label>
            <input type="text" name="zip" id="zip" class="form-control" value="{{old('zip')}}" required>
        </div>
        <div class="form-group">
            <label for="country">country:</label>
            <select id="country" class="form-control" name="country" required>
                @foreach($countries::all() as $country => $code)
                    <option value="{{$code}}"> {{$country}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="state">state:</label>
            <input type="text" name="state" id="state" class="form-control" value="{{old('state')}}" required>
        </div>
    </div>
    <div class="col-md-6">

        <div class="form-group">
            <label for="price">sale price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{old('price')}}" required>
        </div>
        <div class="form-group">
            <label for="description">description:</label>
            <textarea type="text" name="description" id="description" class="form-control" rows="10" required>
                {{old('description')}}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <hr>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Flyer</button>
        </div>

    </div>
</div>
