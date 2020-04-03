<?php
vc_add_shortcode_param('pixi_template_imgclass', 'pixi_shortcode_template_imgclass');

function pixi_shortcode_template_imgclass($settings, $value) {
    $shortcode = $settings['shortcode'];
    $theme_dir = get_template_directory() . '/framework/vc_params/'.$shortcode.'/';
    $reg = "/^({$shortcode}\.jpg|{$shortcode}-.*\.jpg)/";
    $files = pixiFileScanDirectory($theme_dir, $reg);
    $files = array_merge(pixiFileScanDirectory(PIXI_TEMPLATES, $reg), $files);
    $output = "";
    $output .= "<select style=\"display:none;\" id=\"".$shortcode."-select-param\" name=\"" . esc_attr($settings['param_name']) . "\" class=\"wpb_vc_param_value\">";
    foreach ($files as $key => $file) {
        if ($key == esc_attr($value)) {
            $output .= "<option value=\"{$key}\" selected>{$key}</option>";
        } else {
            $output .= "<option value=\"{$key}\">{$key}</option>";
        }
    }
    $output .= "</select>";
    $output .= "<div id=\"".$shortcode."-pixi-img-select\">";
    foreach ($files as $key => $file) {
        $img = get_template_directory_uri().'/framework/vc_params/'.$shortcode.'/'.basename($key,'.jpg').'.jpg';
        if ($key == esc_attr($value)) {
            $output .= "<img src=\"".$img."\" data-value=\"".$key."\" class=\"pixi-img-select selected\" />";
        } else {
            $output .= "<img src=\"".$img."\" data-value=\"".$key."\" class=\"pixi-img-select\" />";
        }
    }
    $output .= "</div>";
    $script = '
    <script type="text/javascript">
        jQuery(\'button.vc_panel-btn-save[data-save=true]\').click(function(){
            jQuery(\'.pixi_custom_param.vc_dependent-hidden\').remove();
        });
        jQuery(document).ready(function($){
            $("#'.$shortcode.'-pixi-img-select").find("img.pixi-img-select").click(function(){
                var $this = $(this);
                $("#'.$shortcode.'-pixi-img-select").find("img.pixi-img-select").removeClass("selected");
                $this.addClass("selected");console.log($(":hidden#'.$shortcode.'-select-param"));
                $(":hidden#'.$shortcode.'-select-param").val($this.data("value")).change();
            });
            
            if($("select[name=\'filter_styles\']").length > 0){      
                _filter_templates($("select[name=\'filter_styles\']").val());
            }
             
            $("body").on("change","select[name=\'filter_styles\']", function(){
                _filter_templates($(this).val());
            });
                    
            function _filter_templates(_tem){
                 $("#'.$shortcode.'-pixi-img-select").find("img").each(function(){
                    if($(this).data("value").indexOf(_tem) >= 0){
                        $(this).css("display","");
                    } else {
                        $(this).css("display","none");
                    }
                });
            }
        });           
    </script>';
    return $output.$script;
}
?>