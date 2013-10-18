<?php

namespace mcStatus;

class mcStatus {
    
    /*
     * Socket Timeout
     * @var int
     */
    public $timeout = 3;
    
    /*
     * Server Information
     * @var array
     */
    public $server = array();
    
    /*
     * The IP or Domain Name of the server
     * @var String
     */
    public $host;
    
    /*
     * The port the server is active on (25565)
     * @var int
     */
    public $port = 25565;
    
    /*
     * Error that occured
     * @var String
     */
    public $err;
    
    public function serverStatus() {
        if($this->validateHost()) {
            if($this->pokeServer()) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->err = "Invalid Domain Name";
            return false;
        }
    }
    
    public function pokeServer() {
        $sock = @stream_socket_client( "tcp://{$this->host}:{$this->port}", $errno, $errstr, $this->timeout ); // Set Socket Timeout
 
        if(!$sock) { 
            $this->server = array(
                'host' => $this->host,
                'port' => $this->port,
                'status' => false
            );
            return false; }

        else {
            stream_set_timeout( $sock, $this->timeout );

            //Write and read data
            fwrite( $sock, "\xFE\x01" );
            $data = fread( $sock, 2048 );
            fclose($sock);

            $result = explode( "\x00", mb_convert_encoding( substr( (String) $data, 15), 'UTF-8', 'UCS-2' ) );
            $motd = preg_replace( "/(§.)/", "",$result[1] );

            $rLength = sizeOf($result); // Length of $result Array
            
            $this->server = array(
                'host' => $this->host,
                'port' => $this->port,
                'version' => $result[0],
                'motd' => $motd,
                'players' => $result[$rLength - 2],
                'maxplayers' => $result[$rLength - 1],
                'status' => true
            );
            
            return true;
        }
    }
    
    protected function validateHost() {
        return (
            preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $this->host)   //valid chars check
            && preg_match("/^.{1,253}$/", $this->host)                                        //overall length check
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $this->host)                     //length of each label
        ); 
    }
}

