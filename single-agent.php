<!-- Adds the "Meet Us Sidebar" to the individual agent pages -->

<?php
use \hji\AgentRoster\AgentRoster;
use \hji\AgentRoster\controllers\Testimonials;
use \hji\AgentRoster\utils\ContactForm;

// adding the sidebar & changing the main content class

if ( is_active_sidebar( 'meet-us-sidebar' ) ) : ?>
    
    <div class="custom-sidebar-wrapper hidden-xs hidden-sm col-md-3">
        
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            
            <?php dynamic_sidebar( 'meet-us-sidebar' ); ?>
       
        </div>
    
    </div>
  
    <div class="entry-content col-sm-12 col-md-9" itemscope itemtype="http://schema.org/Person">

<?php else : ?>
    
    <div class="entry-content col-xs-12" itemscope itemtype="http://schema.org/Person">

<?php endif;
 
while ( have_posts() ) : the_post();

// template logic
$agent_id = get_the_ID();
$meta = get_post_meta(get_the_ID());
$fields = array();
        
foreach ( $meta as $key => $value ) :
    
    if ( '_cmb_' == substr( $key, 0, 5 ) ) :
        
        $fields[str_replace( '_cmb_', '', $key )] = $value[0];
    
    endif;

endforeach; ?>

        <div class="agent-data">
            
            <h1 class="agent-name" itemprop="name">
            
            <?php echo $fields['first_name'] . ' ' . $fields['last_name'];
            
            if ( isset( $fields['title'] ) ) : ?>
                
                <span class="title" itemprop="jobTitle"><?php echo $fields['title']; ?></span>
            
            <?php endif;
            
            if ( isset( $fields['designations'] ) ) : ?>
                
                <span class="designations"><?php echo $fields['designations']; ?></span>
            
            <?php endif; ?>
            
            </h1>
            
            <?php if ( has_post_thumbnail() ) : ?>
                
                <div class="agent-photo" itemprop="image"><?php the_post_thumbnail( 'agent-roster-photo' ); ?></div>
            
            <?php endif; ?>
            
            <div class="contact-info">
                <div class="office-contact-info">
                
                <!-- pull office info -->
                <?php if ( isset( $fields['office_id'] ) ) :
                    $office_meta = get_post_meta( $fields['office_id'] );
                    
                    foreach ( $office_meta as $key => $value ) :
                        
                        if ('_cmb_' == substr($key, 0, 5)) :
                            
                            $office[str_replace( '_cmb_', '', $key )] = $value[0];
                        
                        endif;
                    
                    endforeach;
                    
                    if ( isset( $office['address'] ) && isset( $office['city'] ) && isset( $office['state_province'] ) && isset( $office['postal_code'] ) ) :
                        
                        $office_address =
                        '<span itemprop="streetAddress">'. $office['address'] . '</span><br />' .
                        '<span itemprop="addressLocality">' . $office['city'] . '</span>, ' .
                        '<span itemprop="addressRegion">' . $office['state_province'] . '</span> ' .
                        '<span itemprop="postalCode">' . $office['postal_code'] . '</span>';
                    
                    endif; ?>
                    
                    <address itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    
                    <?php if ( isset( $office['office_name'] ) ) : ?>
                        
                        <span class="office-name" itemprop="affiliation"><a href="<?php echo get_permalink( $fields['office_id'] ); ?>">
                            
                            <?php echo $office['office_name']; ?>
                        
                        </a></span><br>
                    
                    <?php endif; ?>
                    
                    <?php if ( isset( $office_address ) ) : ?>
                        
                        <span class="office-address" ><?php echo $office_address; ?></span><br />
                    
                    <?php endif; ?>
                    
                    </address>
                
                <?php endif; ?>
                
                </div>
                
                <div class="agent-contact-info">
                
                <?php if ( isset( $fields['office_phone'] ) ) : ?>
                    
                    <span class="office-phone" itemprop="telephone">
                    
                    <abbr title="Office Phone">Office: </abbr><?php echo $fields['office_phone']; ?>
                    
                    </span><br />
                
                <?php endif;
                
                if ( isset( $fields['mobile_phone'] ) ) : ?>
                    
                    <span class="mobile-phone" itemprop="telephone">
                    
                    <abbr title="Mobile Phone">Mobile: </abbr><?php echo $fields['mobile_phone']; ?>
                    
                    </span><br />
                
                <?php endif;
                
                if ( isset( $fields['fax'] ) ) : ?>
                    
                    <span class="fax" itemprop="faxNumber">
                    
                    <abbr title="Fax Number">Fax: </abbr><?php echo $fields['fax']; ?>
                    
                    </span><br />
                <?php endif;
                
                if ( isset( $fields['email'] ) ) : ?>
                    
                    <span class="email" itemprop="email">
                    
                    <a href="javascript:;" data-toggle="modal" data-target="#agent-contact-modal"><?php echo antispambot( $fields['email'] ); ?></a>
                    
                    </span><br />
                
                <?php endif;
                
                if ( isset( $fields['website'] ) ) : ?>
                    
                    <span class="website" itemprop="url">
                    
                    <a href="<?php echo esc_url( $fields['website'] ); ?>" target="_blank">
                    
                    <?php echo str_replace( 'http://', '', rtrim( $fields['website'], '/' ) ); ?>
                    
                    </a>
                    
                    </span><br />
                
                <?php endif;
                
                // BEGIN Social Media Links
                $icons = false;
                $soc_med = array( 'facebook', 'google_plus', 'twitter', 'linkedin', 'pinterest', 'youtube' );
                
                foreach ( $soc_med as $item ) {
                    
                    if ( isset( $fields[$item] ) ) :
                        
                        $icon_name = $item;
                        $icons .= '<a target="_blank" class="agent-roster-soc-media" href="' . $fields[$item] . '"><img class="' . $icon_name . '" src="' . AGRO_IMAGES . 'iconset/' . $icon_name . '.png" alt="' . ucwords( str_replace('_', ' ', $icon_name) ) . ' Icon" title="' . ucwords( str_replace('_', ' ', $icon_name) ). ' Profile of ' . $fields['first_name'] . ' ' . $fields['last_name'] . '"/></a>';
                    
                    endif;
                
                endforeach;
                
                if ( $icons ) :
                    
                    echo $icons;
                
                endif;
                // END Social Media Links ?>
                
                </div>
            
            </div>
        
        </div>
        
        <?php if ( isset( $fields['email'] ) ) : ?>
            
            <div class="calls2action">
            
                <button type="button" class="btn btn-primary contact-agent" data-toggle="modal" data-target="#agent-contact-modal">Contact Me</button>
            
                <button type="button" class="btn btn-primary send-testimonial" href="#" id="testimonials-btn">Send Me a Testimonial</button>
            
            </div>
        <?php endif;
        
        // BEGIN Tabs
        // Pre-load Shortcodes
        $tabs = array();
        
        if ( isset( $fields['sm_map'] ) ) :
            
            $sm_map = apply_filters( 'the_content', htmlspecialchars_decode( $fields['sm_map'] ) );
            
            $tabs['sm_map'] = $sm_map;
        
        endif;
        
        if ( isset( $fields['agent_listings'] ) ) :
            
            $agent_listings = do_shortcode( htmlspecialchars_decode( $fields['agent_listings'] ) );
            
            $tabs['agent_listings'] = $agent_listings;
        
        endif;
        
        if ( isset( $fields['community_data'] ) ) :
            
            $community_data = do_shortcode( htmlspecialchars_decode( $fields['community_data'] ) );
            
            $tabs['community_data'] = $community_data;
        
        endif;
        // Tabs Links ?>
        
        <div role="tabpanel" class="agent-tabs">
            
            <ul class="nav nav-tabs responsive" role="tablist">
            
            <li class="tab_bio active">
                
                <a href="#bio" aria-controls="bio" role="tab" data-toggle="tab">Bio</a>
            
            </li>
        
            
            <?php if ( isset( $sm_map ) ) : ?>
                
                <li class="tab_sm_map">
                    
                    <a href="#sm_map" aria-controls="sm_map" role="tab" data-toggle="tab">Search Homes</a>
                
                </li>
            
            <?php endif;
            
            if ( isset( $agent_listings ) ) : ?>
                
                <li class="tab_agent_listings">
                    
                    <a href="#agent_listings" aria-controls="agent_listings" role="tab" data-toggle="tab">My Current Listings</a>
                
                </li>
            
            <?php endif;
            
            if ( isset( $community_data ) ) : ?>
                
                <li class="tab_community_data">
                    
                    <a href="#community_data" aria-controls="community_data" role="tab" data-toggle="tab">Community Data</a>
               
                </li>
            
            <?php endif; ?>
                
                <li class="tab_testimonials">
                   
                    <a href="#testimonials" aria-controls="testimonials" role="tab" data-toggle="tab">Testimonials</a>
                
                </li>
           
            <?php if ( $recent_posts = AgentRoster::get_agent_recent_posts( $fields['first_name'] . ' ' . $fields['last_name'] ) ) : ?>
                
                <li class="tab_blog">
                   
                    <a href="#blog" aria-controls="blog" role="tab" data-toggle="tab">Blog</a>
               
                </li>
            
            <?php endif;
            
            if ( $team = AgentRoster::get_team( $post->ID ) ) : ?>
                
                <li class="tab_team">
                    
                    <a href="#team" aria-controls="team" role="tab" data-toggle="tab">Team</a>
               
                </li>
            
            <?php endif;
            
            if ( isset( $fields['custom_tab_name'] ) ) : ?>
               
                <li class="tab_custom">
                   
                    <a href="#custom" aria-controls="custom" role="tab" data-toggle="tab"><?php echo $fields['custom_tab_name']; ?></a>
                
                </li>
            
            <?php endif; ?>
            
            </ul>
            
            <div class="tab-content ">
            
            <div role="tabpanel" class="tab-pane active" id="bio">
                
                <h2>Bio</h2>
                
                <?php echo the_content(); ?>
                
                <?php echo get_the_term_list( $post->ID, 'agent_tags', 'Tags: ', ', ', '' ); ?>
            
            </div>
            
            <?php foreach ( $tabs as $key => &$value ) : ?>
            
                <div role="tabpanel" class="tab-pane" id="<?php echo $key; ?>">
                    
                    <?php echo $value; ?>
                
                </div>
            
            <?php endforeach; ?>
            
            <div role="tabpanel" class="tab-pane" id="testimonials">
                
                <?php echo Testimonials::get_agent_testimonials( get_the_ID() ); ?>
                
                <?php if ( isset( $fields['email'] ) ) : ?>
                    
                    <h2 class="send-me-testimonials">Send Me Your Testimonial</h2>
                    
                    <?php echo do_shortcode( '[testimonials-submission-form send_to="' . $fields['email'] .'" agent_id="' . $agent_id . '"]' ); ?>
                
                <?php endif; ?>
            
            </div>
            
            <?php if ( $recent_posts ) : ?>
                
                <div role="tabpanel" class="tab-pane" id="blog">
                    
                    <h2>Recent blog posts</h2>
                    
                    <?php echo $recent_posts; ?>
                
                </div>
            
            <?php endif; ?>
            
            <?php if ( isset( $team ) ) : ?>
                
                <div role="tabpanel" class="tab-pane" id="team">
                    
                    <?php echo $team; ?>
                
                </div>
            
            <?php endif; ?>
            
            <?php if ( isset( $fields['custom_tab_content'] ) ) : ?>
                
                <div role="tabpanel" class="tab-pane" id="custom">
                    
                    <?php echo apply_filters( 'the_content', $fields['custom_tab_content'] ); ?>
                
                </div>
            
            <?php endif; ?>
            
            </div>
        
        </div>
        <div class="agent-roster-popup-forms modal fade" id="agent-contact-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            
            <div id="agent-contact-form" class="modal-dialog">
            
            <div class="modal-content">
            
            <div class="modal-body">
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
                <?php if ( isset( $fields['email'] ) ) :
                    $contact_form = new ContactForm();
                    
                    echo $contact_form->form( $fields['email'] );
                
                endif; 
                ?>
            
            </div>
            
            <div class="modal-footer">
                
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
                <button type="button" class="btn btn-primary agent-contact-submit" value="Send Inquiry">Submit</button>
            
            </div>
        
        </div>
        
        </div>
        
        </div>
    
    <?php endwhile; ?>

</div>

<!-- adds meet us sidebar for mobile -->

<?php if ( is_active_sidebar( 'meet-us-sidebar' ) ) : ?>
    
    <div class="custom-sidebar-wrapper col-xs-12 hidden-md hidden-lg">
        
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            
            <?php dynamic_sidebar( 'meet-us-sidebar' ); ?>
        
        </div>
    
    </div>

<?php endif; ?>