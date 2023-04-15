@extends('layouts.master')

@section('main-content')
    <div class="col-md-8 center-block" id="class-create">
        <div>
            <h2 style="margin:20px;">Quản lý user</h2>
        </div>
        <div class="card mb-4">
            <h5 class="card-header">Thêm mới</h5>
            <div class="card-body">
                <form action="/admin/users/store" method="POST" id="classForm" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Tên</label>
                        <input type="text" name="name" class="form-control"
                            id={{ $errors->has('name') ? 'has_error' : '' }} placeholder=""
                            aria-describedby="defaultFormControlHelp" value="{{ old('name') }}">
                        @if ($errors->any())
                            <span style="color:red">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span><br>
                        @endif
                        <label for="defaultFormControlInput" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                            id={{ $errors->has('email') ? 'has_error' : '' }} placeholder=""
                            aria-describedby="defaultFormControlHelp" value="{{ old('email') }}">
                        @if ($errors->any())
                            <span style="color:red">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span><br>
                        @endif
                        <label for="defaultFormControlInput" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control"
                            id={{ $errors->has('password') ? 'has_error' : '' }} placeholder=""
                            aria-describedby="defaultFormControlHelp" value="{{ old('password') }}">

                            <label for="password-confirm"
                                class=" col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        @if ($errors->any())
                            <span style="color:red">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span><br>
                        @endif
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">Role</label>
                            <select id="defaultSelect" class="form-select" name="role">
                                <option value="2">Nhân viên</option>
                                <option value="1">Quản trị viên</option>
                            </select>
                        </div>
                        @if ($errors->any())
                            <span style="color:red">
                                @error('role')
                                    {{ $message }}
                                @enderror
                            </span><br>
                        @endif
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Tải ảnh lên</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>
                    </div>

                </form>
                <div>
                    <button type="sumbit" class="btn btn-primary" form="classForm">Thêm mới</button>
                    <a href="{{ route('users.index') }}">
                        <button class="btn btn-success">Danh sách</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
