<x-admin-master>

    @section('content')
        <h1>View all Posts</h1>
        @if(session('post-deleted'))
            <div class="alert alert-danger">
                {{ session('post-deleted') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>User</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Short Description</th>
                            <th>Content</th>
                            <th>Picture</th>
                            <th>Published At</th>
                            <th>DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td><a href="{{ route('admin.posts.edit', $post) }}">{{ $post->title }}</a></td>
                                    <td>{{ $post->slug }}</td>
                                    <td>{{ $post->short_description }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td><img src="{{ $post->picture }}" height="100px" alt=""></td>
                                    <td>{{ $post->published_at->diffForHumans() }}</td>
                                    <td>
                                        <form method="post" action="{{route('admin.posts.destroy', $post)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>User</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Short Description</th>
                            <th>Content</th>
                            <th>Picture</th>
                            <th>Published At</th>
                            <th>DELETE</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        {{--laravel paginator--}}
        <div class="d-flex">
            <div class="mx-auto">
                {{$posts->links()}}
            </div>
        </div>
    @endsection

</x-admin-master>
