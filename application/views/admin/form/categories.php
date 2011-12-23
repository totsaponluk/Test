<?php echo Html::script('media/ckeditor/ckeditor.js');?>
<h3>ニュース管理</h3>
<table>
    <?php echo Form::open("admin/categories/save", array('enctype' => 'multipart/form-data'))?>
    <tbody>
     <?php echo Form::input("id",$categories->id,array("type"=>"hidden"));?>
        <tr><th>タイトル</th><td><?php echo Form::input("name",$categories->name,array("type"=>"text","size"=>"40"))?></td></tr>   
        <th></th>
            <td>
        <?php echo Form::input("submit", "保存", array("type"=>"submit"))?>
                <a href="<?php echo URL::site('admin/categories')?>"><?php echo Form::input("submit", "キャンセル", array("type"=>"button"))?></a>
                
            </td>
        </tr>
        
    </tbody>
    <?php echo Form::close();?>
</table>
