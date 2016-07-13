<?php
//single
Blade::directive('option', function($name) {
    $option = '';
    if(Cache::has('options')){
        $options = Cache::get('options');
        $option = isset($options[$name])?$options[$name]:'';
    }
    if(empty($option)){
        $option = \Option::single($name);
    }
    return "<?php echo $option; ?>";
});




