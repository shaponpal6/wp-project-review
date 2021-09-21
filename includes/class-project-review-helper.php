 <?php
class SPPRProjectHelper {

    public static function acf_get_fields_in_group( $id, $group_name) {
        $group_id = get_post_meta($id, '_'.$group_name, true);
        $acf_meta = get_field( $group_id );
        $acf_fields = array();
        foreach ( $acf_meta as $key => $val ) {
            $acf_fields[$key] = get_post_meta($id, $group_name.'_'.$key, true);
        }
        return $acf_fields;
    }

  public static function get_posts($num = -1) {
      $posts = get_posts([
        'post_type' => 'project-review',
        'post_status'   => 'publish',
        'numberposts'   => $num,
        'order'         => 'DESC',
        // 'fields'        => 'ids'
        ]);
    return $posts;
  }

  public static function get_attachment_data($id = 0) {
      if($id == 0) return [];
      return wp_get_attachment_image_src($id);
  }

  public static function get_posts_meta($post_id = 0, $num = -1) {
        if($post_id > 0){
            $posts = [get_post($post_id)];
        }else{
            $posts = self::get_posts($num);
        }
      $projects = array();
      //loop over each post
        foreach($posts as $p){
            $datetime1 = new DateTime( $p->post_date );
            $datetime2 = new DateTime(); // current date
            $interval = $datetime1->diff( $datetime2 );
            $project = array();
            $id = $p->ID;
            $project['ID'] = $id;
            $project['post_title'] = $p->post_title;
            $project['post_date'] = $p->post_date;
            $project['post_interval'] = $interval->format( '%a' );
            $project['network'] = get_post_meta($id,"network",true);
            $project['risks'] = get_post_meta($id,"risks",true);
            $project['audited'] = get_post_meta($id,"audited",true);
            $project['feature_title'] = get_post_meta($id,"feature_title",true);
            $project['project_features'] = self::acf_get_fields_in_group($id, 'project_features');
            $project['note'] = get_post_meta($id,"note",true);
            $project['alert'] = get_post_meta($id,"alert",true);
            $project['top_buttons'] = self::acf_get_fields_in_group($id,"top_buttons");
            $project['action_buttons'] = self::acf_get_fields_in_group($id,"action_buttons");
            $project['logo'] = self::get_attachment_data(get_post_meta($id,"logo",true));
            $project['permalink'] =  get_permalink( $id );
            $projects[$id] = $project;
        }
    return $projects;
  }

}
?> 