<x-admin-master>

    @section('content')
        <h1>Create new Post</h1>
        <form method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="" value="">
            </div>
            <div class="form-group">
                <label for="short_description">Short Description: </label>
                <input type="text" name="short_description" class="form-control" id="short_description" placeholder="" value="">
            </div>
            <div class="form-group">
                <label for="file"></label>
                <input type="file" name="picture" class="form-control" id="picture" aria-describedby="" placeholder="" value="">
            </div>
          <textarea id="content" name="content">
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
