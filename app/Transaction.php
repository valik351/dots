<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Transaction
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $err_code
 * @property string $err_description
 * @property string $version
 * @property string $status
 * @property string $type
 * @property string $err_erc
 * @property string $redirect_to
 * @property string $token
 * @property string $card_token
 * @property string $payment_id
 * @property string $public_key
 * @property string $acq_id
 * @property string $order_id
 * @property string $liqpay_order_id
 * @property string $description
 * @property string $sender_phone
 * @property string $sender_card_mask2
 * @property string $sender_card_bank
 * @property string $sender_card_country
 * @property string $ip
 * @property string $info
 * @property string $customer
 * @property float $amount
 * @property string $currency
 * @property string $sender_commission
 * @property string $receiver_commission
 * @property string $agent_commission
 * @property string $amount_debit
 * @property string $amount_credit
 * @property string $commission_debit
 * @property string $commission_credit
 * @property string $currency_debit
 * @property string $currency_credit
 * @property string $sender_bonus
 * @property string $amount_bonus
 * @property string $refund_amount
 * @property string $completion_date
 * @property string $authcode_debit
 * @property string $authcode_credit
 * @property string $rrn_debit
 * @property string $rrn_credit
 * @property string $arrn_debit
 * @property string $arrn_credit
 * @property string $verifycode
 * @property string $action
 * @property string $is_3ds
 * @property string $product_url
 * @property string $product_category
 * @property string $product_name
 * @property string $product_description
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereAcqId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereAction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereAgentCommission($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereAmountBonus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereAmountCredit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereAmountDebit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereArrnCredit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereArrnDebit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereAuthcodeCredit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereAuthcodeDebit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereCardToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereCommissionCredit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereCommissionDebit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereCompletionDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereCurrency($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereCurrencyCredit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereCurrencyDebit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereCustomer($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereErrCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereErrDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereErrErc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereIs3ds($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereLiqpayOrderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereOrderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction wherePaymentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereProductCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereProductDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereProductName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereProductUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction wherePublicKey($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereReceiverCommission($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereRedirectTo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereRefundAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereRrnCredit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereRrnDebit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereSenderBonus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereSenderCardBank($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereSenderCardCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereSenderCardMask2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereSenderCommission($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereSenderPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereVerifycode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transaction whereVersion($value)
 */
class Transaction extends Model
{
    protected $fillable = ['user_id', 'err_code', 'err_description', 'version', 'status', 'type', 'err_erc', 'redirect_to', 'token'
        , 'card_token', 'payment_id', 'public_key', 'acq_id', 'order_id', 'liqpay_order_id', 'description', 'sender_phone',
        'sender_card_mask2', 'sender_card_bank', 'sender_card_country', 'ip', 'info', 'customer', 'amount', 'currency',
        'sender_commission', 'receiver_commission', 'agent_commission', 'amount_debit', 'amount_credit', 'commission_debit',
        'commission_credit', 'currency_debit', 'currency_credit', 'sender_bonus', 'amount_bonus', 'refund_amount',
        'completion_date', 'authcode_debit', 'authcode_credit', 'rrn_debit', 'rrn_credit', 'arrn_debit', 'arrn_credit',
        'verifycode', 'action', 'is_3ds', 'product_url', 'product_description'];

    public function isSuccessful()
    {
        return in_array($this->status, ['success', 'sandbox']);
    }

    public static function getOrderIdData($order_id)
    {
        $order_id = explode('_', $order_id);
        return [
            'id' => $order_id[0],
            'user_id' => $order_id[array_search('user', $order_id) + 1],
            'course_id' => $order_id[array_search('course', $order_id) + 1],
        ];
    }
}
