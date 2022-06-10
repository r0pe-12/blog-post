<x-admin-master>

    @section('content')

        <h1>User Profile for : {{$user->name}}</h1>

        @if(session('user-updated'))
            <div class="alert alert-success">
                {{ session('user-updated') }}
            </div>
        @elseif(session('user-role-attached'))
            <div class="alert alert-success">
                {{ session('user-role-attached') }}
            </div>
        @elseif(session('user-role-detached'))
            <div class="alert alert-success">
                {{ session('user-role-detached') }}
            </div>
        @endif
            <form method="post" action="{{route('admin.user.update')}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-5">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <img src="{{$user->picture}}" class="img-profile rounded-3" width="100%">
                            </div>

                            <div class="form-group">
                                <input type="file" name="picture" id="picture" value="{{$user->picture}}">
                                @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" aria-describedby="" placeholder="" value="{{$user->name}}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="" value="{{$user->email}}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="" aria-describedby="" placeholder="" >
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation" aria-describedby="">
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                    </div>

                    <div class="col-7">
                        <textarea id="about" name="about">
                            {{ $user->about }}
                        </textarea>

                        <hr>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                    </div>
                </div>
            </form>

    @endsection

</x-admin-master>
