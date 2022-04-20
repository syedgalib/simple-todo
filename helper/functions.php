<?php


/**
 * Get The Public Template
 * 
 * @param string $path
 * @param array $data
 * @param bool $extract
 * 
 * @return string Public Template
 */
function simple_todo_get_template( $path = '', $data = [], $extract = true ) {

    ob_start();

    simple_todo_get_the_template( $path, $data, $extract );

    return ob_get_clean();
}

/**
 * Prints The Public Template
 * 
 * @param string $path
 * @param array $data
 * @param bool $extract
 * 
 * @return void Prints Public Template
 */
function simple_todo_get_the_template( $path = '', $data = [], $extract = true ) {

    $file_path = SIMPLE_TODO_TEMPLATE_PATH . $path;

    simple_todo_get_the_file_content( $file_path, $data, $extract );
}


/**
 * Get The Admin Template
 * 
 * @param string $path
 * @param array $data
 * @param bool $extract
 * 
 * @return string Admin Template
 */
function simple_todo_get_view( $path = '', $data = [], $extract = true ) {

    ob_start();

    simple_todo_get_the_view( $path, $data, $extract );

    return ob_get_clean();
}

/**
 * Prints The Admin Template
 * 
 * @param string $path
 * @param array $data
 * @param bool $extract
 * 
 * @return void Prints Admin Template
 */
function simple_todo_get_the_view( $path = '', $data = [], $extract = true ) {

    $file_path = SIMPLE_TODO_VIEW_PATH . $path;

    simple_todo_get_the_file_content( $file_path, $data, $extract );
}

/**
 * Prints The File Content
 * 
 * @param string $path
 * @param array $data
 * @param bool $extract
 * 
 * @return void Prints the file contents
 */
function simple_todo_get_the_file_content( $path = '', $data = [], $extract = true ) {

    $file = $path . '.php';

    if ( ! file_exists( $file ) ) {
        return;
    }

    if ( $extract ) {
        extract( $data );
    }
    
    include $file;
}