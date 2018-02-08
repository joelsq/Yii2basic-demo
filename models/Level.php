<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Level extends model{

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{base_level}}';
    }

    /**
     * 模型验证规则
     */
    public function rules()
    {
        return array(
            array(
                'F_CODE',
                'required',
                'message' => '{attribute} 不能为空'
            ),
            array(
                'F_NAME',
                'required',
                'message' => '{attribute} 不能为空'
            ),
            
            array(
                'F_LENAME,F_LSNAME,F_LLNAME',
                'safe'
            )
        );
    }

    /**
     * 模型关联规则
     */
    // public function relations() {
    // return array(
    // 'club_list' => array(self::BELONGS_TO, 'ClubList', 'club_id'),
    // 'base_code' => array(self::BELONGS_TO, 'BaseCode', 'watermark_area'),
    // );
    // }
    
    /**
     * 属性标签
     */
    public function attributeLabels()
    {
        return array(
            'f_id' => 'ID',
            'F_CODE' => '类型内部编码',
            'F_NAME' => '类型内的名称',
            'F_LENAME' => '年级英文名',
            'F_LSNAME' => '简称名称',
            'F_LLNAME' => '中文全名',
            'F_PNAME' => '阶段，包括幼兒、小學、初中、高中',
            'F_value' => '短名称，用于输入时使用',
            'F_SHOW' => '0',
            'F_TYPE' => '分类类型',
            'F_COL1' => '表单位置1',
            'F_COL2' => '表单位置2',
            'F_COURSECODE' => '课程编码最小代码',
            'F_SPARE' => '余暇课程',
            'F_SHOWLATE' => '0',
            'F_TIMESSEC' => '9',
            'F_SHOWMSG' => '',
            'F_TREM' => '毕业学期'
        );
    }

    protected function beforeSave()
    {
        parent::beforeSave();
        
        // if ($this->isNewRecord) {
        // $this->gfid = Yii::app()->session['admin_id'];
        // $this->gfaccount = Yii::app()->session['gfaccount'];
        // }
        
        return true;
    }
    
    // //查找第一条记录，按排序
    // public function getTopOne($order) {
    // // $rs = $this->find('id=' . $id);
    // if ($order='ASC'){
    // $rsx=$this->find()->orderBy('id ASC')->one();
    // }
    // else {
    // $rsx=$this->find()->orderBy('id DESC')->one();
    // }
    // }
    
    // return $rsx;
    // }
}
