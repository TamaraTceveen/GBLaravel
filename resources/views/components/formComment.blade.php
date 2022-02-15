<div class="container">
    <form method="post" action="{{ route('newsComment.store') }}">
    @csrf
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
    </div>
    <div class="form-group">
        <label for="description">Комментарий</label>
        <textarea class="form-control" name="comment" id="comment">{!! old('comment') !!}</textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>
</div>
