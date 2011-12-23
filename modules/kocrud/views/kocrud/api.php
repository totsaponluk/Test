<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
		<title>KoCRUD API Documentation</title> 
		<link type="text/css" href="/guide/media/css/print.css" rel="stylesheet" media="print" /> 
		<link type="text/css" href="/guide/media/css/screen.css" rel="stylesheet" media="screen" /> 
		<link type="text/css" href="/guide/media/css/kodoc.css" rel="stylesheet" media="screen" /> 
		<link type="text/css" href="/guide/media/css/shCore.css" rel="stylesheet" media="screen" /> 
		<link type="text/css" href="/guide/media/css/shThemeKodoc.css" rel="stylesheet" media="screen" /> 
		<script type="text/javascript" src="/guide/media/js/jquery.min.js"></script> 
		<script type="text/javascript" src="/guide/media/js/kodoc.js"></script> 
		<script type="text/javascript" src="/guide/media/js/shCore.js"></script> 
		<script type="text/javascript" src="/guide/media/js/shBrushPhp.js"></script> 
	</head>
	<body class="en">
		<div id="topbar" class="clear">
			<div class="container">
				<div class="span-17 suffix-1">
					<ul class="breadcrumb">
						<li><a href="/api">API Documentation</a></li>
					</ul> 
				</div>
			</div>
		</div>
		<div id="docs" class="container clear"> 
			<div id="content" class="span-17 suffix-1 colborder">
				<h1>API Documentation</h1>
				<ul>
<?php foreach ($models as $name => $model): ?>
					<li><a href='#<?php echo $name; ?>'><?php echo ucfirst($name); ?></a></li>
<?php endforeach ?>
				</ul>
				<div class='items'>
<?php foreach ($models as $name => $model): ?>
					<div class='item'>
						<h2><a name='<?php echo $name; ?>'><?php echo ucfirst($name); ?></a></h2>
						<dl class='tags'>
							<dt>Accessible by the key</dt>
							<dd><strong><?php echo $name; ?></strong> or <strong><?php echo Inflector::plural($name); ?></strong></dd>
<?php if ( ! empty($model['primary_key'])): ?>
							<dt>Primary key is</dt>
							<dd><?php echo $model['primary_key']; ?></dd>
<?php endif ?>
<?php if ( ! empty($model['primary_val'])): ?>
							<dt>Primary value is</dt>
							<dd><?php echo $model['primary_val']; ?></dd>
<?php endif ?>
						</dl>
						<pre>/api/<?php echo Inflector::plural($name); ?></pre>
						<pre>/api/<?php echo $name; ?>/12345</pre>
						<div class='columns'>
							<table>
								<thead>
									<tr>
										<th>Name</th>
										<th>Type</th>
										<th>Length</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody>
<?php foreach ($model['columns'] as $col_name => $column): ?>
									<tr>
										<td><?php echo $col_name; ?></td>
										<td><?php echo $column['type']; ?></td>
										<td><?php echo isset($column['character_maximum_length']) ? $column['character_maximum_length'] : (isset($column['display']) ? $column['display'] : NULL); ?></td>
										<td><?php echo $column['comment']; ?></td>
									</tr>
<?php endforeach ?>
								</tbody>
							</table>
						</div>
<?php if ( ! empty($model['has_one'])): ?>
						<div class='has_one'>
							<h6>Has One Relationships</h6>
							<ul>
<?php foreach ($model['has_one'] as $table_name => $item): ?>
								<li>
									<a href='#<?php echo $item['model']; ?>'><?php echo $table_name; ?></a>
									<pre style='margin-top:5px;'>/api/<?php echo $name; ?>/12345/<?php echo $table_name; ?></pre>
								</li>
<?php endforeach ?>
							</ul>
						</div>
<?php endif ?>
<?php if ( ! empty($model['has_many'])): ?>
						<div class='has_many'>
							<h6>Has Many Relationships</h6>
							<ul>
<?php foreach ($model['has_many'] as $table_name => $item): ?>
								<li>
									<a href='#<?php echo $item['model']; ?>'><?php echo $table_name; ?></a>
									<pre style='margin-top:5px;'>/api/<?php echo $name; ?>/12345/<?php echo $table_name; ?></pre>
								</li>
<?php endforeach ?>
							</ul>
		</div>
<?php endif ?>
<?php if ( ! empty($model['belongs_to'])): ?>
						<div class='belongs_to'>
							<h6>Belongs To Relationships</h6>
							<ul>
<?php foreach ($model['belongs_to'] as $table_name => $item): ?>
								<li>
									<a href='#<?php echo $item['model']; ?>'><?php echo $table_name; ?></a>
									<pre style='margin-top:5px;'>/api/<?php echo $name; ?>/12345/<?php echo $table_name; ?></pre>
								</li>
<?php endforeach ?>
							</ul>
						</div>
<?php endif ?>
					</div>
<?php endforeach ?>
				</div>
			</div>
			<div id="menu" class="span-6 last">
				<ol class="menu">
<?php foreach ($models as $name => $model): ?>
					<li>
						<strong><?php echo ucfirst(Inflector::plural($name)); ?></strong>
						<ol>
<?php if ( ! empty($model['has_one'])): ?>
							<li>
								<strong>Has one</strong>
								<ol>
<?php foreach ($model['has_one'] as $key => $item): ?>
									<li>
										<a href='#<?php echo $item['model']; ?>'><?php echo ucfirst($key); ?></a>
									</li>
<?php endforeach ?>
								</ol>
							</li>
<?php endif ?>
<?php if ( ! empty($model['has_many'])): ?>
							<li>
								<strong>Has many</strong>
								<ol>
<?php foreach ($model['has_many'] as $key => $item): ?>
									<li>
										<a href='#<?php echo $item['model']; ?>'><?php echo ucfirst($key); ?></a>
									</li>
<?php endforeach ?>
								</ol>
							</li>
<?php endif ?>
<?php if ( ! empty($model['belongs_to'])): ?>
							<li>
								<strong>Belongs to</strong>
								<ol>
<?php foreach ($model['belongs_to'] as $key => $item): ?>
									<li>
										<a href='#<?php echo $item['model']; ?>'><?php echo ucfirst($key); ?></a>
									</li>
<?php endforeach ?>
								</ol>
							</li>
<?php endif ?>
						</ol>
					</li>
<?php endforeach ?>
				</ol> 
			</div> 
		</div>
		<div id="footer" class="clear">
			<div class="container">
				<div class="span-17 suffix-1">
					<p class="copyright right">&copy; 2008–2010 Kohana Team</p>
				</div>
				<div class="span-6 last">
					<p class="powered center">Powered by <a href="http://kohanaframework.org/">Kohana</a> v3.0.7</p>
				</div>
			</div>
		</div>
	</body>
</html>