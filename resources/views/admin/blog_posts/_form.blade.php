@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@csrf
<div class="form-group">
    <label for="">{{ $post::getLabel('title') }}</label>
    <input type="text" name="title" value="{{ old('title')??$post->title}} " class="form-control" required>
</div>

<div class="form-group">
    <label for="">{{ $post::getLabel('content') }}</label>
    <textarea name="content" rows="8" cols="80" class="form-control" required>{{ old('content')??$post->content }}</textarea>
</div>