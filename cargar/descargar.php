<?php 
 
if (!isset($_GET['archivo']) || empty($_GET['archivo'])) {
    exit();
}
 
$root = "./";
$archivo = basename($_GET['archivo']);
$path = $root.$archivo;
                                                                                                                                                    
$type = '';                                                               
$type = "application/force-download";                                 
                                                                        
                                                                        
header("Content-Type: $type");                                        
header("Content-Disposition: attachment; filename=$archivo");         
header("Content-Transfer-Encoding: binary");                          
                                                                        


                                                                        
readfile($path);                                                      
                                                                          
?>