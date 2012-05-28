<?php
function full_copy( $source, $target ){
    if ( is_dir( $source ) ) {
    	mkdir( $target, 0777 );
	    $d = dir( $source );
    	while ( FALSE !== ( $entry = $d->read() ) ){
        	if ( $entry == '.' || $entry == '..' ){
		        continue;
    	    }
        	$Entry = $source . '/' . $entry;           
	        if ( is_dir( $Entry ) ){
    		    full_copy( $Entry, $target . '/' . $entry );
		        continue;
        	}
	        copy( $Entry, $target . '/' . $entry );
    	}
    	$d->close();
    }else{
	    copy( $source, $target );
    }
	
}
full_copy("test","test1");
$mydir = "test/";
system("rm ${mydir} -rf");
?>