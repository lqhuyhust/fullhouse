<?php

namespace App\Http\Controllers;
use Stripe;
use App\Models\Apartment;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function payment(Request $request, $id)
    {
        $deposit = Apartment::find($id)->deposit;
        return view('web.payment', compact(['deposit', 'id']));
    }

    public function execute(Request $request, $id)
    {
        $amount = $request->get('fee');
        $email = $request->get('email');
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $customer = $stripe->customers->create([
            'email' => $email,
        ]);
        $stripe->checkout->sessions->create([
            'customer' => $customer,
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'vnd',
                        'product_data' => ['name' => 'deposit'],
                        'unit_amount' => $amount,
  
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('index'),
            'cancel_url' => route('index'),
        ]);
        
        $apartment = Apartment::find($id);
        $apartment->status = 2;
        $apartment->save();
        
        return redirect(route('apartment', $id))->with('success', __('Payment successfully!'));
    }
}
