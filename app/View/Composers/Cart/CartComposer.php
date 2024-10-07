<?php

namespace App\View\Composers\Cart;

use Illuminate\View\View;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ShoppingCart\ShoppingCartRepositoryInterface;
use App\Admin\Repositories\BonusSale\BonusSaleRepositoryInterface;
use App\Admin\Repositories\Order\OrderDetailRepositoryInterface;
use App\Models\Product;

class CartComposer
{
    protected $repoProduct;
    protected $repository;
    protected $repoBonus;

    public function __construct(
        ShoppingCartRepositoryInterface $repository,
        ProductRepositoryInterface $repoProduct,
        BonusSaleRepositoryInterface $repoBonus,

    ) {
        $this->repository = $repository;
        $this->repoProduct = $repoProduct;
        $this->repoBonus = $repoBonus;
    }

    public function compose(View $view)
    {
        $id = null;
        $data = [];
        $product = [];
        $quantity = [];
        $price = [];
        $totalPrice = 0;
        $totalQuantity = 0;
        $totalProduct = 0;
        $id = [];
        $quantities = [];
        if (auth()->check()) {
            $id = auth()->user()->id;
            $data = $this->repository->findByUserId($id);
            $productId = $data->pluck('product_id')->toArray();
            $product = $this->repoProduct->find($productId);
            $totalProduct = count($product);
            $quantity = $data->pluck('quantity')->toArray();
            $price = $data->pluck('price_selling');
            $totalPrice = $data->pluck('price_selling')->sum();
            $totalQuantity = $data->pluck('quantity')->sum();;
            $id = $data->pluck('id');



            foreach ($data as $item) {
                $productId = $item->product_id;
                $quantity = $item->quantity;

                if (isset($quantities[$productId])) {
                    $quantities[$productId] += $quantity;
                } else {
                    $quantities[$productId] = $quantity;
                }
            }
        }

        $allProducts = Product::all();
        $product_no_cart = [];
        if (auth()->check()) {
            foreach ($allProducts as $item) {
                if ($product->where('id', $item->id)->count() > 0) {
                } else {
                    $product_no_cart[] = $item;
                }
            }
        }



        $stt = 1;
        // lat nua fix quantitise
        $view->with([
            'cart' => $data,
            'pr' => $product,
            'sl' => $quantity,
            'price' => $price,
            'id' => $id,
            'totalPrice' => $totalPrice,
            'stt' => $stt,
            'totalSl' => $totalQuantity,
            'totalProduct' => $totalProduct,
            'qty' => $quantities,
            'product_no_cart' => $product_no_cart,
        ]);
    }
}
