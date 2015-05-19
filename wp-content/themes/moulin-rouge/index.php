
<?php get_header('index'); ?>

    <!-- main -->
    <main>
        <div class="container">
            <div class="hello-text">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <? the_content(); ?>
                        <?php endwhile; ?>
                        <!-- post navigation -->
                        <?php else: ?>
                        <!-- no posts found -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <h1>Анкеты</h1>
            <div class="profiles-filter bordered">
                <div class="row">
                    <div class="col-md-12">
                        <p class="title">Подобрать:</p>
                        <i>Район:</i>


	                    <? $sortBy = $_POST['district']; ?>
	                    <form action="" method="POST" class="form-filter">
	                        <select name="district" id="district" class="district-select">
	                            <?
	                            $terms = get_terms("location");
	                            $count = count($terms);
	                            if($count > 0){
	                                foreach ($terms as $term) {
	                                    echo "<option value=\"$term->term_id\">".$term->name."</option>";
	                                }
	                            }
	                            ?>
	                        </select>
	                        <button type="submit" class="btn btn-filter">Показать</button>
	                    </form>
	                    <span class="location-id"><? echo $sortBy; ?></span>
                    </div>
                </div>
            </div>
            <div class="profiles-list">
                <div class="row">
                    <div class="col-md-12 clearfix">

	                    <?
	                    $wpqueryArgs;
	                    if (!empty($sortBy)) {
		                    $wpqueryArgs = array(
			                    'post_type' => 'profile',
			                    'posts_per_page' => -1,
			                    'order' => 'ASC',
			                    'tax_query' => array(
				                    array(
					                    'taxonomy' => 'location',
					                    'field' => 'id',
					                    'terms' => $sortBy
				                    )
			                    )
			                    );
	                    } else {
		                    $wpqueryArgs = array('post_type' => 'profile', 'posts_per_page' => -1, 'order' => 'ASC');
	                    }
	                    ?>
                        <?php $profiles = new WP_query($wpqueryArgs); ?>
                        <?php if ($profiles-> have_posts() ) : ?>
                        <?php $one = true; ?>
                            <div class="item-row">
                            <?  while ($profiles->  have_posts() ) :$profiles->  the_post(); ?>
                                <div class="profile-item bordered">
                                    <div class="row">
                                        <div class="col-md-6 photo">
	                                        <?php if( have_rows('photos') ): ?>
		                                        <?php while( have_rows('photos') ): the_row();
			                                        // vars
			                                        $image = get_sub_field('image');
			                                        ?>
			                                        <a href="<? the_permalink(); ?>">
				                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
			                                        </a>
			                                        <? break 1; ?>
		                                        <?php endwhile; ?>
	                                        <?php endif; ?>

	                                        <br>
                                            <a href="<? the_permalink(); ?>" class="btn btn-see-profile">Посмотреть</a>
                                        </div>
                                        <div class="col-md-6 info">
                                            <p class="name-age">
                                                <i><a href="<? the_permalink(); ?>"><? the_title(); ?></a>,</i>
	                                            <? $age = get_field('age');
	                                            if (!empty($age)) {
	                                                 echo $age;
	                                            } ?>
                                            </p>


	                                        <? $phone = get_field('phone');
	                                        if (!empty($phone)) { ?>
		                                        <p class="phone">
			                                        <? echo $phone; ?>
		                                        </p>
	                                        <? } ?>

                                            <p class="location">
                                                <span>Район:</span>
                                                <?php
                                                $terms = wp_get_object_terms( $post->ID, 'location', array("fields" => "names") );
                                                echo $terms[0];
                                                ?>
                                            </p>
                                            <div class="section">
                                                <p class="title">Параметры:</p>
	                                            <? $height = get_field('height');
	                                            if (!empty($height)) { ?>
		                                            <p>
			                                            <span>Рост:</span>
			                                            <? echo $height; ?>
		                                            </p>
	                                            <? } ?>
	                                            <? $weight = get_field('weight');
	                                            if (!empty($weight)) { ?>
		                                            <p>
			                                            <span>Вес:</span>
			                                            <? echo $weight; ?>
		                                            </p>
	                                            <? } ?>
	                                            <? $breast = get_field('breast');
	                                            if (!empty($breast)) { ?>
		                                            <p>
			                                            <span>Грудь:</span>
			                                            <? echo $breast; ?>
		                                            </p>
	                                            <? } ?>
                                            </div>
                                            <div class="section">
                                                <p class="title">Услуги:</p>
                                                <?php
                                                $services = wp_get_object_terms( $post->ID, 'service' );
                                                foreach( $services as $service ) {
                                                    $service_name[] = $service->name;
                                                    echo '<p>'.$service->name.'</p>';
                                                }
                                                ?>
                                            </div>
                                            <div class="section">
                                                <p class="title">Встреча:</p>
	                                            <? $meet_home = get_field('meet_home');
	                                            if (!empty($meet_home)) { ?>
		                                            <p>
			                                            <span>На дому:</span>
			                                            <? echo $meet_home; ?>
		                                            </p>
	                                            <? } ?>
	                                            <? $meet_leave = get_field('meet_leave');
	                                            if (!empty($meet_leave)) { ?>
		                                            <p>
			                                            <span>Выезд:</span>
			                                            <? echo $meet_leave; ?>
		                                            </p>
	                                            <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php $one = !$one; if ($one) echo '</div><div class="item-row">'; ?>
                        <?php endwhile; ?>
                        <!-- post navigation -->
                        <?php else: ?>
                        <!-- no posts found -->
                        <?php endif; ?>
                    </div>
                </div>
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!--                        <button class="js__btn_more btn btn-more">Показать еще</button>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </main>
    <!-- END main -->


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?$seoText = get_field('seo_text'); ?>
	<? if( !empty($seoText) ): ?>
		<footer>
			<div class="container">
				<? echo $seoText; ?>
			</div>
		</footer>
	<? endif; ?>

<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>

<?php get_footer(); ?>