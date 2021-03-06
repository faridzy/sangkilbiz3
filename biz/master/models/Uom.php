<?php

namespace biz\master\models;

use Yii;

/**
 * This is the model class for table "uom".
 *
 * @property integer $id_uom
 * @property string $cd_uom
 * @property string $nm_uom
 * @property string $create_at
 * @property integer $create_by
 * @property string $update_at
 * @property integer $update_by
 *
 * @property ProductStock[] $productStocks
 * @property Price[] $prices
 * @property ProductUom[] $productUoms
 * @property NoticeDtl[] $noticeDtls
 * @property Cogs[] $cogs
 * @property SalesDtl[] $salesDtls
 * @property StockAdjusmentDtl $stockAdjusmentDtl
 * @property PurchaseDtl[] $purchaseDtls
 * @property StockOpnameDtl $stockOpnameDtl
 * @property TransferDtl[] $transferDtls
 */
class Uom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%uom}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cd_uom', 'nm_uom', 'isi'], 'required'],
            [['cd_uom'], 'string', 'max' => 4],
            [['nm_uom'], 'string', 'max' => 32],
            [['cd_uom'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_uom' => 'Id Uom',
            'cd_uom' => 'Cd Uom',
            'nm_uom' => 'Nm Uom',
            'isi' => 'Isi',
            'create_at' => 'Create At',
            'create_by' => 'Create By',
            'update_at' => 'Update At',
            'update_by' => 'Update By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductStocks()
    {
        return $this->hasMany(ProductStock::className(), ['id_uom' => 'id_uom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Price::className(), ['id_uom' => 'id_uom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductUoms()
    {
        return $this->hasMany(ProductUom::className(), ['id_uom' => 'id_uom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticeDtls()
    {
        return $this->hasMany(NoticeDtl::className(), ['id_uom' => 'id_uom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCogs()
    {
        return $this->hasMany(Cogs::className(), ['id_uom' => 'id_uom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesDtls()
    {
        return $this->hasMany(SalesDtl::className(), ['id_uom' => 'id_uom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockAdjusmentDtl()
    {
        return $this->hasOne(StockAdjusmentDtl::className(), ['id_uom' => 'id_uom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseDtls()
    {
        return $this->hasMany(PurchaseDtl::className(), ['id_uom' => 'id_uom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockOpnameDtl()
    {
        return $this->hasOne(StockOpnameDtl::className(), ['id_uom' => 'id_uom']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransferDtls()
    {
        return $this->hasMany(TransferDtl::className(), ['id_uom' => 'id_uom']);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'BizTimestampBehavior',
            'BizBlameableBehavior',
        ];
    }

}
