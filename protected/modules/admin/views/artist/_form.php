<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'artist-form',
        'enableAjaxValidation' => false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); 
    
    
    ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php //echo $form->textField($model, 'name', array('size' => 45, 'maxlength' => 45)); 
                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'model'=>$model,
                    'attribute'=>'name',
                    //'value'=>'',
                    'source'=>$this->createUrl('author/autoSearchAuthor'),
                    // additional javascript options for the autocomplete plugin
                    'options'=>array(
                                    'showAnim'=>'fold',
                    ),
                 ));
        ?> 
        <?php echo $form->error($model, 'name'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'gender'); ?>       
        <?php echo $form->dropDownList($model,'gender',  Person::getGender()); ?>
        <?php echo $form->error($model, 'gender'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'realname'); ?>
        <?php echo $form->textField($model, 'realname', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'realname'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'avatar'); ?>
        <?php echo $form->fileField($model, 'avatar'); ?>
        <?php echo $form->error($model, 'avatar'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'about'); ?>
        <?php $this->widget('application.extensions.cleditor.ECLEditor', array(
                'model'=>$model,
                'attribute'=>'about', 
                'options'=>array(
                    'width'=>'400',
                    'height'=>'200',
                    'useCSS'=>true,
                    //'controls' => 'bold italic underline strikethrough subscript superscript',
                ),
                'value'=>$model->about,
    ));
        ?>
        
        <?php echo $form->error($model, 'about'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'company'); ?>
        <?php echo $form->textField($model, 'company', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'company'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'birthday'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Person[birthday]',
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat'=> 'dd/mm/yy',
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'showButtonPanel' => 'true',

            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));
        ?>
        <?php //echo $form->textField($model, 'birthday', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'birthday'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->