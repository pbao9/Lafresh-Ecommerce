<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <x-button.submit :title="__('Cập nhật')" />
            <x-button.modal-delete data-route="{{ route('admin.user.delete', $user->id) }}" :title="__('Xóa')" />
        </div>
    </div>
    @if ($user->level)
        <div class="card mb-3">
            <div class="card-header">
                {{ __('Cấp bậc') }}
            </div>
            <div class="card-body p-2 d-flex justify-content-between">
                <span class="badge bg-blue-lt">{{ optional($user->level)->name }}</span>
                <span>@lang('Giảm :value', ['value' => optional($user->level)->showPlainValue()])</span>
            </div>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-header">{{ __('Vai trò') }}</div>
        <div class="card-body p-2">
            <x-select name="roles" :required="true">
                <x-select-option value="" :title="__('Chọn vai trò')" />
                @foreach ($roles as $key => $value)
                    <x-select-option :option="$user->roles->value" :value="$key" :title="__($value)" />
                @endforeach
            </x-select>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header"> {{ __('Chiết khấu') }}</div>
        <div class="card-body p-2">
            <div class="input-group edit-input">
                <input name="discount_user" type="number" class="form-control input-value" placeholder="Chiết khấu người dùng" value="{{ $user->discount_user }}">
                <button class="btn" type="button">%</button>
            </div>
            
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            {{ __('Ảnh đại diện') }}
        </div>
        <div class="card-body p-2">
            <x-input-image-ckfinder name="avatar" showImage="avatar" :value="$user->avatar" />
        </div>
    </div>
</div>
