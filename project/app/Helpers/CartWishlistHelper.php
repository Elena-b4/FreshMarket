<?php

namespace App\Helpers;

class CartWishlistHelper
{
    public static function arrayForFill($product): array
    {
        return [
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->sale_price,
            'photo' => $product->main_image_path,
        ];
    }

    public static function arrayForUpdateCart($data, $product): array
    {
        return [
            'name' => $product->name,
            'quantity' => $data['quantity'],
            'price' => $product->sale_price,
            'photo' => $product->main_image_path,
        ];
    }

    public static function addProductToCartOrWishlist($cart, $product, $id, $path)
    {
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++; // if cart not empty then check if this product exist then increment quantity
        } elseif (!$cart) {
            $cart = [$id => self::arrayForFill($product)]; //if cart is empty then this the first product
        } else {
            $cart[$id] = self::arrayForFill($product); // if item not exist in cart then add to cart with quantity = 1
        }
        session()->put($path, $cart);
    }

    public static function updateProductInCart($data, $cart, $id, $product)
    {
        if ($data['quantity'] <= 0) {
            session()->forget('/product-cart.' . $id);
        } else {
            $cart[$id] = self::arrayForUpdateCart($data, $product);
            session()->put('/product-cart', $cart);
        }
    }
}
