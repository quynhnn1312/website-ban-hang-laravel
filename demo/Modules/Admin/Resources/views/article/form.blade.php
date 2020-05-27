<form action="" method="POST" class="mb-5">
    @csrf
    <div class="row">
        <div class="col-sm-11">
            <div class="form-group">
                <label for="name">Tên bài viết:</label>
                <input type="text" class="form-control" value="{{ old('ar_name',isset($article->ar_name) ? $article->ar_name : '') }}" placeholder="Tên bài viết" name="ar_name">
                @if($errors->has('ar_name'))
                    <span class="error-text">
                        {{ $errors->first('ar_name') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Mô tả:</label>
                <textarea name="ar_description" id="" class="form-control" cols="30" rows="3" placeholder="Mô tả ngắn bài viết">{{ old('ar_description',isset($article->ar_description) ? $article->ar_description : '') }}</textarea>
                @if($errors->has('ar_description'))
                    <span class="error-text">
                        {{ $errors->first('ar_description') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Nội dung:</label>
                <textarea name="ar_content" id="" class="form-control" cols="30" rows="3" placeholder="Nội dung">{{ old('ar_content',isset($article->ar_content) ? $article->ar_content : '') }}</textarea>
                @if($errors->has('ar_content'))
                    <span class="error-text">
                        {{ $errors->first('ar_content') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Meta Title:</label>
                <input type="text" class="form-control" value="{{ old('ar_title_seo',isset($article->ar_title_seo) ? $article->ar_title_seo : '') }}" placeholder="Mate Description" name="ar_title_seo">
            </div>
            <div class="form-group">
                <label for="name">Meta Description:</label>
                <input type="text" class="form-control" value="{{ old('ar_description_seo',isset($article->ar_description_seo) ? $article->ar_description_seo : '') }}" placeholder="Mate Description" name="ar_description_seo">
            </div>
            <div class="form-group">
                <label for="name">Avatar:</label>
                <input type="file" class="form-control" placeholder="Avatar" name="ar_avatar">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-sm btn-success"> {{ isset($article) ? 'Cập nhật bài viết' : 'Thêm bài  viết' }} </button> &nbsp;
    <a href="{{ route('admin.get.list.article') }}" class="btn btn-sm btn-danger">Hủy</a>
</form>
