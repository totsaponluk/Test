<?php echo Html::script('media/ckeditor/ckeditor.js');?>
<h3>ニュース管理</h3>
<table>
    <?php echo Form::open("admin/news/save", array('enctype' => 'multipart/form-data'))?>
    <tbody>
     <?php echo Form::input("id",$news->id,array("type"=>"hidden"));?>
        <tr><th>タイトル</th><td><?php echo Form::input("title",$news->title,array("type"=>"text","size"=>"40"))?></td></tr>   
        <tr><th>本文</th><td><?php echo Form::textarea("content", $news->content, array("rows"=>"9","class"=>"ckeditor"))?></td></tr>
        <tr>
            <th></th>
            <td>
        <?php echo Form::input("submit", "保存", array("type"=>"submit"))?>
                <a href="<?php echo URL::site('admin/news')?>"><?php echo Form::input("submit", "キャンセル", array("type"=>"button"))?></a>
                
            </td>
        </tr>
        
    </tbody>
    <?php echo Form::close();?>
</table>
