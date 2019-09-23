<?php require_once('../../../private/initialize.php'); ?>

<?php
    require_login();
    $id = $_GET['id'] ?? '1';

     $pages = find_page_by_id($id);
?>

<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

    <div class="page show">


        <h1>Page: <?php echo h($pages['menu_name']); ?></h1>

        <div class="actions">
          <a class="action" href="<?php echo url_for('/index.php?id=' . h(u($pages['id'])) . '&preview=true');
          ?>" target="_blank">Preview</a>
        </div>

        <div class="attributes">
              <?php $subject = find_subject_by_id($pages['subject_id']);  ?>
          <dl>
            <dt>Subject Name:</dt>
            <dd><?php echo h($subject['menu_name']); ?></dd>
          </dl>
            <dl>
                <dt>Menu Name</dt>
                <dd><?php echo h($pages['menu_name']); ?></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($pages['position']); ?></dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd><?php echo h($pages['visible'] == '1' ? 'true' : 'false'); ?></dd>
            </dl>
            <dl>
                <dt>Content: </dt>
                <dd><?php echo h($pages['content']); ?></dd>
            </dl>
        </div>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
