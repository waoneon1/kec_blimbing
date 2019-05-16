<?php
/*****************************************************************************************
 * Row Action Download pdf dan remove view
 * docrt-document
 *****************************************************************************************/
function docrt_remove_view_link($actions, $page_object)
{
    global $current_user, $wpdb;
    $role = $wpdb->prefix . 'capabilities';
    $current_user->role = array_keys($current_user->$role);
    $role = $current_user->role[0];

    if ($role != 'top_editor' && $role != 'administrator') {
      unset($actions['delete']);
    }

    unset($actions['view']);
    unset($actions['inline hide-if-no-js']);
    return $actions;
}
add_filter('page_row_actions', 'docrt_remove_view_link', 10, 2);

function docrt_create_pdf($actions, $page_object)
{
    global $post;
    if (get_post_type($post) == 'docrt-document') {
        $actions['create_pdf'] = '<a href="'.docrt_plugin_url() .'/includes/docrt_pdf_create.php?pid='.$page_object->ID.'" class="create_pdf" target="_blank">' . __('Buat PDF') . '</a>';
    }

   return $actions;
}
add_filter('page_row_actions', 'docrt_create_pdf', 10, 2);

/*****************************************************************************************
* Table header
* docrt-document
/*****************************************************************************************/
// author table header
add_filter('manage_docrt-document_posts_columns', 'docrt_table_head');
function docrt_table_head( $defaults ) {
    $defaults['author'] = 'Autor';
    return $defaults;
}

// ID SURAT
add_filter('manage_docrt-document_posts_columns', 'bbox_table_head');
function bbox_table_head( $defaults ) {
    $defaults['id_surat']  = 'ID Surat';
    $defaults['from_online']  = 'Online';
    return $defaults;
}

add_action( 'manage_docrt-document_posts_custom_column', 'bbox_event_table_content', 10, 2 );
function bbox_event_table_content( $column_name, $post_id ) {
    $post_term = get_the_terms ($post->ID,'surat' );
    $meta = get_post_meta( $post_id, 'docrt_'.$post_term[0]->slug.'_id', true );
    //var_dump(get_post_meta($post_id));
    if ($column_name == 'id_surat') {
       echo $post_term[0]->slug.' - '.$meta;
    }

    if ($column_name == 'from_online') {
       echo get_post_meta($post_id)['docrt_formrw_acc'][0];
    }
}

// Make these columns sortable
/*add_filter( "manage_edit-docrt-document_sortable_columns", "sortable_columns" );
function sortable_columns() {
    return array(
        'id_surat'      => 'id_surat'
    );
}*/

// Filter Online
add_action( 'restrict_manage_posts', 'docrt_admin_posts_filter_restrict_manage_posts' );
function docrt_admin_posts_filter_restrict_manage_posts(){
    $type = 'docrt-document';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    //only add filter to post type you want
    if ('docrt-document' == $type){
        //change this to the list of values you want to show
        //in 'label' => 'value' format
        $values = array(
            'Surat Online' => 'yes',
        );
        ?>
        <select name="oneline">
        <option value="">Semua Surat</option>
        <?php
            $current_v = isset($_GET['oneline'])? $_GET['oneline']:'';
            foreach ($values as $label => $value) {
                printf
                    (
                        '<option value="%s"%s>%s</option>',
                        $value,
                        $value == $current_v? ' selected="selected"':'',
                        $label
                    );
                }
        ?>
        </select>
        <?php
    }
}

add_filter( 'parse_query', 'docrt_posts_filter' );
function docrt_posts_filter( $query ){
    global $pagenow;
    $type = 'docrt-document';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ( 'docrt-document' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['oneline']) && $_GET['oneline'] != '') {
        $query->query_vars['meta_key'] = 'docrt_formrw_acc';
        $query->query_vars['meta_value'] = $_GET['yes'];
    }
}

/*****************************************************************************************
* button Buat PDF di publish metabox
* docrt-document
*****************************************************************************************/
add_action( 'post_submitbox_misc_actions', 'article_or_box' );
function article_or_box() {
    global $post;
    if (get_post_type($post) == 'docrt-document') {
         echo '<a href="'.docrt_plugin_url() .'/includes/docrt_pdf_create.php?pid='.$post->ID.'" class="button button-primary button-large button-fullwidth" target="_blank">Buat PDF</a>';
    }
}
/*****************************************************************************************
* Title Default Untuk custom post type docrt-perangkat
* docrt-perangkat
*****************************************************************************************/
add_filter('wp_insert_post_data', 'docrt_change_title_doc');
function docrt_change_title_doc($data)
{
    if('docrt-document' != $data['post_type'])
        return $data;

    if ($data['post_title'] == '') {
        $data['post_title'] = $_POST['docrt_form_nama'];
    }

    return $data;
}
/*****************************************************************************************
* Title Default Untuk custom post type docrt-perangkat
* docrt-perangkat
*****************************************************************************************/
add_filter('wp_insert_post_data', 'docrt_change_title');
function docrt_change_title($data)
{
    if('docrt-perangkat' != $data['post_type'])
        return $data;

    $post = $_POST;

    $data['post_title'] = $_POST['docrt_perangkat']['jabatan'].' '.$_POST['docrt_perangkat']['no_jabatan'].' - '.$_POST['docrt_perangkat']['nama'];

    return $data;
}

/*****************************************************************************************
* Hide Add New Sub menu dan Rename Perangkat
* docrt-perangkat
*****************************************************************************************/
function hide_add_new_custom_type()
{
    global $submenu, $menu;

    $submenu['edit.php?post_type=docrt-document'][5][0] = 'List Document';

    $menu[22][0] = 'Admin Tools';
    unset($submenu['edit.php?post_type=docrt-perangkat'][10]);

}
add_action('admin_menu', 'hide_add_new_custom_type');

