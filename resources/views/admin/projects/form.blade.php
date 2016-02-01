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
    <label class="col-md-1 control-label">Lien du projet</label>
    <div class="col-md-11">
        <input type="text" class="form-control" placeholder="http://www.monsite.com" name="url" value="{{ isset($publish) ? $publish->url : old('url') }}"/>
    </div>
</div>
<div class="form-group">
    <label class="col-md-1 control-label">Contenu du projet</label>
    <div class="col-md-11">
        <textarea class="ckeditor form-control" id="editor1" placeholder="Contenu du projet" rows="5" name="content">{{ isset($publish) ? $publish->content : old('content') }}</textarea>
    </div>
</div>
<div class="form-group">
	<label class="col-md-1 control-label">Boîte à outils</label>
	<div class="col-md-11">
        <ul id="tagIt" class="white">
        </ul>
        <input name="tags" id="tags" value="{{ isset($tools) ? $tools : old('tags') }}" type="hidden">
	</div>
</div>