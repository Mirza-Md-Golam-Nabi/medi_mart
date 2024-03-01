<?php

namespace App\Services\OrderUser;

use App\Models\OrderUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class OrderUserService
{
    public function __construct()
    {
        //
    }

    public function index(): object
    {
        return OrderUser::orderBy('id', 'desc')
            ->get();
    }

    public function store(array $data): object
    {
        return OrderUser::create($data);
    }

    public function update(array $data, OrderUser $order_user): bool
    {
        return $order_user->update($data);
    }

    public function softDelete(OrderUser $order_user): bool
    {
        $order_user->deleted_by = auth()->id();
        $order_user->save();
        return $order_user->delete();
    }

    public function orderUserList(int $user_id): object
    {
        return OrderUser::where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function imageStore($image): string
    {
        $extension = $image->extension();
        $name = authUser()->id . '_' . time() . '.' . $extension;

        Storage::disk('order_image')->put($name, file_get_contents($image));

        return $name;
    }

    public function imageDelete(?string $image_name): void
    {
        $image_path = Storage::disk("order_image")->url($image_name);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }
    }
}
