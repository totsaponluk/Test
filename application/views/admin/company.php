<?php 
$list;
$fsort;
?>
<div>
    <h3>掲載会社　管理</h3>
    <p><?php echo HTML::anchor("admin/company/add","新規追加")?></p>
    
    <table>
        <tr>
            <th>写真</th>
            <th>業種</th>
            <th><?php echo HTML::anchor("admin/company/sort/name/".$fsort,"会社名")?></th>
            <th><?php echo HTML::anchor("admin/company/sort/director_name/".$fsort,"代表者");?></th>
            <th><?php echo HTML::anchor("admin/company/sort/email/".$fsort,"E-mail");?></th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        <?php foreach($list as $ob):?>
        <tr>
            <td><?php echo HTML::image("upload/company/".$ob->logo,array("width"=>"50"))?></td>
            <td><?php echo $ob->businesstype->name ;?></td>
            <td><?php echo $ob->name ;?></td>
            <td><?php echo $ob->director_name ;?></td>
            <td><?php echo $ob->email ;?></td>
            <td><?php echo HTML::anchor("admin/company/operation/".$ob->id,"編集");?></td>
            <td><?php echo HTML::anchor("admin/company/delete/".$ob->id,"削除");?></td>
        </tr>    
        <?php endforeach;?>
        
    </table>
</div>