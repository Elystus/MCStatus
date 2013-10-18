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
                <div class="mast-return">
                    <a href="/">&#171; Home Page</a>
                </div>
                <div class="mast-title">
                    <h1><?php echo $this->escape($this->server['host']) ?><small><?php echo ($this->escape($this->server['status']) ? 'Online' : 'Offline'); ?></small></h1>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <?php if($this->escape($this->server['status'])) { ?>
            <div class="server">
                <div class="info">
                    <div class="info-left">
                        <p>Port:</p>
                    </div>
                    <div class="info-right">
                        <p><?php echo $this->escape($this->server['port']) ?></p>
                    </div>
                </div>
                <div class="info">
                    <div class="info-left">
                        <p>Version:</p>
                    </div>
                    <div class="info-right">
                        <p><?php echo $this->escape($this->server['version']) ?></p>
                    </div>
                </div>
                <div class="info">
                    <div class="info-left">
                        <p>MOTD:</p>
                    </div>
                    <div class="info-right">
                        <p><?php echo $this->escape($this->server['motd']) ?></p>
                    </div>
                </div>
                <div class="info">
                    <div class="info-left">
                        <p>Players Online:</p>
                    </div>
                    <div class="info-right">
                        <p><?php echo $this->escape($this->server['players']) ?></p>
                    </div>
                </div>
                <div class="info">
                    <div class="info-left">
                        <p>Max Players:</p>
                    </div>
                    <div class="info-right">
                        <p><?php echo $this->escape($this->server['maxplayers']) ?></p>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="server offline">
                <p>No connection established with the Minecraft server.</p>
            </div>
            <?php } ?>
            
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
    </body>
</html>