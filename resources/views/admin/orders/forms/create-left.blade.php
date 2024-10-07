<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-between">
            <h2 class="mb-0">{{ __('Thông tin đơn hàng') }}</h2>
        </div>
        <div class="row card-body">
            <div class="col-12 col-md-6">
                <h3>{{ __('Thông tin chung') }}</h3>
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label">{{ __('Khách hàng') }}</label>
                        <a href={{ route('admin.user.create') }} class="text-decoration-none">+ Thêm khách hàng</a>
                    </div>

                    <x-select class="select2-bs5-ajax" name="order[user_id]" :required="true">
                    </x-select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Hình thức thanh toán') }}</label>
                    <x-select name="order[payment_method]" :required="true">
                        @foreach ($payment_method as $key => $value)
                            <x-select-option :value="$key" :title="$value" />
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Hình thức Vận chuyển') }}</label>
                    <x-select name="order[shipping_method]" :required="true">
                        @foreach ($shipping_method as $key => $value)
                            <x-select-option :value="$key" :title="$value" />
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Ghi chú') }}:</label>
                    <textarea name="order[note]" class="form-control">{{ old('order.note') }}</textarea>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h3>{{ __('Thông tin giao hàng') }}</h3>
                <div id="infoShipping">
                    @include('admin.orders.partials.info-shipping')
                </div>
            </div>
            <div class="col-12">
                @include('admin.orders.partials.products')
            </div>
        </div>
    </div>
</div>
