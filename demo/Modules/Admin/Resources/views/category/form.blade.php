@if(session()->has('message'))
    <div style="color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('message') }}
        {{ session()->put('message', null) }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Tên danh mục:</label>
        <input type="text" class="form-control" value="{{ old('name',isset($category->c_name) ? $category->c_name : '') }}" placeholder="Tên danh mục" name="name">
        @if($errors->has('name'))
            <span class="error-text">
                {{$errors->first('name')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="name">Icon:</label>
        <input type="text" class="form-control" value="{{ old('icon',isset($category->c_icon) ? $category->c_icon : '') }}" placeholder="fa fa-home" name="icon">
        @if($errors->has('icon'))
            <span class="error-text">
                {{$errors->first('icon')}}
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="name">Meta Title:</label>
        <input type="text" class="form-control" value="{{ old('c_title_seo',isset($category->c_title_seo) ? $category->c_title_seo : '') }}" placeholder="Mate tile" name="c_title_seo">
    </div>
    <div class="form-group">
        <label for="name">Meta Description:</label>
        <input type="text" class="form-control" value="{{ old('c_description_seo',isset($category->c_description_seo) ? $category->c_description_seo : '') }}" placeholder="Mate Description" name="c_description_seo">
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label><input type="checkbox" name="hot"> Nổi bật</label>
        </div>
    </div>

    <button type="submit" class="btn btn-sm btn-success"> {{ isset($category) ? 'Cập nhật danh mục' : 'Thêm danh mục' }} </button> &nbsp;
    <a href="{{ route('admin.get.list.category') }}" class="btn btn-sm btn-danger">Hủy</a>
</form>
