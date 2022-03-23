/**
 * =======
 * RUNTHEPLUGIN HERE
 * CKEditor 5 classic editor build v32.0.0 plugin 
 * =======
 */

/**
* first editor
*/
ClassicEditor
    .create( 
        document.querySelector( "#mytextarea" )
    )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } ); 

/**
* second editor
*/
ClassicEditor
    .create( 
        document.querySelector( "#more" )
    )
    .then( editor => {
            console.log( editor );
    } )
    .catch( error => {
            console.error( error );
    } );

/**	
* end plugin editor here
* ========================
*/