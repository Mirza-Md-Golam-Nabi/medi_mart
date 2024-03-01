<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUser\StoreOrderUserRequest;
use App\Http\Requests\OrderUser\UpdateOrderUserRequest;
use App\Models\Address;
use App\Models\OrderUser;
use App\Services\Address\AddressService;
use App\Services\OrderUser\OrderUserService;
use Illuminate\Http\JsonResponse;

class OrderUserController extends Controller
{
    protected $order_user;

    public function __construct()
    {
        $this->order_user = new OrderUserService();
    }

    public function index(): JsonResponse
    {
        $product = $this->order_user->index();
        return formatResponse(0, 200, 'Success', $product);
    }

    public function store(StoreOrderUserRequest $request): JsonResponse
    {
        $image_name = null;
        if ($request->hasFile('image')) {
            $image_name = $this->order_user->imageStore($request->image);
        }

        $address = (new AddressService())->store([
            'area_id' => $request->area_id,
            'street_address' => $request->street_address,
        ]);

        $order_user = $this->order_user->store(
            [
                'image' => $image_name,
                'user_id' => auth()->id(),
                'address_id' => $address->id,
            ] +
            $request->validated()
        );

        return formatResponse(0, 200, 'Success', $order_user);
    }

    public function show(OrderUser $order_user): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $order_user);
    }

    public function update(UpdateOrderUserRequest $request, OrderUser $order_user): JsonResponse
    {
        $image_name = $order_user->image;
        $validated_data = $request->validated();

        if ($request->hasFile('image')) {
            $this->order_user->imageDelete($image_name);

            $image_name = $this->order_user->imageStore($request->image);
        }

        $address = Address::find($order_user->address_id);

        (new AddressService())->update([
            'area_id' => $request->area_id,
            'street_address' => $request->street_address,
        ], $address);

        $this->order_user->update(['image' => $image_name] + $validated_data, $order_user);
        return formatResponse(0, 200, 'Success', $order_user->refresh());
    }

    public function destroy(OrderUser $order_user): JsonResponse
    {
        $this->order_user->softDelete($order_user);
        return $this->index();
    }

    public function orderUserList(?int $id = null): JsonResponse
    {
        $user_id = $id ?? auth()->id();
        $data = $this->order_user->orderUserList($user_id);
        return formatResponse(0, 200, 'Success', $data);
    }
}
