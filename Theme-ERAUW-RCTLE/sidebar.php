<div class="card-deck mb-3 text-center">
    <div class="card mb-4 box-shadow">
        <div class="card-header mission">
            <h3 class="my-0 font-weight-normal mission">MISSION</h3>
        </div>
        <div class="card-body">
            <p class="mission">The mission of the Rothwell Center for Teaching and Learning Excellence is to empower faculty members in their pursuit of professional growth through diverse offerings for the universal goal of student success.</p>
        </div>
    </div>
</div>


<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
    <ul class="sidebar">
        <?php dynamic_sidebar('sidebar-1' ); ?>
    </ul>
<?php } ?>

<div>
    <p class="center">
        <a href="https://rctle.erau.edu/support/#contact" type="button" class="btn btn-primary btn-lg" role="button"><i class="fas fa-envelope-square" style="font-size:200%"></i> Contact Us</a>
    </p><br />
</div>


<hr>

<?php 

// wp_tag_cloud('smallest=8&largest=22'); 

// 1) Get the category array,
$category = get_the_category(get_the_ID());

// 2) Get the main category of the page
$catid=$category[0]->category_parent;
if($catid==0){
  $catid=$category[0]->cat_ID;
}

// 3) Get the children categories
$categories = get_categories('child_of='.intval($catid));            

foreach ($categories as $category) {
    // Validation
    if ($category->parent ==$catid):
        echo '<p><a href="' . get_category_link( $category->term_id ) . '">'.$category->cat_name.'</a> ('.$category->count.')<br />';
        // Get the subcategory
            echo $category->description . '</p>';

        $subcategories=  get_categories('child_of='.intval($category->cat_ID));
        /*
        foreach ($subcategories as $subcategory) {
            echo '<span class="subcategory" style="padding-left:15px">';
            echo '<a href="">'.$subcategory->cat_name.'</a></span>';
        } */
    endif;
}

 ?>