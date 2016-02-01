<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label class="col-md-1 control-label">Nom</label>
    <div class="col-md-11">
        <input type="text" class="form-control" placeholder="Développement" name="term" value="{{ isset($category) ? $category->term : old('term') }}"/>
    </div>
</div>
<div class="form-group">
    <label class="col-md-1 control-label">Couleur Hexa</label>
    <div class="col-md-11">
        <input type="text" class="form-control" placeholder="#000000" name="color" value="{{ isset($category) ? $category->color : old('color') }}"/>
    </div>
</div>
<div class="text-center">
	<button type="submit" class="btn btn-success">Enregistrer</button>
</div>