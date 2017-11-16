<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<meta name="referrer" content="origin-when-crossorigin">
<title>Export: loja - Adminer</title>
<link rel="stylesheet" type="text/css" href="adminer.php?file=default.css&amp;version=4.3.1">
<script type="text/javascript" src="adminer.php?file=functions.js&amp;version=4.3.1"></script>
<link rel="shortcut icon" type="image/x-icon" href="adminer.php?file=favicon.ico&amp;version=4.3.1">
<link rel="apple-touch-icon" href="adminer.php?file=favicon.ico&amp;version=4.3.1">
<link rel="stylesheet" type="text/css" href="adminer.css">

<body class="ltr nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = 'You are offline.';
</script>

<div id="help" class="jush-sql jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
<p id="breadcrumb"><a href="adminer.php?server=localhost">MySQL</a> &raquo; <a href='adminer.php?server=localhost&amp;username=root' accesskey='1' title='Alt+Shift+1'>localhost</a> &raquo; <a href="adminer.php?server=localhost&amp;username=root&amp;db=loja">loja</a> &raquo; Export
<h2>Export: loja</h2>
<div id='ajaxstatus' class='jsonly hidden'></div>

<form action="" method="post">
<table cellspacing="0">
<tr><th>Output<td><label><input type='radio' name='output' value='text' checked>open</label><label><input type='radio' name='output' value='file'>save</label><label><input type='radio' name='output' value='gz'>gzip</label>
<tr><th>Format<td><label><input type='radio' name='format' value='sql' checked>SQL</label><label><input type='radio' name='format' value='csv'>CSV,</label><label><input type='radio' name='format' value='csv;'>CSV;</label><label><input type='radio' name='format' value='tsv'>TSV</label>
<tr><th>Database<td><select name='db_style'><option selected><option>USE<option>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='routines' value='1' checked>Routines</label><label><input type='checkbox' name='events' value='1' checked>Events</label><tr><th>Tables<td><select name='table_style'><option><option selected>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='auto_increment' value='1'>Auto Increment</label><label><input type='checkbox' name='triggers' value='1' checked>Triggers</label><tr><th>Data<td><select name='data_style'><option><option>TRUNCATE+INSERT<option selected>INSERT<option>INSERT+UPDATE</select></table>
<p><input type="submit" value="Export">
<input type="hidden" name="token" value="591304:727479">

<table cellspacing="0">
<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables' checked onclick='formCheck(this, /^tables\[/);'>Tables</label><th style='text-align: right;'><label class='block'>Data<input type='checkbox' id='check-data' checked onclick='formCheck(this, /^data\[/);'></label></thead>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='categorias' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">categorias</label><td align='right'><label class='block'><span id='Rows-categorias'></span><input type='checkbox' name='data[]' value='categorias' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='produtos' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">produtos</label><td align='right'><label class='block'><span id='Rows-produtos'></span><input type='checkbox' name='data[]' value='produtos' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<script type='text/javascript'>ajaxSetHtml('adminer.php?server=localhost&username=root&db=loja&script=db');</script>
</table>
</form>
</div>

<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="591304:727479">
</p>
</form>
<div id="menu">
<h1>
<a href='https://www.adminer.org/' target='_blank' id='h1'>Adminer</a> <span class="version">4.3.1</span>
<a href="https://www.adminer.org/#download" target="_blank" id="version"></a>
</h1>
<script type="text/javascript" src="adminer.php?file=jush.js&amp;version=4.3.1"></script>
<script type="text/javascript">
var jushLinks = { sql: [ 'adminer.php?server=localhost&username=root&db=loja&table=$&', /\b(categorias|produtos)\b/g ] };
jushLinks.bac = jushLinks.sql;
jushLinks.bra = jushLinks.sql;
jushLinks.sqlite_quo = jushLinks.sql;
jushLinks.mssql_bra = jushLinks.sql;
bodyLoad('5.5');
</script>
<form action="">
<p id="dbs">
<input type="hidden" name="server" value="localhost"><input type="hidden" name="username" value="root"><span title='database'>DB</span>: <select name='db' onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'><option value=""><option>information_schema<option selected>loja<option>mysql<option>nutrigenes-blog<option>nutrigenes-material-divulgacao<option>performance_schema<option>phpmyadmin<option>test<option>teste</select><input type='submit' value='Use' class='hidden'>
<input type="hidden" name="dump" value=""></p></form>
<p class='links'><a href='adminer.php?server=localhost&amp;username=root&amp;db=loja&amp;sql='>SQL command</a>
<a href='adminer.php?server=localhost&amp;username=root&amp;db=loja&amp;import='>Import</a>
<a href='adminer.php?server=localhost&amp;username=root&amp;db=loja&amp;dump=' id='dump' class='active '>Export</a>
<a href="adminer.php?server=localhost&amp;username=root&amp;db=loja&amp;create=">Create table</a>
<ul id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>
<li><a href="adminer.php?server=localhost&amp;username=root&amp;db=loja&amp;select=categorias" class='select'>select</a> <a href="adminer.php?server=localhost&amp;username=root&amp;db=loja&amp;table=categorias" class='structure' title='Show structure'>categorias</a>
<li><a href="adminer.php?server=localhost&amp;username=root&amp;db=loja&amp;select=produtos" class='select'>select</a> <a href="adminer.php?server=localhost&amp;username=root&amp;db=loja&amp;table=produtos" class='structure' title='Show structure'>produtos</a>
</ul>
</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
