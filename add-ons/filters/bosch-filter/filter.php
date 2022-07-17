<?php
$filters = $args['filters'];
$found_posts = $args['found'];
?>
<div class="module-theme-filter">
	
		
			<div class="theme-filter-views initialized">
		<div class="module-filter-layout-mobile filter-layout hidden-sm hidden-md hidden-lg">
			<div class="container">
				<div class="mobile-filter-header">
					<div class="navbar">
						<div class="row">
							<div class="col-xs-5">
								<div class="filter-block items-count visible"></div>
							</div>
							<div class="col-xs-7">
								<div class="filter-toggle tab icon icon-list-view">
									Filter
									<span class="filter-count total"></span>
								</div>
								<span class="search-toggle tab icon icon-search">Text Test</span>
							</div>
						</div>
					</div>
				</div>
				<div class="foldable-content" style="height: 0px;">
					<div class="carousel slide" data-interval="false">
						<div class="carousel-inner">
							<div class="item active">
								<div class="filter-container-content">
									<div id="mobile-filter-accordion" class="panel-group" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default">
											<div class="panel-heading collapsible" role="tab" id="themes-heading">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" data-parent="#mobile-filter-accordion" href="#themes-panel" aria-expanded="false" aria-controls="collapseOne" class="collapsed">Thema<span class="filter-count themes"></span>
													</a>
												</h4>
											</div>
											<div id="themes-panel" class="panel-collapse collapse " role="tabpanel" aria-labelledby="#themes-heading">
												<div class="panel-body">
													<div class="filter-block themes visible"></div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading collapsible" role="tab" id="units-heading">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" data-parent="#mobile-filter-accordion" href="#units-panel" aria-expanded="false" aria-controls="collapseOne" class="collapsed">Bereich<span class="filter-count units"></span>
													</a>
												</h4>
											</div>
											<div id="units-panel" class="panel-collapse collapse " role="tabpanel" aria-labelledby="#units-heading">
												<div class="panel-body">
													<div class="filter-block units visible"></div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading collapsible" role="tab" id="regions-heading">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" data-parent="#mobile-filter-accordion" href="#regions-panel" aria-expanded="false" aria-controls="collapseOne" class="collapsed">International<span class="filter-count regions"></span>
													</a>
												</h4>
											</div>
											<div id="regions-panel" class="panel-collapse collapse " role="tabpanel" aria-labelledby="#regions-heading">
												<div class="panel-body">
													<div class="filter-block regions visible"></div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading collapsible" role="tab" id="period-heading">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" data-parent="#mobile-filter-accordion" href="#period-panel" aria-expanded="false" aria-controls="collapseOne" class="collapsed">Zeitraum<span class="filter-count period"></span>
													</a>
												</h4>
											</div>
											<div id="period-panel" class="panel-collapse collapse " role="tabpanel" aria-labelledby="#period-heading">
												<div class="panel-body">
													<div class="filter-block period visible"></div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading collapsible" role="tab" id="types-heading">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" data-parent="#mobile-filter-accordion" href="#types-panel" aria-expanded="false" aria-controls="collapseOne" class="collapsed">Medientyp<span class="filter-count types"></span>
													</a>
												</h4>
											</div>
											<div id="types-panel" class="panel-collapse collapse " role="tabpanel" aria-labelledby="#types-heading">
												<div class="panel-body">
													<div class="filter-block types visible"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="filter-block sort-type collapsible visible" style="display:none;"></div>
									<span class="filter-toggle">Filter schließen</span>
								</div>
							</div>
							<div class="item">
								<div class="filter-block search visible"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="module-filter-references clearfix">
					<ul class="filter-references list-unstyled"><li class="reset-filter">
							<span class="btn-reset-filter icon icon-rotation">Alle Filter zurücksetzen</span>
						</li></ul>
				</div>
			</div>
		</div>
		<form id="events-form-filter">
		<div class="module-filter-layout-desktop filter-layout hidden-xs">
			<div class="navbar">
				<div class="container">
					<div class="navbar-wrapper">
						<div class="row">
							<div class="col-sm-12">
								<div class="navbar-space-between">
									<div class="filter-block items-count visible"><div class="items-found" data-target="items-count">
									Found
					<span class="count"><?php echo $found_posts; ?></span>
					
				</div></div>
									<div class="filter-block search visible"><div class="module-search-form" data-target="search">
				
						<div class="search-form-track">
							<div class="form-group">
								<button class="icon icon-search"></button>
								<input id="theme-filter-search" class="search-form-input" type="text" placeholder="Search" name="search" autocomplete="off">
							</div>
						</div>
						<button type="button" class="icon icon-close"></button>
				
				</div></div>
									<div class="filter-toggle tab icon icon-list-view active-tab">
										Filter
										<span class="filter-count total"></span>
									</div>
									<div class="filter-block sort-type visible" style="display:none;"><div class="input-group" data-target="sort-type">
					<select class="form-control selectpicker sort-type bs-select-hidden" id="sort-type" name="sort-type" title="Sortieren nach ..."><option class="bs-title-option" value="">Sortieren nach ...</option>
						<option value="relevance">Relevanz</option>
						<option value="date">Datum</option>
					</select><div class="btn-group bootstrap-select input-group-btn form-control sort-type"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" data-id="sort-type" title="Sortieren nach ..."><span class="filter-option pull-left">Sortieren nach ...</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner" role="menu"><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Relevanz</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Datum</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div></div>
				</div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="foldable-content" style="height: 421px;">
					<div class="filter-container-content">
						<div class="row">
							<div class="col-sm-3 categories">
								<div class="filter-topics btn-group-vertical">
                                    <!-- Tab nav -->
									<button type="button" class="btn btn-link active" data-filter-type="cat">
										Категории
										<span class="filter-count cat"></span>
									</button>
									<button type="button" class="btn btn-link" data-filter-type="tag">
										Теги
										<span class="filter-count tag"></span>
									</button>
									<button type="button" class="btn btn-link" data-filter-type="international">
										Локация
										<span class="filter-count international"></span>
									</button>
									<button type="button" class="btn btn-link" data-filter-type="period">
										Период
										<span class="filter-count period"></span>
									</button>
									<button type="button" class="btn btn-link" data-filter-type="media_type">
										Безумие
										<span class="filter-count media_type"></span>
									</button>
								</div>
							</div>
							<div class="col-sm-9">
								
								<div class="filter-block-track">
									<div class="filter-block themes visible active">
                                        <div class="module-theme-filter-block-checklist" data-target="cat">
					<div class="row">
                        <?php foreach($filters['cats'] as $cat) : ?>
							<div class="col-sm-4">
                            <div class="form-group">
                                <input type="checkbox" id="<?php echo $cat->term_id; ?>" name="cat" value="<?php echo $cat->slug; ?>">
                                <label for="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></label>

                            </div>
							</div>
                            <?php endforeach;?>
							
					</div>
				</div>
            </div>
									<div class="filter-block units visible">
                                        <div class="module-theme-filter-block-checklist" data-target="tag">
					<div class="row">
                    <?php foreach($filters['tags'] as $tag) : ?>
							<div class="col-sm-4">
                            <div class="form-group">
                                <input type="checkbox" id="<?php echo $tag->term_id; ?>" name="tag" value="<?php echo $tag->slug; ?>">
                                <label for="<?php echo $tag->term_id; ?>"><?php echo $tag->name; ?></label>

                            </div>
							</div>
                            <?php endforeach;?>
	
					</div>
				</div></div>
									<div class="filter-block regions visible">
                                        <div class="module-theme-filter-block-checklist" data-target="international">
					<div class="row">
						
                        <?php foreach($filters['location_event'] as $key => $location) : ?>
                            <?php if(empty($location)) continue;?>
							<div class="col-sm-4">
                            <div class="form-group">
                                <input type="checkbox" id="<?php echo 'location_event' . $key ; ?>" name="location_event" value="<?php echo $location; ?>">
                                <label for="<?php echo 'location_event' . $key ; ?>"><?php echo $location; ?></label>

                            </div>
							</div>
                            <?php endforeach;?>
						

					</div>
				</div>
            </div>
									<div class="filter-block period visible">
                                        <div class=" module-theme-filter-block-checklist module-filter-block-period" data-target="period">
					<div>
       
						<div class="col-sm-6 period-column">
							<span>Period of time</span>
							<div class="input-group">
								<select class="form-control selectpicker period hide-label bs-select-hidden active" name="period" id="period_range_select">
									<option value="day" selected="selected">Please select</option>
									<option value="week">This week</option>
									<option value="lastweek">Last week</option>
									<option value="month">This month</option>
									<option value="quarter">This quarter</option>
									<option value="year">This year</option>
								</select>

								<div class="dropdown">
									<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
										Please select
									</button>
									<ul class="dropdown-menu period-menu" aria-labelledby="dropdownMenuButton1">
										<li><a class="dropdown-item" href="#" data-option='1'>Please select</a></li>
										<li><a class="dropdown-item" href="#" data-option='2'>This week</a></li>
										<li><a class="dropdown-item" href="#" data-option='3'>Last week</a></li>
										<li><a class="dropdown-item" href="#" data-option='4'>This month</a></li>
										<li><a class="dropdown-item" href="#" data-option='5'>This quarter</a></li>
										<li><a class="dropdown-item" href="#" data-option='6'>This year</a></li>
									</ul>
								</div>

							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<label>from</label>
								<div id="from" class="input-group date date-from">
									<input type="text" placeholder="DD.MM.YYYY" class="form-control" id="date_from" name="date_from" >
									<p class="input-group-addon addon-icon">
										<span class="icon icon-calendar"></span>
									</p>
								</div>
							</div>
							<div class="col-sm-4">
								<label>to</label>
								<div id="to" class="input-group date date-to">
									<input type="text" placeholder="DD.MM.YYYY" class="form-control" id="date_to" name="date_to">
									<p class="input-group-addon addon-icon">
										<span class="icon icon-calendar"></span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
									<div class="filter-block types visible">
                                        <div class="module-theme-filter-block-checklist" data-target="media_type">
					<div class="row">
                    <?php foreach($filters['event_madness'] as $key => $madness) : ?>
                            
							<div class="col-sm-4">
                            <div class="form-group">
                                <input type="checkbox" id="<?php echo 'madness_event' . $key ; ?>" name="event_madness" value="<?php echo $madness; ?>">
                                <label for="<?php echo 'madness_event' . $key ; ?>"><?php echo $madness; ?></label>

                            </div>
							</div>
                            <?php endforeach;?>
	
					</div>
				</div>
            </div>
								</div>
								
							</div>
						</div>
						<div class="filter-block date-select visible"></div>
					</div>
					<span class="filter-toggle" style="display: block;">Filter schließen</span>
				</div>
				<div class="module-filter-references clearfix">
					<ul class="filter-references list-unstyled"><li class="reset-filter">
							<span class="btn-reset-filter icon icon-rotation">Alle Filter zurücksetzen</span>
						</li></ul>
				</div>
			</div>
		</div>
		</form>
	</div>

<div class="module-theme-grid">
	<div class="container">
		<div class="regular-themes">
			<div class="themes-container themes-row">
				<!-- WP Query -->
				<?php $events_args = array(
					'post_per_page' => 20,
					'post_type' => 'events'
				);
				$events_query = new WP_Query($events_args);
				if($events_query->have_posts()) : while($events_query->have_posts()) : $events_query->the_post();
				?>
				<div class="module-theme theme-custom-grid">
					<div class="theme-wrapper">
						<a href="" class="theme-container">
								<div class="theme-image-wrapper">
									<div class="theme-image-cropper">
									
										<img class="theme-image" alt="" src="<?php echo the_post_thumbnail_url();?>">
									</div>
								</div>
							<div class="theme-content">
								<p class="theme-date copy-small">
									<?php get_the_date('d.m.Y');?>
								</p>
								<p class="theme-type copy-small">
									<?php $cats = wp_get_post_terms(get_the_ID(), 'events_category'); ?>

									<?php echo $cats[0]->name; ?>
								</p>
								<h4 class="theme-title">
									<?php echo get_the_title();?>
										<span class="icon icon-right"></span>
								</h4>
							</div>
						</a>
						<div class="tag-wrapper">
							<a href="/pressportal/de/en/tag/bosch-group/">
								<p class="theme-tag copy-small">
								<?php $tags = wp_get_post_terms(get_the_ID(), 'events_tags'); ?>
								<?php echo $tags[0]->name; ?>
								</p>
							</a>
						</div>
						<div class="module-theme-actions theme-actions-icons-only">
							<ul class="list-unstyled">
						
								<li>
									<a class="theme-action action-share" href="#" title="share">
										<span class="icon icon-share"></span>
										<span class="btn-text">share</span>
									</a>
									<div class="share-links">
										<ul class="list-unstyled">
											<li>
												<a class="icon-facebook-blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.bosch-presse.de/pressportal/de/en/software-gaining-in-prominence-for-automakers-236503.html" target="_blank">Share Facebook</a>
											</li>
											<li>
												<a class="icon-twitter-blank" href="https://twitter.com/intent/tweet?url=https://www.bosch-presse.de/pressportal/de/en/software-gaining-in-prominence-for-automakers-236503.html&amp;text=Software gaining in prominence for automakers" target="_blank">Tweet</a>
											</li>
											<li>
												<a class="icon-linkedin-blank" href="https://www.linkedin.com/shareArticle?url=https://www.bosch-presse.de/pressportal/de/en/software-gaining-in-prominence-for-automakers-236503.html&amp;title=Software gaining in prominence for automakers" target="_blank">LinkedIn</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<?php endwhile; endif;?>
			</div>
		</div>

	</div>
</div> 

	</div>