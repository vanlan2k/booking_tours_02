<?php
function showCategories($category, $parent_id = 0, $char = '')
{
    foreach ($category as $key => $item) {
        if ($item->parent_id == $parent_id) {
            echo '<option value="' . $item->id . '">' . $char . $item->name . '</option>';
            unset($category[$key]);
            showCategories($category, $item->id, $char . '|---');
        }
    }
}
