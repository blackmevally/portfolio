<?php
declare(strict_types=1);
$projects=require __DIR__.'/config/projects.php';
$base=rtrim((isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off'?'https':'http').'://'.($_SERVER['HTTP_HOST']??'localhost').'/portfolio','/');
header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
foreach(['index.php','commercial.php','contact.php','demo.php'] as $page){echo '<url><loc>'.htmlspecialchars($base.'/'.$page,ENT_XML1).'</loc></url>';}
foreach($projects as $p){echo '<url><loc>'.htmlspecialchars($base.'/project.php?slug='.rawurlencode($p['slug']),ENT_XML1).'</loc></url>';}
echo '</urlset>';
