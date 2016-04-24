<!DOCTYPE html>
<html lang="en" xml:lang="en">


        <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/style.css">
 

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        
        <script src="<?php echo base_url(); ?>js/largeImgPanel.js"></script> <!-- Kuulutuse piltide suuremaks tegemine -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>




        </head>
        <body>
<div class="container">
<div class="header">
<select onchange="javascript:window.location.href='<?php echo base_url(); ?>index.php/langswitch/switchLanguage/'+this.value;">
    <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
    <option value="estonian" <?php if($this->session->userdata('site_lang') == 'estonian') echo 'selected="selected"'; ?>>Estonian</option>
    
    
</select>
<a href="http://ostunurk.cs.ut.ee/"><h1>OSTUNURK</h1></a>
<div class="green_line"></div>
</div>




