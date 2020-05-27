<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" class="form-control" value="{{ old('pro_name',isset($product->pro_name) ? $product->pro_name : '') }}" placeholder="Tên sản phẩm" name="pro_name">
                @if($errors->has('pro_name'))
                    <span class="error-text">
                        {{ $errors->first('pro_name') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Mô tả:</label>
                <textarea name="pro_description" id="" class="form-control" cols="30" rows="3" placeholder="Mô tả ngắn sản phẩm">{{ old('pro_description',isset($product->pro_description) ? $product->pro_description : '') }}</textarea>
                @if($errors->has('pro_description'))
                    <span class="error-text">
                        {{ $errors->first('pro_description') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Nội dung:</label>
                <textarea name="pro_content" id="" class="form-control" cols="30" rows="3" placeholder="Nôi dung">{{ old('pro_content',isset($product->pro_content) ? $product->pro_content : '') }}</textarea>
                @if($errors->has('pro_content'))
                    <span class="error-text">
                        {{ $errors->first('pro_content') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Meta Title:</label>
                <input type="text" class="form-control" value="{{ old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '') }}" placeholder="Mate Description" name="pro_title_seo">
            </div>
            <div class="form-group">
                <label for="name">Meta Description:</label>
                <input type="text" class="form-control" value="{{ old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '') }}" placeholder="Mate Description" name="pro_description_seo">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="name">Loại sản phẩm:</label>
                <select class="form-control" name="pro_category_id" id="">
                    <option value="">----Chọn loại sản phẩm----</option>
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('pro_category_id', isset($product->pro_category_id) ? $product->pro_category_id : '') == $category->id ? "selected='selected'":"" }} >
                                {{ $category->c_name }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('pro_category_id'))
                    <span class="error-text">
                        {{ $errors->first('pro_category_id') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Giá sản phẩm:</label>
                <input type="number" class="form-control" value="{{ old('pro_price',isset($product->pro_price) ? $product->pro_price : '') }}" placeholder="Giá sản phẩm" name="pro_price">
                @if($errors->has('pro_price'))
                    <span class="error-text">
                        {{ $errors->first('pro_price') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">% khuyến mại:</label>
                <input type="number" class="form-control" value="{{ old('pro_sale',isset($product->pro_sale) ? $product->pro_sale : '') }}" placeholder="% giảm giá" name="pro_sale">
            </div>
            <div class="form-group">
                <label for="name">Avatar:</label>
                <input type="file" class="form-control" placeholder="Avatar" name="pr_avatar">
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="pro_hot"> Nổi bật</label>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-sm btn-success"> {{ isset($product) ? 'Cập nhật sản phẩm' : 'Thêm sản phẩm' }} </button> &nbsp;
    <a href="{{ route('admin.get.list.product') }}" class="btn btn-sm btn-danger">Hủy</a>
</form>
