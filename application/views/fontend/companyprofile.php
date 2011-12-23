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
</style> 
<?php $company;?>
<div class="advisorsolo">
  <h2 class="btm10"><?php echo HTML::image("media/fontend/images/img/tit-listsolo.jpg")?></h2>
  <p class="txt_top">
  <table>
      <tbody>
          <tr>
              <td>
    <?php if($company->logo):?>
      <?php echo HTML::image("upload/company/".$company->logo,array("width"=>"100"));?>
    <?php else:?>
      <?php echo HTML::image("media/images/no_image.jpg",array("width"=>"110","height"=>"110"))?>
    <?php endif;?>
            </td>
              <td>
<div style="margin-left: 10px;">
<h3><?php echo $company->businesstype->name?></h3><!--翻訳・通訳--><br />
<h3><?php echo $company->name;?></h3>
</div>                  
              </td>
          </tr>
      </tbody>
  </table>
  
  </p>
<!--Ohmi Corporation Co., Ltd.-->
 <div class="detail2">

    <h3><?php echo HTML::image("media/fontend/images/img/tit-13.jpg")?></h3>
        <p><?php echo $company->business_detail;?></p>
    <h3><?php echo HTML::image("media/fontend/images/img/tit-12.jpg")?></h3>
        <p><?php echo $company->seals_point;?></p>
  </div>
  <div class="list-grey">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>代表者：</th>
    <td><?php echo $company->director_name;?><!--小堤 一郎--></td>
  </tr>
    <tr>
    <th>設　立：</th>
    <td><?php echo $company->establish;?><!--1989年1月6日--></td>
  </tr>
    <tr>
    <th>資本金：</th>
    <td><?php echo $company->capital;?><!--4,000,000　バーツ--></td>
  </tr>
    <tr>
    <th>所在地：</th>
    <td><?php echo $company->address;?><!--128/94 8F, Room K Payatai Plaza, Phayathai Rd.,Ratcatewie, Bangkok--></td>
  </tr>
</table>
  </div>
<div style="float:right;width:282px;" >
    <table>
        <tbody>
            <tr><td>
    <?php if(isset($pic1)):?>
      <?php if($pic1):?>
        <?php echo HTML::image("upload/company/".$pic1,array("width"=>"300"))?>  
      <?php endif;?>              
    <?php endif;?>       
                </td></tr>
            <tr><td>
    <?php if(isset($pic2)):?>
      <?php if($pic2):?>
        <?php echo HTML::image("upload/company/".$pic2,array("width"=>"300"))?>  
      <?php endif;?>
    <?php endif;?>                
                </td></tr>
        </tbody>
    </table>
    
</div>

<div class="clear"></div>
<div class="btn-center2"><a class="bt-submit" href="#"><?php echo HTML::image("media/fontend/images/button/btn-07.jpg")?></a></div>
 <?php echo Form::open("companyprofile/send",array("class"=>"cmxform","method"=>"post","id"=>"form"));?> 
 <?php echo Form::input("id",$company->id,array("type"=>"hidden"))?>
<table class="form-advisor" width="640" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>名前　<span class="star">＊</span>：</th>
    <td><input validate="required:true" class="txt {required:true}" name="name" type="text" />
    <label for="name" class="error">＊必須項目です。</label>
    </td>
  </tr>
  <tr>
    <th>会社名 　<span class="star">＊</span>：</th>
    <td><input validate="required:true" class="txt {required:true}" name="company" type="text" />
    <label for="company" class="error">＊必須項目です。</label>
    </td>
  </tr>
    <tr>
    <th>メールアドレス　<span class="star">＊</span>：</th>
    <td><input validate="required:true" class="txt {required:true}" name="email" type="text" />
    <label for="email" class="error">＊必須項目です。</label>
    </td>
  </tr>
    <tr>
    <th>電話番号 　<span class="star">＊</span>：</th>
    <td><input validate="required:true" class="txt {required:true}" name="tel" type="text" />
    <label for="tel" class="error">＊必須項目です。</label>
    </td>
  </tr>
    <tr>
    <th>住所　<span class="star"></span>：</th>
    <td><input  class="txt" name="address" type="text" />
    
    </td>
  </tr>
    <tr>
    <th>お問い合わせ事項　<span class="star">＊</span>：</th>
    <td><input name="contact" type="radio" value="1" validate="required:true"/> 見積り依頼 <input name="contact" type="radio" value="2" /> 問い合わせ
    <label for="contact" class="error">＊必須項目です。</label> 
    </td>
  </tr>
    <tr>
    <th>お問い合わせ内容   　<span class="star">＊</span>：</th>
    <td><textarea validate="required:true" class="{required:true}" name="detail" cols="" rows="5"></textarea>
    <label for="detail" class="error">＊必須項目です。</label>
    </td>
  </tr>
    <tr>
    <th>予算 　：</th>
    <td><input class="txt" name="capital" type="text" /></td>
  </tr>
    <tr>
    <th>希望納期 　：</th>
    <td><input class="txt" name="date" type="text" /></td>
  </tr>
</table>
<div class="btn-center2"><a class="bt-submit" href="#"><?php echo HTML::image("media/fontend/images/button/btn-08.jpg")?></a></div>
<?php echo Form::close();?>
 </div> 