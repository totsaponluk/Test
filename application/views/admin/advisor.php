<?php $list;?>
<div>
     <h3>アドバイザー管理</h3>
    <p><?php echo HTML::anchor("admin/advisor/add","新規追加")?></p>
    <table>
        <tr><th>写真</th>
            <th><?php echo HTML::anchor("admin/advisor/sort/name/".$fsort,"氏名")?></th>
            <th><?php  HTML::anchor("admin/advisor/sort/category/".$fsort,"専門");?>専門</th>
            <th><?php echo HTML::anchor("admin/advisor/sort/affliation/".$fsort,"所属");?></th>
            <th><?php echo HTML::anchor("admin/advisor/sort/email/".$fsort,"E-mail");?></th>
            <th>編集</th>
            <th>削除</th></tr>
        <?php foreach($list as $ob):?>
        <tr><td><?php echo HTML::image("upload/advisor/".$ob->picture,array("width"=>"50"))?></td>
            <td><?php echo $ob->name?></td>
            <td><?php echo $ob->category->name?></td>
            <td><?php echo $ob->affliation?></td>
            <td><?php echo $ob->email?></td>
            <td><?php echo HTML::anchor("admin/advisor/operation/".$ob->id,"編集");?></td>
            <td><?php echo HTML::anchor("admin/advisor/delete/".$ob->id,"削除");?></td>
        </tr>
        <?php endforeach;?>
        
    </table>
</div>