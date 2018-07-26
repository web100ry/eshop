<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
{

    public $image;
    public $gallery;

    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }



    public static function tableName()
    {
        return 'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id'=>'category_id']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
            [['image'], 'file',  'extensions' => 'png, jpg'],
            //[['gallary'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
            ] ;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID товару',
            'category_id' => 'Категорія',
            'name' => 'Назва',
            'content' => 'Контент',
            'price' => 'Ціна',
            'keywords' => 'Ключові слова',
            'description' => 'Мета-опис',
            'image' => 'Фото',
            'hit' => 'Хіт',
            'new' => 'Новинка',
            'sale' => 'Розпродаж',
        ];
    }
    public function upload(){
        if ($this->validate()) {
            $path = 'upload/store' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            return true;
        }
            else{
                return false;
            }

    }
}
