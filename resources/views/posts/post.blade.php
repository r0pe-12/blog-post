<x-public-master>
    @section('header')
        <header class="masthead" style="background-image: url({{ $post->picture }})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            @if(session('post-created'))
                                <div class="alert alert-success">
                                    {{ session('post-created') }}
                                </div>
                            @endif
                            <h1>{{ $post->title }}</h1>
                            <h2 class="subheading">{{ $post->short_description }}</h2>
                            <span class="meta">
                                Posted by
                                <a href="#!">{{ $post->user->name }}</a>
                                on
                                {{ $post->published_at->format('F d, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @endsection

    @section('content')
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </article>
    @endsection

</x-public-master>
