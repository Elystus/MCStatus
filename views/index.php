<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<title>MCStatus</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="/assets/css/main.css" rel="stylesheet">
        
	<!--[if lt IE 9]>
	    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    </head>
    <body>
        <div class="masthead">
            <div class="wrapper">
                <div class="mast-title">
                    <h1>MCStatus<small>Minecraft Server Status checker</small></h1>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="err" id="form-err"></div>
            <form onSubmit="return false;" id="server-form">
                <div class="form-control">
                    <input type="text" id="server-host" placeholder="Server IP or Domain (Required)" />
                </div>
                <div class="form-control">
                    <input type="text" id="server-port" placeholder="Server Port" maxlength="5" />
                </div>
                <div class="form-control">
                    <input type="submit" id="server-submit" value="Get Server Status" />
                </div>
            </form>
            <div class="mast-links">
                <div class="pull-left">
                    <a href="/api/docs">API Documentation</a>
                </div>
                <div class="pull-right">
                    <a href="//twitter.com/Elystus">@Elystus</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="assets/js/form.js" type="text/javascript"></script>
    </body>
</html>