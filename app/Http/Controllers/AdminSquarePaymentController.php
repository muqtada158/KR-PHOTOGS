<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use App\Mail\SendInvoice;

class AdminSquarePaymentController extends Controller
{
    public function square_page()
    {
        return view('square');
    }
    public function __construct()
    {
        $accessToken = env('SQUARE_ACCESS_TOKEN', 'EAAAESHkNCVsEUFqbx6vgaLckH8KdpbZNlfSLGxlduH2-fmtBF3aQ995Rx8O7PnV');
        $this->locationId = env('SQUARE_LOCATION_ID', 'G47WZ9XYXBF6N');
        $defaultApiConfig = new \SquareConnect\Configuration();
        $defaultApiConfig->setHost("https://connect.squareup.com");
        $defaultApiConfig->setAccessToken($accessToken);
        $this->defaultApiClient = new \SquareConnect\ApiClient($defaultApiConfig);
    }

    public function sendInvoice($package,$date,$time,$total,$additional,$mailto,$fullname,$email,$phone,$person){
            $details = [
                'package' => $package,
                'date' => $date,
                'time' => $time,
                'total_amount' => $total,
                'additional'=> $additional,
                'fullname'=> $fullname,
                'email'=>$email,
                'phone'=>$phone,
                'additional_person'=>$person
            ];
            //\Mail::to(['devpetyr911@gmail.com',$mailto])->send(new SendInvoice($details));
            \Mail::to(['pscott41168@gmail.com',$mailto])->send(new SendInvoice($details));
    }

    public function refund($paymentId)
    {
        $refundApi = new \SquareConnect\Api\RefundsApi($this->defaultApiClient);
        $body = new \SquareConnect\Model\RefundPaymentRequest(); // \SquareConnect\Model\RefundPaymentRequest | An object containing the fields to POST for the request.  See the corresponding object definition for field details.
        $amountMoney = new \SquareConnect\Model\Money();

        # Monetary amounts are specified in the smallest unit of the applicable currency.
        # This amount is in cents. It's also hard-coded for $1.00, which isn't very useful.
        $amountMoney->setAmount(100);
        $amountMoney->setCurrency("USD");

        $body->setPaymentId($paymentId);
        $body->setAmountMoney($amountMoney);
        $body->setIdempotencyKey(uniqid());
        $body->setReason('wrong order');
        try {
            $result = $refundApi->refundPayment($body);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling RefundsApi->refundPayment: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function addCustomer($name, $email) {

//        $name = "XXXX";
//        $email = "xxxx@gmail.com";

        $customer = new \SquareConnect\Model\CreateCustomerRequest();
        $customer->setGivenName($name);
        $customer->setEmailAddress($email);



        $customersApi = new \SquareConnect\Api\CustomersApi($this->defaultApiClient);

        try {
            $result = $customersApi->createCustomer($customer);
            $id = $result->getCustomer()->getId();
            return $id;

        } catch (Exception $e) {
            return "";
            Log::info($e->getMessage());
            //echo 'Exception when calling CustomersApi->createCustomer: ', $e->getMessage(), PHP_EOL;
        }

        return "";
    }

    public function addCard(Request $request,OrderModel $id)
    {
        $cardNonce = $request->nonce;

        $customersApi = new \SquareConnect\Api\CustomersApi($this->defaultApiClient);
        $customerId = $this->addCustomer($id->fullname,$id->email);

        $body = new \SquareConnect\Model\CreateCustomerCardRequest();
        $body->setCardNonce($cardNonce);

        $result = $customersApi->createCustomerCard($customerId, $body);

        $card_id = $result->getCard()->getId();
        $card_brand = $result->getCard()->getCardBrand();
        $card_last_four = $result->getCard()->getLast4();
        $card_exp_month = $result->getCard()->getExpMonth();
        $card_exp_year = $result->getCard()->getExpYear();

        $this->charge($customerId, $card_id, (int)$id->amount);


        // shooting email

        $this->sendInvoice($id->package,$id->date,$id->time,$id->amount,$id->additional_text,$id->email,$id->fullname,$id->email,$id->phone,$id->additional_person);

        return redirect()->back();

    }

    public function charge($customerId, $cardId, $amount)
    {

        $payments_api = new \SquareConnect\Api\PaymentsApi($this->defaultApiClient);
        $payment_body = new \SquareConnect\Model\CreatePaymentRequest();

        $amountMoney = new \SquareConnect\Model\Money();

        # Monetary amounts are specified in the smallest unit of the applicable currency.
        # This amount is in cents. It's also hard-coded for $1.00, which isn't very useful.
        $amountMoney->setAmount($amount*100);
        $amountMoney->setCurrency("USD");
        $payment_body->setCustomerId($customerId);
        $payment_body->setSourceId($cardId);
        $payment_body->setAmountMoney($amountMoney);
        $payment_body->setLocationId($this->locationId);

        # Every payment you process with the SDK must have a unique idempotency key.
        # If you're unsure whether a particular payment succeeded, you can reattempt
        # it with the same idempotency key without worrying about double charging
        # the buyer.
        $payment_body->setIdempotencyKey(uniqid());

        try {
            $result = $payments_api->createPayment($payment_body);
            $transaction_id = $result->getPayment()->getId();
            return $transaction_id;
        } catch (\SquareConnect\ApiException $e) {
            echo "Exception when calling PaymentsApi->createPayment:";
            var_dump($e->getResponseBody());
        }

    }
}
