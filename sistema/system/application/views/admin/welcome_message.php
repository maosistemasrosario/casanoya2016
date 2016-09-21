<html>
<head>
<title>Welcome to CodeIgniter</title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>
</head>
<body>

<div class="ui-helper-clearfix ui-widget-content" id="cont">
    <div class="ui-widget-content ui-corner-all ui-helper-clearfix" id="cont_log">
        <form method="post" action="log.php">
        	Usuario:<br />
			<input type="text" name="usuario" class="ui-state-default ingreso" />
            <br /><br />
            Password:<br />
			<input type="password" name="pass" class="ui-state-default ingreso" />
            <br /><br />
            <input type="submit" class="ui-state-default" name="entrar" value="ENTRAR" />
        </form>
    
	</div>
</div>

</body>
</html>