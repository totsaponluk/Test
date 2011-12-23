<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Admin Template</title>
<?php echo HTML::script("media/js/jquery-1.6.1.js");?>
<?php echo HTML::style('media/admin/css/theme.css');?>
<?php echo HTML::style('media/admin/css/style.css');?>

<?php echo HTML::style('media/js/jwysiwyg/jwysiwyg/jquery.wysiwyg.css');?>
<?php echo HTML::script("media/js/jwysiwyg/jwysiwyg/jquery.wysiwyg.js");?>

  <script type="text/javascript"> 
  $(function()
  {
      $('.delete').click(function(){
          if(confirm("Are you sure?")){
              return true;
          }else{
              return false;
          }
      })
      $('.wysiwyg').wysiwyg({
           controls: {
              strikeThrough : { visible : true },
              underline     : { visible : true },

              separator00 : { visible : true },

              justifyLeft   : { visible : true },
              justifyCenter : { visible : true },
              justifyRight  : { visible : true },
              justifyFull   : { visible : true },

              separator01 : { visible : true },

              indent  : { visible : true },
              outdent : { visible : true },

              separator02 : { visible : true },

              subscript   : { visible : true },
              superscript : { visible : true },

              separator03 : { visible : true },

              undo : { visible : true },
              redo : { visible : true },

              separator04 : { visible : true },

              insertOrderedList    : { visible : true },
              insertUnorderedList  : { visible : true },
              insertHorizontalRule : { visible : true },

              separator07 : { visible : true },

              cut   : { visible : true },
              copy  : { visible : true },
              paste : { visible : true }
            }
      });
  });
  </script> 

<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="<?php echo URL::site("media/admin/css");?>/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
</head>

<body>
	<div id="container">
    	<div id="header">
        	<h2>管理画面</h2>
         <div id="topmenu">
            	<ul>
                    <li class="current"><a href="#">管理</a></li>
                    <!--<li><a href="#">Users</a></li>-->
                	
              </ul>
            </div>
      </div>
        <div id="top-panel">
            <div id="panel">
                <ul>
                    <li><?php echo HTML::anchor('admin/company', '掲載会社管理');?></li>
                    <li><?php echo HTML::anchor('admin/advisor', 'アドバイザー管理');?></li>
                    <li><?php echo HTML::anchor('admin/news', 'ニュース管理');?></li>
                    <li><?php echo HTML::anchor('admin/webcontent', 'ユニークビジネス');?></li>
                    <li><?php echo HTML::anchor('admin/ad', '広告管理');?></li>
                </ul>
            </div>
      </div>
        <div id="wrapper">
            <div id="content">
                <p><?=$content?></p>
                <p>&nbsp;</p>
            </div>
            <div id="sidebar">
  				<ul>
                    <!--<li><h3><a href="#" class="house">Dashboard</a></h3>
                        <ul>
                        	<li><a href="#" class="report">Sales Report</a></li>
                    		<li><a href="#" class="report_seo">SEO Report</a></li>
                            <li><a href="#" class="search">Search</a></li>
                        </ul>
                    </li>
                    <li><h3><a href="#" class="folder_table">Orders</a></h3>
          				<ul>
                        	<li><a href="#" class="addorder">New order</a></li>
                          <li><a href="#" class="shipping">Shipments</a></li>
                            <li><a href="#" class="invoices">Invoices</a></li>
                        </ul>
                    </li>-->
                    <li><h3><a href="#" class="manage">Manage</a></h3>
          		<ul>
                            <li><?php echo HTML::anchor('admin/company', '掲載会社管理');?></li>
                            <li><?php echo HTML::anchor('admin/advisor', 'アドバイザー管理');?></li>
                            <li><?php echo HTML::anchor('admin/news', 'ニュース管理');?></li>
                            <li><?php echo HTML::anchor('admin/webcontent', 'ユニークビジネス');?></li>
                            <li><?php echo HTML::anchor('admin/ad', '広告管理');?></li>
                            <!--<li><a href="#" class="manage_page">Pages</a></li>
                            <li><a href="#" class="cart">Products</a></li>
                            <li><a href="#" class="folder">Product categories</a></li>
                            <li><a href="#" class="promotions">Promotions</a></li>-->
                        </ul>
                    </li>
                    <li><h3><a href="#" class="manage">Config</a></h3>
          		<ul>
                            <li><?php echo HTML::anchor('admin/categories', '専門追加');?></li>
                            <!--<li><?php echo HTML::anchor('admin/advisor', 'アドバイザー管理');?></li>
                            <li><?php echo HTML::anchor('admin/news', 'ニュース管理');?></li>
                            <li><?php echo HTML::anchor('admin/webcontent', 'ユニークビジネス');?></li>
                            <li><?php echo HTML::anchor('admin/ad', '広告管理');?></li>
                            <li><a href="#" class="manage_page">Pages</a></li>
                            <li><a href="#" class="cart">Products</a></li>
                            <li><a href="#" class="folder">Product categories</a></li>
                            <li><a href="#" class="promotions">Promotions</a></li>-->
                        </ul>
                    </li>
                  <li><h3><a href="#" class="user">Users</a></h3>
          				<ul>
                            <!--<li><a href="#" class="useradd">Add user</a></li>
                            <li><a href="#" class="group">User groups</a></li>
            				<li><a href="#" class="search">Find user</a></li>
                            <li><a href="#" class="online">Users online</a></li>-->
                                        <li><?php echo HTML::anchor('admin/login/logout', 'ログアウト');?></li>
                        </ul>
                    </li>
				</ul>       
          </div>
      </div>
        <div id="footer">
        <div id="credits">
   		
        </div>
        <div id="styleswitcher">
            <ul>
                <li><a href="javascript: document.cookie='theme='; window.location.reload();" title="Default" id="defswitch">d</a></li>
                <li><a href="javascript: document.cookie='theme=1'; window.location.reload();" title="Blue" id="blueswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=2'; window.location.reload();" title="Green" id="greenswitch">g</a></li>
                <li><a href="javascript: document.cookie='theme=3'; window.location.reload();" title="Brown" id="brownswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=4'; window.location.reload();" title="Mix" id="mixswitch">m</a></li>
            </ul>
        </div><br />

        </div>
</div>
</body>
</html>
