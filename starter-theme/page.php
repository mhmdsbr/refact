<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Starter_Theme
 */

get_header();
?>

	<main class="main">
		<article class="c-hero">
			<div class="c-hero__background">
				<div class="c-hero__background">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/background-picture-sm.webp" media="(max-width: 575.98px)">
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/background-picture-md.webp" media="(min-width: 576px) and (max-width: 991.98px)">
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/background-picture-lg.webp" media="(min-width: 992px) and (max-width: 1199.98px)">
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/background-picture.webp" media="(min-width: 1200px)">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/background-picture.jpg" alt="Picture of some people in a restaurant" title="Restaurant" loading="lazy" />
					</picture>
				</div>
			</div>
			<div class="c-hero__content row u-flex--center">
				<div class="col-lg-4 col-sm-10 u-flex--column">
					<h1 class="c-hero__title">Book a table in the best Mexican restaurant</h1>
					<p class="c-hero__paragraph">30% off for Christmas</p>
					<div class="c-hero__buttons u-flex--center">
						<a href="#" class="btn btn--secondary">Book Now</a>
						<a href="#" class="btn btn--primary">See Menu</a>
					</div>
				</div>
			</div>
			<div class="c-hero__btn-down">
				<a href="#why-us">
					<svg width="30" height="13" viewBox="0 0 30 13" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M29.2839 5.93606L23.4383 0.218059C23.1414 -0.0726864 22.665 -0.0726864 22.3681 0.218059C22.0712 0.508805 22.0712 0.975209 22.3681 1.26596L26.9209 5.72406H1.01452C0.593885 5.72406 0.253662 6.0572 0.253662 6.46909C0.253662 6.88098 0.593885 7.21413 1.01452 7.21413H26.9209L22.3681 11.6601C22.0712 11.9509 22.0712 12.4173 22.3681 12.708C22.5166 12.8534 22.7083 12.9261 22.9063 12.9261C23.1042 12.9261 23.296 12.8534 23.4445 12.708L29.2901 6.98395C29.5808 6.69927 29.5808 6.2268 29.2839 5.93606Z" fill="#FFFCFC"/>
					</svg>
				</a>
			</div>
		</article>
		<article id="why-us" class="c-why-us o-section">
			<div class="o-section__wrapper bg-primary">
				<div class="row u-flex--center row--mobile">
					<div class="col-lg-7 p-0 col-12">
						<div class="c-why-us__content">
							<h2 class="c-why-us__title">Why Customers Like us?</h2>
							<p class="c-why-us__paragraph">When we first opened our restaurant, it didn't take a long time ofr us to prove our difference.</p>
							<p class="c-why-us__paragraph">Our native chefs, the Chinese atmosphere of the restaurant, the variety of dishes, the high quality of foods, and affordable prices made us well-known very soon.</p>
							<p class="c-why-us__paragraph">Today, we have customers not only from this area but also from other cities.</p>
						</div>
					</div>
					<div class="col-lg-5 p-0 col-12">
						<div class="c-why-us__image">
							<picture>
								<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/why-us.webp" media="(min-width: 360px)">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/why-us.jpg" alt="Image of a chef cooking" title="Why us?" loading="lazy" />
							</picture>
						</div>
					</div>
				</div>
			</div>
		</article>
		<article class="c-menu o-section">
			<div class="o-section__wrapper mt-0 mt-lg-0 mt-md-6 bg-primary">
				<div class="row u-flex--center">
					<div class="col-12">
						<div class="c-menu__container">
							<div class="c-menu__header">
								<h3 class="c-menu__title">Our Menu</h3>
								<ul>
									<li class="c-menu__nav-item active" data-tab="starter">Starter</li>
									<li class="c-menu__nav-item" data-tab="main-dishes">Main Dishes</li>
									<li class="c-menu__nav-item" data-tab="desserts">Desserts</li>
								</ul>
							</div>
							<div class="c-menu__content">
								<?php
								$categories = array('starter', 'main-dishes', 'desserts');
								foreach ($categories as $category) :
									?>
									<ul id="<?php echo $category; ?>" class="tab-content <?php echo ($category === 'starter') ? 'active' : ''; ?>">
										<?php
										$args = array(
												'post_type' => 'menu',
												'posts_per_page' => -1,
												'tax_query' => array(
														array(
																'taxonomy' => 'category',
																'field' => 'slug',
																'terms' => $category,
														),
												),
										);

										$query = new WP_Query($args);

										if ($query->have_posts()) :
											while ($query->have_posts()) : $query->the_post();
												?>
												<li>
													<h4 class="c-menu__content-title"><?php the_title(); ?></h4>
													<p class="c-menu__content-ingredient">
														<?php echo get_the_excerpt(); ?>
														<span class="c-menu__content-price">$<?php echo get_field('food_price'); ?></span>
													</p>
												</li>
											<?php
											endwhile;
											wp_reset_postdata();
										else :
											echo '<li>No items found.</li>';
										endif;
										?>
									</ul>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
		<article class="c-popular-dishes o-section">
			<div class="o-section__wrapper bg-primary">
				<div class="row u-flex--center">
					<div class="col-12">
						<div class="c-popular-dishes__container">
							<div class="c-popular-dishes__header">
								<h3 class="c-popular-dishes__title">The Most Popular Dishes</h3>
								<div class="c-popular-dishes__slide-nav">
									<button type="button" name="button" class="c-popular-dishes__slide-prev-button" aria-label="Previous Slide">
										<svg width="30" height="13" viewBox="0 0 30 13" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M29.2839 5.93606L23.4383 0.218059C23.1414 -0.0726864 22.665 -0.0726864 22.3681 0.218059C22.0712 0.508805 22.0712 0.975209 22.3681 1.26596L26.9209 5.72406H1.01452C0.593885 5.72406 0.253662 6.0572 0.253662 6.46909C0.253662 6.88098 0.593885 7.21413 1.01452 7.21413H26.9209L22.3681 11.6601C22.0712 11.9509 22.0712 12.4173 22.3681 12.708C22.5166 12.8534 22.7083 12.9261 22.9063 12.9261C23.1042 12.9261 23.296 12.8534 23.4445 12.708L29.2901 6.98395C29.5808 6.69927 29.5808 6.2268 29.2839 5.93606Z" fill="#FFFCFC"/>
										</svg>
									</button>
									<p class="c-popular-dishes__pagination js-carousel-status"></p>
									<button type="button" name="button" class="c-popular-dishes__slide-next-button" aria-label="Next Slide">
										<svg width="30" height="13" viewBox="0 0 30 13" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M29.2839 5.93606L23.4383 0.218059C23.1414 -0.0726864 22.665 -0.0726864 22.3681 0.218059C22.0712 0.508805 22.0712 0.975209 22.3681 1.26596L26.9209 5.72406H1.01452C0.593885 5.72406 0.253662 6.0572 0.253662 6.46909C0.253662 6.88098 0.593885 7.21413 1.01452 7.21413H26.9209L22.3681 11.6601C22.0712 11.9509 22.0712 12.4173 22.3681 12.708C22.5166 12.8534 22.7083 12.9261 22.9063 12.9261C23.1042 12.9261 23.296 12.8534 23.4445 12.708L29.2901 6.98395C29.5808 6.69927 29.5808 6.2268 29.2839 5.93606Z" fill="#FFFCFC"/>
										</svg>
									</button>
								</div>
							</div>
							<div class="main-carousel" data-flickity='{ "freeScroll": true }'>
								<?php
								$args = array(
										'post_type'      => 'menu',
										'posts_per_page' => 3,
								);

								$query = new WP_Query($args);

								if ($query->have_posts()) :
									while ($query->have_posts()) : $query->the_post();

										$is_popular_dish = get_field('popular_dish', get_the_ID());

										if ($is_popular_dish) :
											?>
											<div class="row u-flex--align-center row--mobile carousel-cell">
												<div class="col-lg-7 p-0">
													<?php if (has_post_thumbnail()): ?>
														<div class="c-popular-dishes__item-img">
															<?php the_post_thumbnail('large'); ?>
														</div>
													<?php endif; ?>
												</div>
												<div class="col-12 col-lg-5 p-0 pl-lg-6">
													<h4 class="c-popular-dishes__item-title"><?php the_title(); ?></h4>
													<p class="c-popular-dishes__item-desc"><?php echo strip_tags(get_the_content()); ?></p>
													<p class="c-popular-dishes__item-price">$<?php echo get_field('food_price'); ?></p>
												</div>
											</div>
										<?php
										endif;
									endwhile;
									wp_reset_postdata();
								else :
									echo '<p>No popular dishes found.</p>';
								endif;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
		<article class="c-booking o-section">
			<div class="o-section__wrapper px-md-2 p-0">
				<div class="c-booking__background">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/booking-lg.webp" media="(max-width: 575.98px)">
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/booking-lg.webp" media="(min-width: 576px) and (max-width: 991.98px)">
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/booking-lg.webp" media="(min-width: 992px) and (max-width: 1199.98px)">
						<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/booking.webp" media="(min-width: 1200px)">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/booking.jpg" alt="Image of an empty dark restaurant" title="Book a Table" loading="lazy" />
					</picture>
				</div>
				<div class="c-booking__container row u-flex--center">
					<div class="col-12 col-lg-7 p-0 px-lg-2">
						<div class="c-booking__content">
							<h2 class="c-booking__title">Book a Table</h2>
							<p class="c-booking__paragraph">When we first opened our restaurant, it didn't take a long time for us to prove our difference. </p>
						</div>
					</div>
					<div class="col-12 col-md-10 p-0 col-lg-5 m-auto">
						<div class="c-booking__form-container bg-primary">
							<form id="bookingForm" class="c-booking__form u-flex u-flex--column">
								<div class="c-booking__form-input-wrapper">
									<label for="name">Your Name:</label>
									<input type="text" id="name" name="name" class="c-booking__form-input">
								</div>
								<div class="c-booking__form-input-wrapper">
									<label for="phone">Phone:</label>
									<input type="tel" id="phone" name="phone" class="c-booking__form-input">
								</div>
								<div class="c-booking__form-input-wrapper">
									<label for="email">Email:</label>
									<input type="email" id="email" name="email" class="c-booking__form-input">
								</div>
								<div class="c-booking__form-input-wrapper">
									<label for="date">Date:</label>
									<input type="date" id="date" name="date" placeholder="Month, Day, Year" class="c-booking__form-input">
								</div>
								<div class="c-booking__form-input-wrapper">
									<label for="time">Time:</label>
									<input type="time" id="time" name="time" class="c-booking__form-input">
								</div>
								<div class="c-booking__form-input-wrapper">
									<label for="number">Number of People:</label>
									<div class="c-booking__input-number-wrapper">
										 <span class="input-number-plus">
											<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											  <path d="M8.93585 6.41509H15.0642V9.0566H8.93585V16H6.1283V9.0566H0V6.41509H6.1283V0H8.93585V6.41509Z" fill="#909090"/>
											</svg>
										 </span>
										<input type="number" id="number" name="number" class="c-booking__form-input js-form-number-input">
										<span class="input-number-minus">
										<svg width="13" height="2" viewBox="0 0 13 2" fill="none" xmlns="http://www.w3.org/2000/svg">
										  <path d="M12.4238 1.80838H0.423828V0H12.4238V1.80838Z" fill="#909090"/>
										</svg>
									  </span>
									</div>
								</div>
								<button name="Book a table" class="btn btn--secondary c-booking__form-btn" type="submit">Book Now</button>
							</form>
							<div class="c-booking__messages">
								<div class="c-booking__success-message p-0">
									<svg width="44" height="32" viewBox="0 0 44 32" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M2 17.1286L14.2835 29.1698L42 2" stroke="#E5C680" stroke-width="4"/>
									</svg>
									<h3>Thank You</h3>
									<p>Your reservasion has bee received, we’ll be happy to see you.</p>
									<a href="#">Ok</a>
								</div>
								<div class="c-booking__error-message p-0">
									<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M2 31.7041L17 17M32 2.29588L17 17M17 17L2 2L32 31.7041" stroke="#FF4800" stroke-width="4"/>
									</svg>
									<h3>We’ve a Problem</h3>
									<p>Unfourtunately a problem occured during the operation. We’re so sorry for the inconvenience.</p>
									<a href="#">Ok</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
		<article class="c-contact o-section">
			<div class="o-section__wrapper p-0">
				<div class="row">
					<div class="col-12 p-0">
						<div class="c-contact__container">
							<div class="c-contact__header">
								<h2 class="c-contact__title">Contact Us</h2>
							</div>
							<div class="c-contact__content">
								<div class="row c-contact__contact-items">
									<p class="col-lg-4 col-6 c-contact__contact-item">
										<span>
										  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M24.3285 21.1687C23.2831 20.1365 21.9779 20.1365 20.9392 21.1687C20.1467 21.9544 19.3543 22.7402 18.5752 23.5392C18.3622 23.759 18.1824 23.8056 17.9227 23.6591C17.4099 23.3794 16.8639 23.153 16.3712 22.8467C14.0738 21.4017 12.1494 19.5439 10.4447 17.453C9.59905 16.4142 8.8466 15.3022 8.32054 14.0503C8.214 13.7973 8.23398 13.6308 8.4404 13.4244C9.23281 12.6586 10.0052 11.8728 10.7843 11.0871C11.8697 9.99503 11.8697 8.71652 10.7777 7.6178C10.1584 6.99186 9.53912 6.37924 8.91984 5.75331C8.28059 5.11405 7.64799 4.46814 7.00208 3.83554C5.95663 2.81673 4.65149 2.81673 3.6127 3.8422C2.81363 4.62795 2.04786 5.43368 1.23548 6.20611C0.483021 6.91861 0.103463 7.79093 0.0235567 8.80974C-0.102962 10.4678 0.30323 12.0326 0.875896 13.5575C2.04786 16.7139 3.83245 19.5173 5.99659 22.0876C8.91984 25.5635 12.4091 28.3137 16.491 30.298C18.3289 31.1903 20.2333 31.8762 22.3042 31.9894C23.7292 32.0693 24.9678 31.7097 25.96 30.5977C26.6392 29.8385 27.4049 29.146 28.1241 28.4202C29.1895 27.3415 29.1962 26.0363 28.1374 24.9709C26.8722 23.699 25.6004 22.4338 24.3285 21.1687Z" fill="white"/>
											<path d="M23.0567 15.8615L25.5139 15.442C25.1277 13.1847 24.0622 11.1404 22.4441 9.5156C20.7328 7.80426 18.5686 6.72552 16.1848 6.39258L15.8385 8.86303C17.683 9.12273 19.3611 9.95509 20.6862 11.2802C21.9381 12.5321 22.7571 14.1169 23.0567 15.8615Z" fill="white"/>
											<path d="M26.8989 5.18062C24.0623 2.34393 20.4731 0.552689 16.5111 0L16.1648 2.47045C19.5875 2.94989 22.6905 4.50142 25.141 6.94523C27.4649 9.26919 28.9898 12.2058 29.5425 15.4353L31.9997 15.0158C31.3537 11.2735 29.5891 7.87748 26.8989 5.18062Z" fill="white"/>
										  </svg>
										</span>
										(212) 574-4682
									</p>
									<p class="col-lg-4 col-6 c-contact__contact-item">
										<span>
										  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M16 0C9.60964 0 4.41077 5.19887 4.41077 11.5891C4.41077 19.5196 14.782 31.1621 15.2235 31.6538C15.6383 32.1157 16.3624 32.1149 16.7764 31.6538C17.218 31.1621 27.5891 19.5196 27.5891 11.5891C27.589 5.19887 22.3902 0 16 0ZM16 17.4199C12.7848 17.4199 10.1692 14.8042 10.1692 11.5891C10.1692 8.374 12.7849 5.75837 16 5.75837C19.215 5.75837 21.8306 8.37406 21.8306 11.5892C21.8306 14.8043 19.215 17.4199 16 17.4199Z" fill="white"/>
										  </svg>
										</span>
										219 W 43rd St, NY 10036
									</p>
									<p class="col-lg-4 col-6 c-contact__contact-item">
										<span>
										  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_32_185)">
											<path d="M27.4794 4.03427C24.5614 1.34476 20.9319 0 16.5973 0C12.0408 0 8.1567 1.52754 4.95148 4.58915C1.74626 7.65075 0.140381 11.4565 0.140381 16.0131C0.140381 20.3803 1.66792 24.1338 4.71647 27.2803C7.77808 30.4268 11.8907 32 17.0674 32C20.1877 32 23.2493 31.3603 26.2522 30.0743C27.2314 29.6565 27.7079 28.5337 27.3097 27.5479C26.8984 26.5296 25.7365 26.0596 24.7246 26.4904C22.1135 27.6132 19.5545 28.1746 17.0608 28.1746C13.0918 28.1746 10.0172 26.967 7.83683 24.5451C5.66303 22.1297 4.57286 19.2901 4.57286 16.0326C4.57286 12.4945 5.74136 9.54386 8.07184 7.17421C10.3958 4.8111 13.2616 3.62301 16.6561 3.62301C19.783 3.62301 22.4268 4.59567 24.581 6.541C26.7352 8.48633 27.8124 10.9343 27.8124 13.8849C27.8124 15.9021 27.3162 17.5863 26.3305 18.9245C25.3448 20.2693 24.3199 20.9351 23.2559 20.9351C22.6814 20.9351 22.3942 20.6283 22.3942 20.0082C22.3942 19.5055 22.4333 18.918 22.5051 18.2391L23.7193 8.31008H19.5414L19.2738 9.28274C18.2097 8.41452 17.0412 7.97715 15.7748 7.97715C13.7642 7.97715 12.0408 8.78009 10.6112 10.3794C9.17506 11.9788 8.46352 14.0416 8.46352 16.5614C8.46352 19.0224 9.09673 21.0135 10.3697 22.5214C11.6426 24.0359 13.1702 24.7866 14.9588 24.7866C16.5582 24.7866 17.9225 24.1142 19.0584 22.776C19.9135 24.062 21.1734 24.7018 22.8381 24.7018C25.286 24.7018 27.4011 23.6377 29.1832 21.5031C30.9654 19.3749 31.8597 16.8029 31.8597 13.7936C31.8597 9.98123 30.404 6.72379 27.4794 4.03427ZM17.8572 19.0551C17.1196 20.0473 16.2383 20.55 15.2134 20.55C14.5149 20.55 13.9535 20.1844 13.5292 19.4533C13.0984 18.7222 12.8829 17.8148 12.8829 16.7246C12.8829 15.3798 13.1832 14.2962 13.7838 13.4737C14.3844 12.6512 15.1286 12.2334 16.0164 12.2334C16.7867 12.2334 17.4721 12.5402 18.0727 13.1603C18.6732 13.7805 18.9735 14.603 18.9735 15.6344C18.967 16.9204 18.5949 18.0563 17.8572 19.0551Z" fill="white"/>
											</g>
										  </svg>
										</span>
										info@mercaditofood.com
									</p>
								</div>
							</div>
							<div class="row c-contact__map">
								<div class="col-12 p-0">
									<picture>
										<source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/map.webp" type="image/webp" media="(min-width: 360px)">
										<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/map.jpg" alt="Static map that is showing a location" title="Map" loading="lazy" />
									</picture>
								</div>
							</div>
							<div class="row c-contact__hours">
								<div class="col-12 p-0">
									<p>Open Hours</p>
									<p>Every Day 8am-12am</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</main>

<?php
get_sidebar();
get_footer();
