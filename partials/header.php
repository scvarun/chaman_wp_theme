<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png" />

  <title><?= get_page_heading($title, 'Premium HTML Template by Unifato') ?></title>

  <!-- CSS -->
  <?php print_styles() ?>
</head>
<body<?php body_class() ?>>

  <div id="wrapper" class="wrapper">
    <?php get_template_part('partials/nav') ?>