<?php $list;?>
<div>
     <h3>広告。管理</h3>
    <!--<p><?php echo HTML::anchor("admin/ad/add","新規追加")?></p>-->
    <table>
        
        <tr><th>写真</th>
            <th><?php HTML::anchor("admin/ad/sort/title/".$fsort,"title")?>タイトル</th>
            <th><?php HTML::anchor("admin/ad/sort/link/".$fsort,"Link");?>Link</th>
            <th>Status</th>
            <th>編集</th>
        <?php foreach($list as $ob):?>
            <?php $file=$ob->picture;?>
            
        <tr><td><?php echo HTML::image("upload/ad/".$ob->picture,array("width"=>"100"))?></td>
            <td>
                
                [<?php echo $ob->id;?>]&nbsp;<?php echo $ob->title?>
                <?php if($ob->width OR $ob->height):?>
                (&nbsp;<?php echo $ob->width;?>x<?php echo $ob->height;?>&nbsp;)
                <?php endif;?>
            </td>
            <td><?php echo $ob->link?></td>
            <td>
                <?php if($ob->status == 0):?>
                    <?php echo "Inactive";?>
                <?php elseif($ob->status == 1):?>
                    <?php echo "Active";?>
                <?php endif;?>
            </td>
            <td><?php echo HTML::anchor("admin/ad/operation/".$ob->id,"編集");?></td>
        </tr>
        <?php endforeach;?>
        
    </table>
</div>
