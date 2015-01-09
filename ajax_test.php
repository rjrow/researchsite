<?php function example_ajax_request() {

	    // The $_REQUEST contains all the data sent via ajax
	    if ( isset($_REQUEST) ) {
	     
	        $fruit = $_REQUEST['fruit'];
	        echo $fruit;
	         
	        // Let's take the data that was sent and do something with it
	        if ( $fruit == 'Banana' ) {
	            $fruit = 'Apple';
	        }
	     
	        // Now we'll return it to the javascript function
	        // Anything outputted will be returned in the response
	        echo 'apple';
	         
	        // If you're debugging, it might be useful to see what was sent in the $_REQUEST
	        print_r($_REQUEST);
	     
	    }

	    echo 'apple';
	     
   	} 

	add_action( 'wp_ajax_example_ajax_request', 'example_ajax_request' );
?>