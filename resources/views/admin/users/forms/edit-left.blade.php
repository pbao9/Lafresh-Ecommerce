<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin khách hàng') }}</h2>
        </div>
        <div class="row card-body">
            <!-- username -->
            {{-- <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tên đăng nhập') }}:</label>
                    <x-input name="username" :value="$user->username" :required="true" :placeholder="__('Tên đăng nhập')" />
                </div>
            </div> --}}
            <!-- Fullname -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Họ và tên') }}:</label>
                    <x-input name="fullname" :value="$user->fullname" :required="true" placeholder="{{ __('Họ và tên') }}" />
                </div>
            </div>
            <!-- email -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Email') }}:</label>
                    <x-input-email name="email" :value="$user->email" :required="true" />
                </div>
            </div>
            <!-- namestore -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('name_store') }}:</label>
                    <x-input name="text" :value="$user->name_store" :required="true" placeholder="{{ __('name_store') }}"
                        name="name_store" />
                </div>
            </div>

            <!-- phone -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Số điện thoại') }}:</label>
                    <x-input-phone name="phone" :value="$user->phone" :required="true" />
                </div>
            </div>
            <!-- new password -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Mật khẩu') }}:</label>
                    <x-input-password name="password" />
                </div>
            </div>
            <!-- new password confirmation-->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Xác nhận mật khẩu') }}:</label>
                    <x-input-password name="password_confirmation" data-parsley-equalto="input[name='password']"
                        data-parsley-equalto-message="{{ __('Mật khẩu không khớp.') }}" />
                </div>
            </div>
            <!-- birthday -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Ngày sinh') }}: </label>
                    <x-input type="date" name="birthday" :value="$user->birthday" :required="true" />
                </div>
            </div>
            <!-- address -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('address') }}:</label>
                    <x-input name="text" :value="$user->address" :required="true" placeholder="{{ __('address') }}"
                        name="address" />
                </div>
            </div>
        </div>
    </div>
</div>
