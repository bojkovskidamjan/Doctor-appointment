@extends('admin.layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>Update doctor</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            @if(Session::has('message'))
                <div class="alert bg-success alert-success text-white" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif

            <div class="card">
                <div class="card-header"><h3>Edit doctor {{$user->name}}</h3></div>


                {{--                action="{{ $user ? url('/users/store/' . $user->id) : url('/users/store') }}"--}}
                {{--                method="POST">--}}
                {{--                --}}

                <div class="card-body">
                    {{--                    {route('doctors.update',[$user->id])}}--}}
                    <form class="forms-sample" action="{{ route('doctors.update', ['id' => $user->id]) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Full name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       placeholder="doctor name" value="                   {{$user->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Email</label>
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror" placeholder="email"
                                       value="                   {{$user->email}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Password</label>
                                <input type="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="doctor password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Gender</label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    @foreach(['male','female'] as $gender)
                                        <option value="{{$gender}}"
                                                @if($user->gender==$gender)selected @endif>{{$gender}}</option>
                                    @endforeach
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Education</label>
                                <input type="text" name="education"
                                       class="form-control @error('education') is-invalid @enderror"
                                       placeholder="doctor highest degree"
                                       value="                   {{$user->education}}">
                                @error('education')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Address</label>
                                <input type="text" name="address"
                                       class="form-control @error('address') is-invalid @enderror"
                                       placeholder="doctor address" value="{{$user->address}}">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Specialist</label>

                                    <input type="text" name="department"
                                           class="form-control @error('department') is-invalid @enderror"
                                           placeholder="doctor department" value="{{$user->department}}">

                                    {{--                                    <select name="department" class="form-control">--}}


                                    {{--                                        @foreach(App\Models\Department::all() as $department)--}}
                                    {{--                                            <option value="{{$department->department}}"--}}
                                    {{--                                                    @if($user->department==$department->department)selected @endif>{{$department->department}}</option>--}}
                                    {{--                                        @endforeach--}}


                                    {{--                                    </select>--}}


                                    @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone number</label>
                                    <input type="text" name="phone_number"
                                           class="form-control @error('phone_number') is-invalid @enderror"
                                           value="{{$user->phone_number}}">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file"
                                           class="form-control file-upload-info @error('image') is-invalid @enderror"
                                           placeholder="Upload Image" name="image" value="{{$user->image}}">
                                    <span class="input-group-append">

                        </span>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Role</label>
                                <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                    <option value="">Please select role</option>
                                    @foreach(App\Models\Role::where('name','!=','patient')->get() as $role)
                                        <option value="{{$role->id}}"
                                                @if($user->role_id==$role->id)selected @endif>{{$role->name}}</option>
                                    @endforeach

                                </select>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleTextarea1">About</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="exampleTextarea1" rows="4" name="description">
                {{$user->description}}

                </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        @csrf
                        <div class="card-footer text-right">
                            <button type="submit"
                                    onclick="return confirm('Are you sure you want to edit this user?')"
                                    class="btn btn-secondary mr-2"> Save
                            </button>
                            <a href="/doctors" class="btn btn-dark">Cancel</a>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
