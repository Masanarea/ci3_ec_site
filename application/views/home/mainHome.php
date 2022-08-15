<header>
			<!-- mobile-header -->
			<div class="mobile-header">
				<div class="container-fluid">
					<div class="pull-left">
						<!-- language -->
						<div class="mobile-parent-language"></div>
						<!-- /language -->
						<!-- currency -->
						<div class="mobile-parent-currency"></div>
						<!-- /currency -->
						<div class="mini-menu-dropdown dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown">
							<span class="icon icon-more_horiz"></span>
							</a>
							<div class="dropdown-menu">
								<div class="mini-menu">
									<ul>
										<li class="active"><a href="index.html">Home</a></li>
										<li><a href="faqs.html">Delivery</a></li>
										<li><a href="blog_listing.html">Blog</a></li>
										<li><a href="contact.html">Contacts</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="pull-right">
					<?php if(!userLoggedIn()): ?>
						<!-- account -->
						<div class="account dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown"><span class="icon icon-person "></span></a>
							<div class="dropdown-label hidden-sm hidden-xs">My Account</div>
							<ul class="dropdown-menu">
								<li><a href="login-form.html"><span class="icon icon-person"></span>My Account</a></li>
								<li><a href="wishlist.html"><span class="icon icon-favorite_border"></span>My Wishlist</a></li>
								<li><a href="compare.html"><span class="fa fa-balance-scale"></span>Compare</a></li>
								<li><a href="checkout.html"><span class="icon icon-check"></span>Checkout</a></li>
								<li><a href="<?php echo base_url("login/index") ?>" data-toggle="modal" data-target="#modalLoginForm"><span class="icon icon-lock_outline"></span>Log In</a></li>
								<li><a href="<?php echo base_url("signup/index") ?>"><span class="icon icon-person_add"></span>Create an account</a></li>
							</ul>
						</div>
						<!-- /account -->
                            <?php else: ?>
								Login Here
                            <?php endif; ?>
						
						<!-- cart -->
						<div class="mobile-parent-cart"></div>
						<!-- /cart -->
					</div>
				</div>
				<div class="container-fluid text-center">
					<!-- logo -->
					<div class="logo">
						<a href="index.html"><img src="<?php echo base_url("assets/assets/theme/images/logo-mobile.png")?>" alt=""/></a>
					</div>
					<!-- /logo -->
				</div>
				<div class="container-fluid top-line">
					<div class="pull-left">
						<div class="mobile-parent-menu">
							<div class="mobile-menu-toggle">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="menu-text">
								MENU
								</span>
							</div>
						</div>
					</div>
					<div class="pull-right">
						<!-- search -->
						<div class="search">
							<a href="#" class="search-open"><span class="icon icon-search"></span></a>
							<div class="search-dropdown">
								<form action="#" method="get">
									<div class="input-outer">
										<input type="search" name="search" value="" maxlength="128" placeholder="Enter keyword">
										<button type="submit" class="btn-search"><span>Search</span></button>
									</div>
									<a href="#" class="search-close"><span class="icon icon-close"></span></a>
								</form>
							</div>
						</div>
						<!-- /search -->
					</div>
				</div>
			</div>
			<!-- /mobile-header -->
			<!-- desktop-header -->
			<div class="desktop-header  header-06">
				<div class="container">
					<div class="pull-left">
						<!-- mini-menu -->
						<div class="mini-menu">
							<ul>
								<li class="active"><a href="index.html">Home</a></li>
								<li><a href="faqs.html">Delivery</a></li>
								<li><a href="blog_listing.html">Blog</a></li>
								<li><a href="contact.html">Contacts</a></li>
							</ul>
						</div>
						<!-- /mini-menu -->
					</div>
					<div class="pull-right text-right">
						<!-- box-info -->
						<div class="box-info">
							<div class="telephone">
								<span class="icon icon-call"></span>+300-9876-2345
							</div>
							<div class="time">
								7 Days a week from 9:00 am to 7:00 pm
							</div>
						</div>
						<!-- /box-info -->
						<!-- language -->
						<div class="main-parent-language">
							<div class="language dropdown select-change">
								<a class="dropdown-toggle" data-toggle="dropdown">
								<span class="dropdown-label hidden-sm hidden-xs">Language:</span>
								<span class="title-value"></span>
								<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li class="active" data-top-value="En"><a href="#">En</a></li>
									<li data-top-value="Ge"><a href="#">Ge</a></li>
									<li data-top-value="Es"><a href="#">Es</a></li>
									<li data-top-value="Ru"><a href="#">Rus</a></li>
								</ul>
							</div>
						</div>
						<!-- /language -->
						<!-- currency -->
						<div class="main-parent-currency">
							<div class="currency dropdown select-change">
								<a class="dropdown-toggle" data-toggle="dropdown">
								<span class="dropdown-label hidden-sm hidden-xs">Currency:</span>
								<span class="title-value"></span>
								<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li class="active" data-top-value="GBP"><a href="#">GBP - British Pound Sterling</a></li>
									<li data-top-value="EUR"><a href="#">EUR - Euro</a></li>
									<li data-top-value="USD"><a href="#">USD - US Dollar</a></li>
								</ul>
							</div>
						</div>
						<!-- /currency -->
					</div>
				</div>
				<div class="top-line">
					<div class="container">
						<div class="pull-left">
							<!-- logo -->
							<div class="logo">
								<a href="index.html"><img src="<?php echo base_url("assets/assets/theme/images/logo.png")?>" alt=""/></a>
							</div>
							<!-- /logo -->
						</div>
						
						<div class="pull-right">
						<?php if(userLoggedIn()): ?>
						<!-- account -->
							<div class="account dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown">
								<span class="icon icon-person "></span>
								<span class="dropdown-label hidden-sm hidden-xs">My Account</span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="login-form.html"><span class="icon icon-person"></span>My Account</a></li>
									<li><a href="wishlist.html"><span class="icon icon-favorite_border"></span>My Wishlist</a></li>
									<li><a href="compare.html"><span class="fa fa-balance-scale"></span>Compare</a></li>
									<li><a href="checkout.html"><span class="icon icon-check"></span>Checkout</a></li>
									<li><a href="<?php echo base_url("login/index") ?>" data-toggle="modal" data-target="#modalLoginForm"><span class="icon icon-lock_outline"></span>Log In</a></li>
									<li><a href="<?php echo base_url("signup/index") ?>"><span class="icon icon-person_add"></span>Create an account</a></li>
								</ul>
							</div>
							<!-- /account -->
						<?php else: ?>
							<h3>Loginして</h3>
							<p>Loginして</p>
						<?php endif; ?>
							<!-- cart -->
							<div class="main-parent-cart">
								<div class="cart">
									<div class="dropdown">
										<a class="dropdown-toggle">
											<span class="icon icon-shopping_basket"></span>
											<span class="badge badge-cart">2</span>
											<div class="dropdown-label hidden-sm hidden-xs">YOUR BAG</div>
										</a>
										<div class="dropdown-menu slide-from-top">
											<div class="container">
												<div class="top-title">RECENTLY ADDED ITEM(S)</div>
												<a href="#" class="icon icon-close cart-close"></a>
												<ul>
													<li class="item">
														<div class="img">
															<a href="#"><img src="<?php echo base_url("assets/assets/theme/images/product/product-01.jpg")?>" alt=""/></a>
														</div>
														<div class="info">
															<div class="title-col">
																<h2 class="title">
																	<a href="#">Daisy Street 3/4 Sleeve Panelled Casual Shirt</a>
																</h2>
																<div class="details">
																	Black, XL
																</div>
															</div>
															<div class="price">
																$45
															</div>
															<div class="qty">
																<div class="qty-label">Qty:</div>
																<div class="style-2 input-counter">
																	<span class="minus-btn"></span>
																	<input type="text" value="1" size="5"/>
																	<span class="plus-btn"></span>
																</div>
															</div>
														</div>
														<div class="item-control">
															<div class="delete"><a href="#" class="icon icon-delete" title="Delete"></a></div>
															<div class="edit"><a href="#" class="icon icon-edit" title="Edit"></a></div>
														</div>
													</li>
													<li class="item">
														<div class="img">
															<a href="#"><img src="<?php echo base_url("assets/assets/theme/images/product/product-01.jpg")?>" alt=""/></a>
														</div>
														<div class="info">
															<div class="title-col">
																<h2 class="title">
																	<a href="#">Daisy Street 3/4 Sleeve Panelled Casual Shirt</a>
																</h2>
																<div class="details">
																	Black, XL
																</div>
															</div>
															<div class="price">
																$45
															</div>
															<div class="qty">
																<div class="qty-label">Qty:</div>
																<div class="style-2 input-counter">
																	<span class="minus-btn"></span>
																	<input type="text" value="1" size="5"/>
																	<span class="plus-btn"></span>
																</div>
															</div>
														</div>
														<div class="item-control">
															<div class="delete"><a href="#" class="icon icon-delete" title="Delete"></a></div>
															<div class="edit"><a href="#" class="icon icon-edit" title="Edit"></a></div>
														</div>
													</li>
												</ul>
												<h4 class="empty-cart-js hide">Your Cart is Empty</h4>
												<div class="cart-bottom">
													<div class="pull-right">
														<div class="pull-left">
															<div class="cart-total">TOTAL:  <span> $135.00</span></div>
														</div>
														<a href="checkout.html" class="btn icon-btn-left"><span class="icon icon-check_circle"></span>CHECKOUT</a>
													</div>
													<div class="pull-left">
														<a href="shopping_cart_01.html" class="btn icon-btn-left"><span class="icon icon-shopping_basket"></span>VIEW CART</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /cart -->
						</div>
					</div>
				</div>
				<div class="top-line">
					<div class="container">
						<div class="pull-left">
							<div class="menu-parent-box">
								<!-- header-menu -->
								<nav class="header-menu">
									<ul>
										<li class="dropdown">
											<a href="index.html">LAYOUT</a>
											<div class="dropdown-menu">
												<h2 class="title-submenu">LAYOUT</h2>
												<ul class="image-links-layout border">
													<li>
														<a href="index.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/layout-img-01.jpg")?>" alt=""></span>
														<span class="figcaption">Home page 1</span>
														</a>
													</li>
													<li>
														<a href="index-02.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/layout-img-02.jpg")?>" alt=""></span>
														<span class="figcaption">Home page 2</span>
														</a>
													</li>
													<li>
														<a href="index-03.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/layout-img-03.jpg")?>" alt=""></span>
														<span class="figcaption">Home page 3</span>
														</a>
													</li>
													<li>
														<a href="index-04.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/layout-img-04.jpg")?>"alt=""></span>
														<span class="figcaption">Home page 4</span>
														</a>
													</li>
													<li>
														<a href="index-05.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/layout-img-05.jpg")?>"alt=""></span>
														<span class="figcaption">Home page 5</span>
														</a>
													</li>
													<li>
														<a href="index-06.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/layout-img-06.jpg")?>"alt=""></span>
														<span class="figcaption">Home page 6</span>
														</a>
													</li>
													<li>
														<a href="index-07.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/layout-img-07.jpg")?>"alt=""></span>
														<span class="figcaption">Home page 7</span>
														</a>
													</li>
													<li>
														<a href="index-08.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/layout-img-08.jpg")?>"alt=""></span>
														<span class="figcaption">Home page 8</span>
														</a>
													</li>
													<li>
														<a href="index-09.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/layout-img-09.jpg")?>"alt=""></span>
														<span class="figcaption">Home page 9</span>
														</a>
													</li>
													<li>
														<a href="index-10.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/layout-img-10.jpg")?>"alt=""></span>
														<span class="figcaption">Home page 10</span>
														</a>
													</li>
													<li>
														<a href="index-11.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/layout-img-11.jpg")?>"alt=""></span>
														<span class="figcaption">Home page 11</span>
														</a>
													</li>
													<li>
														<a href="index-12.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/layout-img-12.jpg")?>"alt=""></span>
														<span class="figcaption">Home page 12</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="dropdown"><a href="index-rtl.html">RTL</a></li>
										<li class="dropdown">
											<a href="listing-left-column.html">LISTING</a>
											<div class="dropdown-menu">
												<h2 class="title-submenu">LISTING</h2>
												<ul class="image-links-layout">
													<li>
														<a href="listing-left-column.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/listing-img-01.png")?>" alt=""></span>
														<span class="figcaption">Left Column</span>
														</a>
													</li>
													<li>
														<a href="listing-left-right-column.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/listing-img-02.png")?>" alt=""></span>
														<span class="figcaption">Left and Right Column</span>
														</a>
													</li>
													<li>
														<a href="listing-right-column.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/listing-img-03.png")?>" alt=""></span>
														<span class="figcaption">Right Column</span>
														</a>
													</li>
													<li>
														<a href="listing-left-column-without-block.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/listing-img-04.png")?>" alt=""></span>
														<span class="figcaption">Left Column Without<br>Statick Block</span>
														</a>
													</li>
													<li>
														<a href="listing-without-columns.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/listing-img-05.png")?>" alt=""></span>
														<span class="figcaption">Without Columns</span>
														</a>
													</li>
													<li>
														<a href="listing-without-columns-items6.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/listing-img-06.png")?>" alt=""></span>
														<span class="figcaption">Without Column and 6 items in line</span>
														</a>
													</li>
													<li>
														<a href="listing-without-columns-items4.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/listing-img-07.png")?>" alt=""></span>
														<span class="figcaption">Without Column and 4 items in line</span>
														</a>
													</li>
													<li>
														<a href="listing-without-columns-items3.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/listing-img-08.png")?>" alt=""></span>
														<span class="figcaption">Without Column and 3 items in line</span>
														</a>
													</li>
													<li>
														<a href="listing-without-columns-items2.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/listing-img-09.png")?>" alt=""></span>
														<span class="figcaption">Without Column and 2 items in line</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="dropdown">
											<a href="product.html">PRODUCT</a>
											<div class="dropdown-menu">
												<h2 class="title-submenu">PRODUCT</h2>
												<ul class="image-links-layout">
													<li>
														<a href="product.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/product-img-01.png")?>" alt=""></span>
														<span class="figcaption">Image Size - Small</span>
														</a>
													</li>
													<li>
														<a href="product-02.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/product-img-02.png")?>" alt=""></span>
														<span class="figcaption">Image Size - Medium</span>
														</a>
													</li>
													<li>
														<a href="product-03.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/product-img-03.png")?>" alt=""></span>
														<span class="figcaption">Image Size - Big</span>
														</a>
													</li>
													<li>
														<a href="product-04.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/product-img-04.png")?>" alt=""></span>
														<span class="figcaption">Image Size - Medium</span>
														</a>
													</li>
													<li>
														<a href="product-05.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/product-img-05.png")?>" alt=""></span>
														<span class="figcaption">Image Size - Long</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="dropdown">
											<a href="blog_listing.html">BLOG</a>
											<div class="dropdown-menu">
												<h2 class="title-submenu">BLOG</h2>
												<ul class="image-links-layout">
													<li>
														<a href="blog_listing.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/blog-img-01.png")?>" alt=""></span>
														<span class="figcaption">Listing</span>
														</a>
													</li>
													<li>
														<a href="blog_grid_col_2.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/blog-img-02.png")?>" alt=""></span>
														<span class="figcaption">Grid Layout 2 cols</span>
														</a>
													</li>
													<li>
														<a href="blog_grid_col_3.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/blog-img-03.png")?>" alt=""></span>
														<span class="figcaption">Grid Layout 3 cols</span>
														</a>
													</li>
													<li>
														<a href="blog_masonry_col_2.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/blog-img-04.png")?>" alt=""></span>
														<span class="figcaption">Masonry Layout 2 cols</span>
														</a>
													</li>
													<li>
														<a href="blog_masonry_col_3.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/blog-img-05.png")?>" alt=""></span>
														<span class="figcaption">Masonry Layout 3 cols</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="dropdown">
											<a href="gallery_masonry_col_3.html">GALLERY</a>
											<div class="dropdown-menu">
												<h2 class="title-submenu">GALLERY</h2>
												<ul class="image-links-layout">
													<li>
														<a href="gallery_grid_col_2.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/gallery-img-01.png")?>" alt=""></span>
														<span class="figcaption">Grid Layout 2 cols</span>
														</a>
													</li>
													<li>
														<a href="gallery_grid_col_3.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/gallery-img-02.png")?>" alt=""></span>
														<span class="figcaption">Grid Layout 3 cols</span>
														</a>
													</li>
													<li>
														<a href="gallery_masonry_col_2.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/gallery-img-03.png")?>" alt=""></span>
														<span class="figcaption">Masonry Layout 2 cols</span>
														</a>
													</li>
													<li>
														<a href="gallery_masonry_col_3.html">
														<span class="figure"><img src="<?php echo base_url("assets/assets/theme/images/custom/gallery-img-04.png")?>" alt=""></span>
														<span class="figcaption">Masonry Layout 3 cols</span>
														</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="dropdown megamenu">
											<a href="about.html">PAGES</a>
											<div class="dropdown-menu">
												<div class="row custom-layout-02 menu-list-col">
													<div class="col-sm-5">
														<a class="title-underline" href="listing-left-column.html">
														<span>STORE INFO PAGES</span>
														</a>
														<div class="row">
															<div class="col-sm-6">
																<ul class="megamenu-submenu">
																	<li><a href="about.html">About</a></li>
																	<li><a href="about_01.html">About 2</a></li>
																	<li><a href="contact.html">Contacts</a></li>
																	<li><a href="contact_01.html">Contacts 2</a></li>
																	<li><a href="faqs.html">FAQs</a></li>
																	<li><a href="look-book.html">Lookbook</a></li>
																</ul>
															</div>
															<div class="col-sm-5">
																<ul class="megamenu-submenu">
																	<li><a href="collections.html">Collections</a></li>
																	<li><a href="faqs.html">Delivery Page</a></li>
																	<li><a href="faqs.html">Payment page</a></li>
																	<li><a href="faqs.html">Support page</a></li>
																</ul>
															</div>
														</div>
													</div>
													<div class="col-sm-5">
														<a class="title-underline" href="listing-left-column.html">
														<span>SHOPPING PAGES</span>
														</a>
														<div class="row">
															<div class="col-sm-6">
																<ul class="megamenu-submenu">
																	<li><a href="login-form.html">Login form</a></li>
																	<li><a href="shopping_cart_01.html">Shopping cart 01</a></li>
																	<li><a href="shopping_cart_02.html">Shopping cart 02</a></li>
																	<li><a href="checkout.html">Checkout</a></li>
																	<li><a href="wishlist.html">Wishlist</a></li>
																	<li><a href="compare.html">Compare</a></li>
																</ul>
															</div>
															<div class="col-sm-5">
																<ul class="megamenu-submenu">
																	<li><a href="account.html">Page Account</a></li>
																	<li><a href="account-address.html">Page Account address</a></li>
																	<li><a href="account-order.html">Page Account order</a></li>
																</ul>
															</div>
														</div>
													</div>
													<div class="col-sm-2">
														<a class="title-underline" href="listing-left-column.html">
														<span>OTHER PAGES</span>
														</a>
														<ul class="megamenu-submenu">
															<li><a href="typography.html">Typography</a></li>
															<li><a href="infographic.html">Infographic</a></li>
															<li><a href="comming-soon.html">Under Construction</a></li>
															<li><a href="page-404.html">Page 404</a></li>
															<li><a href="page-empty-category.html">Page Empty Category</a></li>
															<li><a href="page-empty-search.html">Page Empty Search</a></li>
															<li><a href="page-empty-shopping-cart.html">Page Empty shopping Cart</a></li>
														</ul>
													</div>
												</div>
											</div>
										</li>
										<li class="dropdown megamenu">
											<a href="listing-left-column.html">WOMEN'S</a>
											<div class="dropdown-menu">
												<div class="row custom-layout-02">
													<div class="col-sm-7">
														<div class="row menu-list-col">
															<div class="col-sm-4">
																<a href="listing-left-column.html" class="title-underline">
																<span>TOPS</span>
																</a>
																<ul class="megamenu-submenu">
																	<li><a href="listing-left-column.html">Blouses & Shirts</a></li>
																	<li><a href="listing-left-column.html">Dresses <span class="badge badge-menu bg-red">Sale</span></a></li>
																	<li>
																		<a href="listing-left-column.html">Tops & T-shirts</a>
																		<ul>
																			<li><a href="listing-left-column.html">link level 1</a></li>
																			<li>
																				<a href="listing-left-column.html">link level 1</a>
																				<ul>
																					<li><a href="listing-left-column.html">link level 2</a></li>
																					<li>
																						<a href="listing-left-column.html">link level 2</a>
																						<ul>
																							<li><a href="listing-left-column.html">link level 3</a></li>
																							<li><a href="listing-left-column.html">link level 3</a></li>
																							<li><a href="listing-left-column.html">link level 3</a></li>
																							<li>
																								<a href="listing-left-column.html">link level 3</a>
																								<ul>
																									<li>
																										<a href="listing-left-column.html">link level 4</a>
																										<ul>
																											<li><a href="listing-left-column.html">link level 5</a></li>
																											<li><a href="listing-left-column.html">link level 5</a></li>
																											<li><a href="listing-left-column.html">link level 5</a></li>
																											<li><a href="listing-left-column.html">link level 5</a></li>
																											<li><a href="listing-left-column.html">link level 5</a></li>
																										</ul>
																									</li>
																									<li><a href="listing-left-column.html">link level 4</a></li>
																									<li><a href="listing-left-column.html">link level 4</a></li>
																									<li><a href="listing-left-column.html">link level 4</a></li>
																									<li><a href="listing-left-column.html">link level 4</a></li>
																								</ul>
																							</li>
																							<li><a href="listing-left-column.html">link level 3</a></li>
																						</ul>
																					</li>
																					<li><a href="listing-left-column.html">link level 2</a></li>
																					<li><a href="listing-left-column.html">link level 2</a></li>
																					<li><a href="listing-left-column.html">link level 2</a></li>
																				</ul>
																			</li>
																			<li><a href="listing-left-column.html">link level 1</a></li>
																			<li><a href="listing-left-column.html">link level 1</a></li>
																			<li><a href="listing-left-column.html">link level 1</a></li>
																		</ul>
																	</li>
																	<li><a href="listing-left-column.html">Sleeveless Tops</a></li>
																	<li><a href="listing-left-column.html">Sweaters</a></li>
																	<li><a href="listing-left-column.html">Jackets</a></li>
																	<li><a href="listing-left-column.html">Outerwear</a></li>
																</ul>
															</div>
															<div class="col-sm-4">
																<a class="title-underline" href="listing-left-column.html">
																<span>BOTTOMS</span>
																</a>
																<ul class="megamenu-submenu">
																	<li><a href="listing-left-column.html">Trousers</a></li>
																	<li>
																		<a href="listing-left-column.html">Jeans</a>
																	</li>
																	<li><a href="listing-left-column.html">Leggings</a></li>
																	<li><a href="listing-left-column.html">Jumpsuit & shorts <span class="badge badge-menu bg-grey-dark">New</span></a></li>
																	<li><a href="listing-left-column.html">Skirts</a></li>
																	<li><a href="listing-left-column.html">Tights</a></li>
																</ul>
															</div>
															<div class="col-sm-4">
																<a class="title-underline" href="listing-left-column.html">
																<span>ACCESSORIES</span>
																</a>
																<ul class="megamenu-submenu">
																	<li><a href="listing-left-column.html">Jewellery <span class="badge badge-menu bg-light-brown">Hot</span></a></li>
																	<li><a href="listing-left-column.html">Hats</a></li>
																	<li><a href="listing-left-column.html">Scarves & snoods</a></li>
																	<li><a href="listing-left-column.html">Belts</a></li>
																	<li><a href="listing-left-column.html">Bags</a></li>
																	<li><a href="listing-left-column.html">Shoes</a></li>
																	<li><a href="listing-left-column.html">Sunglasses</a></li>
																</ul>
															</div>
														</div>
													</div>
													<div class="col-sm-5">
														<a href="listing-left-column.html" class="menu-title">SPECIALS</a>
														<div class="row">
															<div class="carousel-menu-1 header-menu-product carouselTab slick-arrow-top">
																<div>
																	<div class="product">
																		<div class="product_inside">
																			<a href="product.html">
																				<div class="image-box">
																					<img src="<?php echo base_url("assets/assets/theme/images/product/product-01.jpg")?>"alt="">
																					<div class="label-sale left">Sale</div>
																				</div>
																				<h2 class="title">
																					Daisy Street 3/4 Sleev
																				</h2>
																				<div class="price">
																					<span class="new-price">$45</span>
																					<span class="old-price">$48</span>
																				</div>
																				<div class="description">
																					Silver, metallic-blue and metallic-lavender silk-blend jacquard, graphic pattern, pleated ruffle along collar, long sleeves with button-fastening cuffs, buckle-fastening silver skinny belt, large pleated rosettes at hips. Dry clean. Zip and hook fastening at back. 100% silk. Specialist clean
																				</div>
																			</a>
																		</div>
																	</div>
																</div>
																<div>
																	<div class="product">
																		<div class="product_inside">
																			<a href="product.html">
																				<div class="image-box">
																					<img src="<?php echo base_url("assets/assets/theme/images/product/product-02.jpg")?>"alt="">
																					<div class="label-sale left">Sale</div>
																				</div>
																				<h2 class="title">
																					Daisy Street 3/4 Sleev
																				</h2>
																				<div class="price">
																					<span class="new-price">$45</span>
																					<span class="old-price">$48</span>
																				</div>
																				<div class="description">
																					Silver, metallic-blue and metallic-lavender silk-blend jacquard, graphic pattern, pleated ruffle along collar, long sleeves with button-fastening cuffs, buckle-fastening silver skinny belt, large pleated rosettes at hips. Dry clean. Zip and hook fastening at back. 100% silk. Specialist clean
																				</div>
																			</a>
																		</div>
																	</div>
																</div>
																<div>
																	<div class="product">
																		<div class="product_inside">
																			<a href="product.html">
																				<div class="image-box">
																					<img src="<?php echo base_url("assets/assets/theme/images/product/product-03.jpg")?>"alt="">
																					<div class="label-sale left">Sale</div>
																				</div>
																				<h2 class="title">
																					Daisy Street 3/4 Sleev
																				</h2>
																				<div class="price">
																					<span class="new-price">$45</span>
																					<span class="old-price">$48</span>
																				</div>
																				<div class="description">
																					Silver, metallic-blue and metallic-lavender silk-blend jacquard, graphic pattern, pleated ruffle along collar, long sleeves with button-fastening cuffs, buckle-fastening silver skinny belt, large pleated rosettes at hips. Dry clean. Zip and hook fastening at back. 100% silk. Specialist clean
																				</div>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row custom-layout-03">
													<div class="col-xs-6">
														<a href="listing-left-column.html" class="promo-box zoom-in design-12">
															<img src="<?php echo base_url("assets/assets/theme/images/custom/promo-img-44.jpg")?>"alt="">
															<div class="description point-left">
																<div class="block-table">
																	<div class="block-table-cell">
																		<div class="title color-defaulttext2">ATTENTION TO<br>THE DETAILS</div>
																		<span class="btn btn-underline color-base">SHOP NOW!</span>
																	</div>
																</div>
															</div>
														</a>
													</div>
													<div class="col-xs-6">
														<a href="listing-left-column.html" class="promo-box zoom-in design-12">
															<img src="<?php echo base_url("assets/assets/theme/images/custom/promo-img-45.jpg")?>"alt="">
															<div class="description">
																<div class="block-table">
																	<div class="block-table-cell">
																		<div class="title">BUILT<br>WITH LOVE</div>
																		<span class="btn btn-underline color-white">SHOP NOW!</span>
																	</div>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>
										</li>
										<li class="dropdown megamenu">
											<a href="listing-right-column.html">MEN'S</a>
											<div class="dropdown-menu">
												<div class="row custom-layout-02">
													<div class="col-sm-7">
														<div class="row menu-list-col">
															<div class="col-sm-4">
																<a href="listing-right-column.html" class="title-underline">
																<span>TOPS</span>
																<span class="megamenu_category-image hidden-xs"><img class="img-responsive" src="<?php echo base_url("assets/assets/theme/images/custom/megamenu-img-01.jpg")?>"alt=""/></span>
																</a>
																<ul class="megamenu-submenu">
																	<li><a href="listing-right-column.html">Shirts</a></li>
																	<li><a href="listing-right-column.html">Sweaters  <span class="badge badge-menu bg-red">Sale</span></a></li>
																	<li>
																		<a href="listing-right-column.html">Tops & T-shirts</a>
																		<ul>
																			<li><a href="listing-right-column.html">link level 1</a></li>
																			<li>
																				<a href="listing-right-column.html">link level 1</a>
																				<ul>
																					<li><a href="listing-right-column.html">link level 2</a></li>
																					<li>
																						<a href="listing-right-column.html">link level 2</a>
																						<ul>
																							<li><a href="listing-right-column.html">link level 3</a></li>
																							<li><a href="listing-right-column.html">link level 3</a></li>
																							<li><a href="listing-right-column.html">link level 3</a></li>
																							<li>
																								<a href="listing-right-column.html">link level 3</a>
																								<ul>
																									<li>
																										<a href="listing-right-column.html">link level 4</a>
																										<ul>
																											<li><a href="listing-right-column.html">link level 5</a></li>
																											<li><a href="listing-right-column.html">link level 5</a></li>
																											<li><a href="listing-right-column.html">link level 5</a></li>
																											<li><a href="listing-right-column.html">link level 5</a></li>
																											<li><a href="listing-right-column.html">link level 5</a></li>
																										</ul>
																									</li>
																									<li><a href="listing-right-column.html">link level 4</a></li>
																									<li><a href="listing-right-column.html">link level 4</a></li>
																									<li><a href="listing-right-column.html">link level 4</a></li>
																									<li><a href="listing-right-column.html">link level 4</a></li>
																								</ul>
																							</li>
																							<li><a href="listing-right-column.html">link level 3</a></li>
																						</ul>
																					</li>
																					<li><a href="listing-right-column.html">link level 2</a></li>
																					<li><a href="listing-right-column.html">link level 2</a></li>
																					<li><a href="listing-right-column.html">link level 2</a></li>
																				</ul>
																			</li>
																			<li><a href="listing-right-column.html">link level 1</a></li>
																			<li><a href="listing-right-column.html">link level 1</a></li>
																			<li><a href="listing-right-column.html">link level 1</a></li>
																		</ul>
																	</li>
																	<li><a href="listing-right-column.html">Sleeveless Tops</a></li>
																	<li><a href="listing-right-column.html">Jackets</a></li>
																	<li><a href="listing-right-column.html">Outerwear</a></li>
																</ul>
															</div>
															<div class="col-sm-4">
																<a class="title-underline" href="listing-right-column.html">
																<span>BOTTOMS</span>
																<span class="megamenu_category-image hidden-xs"><img class="img-responsive" src="<?php echo base_url("assets/assets/theme/images/custom/megamenu-img-02.jpg")?>"alt=""/></span>
																</a>
																<ul class="megamenu-submenu">
																	<li><a href="listing-right-column.html">Trousers</a></li>
																	<li><a href="listing-right-column.html">Jeans</a></li>
																	<li><a href="listing-right-column.html">Jumpsuit &amp; shorts <span class="badge badge-menu bg-grey-dark">New</span></a></li>
																	<li><a href="listing-right-column.html">Skirts</a></li>
																	<li><a href="listing-right-column.html">Tights</a></li>
																</ul>
															</div>
															<div class="col-sm-4">
																<a class="title-underline" href="listing-right-column.html">
																<span>ACCESSORIES</span>
																<span class="megamenu_category-image hidden-xs"><img class="img-responsive" src="<?php echo base_url("assets/assets/theme/images/custom/megamenu-img-03.jpg")?>"alt=""/></span>
																</a>
																<ul class="megamenu-submenu">
																	<li><a href="listing-right-column.html">Hats <span class="badge badge-menu bg-light-brown ">Hot</span></a></li>
																	<li><a href="listing-right-column.html">Scarves &amp;& snoods</a></li>
																	<li><a href="listing-right-column.html">Belts</a></li>
																	<li><a href="listing-right-column.html">Bags</a></li>
																	<li><a href="listing-right-column.html">Shoes</a></li>
																	<li><a href="listing-right-column.html">Sunglasses</a></li>
																</ul>
															</div>
														</div>
													</div>
													<div class="col-sm-5">
														<a href="listing-left-column.html" class="promo-box zoom-in design-13">
															<img src="<?php echo base_url("assets/assets/theme/images/custom/promo-img-49.jpg")?>"alt="">
															<div class="description">
																<div class="block-table">
																	<div class="block-table-cell">
																		<div class="title title-md">PIXEL PERFECT<br>DESIGN</div>
																		<span class="btn ">SHOP NOW!</span>
																	</div>
																</div>
															</div>
														</a>
													</div>
												</div>
											</div>
										</li>
										<li class="dropdown"><a href="#">BUY TEMPLATE</a></li>
									</ul>
								</nav>
								<!-- /header-menu -->
							</div>
						</div>
						<div class="pull-right">
							<!-- search -->
							<div class="search">
								<a href="#" class="search-open"><span class="icon icon-search"></span></a>
								<div class="search-dropdown">
									<form action="#" method="get">
										<div class="input-outer">
											<input type="search" name="search" value="" maxlength="128" placeholder="Enter keyword">
											<button type="submit" class="btn-search">SEARCH</button>
										</div>
										<a href="#" class="search-close"><span class="icon icon-close"></span></a>
									</form>
								</div>
							</div>
							<!-- /search -->
						</div>
					</div>
				</div>
			</div>
			<!-- /desktop-header -->
			<!-- stuck nav -->
			<div class="stuck-nav">
				<div class="container">
					<div class="pull-left">
						<div class="stuck-menu-parent-box"></div>
					</div>
					<div class="pull-right">
						<div class="stuck-cart-parent-box"></div>
					</div>
				</div>
			</div>
			<!-- /stuck nav -->
		</header>
			<div class="container">
				<h1 class="block-title">COLLECTIONS(ここを編集)</h1>
				<div class="row">
					<div class="carousel-products-mobile subcategory-listing">

						<?php if($categories->num_rows() > 0): ?>
							<!-- <php foreach($categories->result_array() as $category): ?> -->
							<?php foreach($categories->result() as $category): ?>
								<a href="<?php echo base_url("categories".$category->cDp)?>">
									<h1><?php echo $category->cName ?></h1>
									<img src="<?php echo base_url("assets/images/categories/".$category->cDp)?>" alt="">
								</a>
								
							<?php endforeach; ?>
						<?php else: ?>
							Nothing category!
						<?php endif; ?>
						<!-- <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
							<a href="listing-left-column.html" class="subcategory-item zoom-in">
							<span>
							<img src="" alt="">
							</span>
							<span class="title">Women’s</span>
							</a>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
							<a href="listing-left-column.html" class="subcategory-item zoom-in">
							<span>
							<img src="" alt="">
							</span>
							<span class="title">Men’s</span>
							</a>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
							<a href="listing-left-column.html" class="subcategory-item zoom-in">
							<span>
							<img src="" alt="">
							</span>
							<span class="title">Bags</span>
							</a>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
							<a href="listing-left-column.html" class="subcategory-item zoom-in">
							<span>
							<img src="" alt="">
							</span>
							<span class="title">Shoes</span>
							</a>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
							<a href="listing-left-column.html" class="subcategory-item zoom-in">
							<span>
							<img src="" alt="">
							</span>
							<span class="title">Hats</span>
							</a>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
							<a href="listing-left-column.html" class="subcategory-item zoom-in">
							<span>
							<img src="" alt="">
							</span>
							<span class="title">Sunglasses</span>
							</a>
						</div> -->
					</div>
				</div>
			</div>
		<div class="breadcrumb">
			<div class="container">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li>Shopping cart</li>
				</ul>
			</div>
		</div>
		<!-- Content -->
		<div id="pageContent">
			<div class="container  offset-18">
				<h1 class="block-title large">Shopping cart</h1>
				<!-- Shopping cart table -->
				<table class="shopping-cart-table">
					<tbody>
						<tr>
							<td>
								<div class="product-image">
									<a href="product.html">
									<img src="<?php echo base_url("assets/assets/theme/images/product/product-01.jpg")?>"alt="">
									</a>
								</div>
							</td>
							<td>
								<h5 class="product-title">
									<a href="product.html">Daisy Street 3/4 Sleeve Panelled Casual Shirt</a>
								</h5>
								<ul class="list-parameters">
									<li>
										Black, Xl
									</li>
									<li class="visible-xs visible-sm">
										<div class="product-price unit-price">$45</div>
									</li>
									<li class="visible-xs visible-sm">
										<div class="detach-quantity-mobile">

										</div>
									</li>
									<li class="visible-xs visible-sm">
										<div class="product-price subtotal">$45</div>
									</li>
								</ul>
							</td>
							<td>
								<div class="product-price unit-price">
									$45
								</div>
							</td>
							<td>
								<div class="detach-quantity-desctope">
									<div class="input">
										<label>Qty:</label>
										<div class="style-2 input-counter">
											<span class="minus-btn"></span>
											<input type="text" value="1" size="5"/>
											<span class="plus-btn"></span>
										</div>
									</div>
								</div>
							</td>
							<td>
								<div class="product-price subtotal">
									$45
								</div>
							</td>
							<td>
								<a class="product-delete icon icon-delete" href="#"></a>
							</td>
						</tr>
						<tr>
							<td>
								<div class="product-image">
									<a href="product.html">
									<img src="<?php echo base_url("assets/assets/theme/images/product/product-01.jpg")?>"alt="">
									</a>
								</div>
							</td>
							<td>
								<h5 class="product-title">
									<a href="product.html">Daisy Street 3/4 Sleeve Panelled Casual Shirt</a>
								</h5>
								<ul class="list-parameters">
									<li>
										Black, Xl
									</li>
									<li class="visible-xs visible-sm">
										<div class="product-price unit-price">$45</div>
									</li>
									<li class="visible-xs visible-sm">
										<div class="detach-quantity-mobile">

										</div>
									</li>
									<li class="visible-xs visible-sm">
										<div class="product-price subtotal">$45</div>
									</li>
								</ul>
							</td>
							<td>
								<div class="product-price unit-price">
									$45
								</div>
							</td>
							<td>
								<div class="detach-quantity-desctope">
									<div class="input">
										<label>Qty:</label>
										<div class="style-2 input-counter">
											<span class="minus-btn"></span>
											<input type="text" value="1" size="5"/>
											<span class="plus-btn"></span>
										</div>
									</div>
								</div>
							</td>
							<td>
								<div class="product-price subtotal">
									$45
								</div>
							</td>
							<td>
								<a class="product-delete icon icon-delete" href="#"></a>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- /Shopping cart table -->
				<div class="shopping-cart-btns">
					<div class="pull-right">
						<a class="btn-link" href="#"><span class="icon icon-cached color-base"></span>UPDATE CART</a>
						<div class="clearfix visible-xs visible-sm"></div>
						<a class="btn-link" href="#"><span class="icon icon-delete"></span>CLEAR SHOPPING CART</a>
					</div>
					<div class="pull-left">
						<a class="btn-link" href="#"><span class="icon icon-keyboard_arrow_left"></span>CONTINUE SHOPPING </a>
					</div>
				</div>
				<hr class="hr-large hr-offset-5">
				<div class="row">
					<div class="col-md-4">
						<div class="shopping-cart-box">
							<h4>ESTIMATE SHIPPING AND TAX</h4>
							<p>Enter your destination to get a shipping estimate.</p>
							<form>
								<div class="form-group">
									<label  for="selectCountry">Country<span class="color-base">*</span></label>
									<select  id="selectCountry" class="form-control">
										<option>Austria </option>
										<option>Belgium</option>
										<option>Cyprus </option>
										<option>Croatia </option>
										<option>Czech Republic </option>
										<option>Denmark </option>
										<option>Finland </option>
										<option>France </option>
										<option>Germany </option>
										<option>Greece </option>
										<option>Hungary </option>
										<option>Ireland </option>
										<option>France </option>
										<option>Italy </option>
										<option>Luxembourg </option>
										<option>Netherlands </option>
										<option>Poland </option>
										<option>Portugal </option>
										<option>Slovakia </option>
										<option>Slovenia </option>
										<option>Spain </option>
										<option>United Kingdom </option>
									</select>
								</div>
								<div class="form-group">
									<label for="inputZip">Zip/Postal Code</label>
									<input type="text" class="form-control" id="inputZip">
								</div>
								<button type="submit" class="btn btn-top btn-border  color-default">CALCULATE SHIPPING</button>
								<p class="indent">
									There is one shipping rate available for<br>  22222, Ukraine.
								</p>
								<p>
									<b class="color-defaulttext2">Standard Shipping at $10.00</b>
								</p>
							</form>
						</div>
					</div>
					<div class="col-md-4">
						<div class="shopping-cart-box">
							<h4>NOTE</h4>
							<p>
								Add special instructions for your order...
							</p>
							<form>
								<div class="form-group">
									<textarea class="form-control" rows="10"></textarea>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-4">
						<div class="shopping-cart-box">
							<table class="table-total">
								<tbody>
									<tr>
										<th class="text-left">SUBTOTAL:</th>
										<td class="text-right">$45</td>
									</tr>
									<tr>
										<th class="text-left">TAX:</th>
										<td class="text-right">$10</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th>GRAND TOTAL:</th>
										<td>$457</td>
									</tr>
								</tfoot>
							</table>
							<a href="#" class="btn btn-full icon-btn-left"><span class="icon icon-check_circle"></span> PROCEED TO CHECKOUT</a>
						</div>
					</div>
				</div>
			</div>
		</div>