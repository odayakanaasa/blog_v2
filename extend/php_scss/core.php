<?php
require_once __DIR__.'/lib/scss.inc.php';
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
//Compile Sass In PHP Link:  Link: http://hlzblog.top/
//+++++++++++++++++++++++++++++++++++++++++++++++++++++
// Usage at the end of this text
Class Sass{
    /**
    * @param  String  : scss_dir
    * @param  String  : css_dir
    * @param  Boolean : if minify css
    * @echo   Result of process
    */
    public static function run( $scss_dir, $css_dir ,$minify=true){
        // init class
        $Compiler = new \Leafo\ScssPhp\Compiler();
        // Get 'scss' File Name List under this directory
        $scss_files = glob($scss_dir.'/*.scss');
        // Chunk request
        for($i=0; $i<count($scss_files) ;$i++){
            try{
                // Parse CSS file save path
                $t_name = explode('/',$scss_files[$i]);
                $css_name = '/'.explode('.', $t_name[count($t_name)-1])[0]. '.css';
                $real_css_path = $css_dir. $css_name;
                // Get Result
                $scss = file_get_contents( $scss_files[$i]  );
                $css  =  $Compiler->compile($scss);

            }catch(Exception $e){
                self::out([
                    'PATH:  '.$scss_files[$i],
                    'Error: '.$e->getMessage()
                ]);
            }
            // Minify CSS
            if( $minify ){
                $css = self::minify($css);
            }
            // Write into its css file
            $fp=fopen($real_css_path, "w");
                fwrite($fp, $css);
                fclose($fp);
        }
        // Set timezone. Default China
        date_default_timezone_set('PRC');
        self::out([
            'Task is Finished',
            'Time: '.date("Y-m-d H:i:s")
        ]);
    }

    /**
    * Out php exec type
    * @param  Array : out_array 
    */
    public static function out($out_array){
        for($i=0; $i<count($out_array) ;$i++){
            if(  preg_match('/cli/i', php_sapi_name() )  ){
                print( $out_array[$i] ).PHP_EOL;
            }else{
                echo $out_array[$i] .'<br />';
            }
        }
    }
    /**
     * Quick and dirty way to mostly minify CSS.
     *
     * @since 1.0.0
     * @author Gary Jones
     *
     * @param string $css CSS to minify
     * @return string Minified CSS
     */
    public static function minify( $css ) {
        // Normalize whitespace
        $css = preg_replace( '/\s+/', ' ', $css );
        // Remove spaces before and after comment
        $css = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css );
        // Remove comment blocks, everything between /* and */, unless
        // preserved with /*! ... */ or /** ... */
        $css = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $css );
        // Remove ; before }
        $css = preg_replace( '/;(?=\s*})/', '', $css );
        // Remove space after , : ; { } */ >
        $css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );
        // Remove space before , ; { } ( ) >
        $css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );
        // Strips leading 0 on decimal values (converts 0.5px into .5px)
        $css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
        // Strips units if value is 0 (converts 0px to 0)
        $css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );
        // Converts all zeros value into short-hand
        $css = preg_replace( '/0 0 0 0/', '0', $css );
        // Shortern 6-character hex color codes to 3-character where possible
        $css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );
        return trim( $css );
    }
}