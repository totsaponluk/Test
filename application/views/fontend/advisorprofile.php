<script type="text/javascript">
// only for demo purposes
$.validator.setDefaults({
	/*submitHandler: function() {
            $('#form').submit();
		alert("submitted! (skipping validation for cancel button)");
	}*/
});

$().ready(function() {
	$("#form").validate({
		//errorLabelContainer: $("#form div.error")
	});
	
	var container = $('div.container');
	// validate the form when it is submitted
	var validator = $("#form2").validate({
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		meta: "validate"
	});
	
	$(".cancel").click(function() {
		validator.resetForm();
	});
});
</script>
<style>
    .error{color: red;}
    .star{color:red;}
</style>
<?php
$advisor;
//echo $advisor->name;
?>
<div class="advisorsolo">
  <h2><?php echo HTML::image("media/fontend/images/img/tit-advisorsolo.jpg")?></h2>
  <div class="detail">
  <p class="txt_top"><?php echo $advisor->category->name?><!--翻訳・通訳--><br />
<?php echo $advisor->name;?>（&nbsp;<?php echo $advisor->affliation ;?>&nbsp;）<!--小堤　一郎　（Ohmi Corporation Co., Ltd.）--></p>
<h3><?php echo HTML::image("media/fontend/images/img/tit-08.jpg")?></h3>
<p><?php echo $advisor->career;?><!--東京工業大学化学工学卒。日揮（株）原子力事業本部。タイで翻訳、通訳会社経営。1994年タイ商務省からビジネスマンオブザイヤー受賞。--></p>
<h3><?php echo HTML::image("media/fontend/images/img/tit-09.jpg")?></h3>
<p><?php echo $advisor->pr;?><!--タイでの２０年の会社経営を生かしたビジネスコンサルティング--></p>
  </div>
  <div class="pic">
      <?php if($advisor->picture):?>
            <?php echo HTML::image("upload/advisor/".$advisor->picture,array("width"=>"200"))?>
      <?php else:?>
            
            <?php echo HTML::image("media/images/no_image.jpg",array("width"=>"200"))?>
      <?php endif;?>
  </div>
  </div>
  <div class="btn-center2"><a class="bt-submit" href="#"><?php echo HTML::image("media/fontend/images/button/btn-02.jpg")?></a></div>
 <?php echo Form::open("advisorprofile/send",array("method"=>"post","id"=>"form"));?> 
<?php echo Form::input("id",$advisor,array("type"=>"hidden"))?>
  <div class="error"></div>
<table class="form-advisor" width="640" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>名前　<span class="star">＊</span>：</th>
    <td><input title="＊必須項目です。" class="txt {required:true}" name="name" type="text" /></td>
  </tr>
  <tr>
    <th>会社名　：</th>
    <td><input class="txt" name="company" type="text" /></td>
  </tr>
    <tr>
    <th>メールアドレス　<span class="star">＊</span>：</th>
    <td><input title="＊必須項目です。" class="{required:true,email:true}" name="email" type="text" /></td>
  </tr>
    <tr>
    <th>質問の目的 　<span class="star">＊</span>：</th>
    <td><input title="＊必須項目です。" class="txt {required:true}" name="objective" type="text" /></td>
  </tr>
    <!--<tr>
    <th>質問内容 　：</th>
    <td><input class="txt" name="question" type="text" /></td>
  </tr>-->
    <tr>
    <th>質問内容　<span class="star">＊</span>：</th>
    <td><textarea title="＊必須項目です。" class="txt {required:true}" name="question_detail" cols="" rows="5"></textarea></td>
  </tr>
</table>
  
<div class="btn-center2"><a class="bt-submit" href="#"><?php echo HTML::image("media/fontend/images/button/btn-03.jpg")?></a></div>
<?php echo Form::close();?>