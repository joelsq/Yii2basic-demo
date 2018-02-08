<?php

use yii\helpers\Html;
?>
<div class="box">
	<div class="box-title c">
		<h1>
			<i class="fa fa-table"></i>年级编码列表
		</h1>
	</div>
	<!--box-title end-->
	<div class="box-content">
		<div class="box-search">
			<form action="<?php echo Yii::app()->request->url;?>" method="get">
				<input type="hidden" name="r"
					value="<?php echo Yii::app()->request->getParam('r');?>"> <input
					type="hidden" name="school" id="school"
					value="<?php echo get_session('school');?>">

			</form>
			<div class="box-table">
				<table class="list">
					<thead>
						<tr>
							<th class="check"><input id="j-checkall" class="input-check"
								type="checkbox"></th>
							<th class="list-id">序号</th>
							<th><?php echo $model->getAttributeLabel('F_CODE');?></th>
							<th><?php echo $model->getAttributeLabel('F_NAME');?></th>
							<th><?php echo $model->getAttributeLabel('F_LENAME');?></th>
							<th><?php echo $model->getAttributeLabel('F_LLNAME');?></th>

						</tr>
					</thead>
					<tbody>
<?php
$index = 1;
foreach ($arclist as $v) {
    ?>
                    <tr>
							<td class="check check-item"><input class="input-check"
								type="checkbox" value="<?php echo Html::encode($v->f_id); ?>"></td>
							<td><span class="num num-1"><?php echo $index ?></span></td>
							<td><?php echo $v->F_CODE; ?></td>
							<td><?php echo $v->F_NAME; ?></td>
							<td><?php echo $v->F_LENAME; ?></td>
							<td><?php echo $v->F_LLNAME; ?></a></td>

						</tr>
<?php $index++; } ?>
                </tbody>
				</table>
			</div>
			<!--box-table end-->

			<div class="box-page c"><?php $this->page($pages); ?></div>
		</div>
		<!--box-content end-->
	</div>
	<!--box end-->