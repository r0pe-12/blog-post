<x-admin-master>

    @section('content')
        @if(session('post-updated'))
            <div class="alert alert-success">
                {{ session('post-updated') }}
            </div>
        @endif
        <h1>Update Post: "{{ $post->title }}"</h1>
        <form method="post" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="{{ $post->title }}" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="short_description">Short Description: </label>
                <input type="text" name="short_description" class="form-control" id="short_description" placeholder="{{ $post->short_description }}" value="{{ $post->short_description }}">
            </div>
            <div class="form-group">
                <div class="img-fluid"><img src="{{$post->picture}}" height="100" alt=""></div>
                <label for="file"></label>
                <input type="file" name="picture" class="form-control" id="picture" aria-describedby="" placeholder="" value="">
            </div>
            <textarea id="content" name="content">
                {{ $post->content }}
          </textarea>

            <script>
                tinymce.init({
                    selector: 'textarea',
                    plugins: 'advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
                    toolbar: 'addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table tableofcontents',
                    toolbar_mode: 'floating',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                });
            </script>
            <hr>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection

</x-admin-master>
