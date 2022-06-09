<x-public-master>

    @section('header')
        <header class="masthead" style="background-image: url({{asset('assets/img/post-sample-image.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>View all Posts</h1>
                            <span class="subheading">I created this webpage</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @endsection

    @section('content')
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach($posts as $post)
                        <div class="post-preview">
                            <a href="{{ route('post.show.one', $post->slug) }}">
                                <h2 class="post-title">{{ $post->title }}</h2>
                                <h3 class="post-subtitle">{{ $post->short_description }}</h3>
                            </a>
                            <p class="post-meta">
                                Posted by
                                <a href="#!">{{ $post->user->name }}</a>
                                on {{ $post->published_at->diffForHumans() }}
                            </p>
                        </div>
                        <!-- Divider-->
                        <hr class="my-4" />
                    @endforeach

                    {{--laravel paginator--}}
                    <div class="d-flex">
                        <div class="mx-auto">
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</x-public-master>
