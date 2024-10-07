<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2">
            <x-button.submit :title="__('Thêm')" />
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header"> {{ __('Vai trò') }}</div>
        <div class="card-body p-2">
            <x-select name="roles" :required="true">
                <x-select-option value="" :title="__('Chọn vai trò')" />
                @foreach ($roles as $key => $value)
                    <x-select-option :value="$key" :title="__($value)" />
                @endforeach
            </x-select>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header"> {{ __('Chiết khấu') }}</div>
        <div class="card-body p-2">
            <div class="input-group edit-input">
                <input name="discount_user" type="number" class="form-control input-value" placeholder="Chiết khấu người dùng">
                <button class="btn" type="button">%</button>
            </div>
            
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            {{ __('Ảnh đại diện') }}
        </div>
        <div class="card-body p-2">
            <x-input-image-ckfinder name="avatar" showImage="avatar" />
        </div>
    </div>
</div>
