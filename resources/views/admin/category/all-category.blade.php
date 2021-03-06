@extends('admin-layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mt-3">Danh sách danh mục</h2>
            @if (session('success'))
                <div class="alert alert-primary alert-dismissible col-6" role="alert">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div>

            </div>
        </div>

        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr class="text-nowrap">
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Thuộc danh mục</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorypa as $item => $value1)
                        <tr>
                            <th scope="row">{{ $value1->category_id }}</th>
                            <td>{{ $value1->category_name }}</td>
                            <td>
                                @if ($value1->category_parent == 0)
                                    Danh mục cha
                                @else
                                @foreach ($category as $item => $value2)
                                    @if ($value2->category_id == $value1->category_parent)
                                        {{ $value2->category_name }}
                                    @endif
                                @endforeach
                                @endif

                            </td>
                            <td>{{ $value1->category_desc }}</td>
                            <td>
                                @if ($value1->category_status == 0)
                                    <a href="{{ URL::to('admin/category/active-category/' . $value1->category_id) }}">Ẩn</a>
                                @else
                                    <a href="{{ URL::to('admin/category/unactive-category/' . $value1->category_id) }}">Hiển
                                        thị</a>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-outline-danger" onclick="return confirm('Xoá danh mục này')" href="{{ URL::to('/admin/category/delete-category/' . $value1->category_id) }}">
                                    <i class="align-middle" data-feather="trash-2"></i></a>
                                <a class="btn btn-outline-warning" href="{{ URL::to('/admin/category/edit-category/' . $value1->category_id) }}">
                                    <i class="align-middle" data-feather="edit"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="float-right mt-2">
                {!! $categorypa->render('vendor.pagination.custom') !!}
            </div>

        </div>
    </div>
@endsection
