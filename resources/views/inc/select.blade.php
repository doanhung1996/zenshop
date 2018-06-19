<select name="parent_id">
    <option value="0">-- Chọn Cấp Cha --</option>
    @foreach($parent_cat as $cat)
        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
    @endforeach
</select>
