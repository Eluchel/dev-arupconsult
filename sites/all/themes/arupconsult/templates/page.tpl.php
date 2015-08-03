<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

  <div id="header" class="clearfix"><div class="wrapper">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>

    <?php endif; ?>

    <?php print render($page['header']); ?>

  </div></div>

  <div id="navigation"><div class="wrapper">
    <nav id="primary-nav" role="navigation">
      <?php
      if ($main_menu):
          $menu = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
          print drupal_render($menu);
      endif;
      ?>
    </nav>

    <nav id="secondary-nav" role="navigation">
      <?php if ($secondary_menu):
        $menu = menu_tree(variable_get('menu_secondary_links_source', 'secondary-menu'));
        print drupal_render($menu);
      endif; ?>
    </nav>
  </div></div>

  <div class="wrapper">
    <?php print $messages; ?>
  </div>
  <?php
  // Render the sidebars to see if there's anything in them.
  $sidebar_first  = render($page['sidebar_first']);
  $sidebar_second = render($page['sidebar_second']);
  ?>

  <div id="content" class="clearfix <?php print ($sidebar_first && $sidebar_second ? 'two-sidebars' : ($sidebar_first || $sidebar_second ? 'one-sidebar' : 'no-sidebars')) ?>" role="main"><div class="wrapper">


      <?php print render($page['help']); ?>
      <?php if ($title): ?><h1 class="title" id="<?php
        if(isset($node)) {
          if($node->type == 'disease_topic'){
            print "disease-";
          }
        }
      ?>page-title"><?php print $title; ?></h1><?php endif; ?>
      <?php if (isset($node)): if($node->type == 'disease_topic'): ?>
      <p class="author" id="primary-author">Primary Author:
      <?php if($node && $node->type == 'disease_topic' && !empty($node->field_author['und'][0]['user']->field_url)) {
          print '<a href="http://' . $node->field_author['und'][0]['user']->field_url['und'][0]['safe_value'] . '" target="_blank" class="link">' . $node->field_author['und'][0]['user']->realname . '</a>';
        }
      ?>
      </p><?php endif;endif; ?>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
    <div id="main-content">
      <?php print render($page['content']);?>
    </div>

    <?php if ($sidebar_first): ?>
      <div id="sidebar-first" class="sidebar">
        <?php print $sidebar_first; ?>
      </div>
    <?php endif; ?>

    <?php if ($sidebar_second): ?>
      <div id="sidebar-second" class="sidebar">
        <?php print $sidebar_second; ?>
      </div>
    <?php endif; ?>

  </div></div>

  <div id="footer"><div class="wrapper">
    <?php print render($page['footer']); ?>
    <div class="footer-block" id="footer-first">
      <?php print render($page['footer_first']); ?>
    </div>
    <div class="footer-block" id="footer-second">
      <?php print render($page['footer_second']); ?>
    </div>
    <div class="footer-block" id="footer-third">
      <?php print render($page['footer_third']); ?>
    </div>
    <div class="footer-block" id="footer-fourth">
      <?php print render($page['footer_fourth']); ?>
    </div>
  </div></div>

  <div id="copyright"><div class="wrapper">
    <p class="copyright">&copy; <?php echo date("Y"); ?> <?php print t('ARUP Laboratories. All Rights Reserved.'); ?></p>
  </div></div>
