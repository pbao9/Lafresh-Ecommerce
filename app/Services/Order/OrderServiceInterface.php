<?php


namespace  App\Services\Order;


interface OrderServiceInterface{
    public function createOrder($productId, $qty, $request);
    public function payCart($request, $repoCart, $repoOrders, $repoProduct);
}
