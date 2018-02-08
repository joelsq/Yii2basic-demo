<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

$this->title = 'Country';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
	<h1><?= Html::encode($this->title) ?></h1>
	<p>
         <?= Html::a('新建', ['update','id'=>""], ['class' => 'btn btn-success']) ?>
          <!-- ?= Html::a('更新', ['update'], ['class' => 'btn btn-primary']) ?> -->
     </p>
	<div class="row clearfix">
		<div class="grid-view">
			<div>
				<table class="table">
					<tbody>
						<!-- 查找表单 -->
<?php
$form = ActiveForm::begin([
    'id' => 'search-form'
    // 'method' => 'post'
]);
?>
            		<!-- 因为是查询的模型，所以使用的CountrySearch模型的$searchModel，在控制器中定义 -->
						<tr>
							<td><?= $form->field($searchModel, 'code')->textInput()->label('国家代码') ?></td>
							<td><?= $form->field($searchModel, 'name')->textInput()->label('国家名称') ?></td>
							<td><?= $form->field($searchModel, 'population')->textInput()->label('人口') ?></td>
							<td><?= $form->field($searchModel, 'chinesename')->textInput()->label('中文名') ?></td>
						</tr>
					</tbody>
				</table>
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?> 
			</div>
<?php ActiveForm::end() ?>
		</div>

		<!-- 主表格 -->
		<div class="grid-view">
			<table class="table">
				<thead>
					<tr>
						<th class="check"><input id="j-checkall" class="input-check"
							type="checkbox"></th>
						<th class="list-id">#</th>
						<th><?php echo $model->getAttributeLabel('code');?></th>
						<th><?php echo $model->getAttributeLabel('name');?></th>
						<th><?php echo $model->getAttributeLabel('population');?></th>
						<th><?php echo $model->getAttributeLabel('chinesename');?></th>

					</tr>
				</thead>
				<tbody>
<?php
$index = 1;
foreach ($countrys as $v) {
    ?>
                    <tr>
						<td class="check check-item"><input class="input-check"
							type="checkbox" value="<?php echo Html::encode($v->code); ?>"></td>
						<td><span class="num num-1"><?php echo $index ?></span></td>
						<td><?php echo $v->code; ?></td>
						<td><?php echo $v->name; ?></td>
						<td><?php echo $v->population;?></td>
						<td><?php echo $v->chinesename;?></td>
						<td><a href="<?= Url::to([ 'view', 'id'=>$v->code]); ?>">查看 </a> <a
							href="<?= Url::to([ 'update', 'id'=>$v->code]); ?>">编辑 </a>
							<?= Html::a('删除', ['delete', 'id' => $v->code], 
							    ['data' => ['confirm' => '你确定要删除该项?',
							        'method' => 'post',],]) ?>			
					</tr>
<?php $index++; } ?>
                </tbody>
			</table>
		</div>
	</div>
	<!-- 翻页 -->
<?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
