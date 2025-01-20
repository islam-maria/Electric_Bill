<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ElectricityBill;

class PaymentController extends Controller
{
    public function payBill($billId)
    {
        \Log::info('Received billId: ' . $billId);

        // Debug the route generation for the given billId
        dd(route('user.pay_bill', ['billId' => $billId]));
       

        // Fetch bill using the correct variable
        $bill = ElectricityBill::find($billId);

        if (!$bill) {
            return redirect()->route('user.profile')->with('error', 'Bill not found.');
        }

        if (empty(env('SSLCOMMERZ_STORE_ID')) || empty(env('SSLCOMMERZ_STORE_PASSWORD'))) {
            return redirect()->route('user.profile')->with('error', 'Payment configuration is missing.');
        }

        // Prepare SSLCommerz data
          $post_data = [
            'store_id' => env('SSLCOMMERZ_STORE_ID'),
            'store_passwd' => env('SSLCOMMERZ_STORE_PASSWORD'),
            'total_amount' => $bill->total_amount,
            'currency' => "BDT",
            'tran_id' => 'EBILL_' . uniqid(),
            'success_url' => route('payment.success', ['bill_id' => $bill->bill_id]),
            'fail_url' => route('payment.fail', ['bill_id' => $bill->bill_id]),
            'cancel_url' => route('payment.cancel', ['bill_id' => $bill->bill_id]),
        ];

        $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v4/api.php";

        // Send the data to SSLCommerz API
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

        $content = curl_exec($handle);
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if ($code == 200 && !(curl_errno($handle))) {
            curl_close($handle);
            $sslcommerzResponse = json_decode($content, true);

            if (!empty($sslcommerzResponse['GatewayPageURL'])) {
                return redirect($sslcommerzResponse['GatewayPageURL']);
            } else {
                \Log::error('SSLCommerz Gateway URL missing', $sslcommerzResponse);
                return redirect()->route('user.profile')->with('error', 'Failed to initiate payment.');
            }
        } else {
            \Log::error('SSLCommerz API call failed', [
                'HTTP_CODE' => $code,
                'CURL_ERROR' => curl_error($handle),
                'Response' => $content,
            ]);
            curl_close($handle);
            return redirect()->route('user.profile')->with('error', 'Failed to connect with SSLCommerz.');
        }
    }
    public function paymentSuccess(Request $request)
{
    \Log::info('Payment Success Response', $request->all());

    $bill_id = $request->input('bill_id');  // Assuming bill_id is passed in the request
    $amount = $request->input('amount');
    $currency = $request->input('currency');

    // Verify the bill by bill_id
    $bill = ElectricityBill::find($bill_id); // Use find() to get bill by bill_id

    if ($bill) {
        $bill->status = 'Paid';
        $bill->payment_date = now();
        $bill->save();

        return redirect()->route('user.profile')->with('success', 'Payment successful!');
    } else {
        return redirect()->route('user.profile')->with('error', 'Bill not found.');
    }
}

public function paymentFail(Request $request)
{
    \Log::error('Payment Fail Response', $request->all());

    $bill_id = $request->input('bill_id');  // Assuming bill_id is passed in the request

    // Log failure or update bill status to 'Failed'
    $bill = ElectricityBill::find($bill_id); // Use find() to get bill by bill_id

    if ($bill) {
        $bill->status = 'Failed';
        $bill->save();
    }

    return redirect()->route('user.profile')->with('error', 'Payment failed. Please try again.');
}

public function paymentCancel(Request $request)
{
    \Log::warning('Payment Cancel Response', $request->all());

    $bill_id = $request->input('bill_id');  // Assuming bill_id is passed in the request

    // Log cancellation or update bill status to 'Cancelled'
    $bill = ElectricityBill::find($bill_id); // Use find() to get bill by bill_id

    if ($bill) {
        $bill->status = 'Cancelled';
        $bill->save();
    }

    return redirect()->route('user.profile')->with('error', 'Payment cancelled by user.');
}
}