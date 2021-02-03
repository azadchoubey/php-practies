<?php
session_start();
    if(isset($_GET['nama'])){
     $path='uploads/'.$_SESSION['username'];
     
        $zip = new ZipArchive();
        $zip_name = "azad.zip"; // Zip name
        $zip->open($path); 
            if(file_exists($path)){
            $zip->addFromString(basename($path),  file_get_contents($path)); 
            header('Content-Type: application/zip');
            header('Content-disposition: attachment; filename='.$zipname);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($zipname));
            ob_clean();
            flush();
            readfile($zipname);
            

            }
            else{
             echo"file does not exist";
            }
          }$zip->close();
          
        // function download($target_dir) {
        //     if (file_exists($target_dir)) {
        //         header('Content-Description: File Transfer');
        //         header('Content-Type: application/octet-stream');
        //         header('Content-Disposition: attachment; filename='.basename($target_dir));
        //         header('Content-Transfer-Encoding: binary');
        //         header('Expires: 0');
        //         header('Cache-Control: must-revalidate');
        //         header('Pragma: public');
        //         header('Content-Length: ' . filesize($target_dir));
        //         ob_clean();
        //         flush();
        //         readfile( $target_dir);
        //         exit;}
        //     }
        //
        
        
     
    
?>