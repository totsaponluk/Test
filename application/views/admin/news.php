<?php 
$list;
$fsort;
?>
<div>
    <h3>ニュース管理</h3>
    <p><?php echo HTML::anchor("admin/news/add","新規追加")?></p>
    
    <table>
        <tr>
            <th><?php echo HTML::anchor("admin/news/sort/date/".$fsort,"日付")?></th>
            <th><?php echo HTML::anchor("admin/news/sort/title/".$fsort,"タイトル")?></th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        <?php foreach($list as $ob):?>
        <tr>
            <td><?php echo $ob->create_at?></td>
            <td><?php echo $ob->title?></td>
            <td><?php echo HTML::anchor("admin/news/operation/".$ob->id,"編集");?></td>
            <td><?php echo HTML::anchor("admin/news/delete/".$ob->id,"削除");?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>