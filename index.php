<?php     
    include $_SERVER['DOCUMENT_ROOT'] . "settings/active-design.php";
    include $_SERVER['DOCUMENT_ROOT'] . "settings/front-page.php";
    
    if($front_page == "&dfp") {
        include $_SERVER['DOCUMENT_ROOT'] . 'designs/' . $active_design . '/front-page.php';
    } else {
        $page_name = $front_page;
        include $_SERVER['DOCUMENT_ROOT'] . 'designs/' . $active_design . '/page.php';
    }
?>