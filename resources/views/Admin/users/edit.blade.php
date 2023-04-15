@extends('layouts.master')
@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
          <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
        </li>
      </ul>
      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="{{ asset('storage/images/'.($user->picture_id ? $user->pictures->image : '1.png')) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input type="file" id="upload" name="image" class="account-file-input" hidden="" accept="image/png, image/jpeg" form="formAccountSettings">
              </label>
              <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
              </button>

              <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
            </div>
          </div>
        </div>
        <hr class="my-0">
        <div class="card-body">
          <form action="{{ route('users.update',$user->id) }}" id="formAccountSettings" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Name</label>
                <input class="form-control" type="text" id="firstName" name="name" value="{{ $user->name }}" >
              </div>
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Email</label>
                <input class="form-control" type="email" id="firstName" name="email" value="{{ $user->email }}" readonly>
              </div>
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Role</label>
                <input class="form-control" type="text" id="firstName" name="role" value="{{ ($user->role == 0)? 'Người dùng':(($user->role == 1)?"Admin":"Nhân viên") }}" autofocus="" readonly>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
          </form>
        </div>
        <!-- /Account -->
      </div>
    </div>
  </div>
</div>
@endsection
