<?php require_once('../../../private/initialize.php'); ?>

<?php
require_login();
//    $id = isset($_GET['id']) ? $_GET['id'] : '2';// PHP <7.0
    $id = $_GET['id'] ?? '1';// PHP > 7.0

   $subject = find_subject_by_id($id);
   $pages_set = find_pages_by_subject_id($id)

?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

        <div class="subject show">

            <h1>Subject: <?php echo h($subject['menu_name']); ?></h1>

            <div class="attributes">
                <dl>
                    <dt>Menu Name</dt>
                    <dd><?php echo h($subject['menu_name']); ?></dd>
                </dl>
                <dl>
                    <dt>Position</dt>
                    <dd><?php echo h($subject['position']); ?></dd>
                </dl>
                <dl>
                    <dt>Visible</dt>
                    <dd><?php echo h($subject['visible'] == '1' ? 'true' : 'false'); ?></dd>
                </dl>
            </div>

            <hr />


            <div id="content">
                <div class="pages list">
                    <h2>Pages</h2>

                    <div class="actions">
                        <a class="actions" href="<?php echo url_for('/staff/pages/new.php') ?>">Crete new Page</a>
                    </div>


                    <table class="list">
                        <tr>
                            <th>ID</th>
                            <th>Position</th>
                            <th>Visible</th>
                            <th>Name</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>


                        <?php while($page  = mysqli_fetch_assoc($pages_set)) { ?>
                            <tr>
                                <td><?php echo h($page['id']); ?></td>
                                <td><?php echo h($page['position']); ?></td>
                                <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
                                <td><?php echo h($page['menu_name']); ?></td>
                                <td><a class="actions" href="<?php echo url_for('staff/pages/show.php?id=' . h(u($page['id']))); ?>">View</a></td>
                                <td><a class="actions" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
                                <td><a class="actions" href="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id']))); ?>">Delete</a></td>
                            </tr>
                        <?php } ?>

                    </table>
                    <?php mysqli_free_result($pages_set); ?>

                </div>
            </div>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
