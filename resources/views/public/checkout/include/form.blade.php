<form action="#" class="d-flex flex-column gap-3">
    @auth()
        <input type="text" name="customer_fullname" id="" placeholder="Họ tên" value="{{ auth()->user()->fullname }}"
               class="form-control shadow-none mb-3">
        <input type="text" name="customer_namestore" id="" placeholder="Tên cửa hàng"
               class="form-control shadow-none mb-3" value="{{ auth()->user()->name_store }}">
        <input type="text" name="customer_phone" id="" placeholder="Số điện thoại"
               class="form-control shadow-none mb-3" value="{{ auth()->user()->phone }}">
        <input type="text" name="shipping_address" id="" placeholder="Địa chỉ"
               class="form-control shadow-none mb-3" value="{{ auth()->user()->address }}">
    @endauth
    @csrf

    {{-- <input type="text" name="note" id="" placeholder="Ghi chú" class="form-control shadow-none mb-3"> --}}
</form>
