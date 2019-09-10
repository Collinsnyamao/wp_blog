<?php
require_once B2S_PLUGIN_DIR . 'includes/PRG/Ship/Item.php';
require_once B2S_PLUGIN_DIR . 'includes/PRG/Ship/Image.php';

delete_option('B2S_PLUGIN_POST_CONTENT_' . (int) $_GET['postId']);
$postData = get_post((int) $_GET['postId']);
$userLang = strtolower(substr(get_locale(), 0, 2));
$postUrl = (get_permalink($postData->ID) !== false ? get_permalink($postData->ID) : $postData->guid);
$item = new PRG_Ship_Item();
$userData = $item->getMandant();
$title = strip_tags(trim(B2S_Util::remove4byte(B2S_Util::getTitleByLanguage($postData->post_title, $userLang))), '<a>');
delete_option('B2S_PLUGIN_POST_CONTENT_' . (int) $postData->ID);
$message = trim(B2S_Util::prepareContent($postData->ID, $postData->post_content, $postUrl, '<a>', false, $userLang));
$image = new PRG_Ship_Image();
$imageData = $image->getItemHtml($postData->ID, $postData->post_content, $postUrl, $userLang);
$prgInfo = get_option('B2S_PLUGIN_PRG_' . B2S_PLUGIN_BLOG_USER_ID);
?>
<div class="b2s-container">
    <div class="b2s-inbox">
        <div class="col-md-12 del-padding-left">
            <?php require_once (B2S_PLUGIN_DIR . 'views/prg/html/header.php'); ?>

            <div class="prg-ship-form">
                <form method="POST" id="prgShip" enctype="multipart/form-data">
                    <?php require_once (B2S_PLUGIN_DIR . 'views/prg/html/form.php'); ?>
                    <span class="clearfix"></span>

                    <?php if (!empty($imageData)) { ?>
                        <div class="col-md-12 del-padding-left pull-left">
                            <div class="panel panel-group ">
                                <div class="panel-body">
                                    <h4>
                                        <span class="label label-primary">3</span>
                                        <?php _e('Select Image', 'blog2social') ?>
                                    </h4>
                                    <div class="row">
                                        <?php echo $imageData; ?>
                                    </div>
                                    <span class="clearfix"></span>
                                    <div class="form-group prgImageRights">
                                        <label class="col-md-12 del-padding-left"><small> <?php _e('Title', 'blog2social') ?></small></label>
                                        <div class="col-md-4 del-padding-left">
                                            <input id="bildtitel" name="bildtitel" placeholder="<?php _e('Title', 'blog2social') ?>" class="form-control" type="text" value="">
                                        </div>
                                        <label class="col-md-12 del-padding-left"><small><?php _e('Copyright', 'blog2social') ?></small></label>
                                        <div class="col-md-4 del-padding-left">
                                            <input id="bildcopyright" name="bildcopyright" placeholder="<?php _e('Copyright', 'blog2social') ?>" class="form-control" type="text" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="clearfix"></span>
                    <?php } ?>

                    <div class = "col-md-12 del-padding-left">
                        <input type ="hidden" value = "pm" name = "channel">
                        <input type ="hidden" value = "b2s_prg_ship" name = "action">
                        <input type ="hidden" value="0" name="publish" id="publish">                    
                        <input type ="hidden" value="0" name="confirm" id="confirm"> 
                        <input type ="hidden" value="<?php echo B2S_PLUGIN_BLOG_USER_ID; ?>" id="blog_user_id" name="blog_user_id">
                        <input type ="hidden" value="<?php echo $postData->ID; ?>" id="post_id" name="post_id">
                        <input type ="hidden" id = "token" name = "token" value = "<?php echo (isset($prgInfo['B2S_PRG_TOKEN']) && !empty($prgInfo['B2S_PRG_TOKEN'])) ? $prgInfo['B2S_PRG_TOKEN'] : 0; ?>">
                        <input type ="hidden" id = "prg_id" name = "prg_id" value = "<?php echo (isset($prgInfo['B2S_PRG_ID']) && !empty($prgInfo['B2S_PRG_ID'])) ? $prgInfo['B2S_PRG_ID'] : 0; ?>">
                        <div class = "pull-right">
                            <button type = "submit" class = "btn btn-warning btn-lg draft checkPRGButton" disabled = "disabled"><?php _e('Save As Draft', 'blog2social') ?></button>
                            <button class = "btn btn-warning btn-lg checkPRGButton publish" disabled = "disabled"><?php _e('Publish', 'blog2social') ?></button>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>




<!-- B2S-Publish -->
<div id="prg-ship-modal" class="modal fade" role="dialog" aria-labelledby="prg-ship-modal" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="b2s-modal-close close" data-modal-name="#prg-ship-modal">&times;</button>
                <h4 class="modal-title"><?php _e('Please Note', 'blog2social') ?></h4>
            </div>
            <div class="modal-body">
                <p><?php _e('It may incur charges for publishing on PR-Gateway. Sent press releases can not be withdrawn. If you want your press release to be published now?', 'blog2social') ?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary prg-ship-confirm"><?php _e('Yes, I accept', 'blog2social') ?></button>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php _e('NO', 'blog2social') ?></button>
            </div>
        </div>
    </div>
</div>