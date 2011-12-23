<h3>掲載会社　管理</h3>
<table>
<?php
$businessTypeOrm = ORM::factory("businesstype");
$businessType=array();
          foreach($businessTypeOrm->find_all() as $btt){
              $businessType[$btt->id]=$btt->name;
          }
?>
    <?php echo Form::open("admin/company/save/".$company->id, array('enctype' => 'multipart/form-data'))?>
    <?php echo Form::input("id",$company->id,array("type"=>"hidden"));?>
    <tbody>
        <tr><th>会社ロゴ</th>
            <td>
        <?php echo HTML::image("upload/company/".$company->logo,array("width"=>"100"))?><br />
        <?php echo Form::file("logo")?>
            </td></tr>
        <tr><th>会社名</th><td><?php echo Form::input("company_name",$company->name,array("type"=>"text","size"=>"40"))?></td></tr>
        <tr><th>業種</th><td><?php echo Form::select('business_type',$businessType, $company->business_types_id)?></td></tr>
        <tr><th>代表者</th><td><?php echo Form::input("director_name",$company->director_name,array("type"=>"text","size"=>"40"))?></td></tr>
        <tr><th>資本金</th><td><?php echo Form::input("capital",$company->capital,array("type"=>"text","size"=>"40"))?></td></tr>
        <tr><th>設立</th><td>
 <?php
 //echo $company->establish;
 //$date = strtotime($company->establish);
 $date = explode("-",$company->establish);
 //print_r($date);
 //if(isset($date)){
     //print "date true";
 //print_r($date);
    $es_y = @$date[0];
    $es_m = @$date[1];
    $es_d = @$date[2]; 
 //}
 
 //print_r($date);
 //echo $es_y;
 ?>
        <?php $nowYear = date("Y",time());?>
 <?php $oYear = 1960;?>
        <select name="es_y" title="" validate="required:true"  >
            <option value="">----</option>
 <?php for($i=$nowYear;$i>=$oYear;$i--):?>
        <option value="<?php echo $i;?>" <?php echo $es_y==$i?'selected="selected"':''?>>
                <?php echo $i;?>
        </option>
 <?php endfor;?>
        </select>年
        <!--<input class="txt2" name="es_y" type="text" />-->
<select name="es_m"  title="" validate="required:true" >
    <option value="">----</option>
 <?php for($i=1;$i<=12;$i++):?>
      <option value="<?php echo $i;?>" <?php echo $es_m==$i?'selected="selected"':''?>><?php echo $i;?></option>
<?php endfor;?>
</select>月
<!--<select name="es_d"  title="" width="50"  validate="required:true" >
    <option value="">----</option>
 <?php for($i=1;$i<=31;$i++):?>
      <option value="<?php echo $i;?>" <?php echo $es_d==$i?'selected="selected"':''?>><?php echo $i;?></option>
<?php endfor;?>
</select>日-->
        <?php  Form::input("establish",$company->establish,array("type"=>"text","size"=>"40"))?></td></tr>
        <tr><th>所在地</th><td><?php echo Form::input("address",$company->address,array("type"=>"text","size"=>"40"))?></td></tr>
        <tr><th>セールスポイント</th><td><?php echo Form::textarea("seals_point", $company->seals_point, array("rows"=>"9","class"=>"wysiwyg"))?></td></tr>
        <tr><th>業務内容</th><td><?php echo Form::textarea("business_detail", $company->business_detail, array("rows"=>"9","class"=>"wysiwyg"))?></td></tr>
        <tr><th>E-mail</th><td><?php echo Form::input("email", $company->email, array("type"=>"text","size"=>"40"))?></td></tr>
        <tr><th>写真 1</th>
            <td>
        <?php echo HTML::image("upload/company/".$company->pic1,array("width"=>"100"))?><br />
        <?php echo Form::file("pic1")?>
            </td>
        </tr>
        <tr><th>写真 2</th>
            <td>
        <?php echo HTML::image("upload/company/".$company->pic2,array("width"=>"100"))?><br />        
                <?php echo Form::file("pic2")?>
            </td>
        </tr>
        <tr><th>業務内容（短）<br/>
改行は反映されません。
</th><td><?php echo Form::textarea("msg", $company->msg, array("rows"=>"9","class"=>""))?></td></tr>
        <tr>
            <th></th>
            <td>
        <?php echo Form::input("submit", "保存", array("type"=>"submit"))?>
                <a href="<?php echo URL::site('admin/company')?>"><?php echo Form::input("submit", "キャンセル", array("type"=>"button"))?></a>
                
            </td>
        </tr>
        
    </tbody>
    <?php echo Form::close();?>
</table>
