<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label class="col-md-1 control-label">Titre principal</label>
    <div class="col-md-11">
        <input type="text" class="form-control" placeholder="Titre principal dans le header" name="title" value="{{ isset($publish) ? $publish->title : old('title') }}"/>
    </div>
</div>
<div class="form-group">
    <label class="col-md-1 control-label">Catégorie</label>
    <div class="col-md-11">
        <select class="form-control" name="category_id">
            @foreach($categories as $c)
            	<option value="{{ $c->id }}" {{ (isset($publish) && $publish->category == $c) ? 'selected' : '' }}>{{ $c->term }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-md-1 control-label">Description</label>
    <div class="col-md-11">
        <textarea class="form-control" placeholder="Description dans le header" rows="3" name="desc">{{ isset($publish) ? $publish->desc : old('desc') }}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-md-1 control-label">Contenu de l'article</label>
    <div class="col-md-11">
        <textarea class="ckeditor form-control" id="editor1" placeholder="Contenu de l'article" rows="20" name="content">{{ isset($publish) ? $publish->content : old('content') }}</textarea>
    </div>
</div>
<div class="text-center">
	<button type="submit" class="btn btn-success">Enregistrer</button>
</div>