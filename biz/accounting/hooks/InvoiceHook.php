<?php

namespace biz\accounting\hooks;

use biz\app\Hooks;
use biz\accounting\models\InvoiceHdr;
use biz\accounting\models\InvoiceDtl;
use yii\base\UserException;

/**
 * Description of Invoice
 *
 * @author MDMunir
 */
class InvoiceHook extends \yii\base\Behavior
{

    public function events()
    {
        return [
            Hooks::E_PPREC_23 => 'purchaseReceiveEnd'
        ];
    }

    protected function createInvoice($params)
    {
        $invoice = new InvoiceHdr();
        $invoice->id_vendor = $params['id_vendor'];
        $invoice->inv_date = $params['date'];
        $invoice->inv_value = $params['value'];
        $invoice->type = $params['type'];
        $invoice->due_date = date('Y-m-d', strtotime('+1 month'));
        $invoice->status = 0;
        if (!$invoice->save()) {
            throw new UserException(implode("\n", $invoice->getFirstErrors()));
        }

        $invDtl = new InvoiceDtl();
        $invDtl->id_invoice = $invoice->id_invoice;
        $invDtl->id_reff = $params['id_ref'];
        $invDtl->trans_value = $params['value'];
        if (!$invDtl->save()) {
            throw new UserException(implode("\n", $invDtl->getFirstErrors()));
        }
    }

    /**
     * 
     * @param \biz\base\Event $event
     */
    public function purchaseReceiveEnd($event)
    {
        /* @var $model \biz\accounting\models\PurchaseHdr */
        $model = $event->params[0];
        $this->createInvoice([
            'id_vendor' => $model->id_supplier,
            'type' => InvoiceHdr::TYPE_PURCHASE,
            'value' => $model->purchase_value * (1 - $model->item_discount * 0.01),
            'date' => $model->purchase_date,
            'id_ref' => $model->id_purchase,
        ]);
    }
}