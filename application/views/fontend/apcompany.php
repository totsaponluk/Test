 <script type="text/javascript">
// only for demo purposes
$.validator.setDefaults({
	/*submitHandler: function() {
            $('#form').submit();
		alert("submitted! (skipping validation for cancel button)");
	}*/
});
$.metadata.setType("attr", "validate");
$().ready(function() {
	$("#form").validate({
		//errorLabelContainer: $("#form div.error")
	});
	
	
});
</script>
<style>
    .error{color: red;}
    .star{color:red;}
</style>
<style type="text/css"> 
.block { display: block; }
form.cmxform label.error { display: none; }
select.error {
	border: 1px dotted red;
}

</style> 
<div class="ap-advsr">
  <h2><?php echo HTML::image("media/fontend/images/img/tit-ap-company.jpg")?></h2>
  <p>本サイトは新規にタイに来られる日本の会社、もしくは来たばかりの会社を対象としたものです。あらたなビジネスチャンスを広げたい会社はどんどんお申し込みください。お客様対応の良い、実績のある会社なら大歓迎です。</p>

<p>なお掲載費については、<strong>現在積極募集中ですので2011年8月末までに申し込まれた会社には当面無料とさせていただきます</strong>。それ以降についてはまたご相談させていただきます。</p>
</div>

 <?php echo Form::open("apcompany/send",array("class"=>"cmxform","method"=>"post","id"=>"form"));?> 
<table class="form-advisor" width="640" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>会社名　<span class="star">＊</span>：</th>
    <td><input  validate="required:true" class="txt {required:true}" name="company" type="text" />
    <label for="company" class="error">＊必須項目です。</label>
    </td>
  </tr>
  <tr>
    <th>申込者名　<span class="star">＊</span>：</th>
    <td><input validate="required:true" class="txt {required:true}" name="name" type="text" />
    <label for="name" class="error">＊必須項目です。</label>
    </td>
  </tr>
    <tr>
    <th>役職　<span class="star">＊</span>：</th>
    <td><input validate="required:true" class="txt {required:true}" name="subject" type="text" />
    <label for="subject" class="error">＊必須項目です。</label>
    </td>
  </tr>
    <tr>
    <th>住所 　<span class="star"></span>：</th>
    <td><input class="txt {required:false}" name="address" type="text" />
    <label for="address" class="error">＊必須項目です。</label>
    </td>
  </tr>
    <tr>
    <th>電話番号 　<span class="star">＊</span>：</th>
    <td><input validate="required:true" class="txt {required:true}" name="tel" type="text" />
    <label for="tel" class="error">＊必須項目です。</label>
    </td>
  </tr>
  <!--<tr>
    <th>FAX 　<span class="star">＊</span>：</th>
    <td><input validate="required:true" class="txt {required:true}" name="fax" type="text" />
    <label for="fax" class="error">＊必須項目です。</label>
    </td>業務内容：
  </tr>-->
    <tr>
    <th>メールアドレス 　<span class="star">＊</span>：</th>
    <td><input title="" validate="required:true,email:true" class="txt {required:true}" name="email" type="text" />
    <label for="email" class="error">＊必須項目です。</label>
    </td>
  </tr>
      <tr>
    <th>設立年月日 　<span class="star"></span>：</th>
    <td>
 <?php $nowYear = date("Y",time());?>

 <?php $oYear = 1960;?>
 
        <select name="es_y" title="" validate="required:false"  >
            <option value="">----</option>
 <?php for($i=$nowYear;$i>=$oYear;$i--):?>
        <option value="<?php echo $i;?>">
                <?php echo $i;?>
        </option>
 <?php endfor;?>
        </select>年
        <!--<input class="txt2" name="es_y" type="text" />-->
<select name="es_m"  title="" validate="required:false" >
    <option value="">----</option>
 <?php for($i=1;$i<=12;$i++):?>
      <option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php endfor;?>
</select>月
<!--<select name="es_d"  title="" width="50"  validate="required:false" >
    <option value="">----</option>
 <?php for($i=1;$i<=31;$i++):?>
      <option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php endfor;?>
</select>日-->
<label for="es_y" class="error"></label> 
<label for="es_m" class="error"></label> 
<label for="es_d" class="error"></label> 
</td>
  </tr>
    <tr>
    <th>資本金　<span class="star">＊</span>：</th>
    <td><input validate="required:true" class="txt {required:true}" name="capital" type="text" />
    <label for="capital" class="error">＊必須項目です。</label>
    </td>
  </tr>
  <tr>
    <th>代表者氏名 　<span class="star">＊</span>：</th>
    <td><input validate="required:true" class="txt {required:true}" name="director_name" type="text" />
    <label for="director_name" class="error">＊必須項目です。</label>
    </td>
  </tr>
    <tr>
    <th>業種  　<span class="star"></span>：</th>
    <td>
<?php
$businessTypeOrm = ORM::factory("businesstype");
$businessType=array(""=>"----");
          foreach($businessTypeOrm->find_all() as $btt){
              $businessType[$btt->name]=$btt->name;
          }
?>
        <?php echo Form::select('business_type',$businessType)?>
        <!--<input validate="required:true" class="txt {required:true}" name="business_type" type="text" />-->
    <label for="business_type" class="error">＊必須項目です。</label>
    </td>
  </tr>
  <tr>
    <th>業務内容　<span class="star">＊</span>：</th>
    <td><textarea validate="required:true" class="{required:true}" name="business" cols="" rows="5"></textarea>
    <label for="business" class="error">＊必須項目です。</label>
    </td>
  </tr>
    <tr>
    <th>セールスポイント　<span class="star">＊</span>：</th>
    <td><textarea validate="required:true" class="{required:true}" name="sales_point" cols="" rows="5"></textarea>
    <label for="sales_point" class="error">＊必須項目です。</label>
    </td>
  </tr>
</table>
<div class="btn-center2"><a class="bt-submit" href="#"><?php echo HTML::image("media/fontend/images/button/btn-04.jpg")?></a></div>
 <?php echo Form::close();?> 
  