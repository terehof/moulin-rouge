<?php
/*
Template Name: анкеты
*/
?>
<?php get_header(); ?>
    <!-- main -->
    <main>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="to-main-btn-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<? echo get_home_url(); ?>" class="btn btn-to-main">На главную</a>
                    </div>
                </div>
            </div>
            <h1><? the_title(); ?></h1>

            <div class="bordered breadcrumbs">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<? echo get_home_url(); ?>">Главная</a>
                        -
                        <?php
                        $terms = wp_get_object_terms( $post->ID, 'location' );
                        foreach( $terms as $term )
                            $term_names[] = $term->name;
                        echo implode( ', ', $term_names );
                        ?>
                        -
                        <? the_title(); ?>
                    </div>
                </div>
            </div>

            <div class="bordered profile-main">
                <div class="row">
                    <div class="col-md-5 left clearfix">


                        <?php if( have_rows('photos') ): ?>
	                        <? $index = 0; ?>

                            <?php while( have_rows('photos') ): the_row();
                                // vars
                                $image = get_sub_field('image');
		                        if($index == 5) {
			                        echo '<div class="photos-hidden">';
			                        ?>
			                        <a href="<?php echo $image['url']; ?>" class="fancybox <? echo 'item-'.($index + 1); ?>">
				                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
			                        </a>
		                        <?
		                        } elseif($index > 5) {
			                    ?>
			                        <a href="<?php echo $image['url']; ?>" class="fancybox <? echo 'item-'.($index + 1); ?>">
				                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
			                        </a>
		                        <?
		                        }
		                        else {
			                    ?>
			                        <a href="<?php echo $image['url']; ?>" class="fancybox <? echo 'item-'.($index + 1); ?>" rel="group">
				                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
			                        </a>
		                        <?
		                        }
		                        ?>

		                        <? $index++ ?>
                            <?php endwhile; ?>
	                        <? if($index>5) echo "</div>"; ?>
                        <?php endif; ?>
	                    <? if ($index>5) {
		                ?>
		                    <button class="js__open_all_photos btn btn-all-photos">Все фотографии (<? echo $index; ?>)</button>
	                    <?
	                    } ?>
                    </div>
                    <div class="col-md-7 info">
                        <p class="name">
                            <i>
                                <? the_title(); ?>
                            </i>
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
                            $terms = wp_get_object_terms( $post->ID, 'location',array("fields" => "names") );
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
                        <div class="section">
                            <p class="title">Услуги</p>
	                        <?
	                        $serv_all_ids = array();
	                        $serv_used_ids = array();
//	                        Сначала загоняю в массив айдишники услуг, которые есть у данной анкеты
	                        $services = wp_get_object_terms( $post->ID, 'service' );
	                        foreach( $services as $service ) {
		                        $service_name[] = $service->name;
		                        array_push($serv_used_ids, $service->term_id );
	                        }

//	                        вывожу все услуги
	                        $services_all = get_terms("service");
	                        $count_serv = count($services_all);
	                        if($count_serv > 0){
		                        foreach ($services_all as $service_one) {
//			                        проверяю, если текущий айдишник есть в массиве с айдишниками, то вывожу с классом yes
			                        if ( in_array($service_one->term_id, $serv_used_ids)) {
				                        echo '<p class="service yes">'.$service_one->name.'</p>';
			                        } else {
				                        echo '<p class="service">'.$service_one->name.'</p>';
			                        }
		                        }
	                        }
                            ?>
                        </div>
                        <div class="section">
                                <? $aboutMe = the_content(); ?>
                                <? if (!empty($aboutMe)): ?>
                            <p class="title">Обо мне:</p>
                            <p>
                                <? echo $aboutMe; ?>
                            </p>
                                <? endif; ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php endwhile; ?>
            <!-- post navigation -->
        <?php else: ?>
            <!-- no posts found -->
        <?php endif; ?>
    </main>
    <!-- END main -->
<?php get_footer(); ?>