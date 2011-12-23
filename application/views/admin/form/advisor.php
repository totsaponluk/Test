<?php
$cateOrm = ORM::factory("categorie");
$categories=array();
          foreach($cateOrm->find_all() as $c){
              $categories[$c->id]=$c->name;
          }
 //$cate=$cateOrm->->select_list("id","name");
?>
<script type="text/javascript">
    
function getList(){
    /*getList*/
    cate = $('#category_id');
    $.post('<?php echo URL::site("admin/category/")?>',{selected_id:cate.val()},function(data){
        $('#category_list').html(data);
        //alert(data);
    })//cate
    /*getList*/
}
$(function(){
    /*getList*/
    cate = $('#category_id');
    $.post('<?php echo URL::site("admin/category/")?>',{selected_id:cate.val()},function(data){
        $('#category_list').html(data);
        //alert(data);
    })//cate
    /*getList*/
    
    $('#advisor_form').live("submit",function(){
         console.log($(this).serializeArray());
        var cate = $('[name="category"]');
        //alert($(this).serialize())
       //$.post('<?php echo URL::site("admin/advisor/save/")?>', $(this).serialize()+ "&category="+ cate.val() ,function(data){
        
        //$('#list-category').html(data);
        //})
        $(this).submit();
        return false;
    })
    
    $('[name="bt-add-category"]').live("click",function(){
        cate=$('[name="add-category"]');
        if(cate.val()==""){
            alert("please, input text");
        }else{
            //alert("addd");
            $('#category_list').parent().append('<div id="loading"><?php echo HTML::image("media/icon/ajax-loader.gif")?></div>');
            
            $.post('<?php echo URL::site("admin/category/save/")?>',{name:cate.val()},function(data){
                //alert(data.result);
                if(data.result==true){
                    cate.val("");
                    
                    /*getList*/
                    cate = $('#category_id');
                    $.post('<?php echo URL::site("admin/category/")?>',{selected_id:cate.val()},function(data){
                        $('#category_list').html(data);
                        //alert(data);
                    })//cate
                    /*getList*/
                    
                    alert("Added");
                    
                }else{
                    /*getList*/
                    cate = $('#category_id');
                    $.post('<?php echo URL::site("admin/category/")?>',{selected_id:cate.val()},function(data){
                        $('#category_list').html(data);
                        //alert(data);
                    })//cate
                    /*getList*/
                    
                    alert("has already!!");
                }
                $("#loading").remove();
                //alert("Result::"+data.result)
            },"json")
        }
        return false;
    })
    //alert('test');
})
</script>
<h3>アドバイザー管理</h3>
<table>
    
    <?php echo Form::open("admin/advisor/save/".$advisor->id, array("id"=>"advisor_form",'enctype' => 'multipart/form-data'))?>
    <?php echo Form::input("id",$advisor->id,array("type"=>"hidden"));?>
    <tbody>
        <tr><th>写真</th>
            <td>
        <?php echo HTML::image("upload/advisor/".$advisor->picture,array("width"=>"100"))?><br />
        <?php echo Form::file("picture")?>
            </td>
        </tr>
        <tr><th>氏名</th><td><?php echo Form::input("name",$advisor->name,array("type"=>"text","size"=>"40"))?></td></tr>
        <tr><th>専門</th>
            <td>
                <select id="category_list" name="category">
                    
                </select>
        
                <input id="category_id" type="hidden" value="<?php echo $advisor->category->id?>" />
            <span>専門追加<?php echo Form::input("add-category","",array("type"=>"text","size"=>"30"));?></span>
            <span><?php echo Form::button("bt-add-category", "Add");?></span>
            </td></tr>
        <tr><th>経歴</th><td><?php echo Form::textarea("career", $advisor->career, array("rows"=>"9","class"=>"wysiwyg"))?></td></tr>
        <tr><th>所属</th><td><?php echo Form::input("affliation", $advisor->affliation, array("type"=>"text","size"=>"40"))?></td></tr>
        <tr><th>PR</th><td><?php echo Form::textarea("pr", $advisor->pr, array("rows"=>"9","class"=>"wysiwyg"))?></td></tr>
        <tr><th>紹介</th><td><?php echo Form::textarea("introduce", $advisor->introduce, array("rows"=>"9","class"=>""))?></td></tr>
        <tr><th>E-mail</th><td><?php echo Form::input("email", $advisor->email, array("type"=>"text","size"=>"40"))?></td></tr>
        <tr>
            <th></th>
            <td>
        <?php echo Form::input("submit", "保存", array("type"=>"submit"))?>
                <a href="<?php echo URL::site('admin/advisor')?>"><?php echo Form::input("submit", "キャンセル", array("type"=>"button"))?></a>
                
            </td>
        </tr>
        
    </tbody>
    <?php echo Form::close();?>
</table>
