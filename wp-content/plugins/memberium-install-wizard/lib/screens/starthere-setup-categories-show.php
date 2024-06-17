<?php
if (!defined('ABSPATH')) {
    die();
}

$unlocks['categories'] = true;
$categories = $this->createCategory('Memberships', $this->getCategories());
$current_category = get_option($appname . '_category');

?>
    <style>
        .memberium-continue-button-container {
            margin-right: 0 !important;
        }
    </style>

    <div class="memberium-content">
        <h2 class="memberium-title">Choose Your Membership Tag Category</h2>
        <p>
            Please select an <a target="_blank"
                                href="https://help.infusionsoft.com/userguides/contact-management/search-and-tag-contacts/create-and-manage-tag-categories">Infusionsoft
                tag category</a>
            that your Memberium membership tags will be created in; you'll create the actual membership levels in the step after this.
        </p>
        <p>
            If you don't know what category to use, use the default tag category called "Memberships" that we've automatically
            created for you. (If you do create a new category in Infusionsoft, please refresh this page after so it will show
            up in the list below.)
        </p>
        <form action="?page=memberium-installer-wizard&wizard=setup&tab=memberships" method="POST">
            <p>
                <label>
                    Category Name:
                    <select name="category_id" style="width:250px;">
                        <?php
                        foreach ($categories as $k => $v) {
                            if ($current_category !== false) {
                                $selected = $current_category == $k;
                            } else {
                                $selected = (stripos($v, 'member') !== false);
                            }
                            echo '
                <option value="', $k, '"
                ', ($selected ? ' selected="selected" ' : ''), '>', $v, '</option>';
                        }
                        ?>
                    </select>
                </label>
            </p>
            <div class="memberium-continue-button-container">
                <input type="submit" name="save" value="Set Category" class="memberium-button primary"/>
            </div>
        </form>
    </div>
