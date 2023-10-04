<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\payment\PaymentHashRequest;
use App\Models\Invoice;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends \Illuminate\Routing\Controller
{
    public function makeHashToken(PaymentHashRequest $request)
    {

        $requestData = $request->validated();

        $merchant_id = "1224303";
        $order_id = random_int(1000000000, 9999999999);
        $amount = $requestData['amount'];
        $currency = $requestData['currency'];
        $merchant_secret = "NDI4MDU3MDEwODM3MjM2NjcxODEzNTQ0ODc5MDIxMTA5MjU4NTQ2";

        $hash = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )
        );

        $userData = User::where('email', $requestData['email'])->first();
        $invoiceId = Str::random(30);
        $responseData = [
            "merchant_id" => $merchant_id,
            "order_id" => $order_id,
            "items" => $requestData['items'],
            "invoice_id" => $invoiceId,
            "amount" => $amount,
            "currency" => "LKR",
            "hash" => $hash,
            "first_name" => $userData['first_name'],
            "last_name" => $userData['last_name'],
            "email" => $userData['email'],
            "phone" => $userData['mobile'],
            "address" => $userData['address'],
            "city" => $userData->city->name,
            "country" => "Sri Lanka",
            "delivery_address" => $userData['address'],
            "delivery_city" => $userData->city->name,
            "delivery_country" => "Sri Lanka",
        ];

        Invoice::create([
            'order_id' => $order_id,
            'invoice_id' => $invoiceId,
            'items' => $requestData['items'],
            'amount' => $amount,
            'currency' => "LKR",
            'hash' => $hash,
            'first_name' => $userData['first_name'],
            'last_name' => $userData['last_name'],
            'email' => $userData['email'],
            'phone' => $userData['mobile'],
            'address' => $userData['address'],
            'city' => $userData->city->name,
            'country' => "Sri Lanka",
            'delivery_address' => $userData['address'],
            'delivery_city' => $userData->city->name,
            'delivery_country' => "Sri Lanka",
            'estimated_delivery_date' => Carbon::now()->addDay(5),

        ]);
        return response()->json([
            'PaymentData' => $responseData,
            'message' => "Payment Created"
        ]);
    }
}
