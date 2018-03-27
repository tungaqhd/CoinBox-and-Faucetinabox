<?php

function getTemplateOptions($sql, $template) {
$options = <<<OPTIONS
<div class="form-group">
    <label class="control-label">Template defined boxes:</label>
    <div><em>Hint: you can enter HTML and CSS here as well!</em></div>
    <br>
    Css box: <textarea class="form-control" rows="3" name="custom_css_default"><:: css ::></textarea>Top box: <textarea class="form-control" rows="3" name="custom_box_top_default"><:: top ::></textarea>Left box: <textarea class="form-control" rows="3" name="custom_box_left_default"><:: left ::></textarea>Bottom box: <textarea class="form-control" rows="3" name="custom_box_bottom_default"><:: bottom ::></textarea>Right box: <textarea class="form-control" rows="3" name="custom_box_right_default"><:: right ::></textarea>Modal box: <textarea class="form-control" rows="3" name="custom_footer_default"><:: modal ::></textarea>
</div>
OPTIONS;
    
    $q = $sql->prepare("SELECT value FROM Faucetinabox_Settings WHERE name = ?");
    $q->execute(array("custom_css_default"));
    $css = $q->fetch();
    if($css)
        $css = htmlspecialchars($css[0]);
    else
        $css = "";
    
    $q = $sql->prepare("SELECT value FROM Faucetinabox_Settings WHERE name = ?");
    $q->execute(array("custom_box_top_default"));
    $top = $q->fetch();
    if($top)
        $top = htmlspecialchars($top[0]);
    else
        $top = "";
    
    $q = $sql->prepare("SELECT value FROM Faucetinabox_Settings WHERE name = ?");
    $q->execute(array("custom_box_left_default"));
    $left = $q->fetch();
    if($left)
        $left = htmlspecialchars($left[0]);
    else
        $left = "";
    
    $q = $sql->prepare("SELECT value FROM Faucetinabox_Settings WHERE name = ?");
    $q->execute(array("custom_box_right_default"));
    $right = $q->fetch();
    if($right)
        $right = htmlspecialchars($right[0]);
    else
        $right = "";
    
    $q = $sql->prepare("SELECT value FROM Faucetinabox_Settings WHERE name = ?");
    $q->execute(array("custom_box_bottom_default"));
    $bottom = $q->fetch();
    if($bottom)
        $bottom = htmlspecialchars($bottom[0]);
    else
        $bottom = "";


    $q = $sql->prepare("SELECT value FROM Faucetinabox_Settings WHERE name = ?");
    $q->execute(array("custom_footer_default"));
    $modal = $q->fetch();
    if($modal)
        $modal = htmlspecialchars($modal[0]);
    else
        $modal = "";

    return str_replace(array("<:: css ::>", "<:: top ::>", "<:: left ::>", "<:: right ::>","<:: bottom ::>", "<:: modal ::>"), array($css, $top, $left, $right, $bottom, $modal), $options);
}
