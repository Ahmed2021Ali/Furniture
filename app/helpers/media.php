<?php


use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


function uploadImage($files, $model, $folder)
{
    if (isset($files)) {
        foreach ($files as $file) {
            $model->addMedia($file)->toMediaCollection($folder);
        }
    }
}

function updateImage($files, $model, $folder)
{
    if ($files) {
        $model->media()->delete();
        foreach ($files as $file) {
            $model->addMedia($file)->toMediaCollection($folder);
        }
    }
}

function priceAfterOffer($price, $offer)
{
    if (isset($offer)) {
        return $price - ($price * ($offer / 100));
    } else {
        return null;
    }
}


function storeRole($roleName, $user)
{
    $defaultRole = DB::table('roles')->where('name', $roleName)->first()->name;
    if ($defaultRole) {
        $user->assignRole($defaultRole);
    }
}

function shoeMessage($message, $model, $resourceName, $token)
{
    $resource_prefix = "App\Http\Resources";
    $resource = $resource_prefix . '\\' . $resourceName;
    if ($token === true && $model !== null && $message !== null && $resourceName !== null) {
        // show Message and Model and Token
        return response()->json(['message' => __($message),
            'token' => $model->createToken("User Token")->plainTextToken, 'User' => new $resource($model)]);
    } elseif ($token === false && $model !== null && $message !== null && $resourceName !== null) {
        // show Message and Model
        return response()->json(['message' => __($message),
            class_basename($model) => $model instanceof Collection ? $resource::collection($model) : new $resource($model)
        ]);
    } elseif ($token === false && $model === null && $message !== null && $resourceName === null) {
        // show Message only
        return response()->json(['message' => __($message)]);
    } elseif ($token === false && $model !== null && $message === null && $resourceName !== null) {
        // show model only
        return response()->json([
            class_basename($model) => $model instanceof Collection ? $resource::collection($model) : new $resource($model)
        ]);
    }

    function calcReview($product): int
    {
        $totalRating1 = $product->reviews()->where('star', 1)->count();
        $totalRating2 = $product->reviews()->where('star', 2)->count();
        $totalRating3 = $product->reviews()->where('star', 3)->count();
        $totalRating4 = $product->reviews()->where('star', 4)->count();
        $totalRating5 = $product->reviews()->where('star', 5)->count();
        $totalRating = $product->reviews()->count();
        if ($totalRating > 0) {
            return ( $totalRating1 * 1 + $totalRating2 * 2 + $totalRating3 * 3 + $totalRating4 * 4 + $totalRating5 * 5 ) / $totalRating;
        }
        return 0;
    }
}
