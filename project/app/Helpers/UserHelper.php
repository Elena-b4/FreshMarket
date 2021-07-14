<?php


namespace App\Helpers;


use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\QuantityFromOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserHelper
{
    public static function storeOrder($data, $id)
    {
        try {
            DB::connection();
            $order = Order::create([
                'user_id' => $id,
                'total' => $data['total'],
            ]);
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $data['products'][0],
            ]);
            QuantityFromOrder::create([
                'value' => $data['quantity'][0],
                'order_id' => $order->id,
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public static function updateUserDetails($data, $user)
    {
        try {
            DB::connection();
            if (isset($data['avatar_path'])) {
                $image = $data['avatar_path'];
                $url = Storage::disk('local')->put('public/users_images', $image);
                $url = str_replace('public', 'storage', $url);
                dd($url);
            } else {
                $url = $user->avatar_path;
            }
            $data['avatar_path'] = $url;
            $user->update([
                'address' => $data['address'],
                'avatar_path' => $data['avatar_path'],
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }
}
