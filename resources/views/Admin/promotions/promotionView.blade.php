@extends('layouts.master')

@section('main-content')
    <div class="col-md-8 center-block" id="class-create">
        <div>
            <h2 style="margin:20px;">Quản lý mã khuyến mãi</h2>
        </div>
        <div class="card mb-4">
            <h5 class="card-header">Bạn không phải quản trị viên, liên hệ quản tri viên để được cấp quyền tạo mã khuyến mãi</h5>
            <div class="card-body">
                    <a href="{{ route('promotions.index') }}">
                        <button class="btn btn-success">Danh sách</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
