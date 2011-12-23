
<h3>広告。</h3>
<table>
    
    <?php echo Form::open("admin/ad/save/".$ad->id, array('enctype' => 'multipart/form-data'))?>
    <?php echo Form::input("id",$ad->id,array("type"=>"hidden"));?>
    <tbody>
        <tr><th>upload picture</th>
            <td>
        <?php echo HTML::image("upload/ad/".$ad->picture,array("width"=>"100"))?><br />
        <?php echo Form::file("picture")?>
            </td>
        </tr>
        <tr><th>タイトル</th><td><?php echo Form::input("title",$ad->title,array("type"=>"text","size"=>"40"))?></td></tr>
        <tr><th>Link</th><td><?php echo Form::input("link",$ad->link,array("type"=>"text","size"=>"40"))?></td></tr>
        <tr><th>Width</th><td><?php echo Form::input("width",$ad->width,array("type"=>"text","size"=>"10"))?>pixel</td></tr>
        <tr><th>Height</th><td><?php echo Form::input("height",$ad->height,array("type"=>"text","size"=>"10"))?>pixel</td></tr>
        <tr><th>Active</th>
            <td>
        <?php echo Form::checkbox('status', 1, (bool) $ad->status);?>
            </td></tr>
        
        <tr>
            <th></th>
            <td>
        <?php echo Form::input("submit", "保存", array("type"=>"submit"))?>
                <a href="<?php echo URL::site('admin/ad')?>"><?php echo Form::input("submit", "キャンセル", array("type"=>"button"))?></a>
                
            </td>
        </tr>
        
    </tbody>
    <?php echo Form::close();?>
</table>
