<?php

namespace App\Http\Controllers\Order;

use App\Admin\Http\Controllers\Controller;
use App\Enums\Order\OrderStatus;
use App\Models\OrderDetail;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Admin\Repositories\Order\OrderDetailRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;

class OrderController extends Controller
{
    protected $repoProduct;
    protected $repoDetail;
    public function __construct(
        OrderRepositoryInterface $repository,
        OrderDetailRepositoryInterface $repoDetail,
        ProductRepositoryInterface $repoProduct
    ) {
        parent::__construct();
        $this->repository = $repository;
        $this->repoDetail = $repoDetail;
        $this->repoProduct = $repoProduct;
    }

    public function getView()
    {
        return [
            'index' => 'public.auth.orders.index',
            'items' => 'public.auth.orders.partials.item',
            'empty' => 'public.partials.no-record',
            'show' => 'public.auth.orders.show',
        ];
    }

    public function getRoute()
    {
        return [];
    }

    public function index(Request $request)
    {
        $filter = ['user_id' => auth()->user()->getIdOrder()];
        if ($request->has('status')) {
            $filter['status'] = $request->get('status');
        }

        $orders = $this->repository->paginate($filter, [], [], 5);
        $productData = [];
        foreach ($orders->items() as $value) {
            $idOrders = $value->id;
            $orderDetails = OrderDetail::where('order_id', $idOrders)->get();

            foreach ($orderDetails as $orderDetail) {
                $productId = $orderDetail->product_id;
                $productData[$idOrders][] = [
                    'product' => $this->repoProduct->find($productId),
                    'qty' => $orderDetail->qty,
                ];
            }
        }

        $breadcrums = [['label' => trans('Danh sách đơn hàng')]];
        $status = OrderStatus::asSelectArray();

        if ($request->ajax()) {
            return response()->json([
                'html' => $this->renderItems($orders),
                'empty' => $orders->isEmpty()
            ], 200);
        }


        return view($this->view['index'], compact('breadcrums', 'status', 'orders', 'productData'));
    }


    public function show($id)
    {
        $breadcrums = [['label' => trans('Đơn hàng'), 'url' => route('order.index')], ['label' => trans('Chi tiết đơn hàng')]];
        $order = $this->repository->findOrFail($id, ['orderDetails']);
        $orderId = $order->id;
        $orderDetails = OrderDetail::where('order_id', $orderId)->get();
        $product_id = $orderDetails->pluck('product_id');
        $qty = $orderDetails->pluck('qty');
        $productDataShow = $this->repoProduct->find($product_id);

        // dd($order->orderDetails[0]->detail);
        return view($this->view['show'], compact('order', 'breadcrums', 'productDataShow', 'qty'));
    }

    public function renderItems($orders)
    {

        if ($orders->isEmpty()) {
            return view($this->view['empty'])->render();
        }


        $html = '';


        foreach ($orders as $order) {
            $html .= view($this->view['items'], compact('order'))->render();
        }

        return $html;
    }

    public function cancel($id)
    {
        $response = $this->repository->cancel($id);

        if ($response) {
            return back()->with('success', trans('notifySuccess'));
        }
        return back()->with('error', trans('notifyFail'));
    }
}
