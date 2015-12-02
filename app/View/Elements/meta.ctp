<?php

// meta tags		
echo $this->Html->charset('utf-8')."\n";
echo $this->Html->meta(array('name' => 'description', 'content' => "Web Developer / Software Engineer Stephen Moore's portfolio mobile website."))."\n";
echo $this->Html->meta(array('name' => 'author', 'content' => 'Stephen Moore'))."\n";
echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'))."\n";
echo $this->Html->meta(array('name' => 'format-detection', 'content' => 'telephone=no'))."\n";
echo $this->Html->meta(array('name' => 'apple-mobile-web-app-capable', 'content' => 'yes'))."\n";
echo $this->Html->meta(array('name' => 'apple-mobile-web-app-status-bar-style', 'content' => 'black'))."\n";
echo $this->Html->meta('icon',$this->Html->url('/favicon.ico'))."\n";

?>