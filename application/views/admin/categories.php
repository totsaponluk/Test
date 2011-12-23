<?php $list;?>
<div>
     <h3>アドバイザー専門追加</h3>
    <p><?php echo HTML::anchor("admin/categories/add","新規追加")?></p>
    <table>
        
        <tr><th>Order</th>            
            <th>Name</th>
            <th>編集</th>
            <th>削除</th>
        <?php $i=0;?>
        <?php foreach($list as $ob):?>
            
            
        <tr>
            <td><?php echo ++$i?></td>
            <td>
               <?php echo $ob->name?>
            </td>
     
            <td><?php echo HTML::anchor("admin/categories/operation/".$ob->id,"編集");?></td>
            <td><?php echo HTML::anchor("admin/categories/delete/".$ob->id,"削除",array("class"=>"delete"));?></td>
        </tr>
        <?php endforeach;?>
        
    </table>
</div>