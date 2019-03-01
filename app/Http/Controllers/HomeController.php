<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use wwwroth\Converge\Converge;
use function config;
use function view;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home', get_defined_vars());
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function store(Request $request)
    {
        /**
         * Available Params
          $fields = array(
          'ssl_merchant_id'=>$ssl_merchant_id,
          'ssl_user_id'=>$ssl_user_id,
          'ssl_pin'=>$ssl_pin,
          'ssl_transaction_type'=>urlencode($ssl_transaction_type),
          'ssl_billing_cycle'=>urlencode($ssl_billing_cycle),
          'ssl_next_payment_date'=>urlencode($ssl_next_payment_date), //  MM/DD/YYYY
          'ssl_total_installments'=>urlencode($ssl_total_installments),
          'ssl_amount'=>urlencode($ssl_amount),
          'ssl_card_number'=>urlencode($ssl_card_number),
          'ssl_exp_date'=>urlencode($ssl_exp_date),
          'ssl_cvv2cvc2_indicator'=>urlencode($ssl_cvv2cvc2_indicator),
          'ssl_cvv2cvc2'=>urlencode($ssl_cvv2cvc2),
          'ssl_first_name'=>urlencode($ssl_first_name),
          'ssl_last_name'=>urlencode($ssl_last_name),
          'ssl_email'=>urlencode($email),
          'ssl_invoice_number' => $ssl_invoice_number,
          'ssl_show_form'=>'false',
          'ssl_receipt_apprvl_method'=>'redg',
          'ssl_error_url'=>$redirectUrl, // where to go if error occures
          'ssl_receipt_apprvl_get_url'=>$redirectUrl //where to go on success
         */
        /**
         * Available types
          'ccauthonly',
          'ccavsonly',
          'ccsale',
          'ccverify',
          'ccgettoken',
          'cccredit',
          'ccforce',
          'ccbalinquiry',
          'ccgettoken',
          'ccreturn',
          'ccvoid',
          'cccomplete',
          'ccdelete',
          'ccupdatetip',
          'ccsignature',
          'ccaddrecurring',
          'ccaddinstall'
         */
        $converge = new Converge([
            'merchant_id' => config('app.evalon.account'),
            'user_id' => config('app.evalon.user'),
            'pin' => config('app.evalon.password'),
            'demo' => true,
        ]);
        $result = $converge->request($request->type, [
            'ssl_card_number' => $request->card,
            'ssl_exp_date' => $request->cardExp,
            'ssl_cvv2cvc2' => $request->cardCVV,
            'ssl_amount' => $request->amount,
            'ssl_avs_address' => $request->avsAddress,
            'ssl_avs_zip' => $request->avsZip,
            'ssl_billing_cycle' => $request->billingCycle,
            'ssl_next_payment_date' => $request->nextPayment
        ]);
        return view('display-data', ['result' => $result]);
    }

}
