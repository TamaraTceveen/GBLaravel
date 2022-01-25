<div class="container">
    <h2 class="h2">Здесь вы можете оставить заявку на выгрузку</h2>
    <form method="post" action="{{ route('newsComment.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>
        <div class="form-group">
            <label for="mail">E-mail</label>
            <input type="email" class="form-control" id="mail" name="mail" value="{{ old('mail') }}">
        </div>
        <div class="form-group">
            <label for="description">Комментарий</label>
            <textarea class="form-control" name="comment" id="comment">{!! old('comment') !!}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
</div>
