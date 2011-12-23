<?php echo Html::script('media/ckeditor/ckeditor.js');?>
<h3>ユニークビジネス</h3>
<table>
    <?php echo Form::open("admin/webcontent/save/".$webcontent->id, array('enctype' => 'multipart/form-data'))?>
    <tbody>
        <?php echo Form::input("id",$webcontent->id,array("type"=>"hidden"));?>
        <tr><th>タイトル</th><td><?php echo Form::input("title",$webcontent->title,array("type"=>"text","size"=>"40"))?></td></tr>   
        <tr><th>本文</th><td><?php echo Form::textarea("content",$webcontent->content , array("rows"=>"9","class"=>"ckeditor"))?></td></tr>
        <tr>
            <th></th>
            <td>
        <?php echo Form::input("submit", "保存", array("type"=>"submit"))?>
                <a href="<?php echo URL::site('admin/webcontent')?>">
                <?php echo Form::input("submit", "キャンセル", array("type"=>"button"))?></a>
                
            </td>
        </tr>
        
    </tbody>
    <?php echo Form::close();?>
</table>
