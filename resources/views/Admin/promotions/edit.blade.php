@extends('layouts.master')

@section('main-content')
    <div class="col-md-8 center-block" id="class-create">
        <div>
            <h2 style="margin:20px;">Quản lý mã khuyến mãi</h2>
        </div>
        <div class="card mb-4">
            <h5 class="card-header">Chỉnh sửa</h5>
            <div class="card-body">
                <form action="{{ route('promotions.update', $promotion->id) }}" method="POST" id="classForm">
                    @method('PUT')
                    @csrf
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Mã khuyến mãi</label>
                        <input type="text" name="promotion_name" class="form-control generate"
                            id={{ $errors->has('promotion_name') ? 'has_error' : '' }} placeholder=""
                            aria-describedby="defaultFormControlHelp" value="{{ $promotion->promotion_name }}">
                        <button type="button" class="btn btn-primary" onclick="Generate()">Sinh mã ngẫu nhiên</button>
                        @if ($errors->any())
                            <span style="color:red">
                                @error('promotion_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Giá trị khuyến mãi: (đơnvị:%)</label>
                        <input type="number" name="promotion_value" class="form-control"
                            id={{ $errors->has('promotion_value') ? 'has_error' : '' }} placeholder=""
                            aria-describedby="defaultFormControlHelp" value="{{ $promotion->promotion_value }}">
                        @if ($errors->any())
                            <span style="color:red">
                                @error('promotion_value')
                                    {{ $message }}
                                @enderror
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Danh mục</label>
                        <select id="defaultSelect" class="form-select" name="category_id">
                            <option value="{{ $promotion->categories->id }}">{{ $promotion->categories->name }}</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->any())
                        <span style="color:red">
                            @error('category_id')
                                {{ $message }}
                            @enderror
                        </span>
                    @endif
                </form>
                <div>
                    <button type="sumbit" class="btn btn-primary" form="classForm">Sửa</button>
                    <a href="{{ route('promotions.index') }}">
                        <button class="btn btn-success">Trở lại</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function Generate() {
            let r = (Math.random() + 1).toString(36).substring(7);
            document.querySelector('.generate').value = r;
        }
    </script>
@endsection
