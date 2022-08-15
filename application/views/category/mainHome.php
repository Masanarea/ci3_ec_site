<div class="breadcrumb">
			<div class="container">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="listing-left-column.html">Women’s</a></li>
					<li>Dresses</li>
				</ul>
			</div>
		</div>
		<!-- Content -->
		<div id="pageContent">
			<div class="productPrevNext hidden-xs hidden-sm">
				<a href="#" class="product-prev"><img src="images/product/product-01.jpg" alt="" /></a>
				<a href="#" class="product-next"><img src="images/product/product-01.jpg" alt="" /></a>
			</div>
			<div class="container offset-0">
				<div class="row">
					<div class="col-md-5 hidden-xs">
						<div class="product-main-image">
							<div class="product-main-image-item">
								<img class="zoom-product" src='images/product/product-big-1.jpg' data-zoom-image="images/product/product-big-1-zoom.jpg" alt="" />
							</div>
						</div>
						<div class="product-images-carousel">
							<ul id="smallGallery">
								<li><a class="zoomGalleryActive" href="#" data-image="images/product/product-big-1.jpg" data-zoom-image="images/product/product-big-1.jpg"><img src="images/product/product-small-1.jpg" alt="" /></a></li>
								<li><a href="#" data-image="images/product/product-big-2.jpg" data-zoom-image="images/product/product-big-2-zoom.jpg"><img src="images/product/product-small-2.jpg" alt="" /></a></li>
								<li><a href="#" data-image="images/product/product-big-3.jpg" data-zoom-image="images/product/product-big-3-zoom.jpg"><img src="images/product/product-small-3.jpg" alt="" /></a></li>
								<li>
									<div class="video-link-product" data-toggle="modal" data-type="youtube" data-target="#modalVideoProduct" data-value="http://www.youtube.com/embed/JuO-wy0YxIs">
										<img src="images/product/product-small-empty.png" alt="" />
										<div>
											<span class="icon icon-videocam"></span>
											<span class="title">Video<br>Review</span>
										</div>
									</div>
								</li>
								<li>
									<div class="video-link-product" data-toggle="modal" data-type="video" data-target="#modalVideoProduct" data-value="images/slides/video/video.mp4">
										<img src="images/product/product-small-empty.png" alt="" />
										<div>
											<span class="icon icon-videocam"></span>
											<span class="title">Video<br>Review</span>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-7">
						<div class="visible-xs">
							<div class="clearfix"></div>
							<ul class="mobileGallery-product">
								<li><img src="images/product/product-big-1.jpg" alt="" /></li>
								<li><img src="images/product/product-big-2.jpg" alt="" /></li>
								<li><img src="images/product/product-big-3.jpg" alt="" /></li>
								<li>
									<div class="video-carusel">
										<img src="images/product/product-small-empty.png" alt="" />
										<div>
											<iframe src="http://www.youtube.com/embed/JuO-wy0YxIs"></iframe>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div class="product-info">
							<div class="add-info">
								<div class="pull-left">
									<div class="sku">
										<span class="font-weight-medium color-defaulttext2">SKU:</span> mtk012c
									</div>
								</div>
								<div class="pull-left">
									<div class="availability">
										<span class="font-weight-medium color-defaulttext2">Availability:</span> <span class="color-base">In Stock</span> <span class="color-red">Out stock</span>
									</div>
								</div>
							</div>
							<div class="productvendor">ADIDAS</div>
							<h1 class="title vendor-top">
								<!-- Daisy Street 3/4 Sleeve Panelled Casual Shirt -->
								<?php echo $speItem[0]["cName"] ?>
								<?php
									// $mySpecs = getSpecs($Item[0][4] );
									// $mySpecs = getSpecs($modelId);
									$mySpecs = getSpecs(2);
									// d($mySpecs->result()[0]->spName);
									// d($mySpecs->result_array() );
									foreach($mySpecs->result_array() as $row){
										echo "<pre>";
										echo $row["spName"];
									}
								?>
							</h1>
							<div class="price">
								<span class="new-price">$45</span><span class="old-price">$48</span>
							</div>
							<div class="add-info">
								<ul class="productvendorsmallinfo">
									<li><span>Vendor:</span> Adidas</li>
									<li><span>Product Type:</span> T-Shirt</li>
								</ul>
							</div>
							<div class="review">
								<div class="rating">
									<span class="icon-star"></span>
									<span class="icon-star"></span>
									<span class="icon-star"></span>
									<span class="icon-star"></span>
									<span class="icon-star empty-star"></span>
								</div>
								<a href="#">1 Review(s)</a>
								<a href="#">Add Your Review</a>
							</div>
							<div class="description">
								<div class="brand">
									<img src="images/custom/product-brand.png" alt="">
								</div>
								<div class="text">
									Silver, metallic-blue and metallic-lavender silk-blend jacquard, graphic pattern, pleated ruffle along collar, long sleeves with button-fastening cuffs, buckle-fastening silver skinny belt, large pleated rosettes at hips. Dry clean. Zip and hook fastening at back. 100% silk. Specialist clean
								</div>
							</div>
							<div class="promo">
								<div class="pull-left">
									<div class="block-table">
										<div class="block-table-cell">
											35% Off.
										</div>
									</div>
								</div>
								<div class="pull-left">
									<div class="block-table">
										<div class="block-table-cell">
											<p>Hurry, there are only</p>
											<p>33 item(s) left! </p>
										</div>
									</div>
								</div>
								<div class="pull-right">
									<div class="countdown_box">
										<div class="countdown_inner">
											<div class="countdown" data-date="2017-12-08"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="wrapper">
								<div class="title-options">
									<span class="pull-right required">
									* Required Fields
									</span>
									COLOR<span class="color-required">*</span>
								</div>
								<ul class="options-swatch-color">
									<li><a href="#"><span class="swatch-img">
													<img src="images/custom/filter_color1.jpg" alt="">
												</span><span class="swatch-label color-black"></span></a></li>
									<li class="active"><a href="#"><span class="swatch-label color-grey"></span></a></li>
									<li><a href="#"><span class="swatch-label color-light-grey"></span></a></li>
									<li><a href="#"><span class="swatch-label color-dark-turquoise "></span></a></li>
									<li><a href="#"><span class="swatch-label color-orange"></span></a></li>
									<li><a href="#"><span class="swatch-label color-pale-violet-red"></span></a></li>
									<li><a href="#"><span class="swatch-label color-white border-bg"></span></a></li>
								</ul>
								<span class="options-swatch-color-description">Red + $10.00</span> <span class="color-required">*</span>
							</div>
							<div class="wrapper">
								<div class="title-options">TEXTURE<span class="color-required">*</span></div>
								<ul class="options-swatch-texture">
									<li><a href="#"><img src="images/custom/texture-img-01.jpg" alt=""></a></li>
									<li><a href="#"><img src="images/custom/texture-img-02.jpg" alt=""></a></li>
									<li><a href="#"><img src="images/custom/texture-img-03.jpg" alt=""></a></li>
								</ul>
							</div>
							<div class="wrapper">
								<div class="title-options">SIZE<span class="color-required">*</span></div>
								<ul class="tags-list">
									<li><a href="#">XS</a></li>
									<li class="active"><a href="#">S</a></li>
									<li><a href="#">M</a></li>
									<li><a href="#">L</a></li>
								</ul>
							</div>
							<div class="wrapper">
								<div class="title-options">IMAGE<span class="color-required">*</span></div>
								<select class="form-control select-inline">
									<option>Please select</option>
									<option>text</option>
									<option>text</option>
								</select>
							</div>
							<div class="wrapper">
								<table class="table table-product">
									<thead>
										<tr>
											<th>NAME</th>
											<th>PRICE</th>
											<th>QTY</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Daisy Street 3/4 Sleeve Panelled Casual Shirt</td>
											<td>
												<div class="price">
													<span class="new-price">$45</span>
													<span class="old-price">$48</span>
												</div>
											</td>
											<td>
												<div class="style-2 input-counter">
													<span class="minus-btn"></span>
													<input type="text" value="1" size="5"/>
													<span class="plus-btn"></span>
												</div>
											</td>
										</tr>
										<tr>
											<td>Daisy Street 3/4 Sleeve Panelled Casual Shirt</td>
											<td>
												<div class="price">
													$45
												</div>
											</td>
											<td>
												<div class="style-2 input-counter">
													<span class="minus-btn"></span>
													<input type="text" value="1" size="5"/>
													<span class="plus-btn"></span>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="wrapper">
								<div class="title-options">TYPE<span class="color-required">*</span></div>
								<form  action="#">
									<ul class="radio-list">
										<li class="active">
											<label class="radio">
											<input id="radio1" type="radio" name="radios" checked>
											<span class="outer"><span class="inner"></span></span>Green</label>
										</li>
										<li>
											<label class="radio">
											<input id="radio2" type="radio" name="radios">
											<span class="outer"><span class="inner"></span></span>Red</label>
										</li>
										<li>
											<label class="radio">
											<input id="radio3" type="radio" name="radios">
											<span class="outer"><span class="inner"></span></span>Black</label>
										</li>
										<li>
											<label class="radio">
											<input id="radio4" type="radio" name="radios">
											<span class="outer"><span class="inner"></span></span>Magenta</label>
										</li>
									</ul>
								</form>
							</div>
							<div class="wrapper">
								<div class="pull-left"><label class="qty-label">QTY</label></div>
								<div class="pull-left">
									<div class="style-2 input-counter">
										<span class="minus-btn"></span>
										<input type="text" value="1" size="5"/>
										<span class="plus-btn"></span>
									</div>
								</div>
							</div>
							<div class="wrapper">
								<div class="pull-left">
									<a href="#" class="btn btn-lg btn-addtocart"><span class="icon icon-shopping_basket"></span>SHOP NOW!</a>
								</div>
								<div class="pull-left">
									<ul class="product_inside_info_link">
										<li class="text-right">
											<a href="#">
												<span class="fa fa-heart-o"></span>
												<span class="text">ADD TO WISHLIST</span>
											</a>
										</li>
										<li class="text-left">
											<a href="#" class="compare-link">
												<span class="fa fa-balance-scale"></span>
												<span class="text">ADD TO COMPARE</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="wrapper">
								<ul class="social-icon-square">
									<li><a class="icon-01" href="#"></a></li>
									<li><a class="icon-02" href="#"></a></li>
									<li><a class="icon-03" href="#"></a></li>
									<li><a class="icon-04" href="#"></a></li>
									<li><a class="icon-05" href="#"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container offset-80">
				<div class="tt-product-page__tabs tt-tabs">
				    <div class="tt-tabs__head">
				        <ul>
				            <li data-active="true"><span>DESCRIPTION</span></li>
				            <li><span>CUSTOM TAB</span></li>
				            <li><span>SIZING GUIDE</span></li>
				            <li><span>TAGS</span></li>
				            <li><span>REVIEWS</span></li>
				            <li><span>E</span></li>
				            <li><span>F</span></li>
				        </ul>
				        <div class="tt-tabs__border"></div>
				    </div>
				    <div class="tt-tabs__body">
			            <div>
			               <span class="tt-tabs__title">DESCRIPTION</span>
			               <div class="tt-tabs__content">
				               	<h5 class="tab-title">DESCRIPTION</h5>
								<p>
									Silver, metallic-blue and metallic-lavender silk-blend jacquard, graphic pattern, pleated ruffle along collar, long sleeves with button-fastening cuffs, buckle-fastening silver skinny belt, large pleated rosettes at hips. Dry clean. Zip and hook fastening at back. 100% silk. Specialist clean
								</p>
								<ul class="list-simple-dot">
									<li><a href="#">Lightweight soft-touch woven</a></li>
									<li><a href="#">High-rise waist</a></li>
									<li><a href="#">Zip fly with hook and button fastening</a></li>
									<li><a href="#">Slip pockets</a></li>
									<li><a href="#">Waist belt</a></li>
									<li><a href="#">Relaxed fit</a></li>
									<li><a href="#">Machine wash</a></li>
									<li><a href="#">76% Polyester, 18% Viscose, 6% Elastane</a></li>
									<li><a href="#">Our model wears a UK 8/ EU 36/ US 4 and is 174 cm/5'8.5” tall</a></li>
								</ul>
			               </div>
			            </div>
			            <div>
			                <span class="tt-tabs__title">CUSTOM TAB</span>
			                <div class="tt-tabs__content">
			                    <h5 class="tab-title">CUSTOM TAB</h5>
								<h6><span class="color-base icon icon-local_shipping"></span> Shipping and Delivery</h6>
								We're dedicated to delivering your purchase as quickly and affordably as possible. We offer a range of delivery and pickup options, so you can choose the shipping method that best meets your needs.
								<div class="divider"></div>
								<h6><span class="color-base icon icon-payment"></span> Payment Methods</h6>
								Every country and shopper has their prefered method to pay online. Offering your buyers safe and convenient payment choices can help your sale go smoothly, earn you positive Feedback, and bring them back for more.
			                </div>
			            </div>
			            <div>
			                <span class="tt-tabs__title">SIZING GUIDE</span>
			                <div class="tt-tabs__content">
			                    <h5 class="tab-title">CLOTHING - SINGLE SIZE CONVERSION (CONTINUED)</h5>
								<div class="table-responsive">
									<table class="table table-parameters">
										<tbody>
											<tr>
												<td>UK</td>
												<td>18</td>
												<td>20</td>
												<td>22</td>
												<td>24</td>
												<td>26</td>
											</tr>
											<tr>
												<td>European</td>
												<td>46</td>
												<td>48</td>
												<td>50</td>
												<td>52</td>
												<td>54</td>
											</tr>
											<tr>
												<td>US</td>
												<td>14</td>
												<td>16</td>
												<td>18</td>
												<td>20</td>
												<td>22</td>
											</tr>
											<tr>
												<td>Australia</td>
												<td>8</td>
												<td>10</td>
												<td>12</td>
												<td>14</td>
												<td>16</td>
											</tr>
										</tbody>
									</table>
								</div>
			                </div>
			            </div>
			            <div>
			                <span class="tt-tabs__title">TAGS</span>
			                <div class="tt-tabs__content">
								<h5 class="tab-title">TAGS</h5>
								<ul class="tags-list">
									<li><a href="#">Vintage</a></li>
									<li><a href="#">Style</a></li>
									<li><a href="#">Street Style</a></li>
								</ul>
			                </div>
			            </div>
			            <div>
			                <span class="tt-tabs__title">REVIEWS</span>
			                <div class="tt-tabs__content">
								<h5 class="tab-title">CUSTOMER REVIEWS</h5>
								<div class="review">
									<div class="rating">
										<span class="icon-star"></span>
										<span class="icon-star"></span>
										<span class="icon-star"></span>
										<span class="icon-star"></span>
										<span class="icon-star empty-star"></span>
									</div>
									<span>1 Review(s)</span>
									<a href="#">Add Your Review</a>
								</div>
								<div class="divider"></div>
								<h6>Write a review</h6>
								<div class="divider"></div>
								<form class="form-horizontal">
									<div class="form-group">
										<label for="form-name" class="col-sm-2 control-label">Name</label>
										<div class="col-sm-10">
											<input type="email" class="form-control" id="form-name" placeholder="Your name">
										</div>
									</div>
									<div class="form-group">
										<label for="form-email" class="col-sm-2 control-label">E-mail</label>
										<div class="col-sm-10">
											<input type="email" class="form-control" id="form-email" placeholder="Your e-mail">
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-2 control-label">Rating</label>
										<div class="col-sm-10">
											<div class="rating">
												<span class="icon-star empty-star"></span>
												<span class="icon-star empty-star"></span>
												<span class="icon-star empty-star"></span>
												<span class="icon-star empty-star"></span>
												<span class="icon-star empty-star"></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="form-review-title" class="col-sm-2 control-label">Review Title</label>
										<div class="col-sm-10">
											<input type="email" class="form-control" id="form-review-title" placeholder="Give your review a title">
										</div>
									</div>
									<div class="form-group">
										<label for="form-review-title" class="col-sm-2 control-label">Body of Review (1500)</label>
										<div class="col-sm-10">
											<textarea class="form-control" rows="7" placeholder="Write your comments here"></textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-default">SUBMIT COMMENT</button>
										</div>
									</div>
								</form>
								<div class="reviews-comments">
									<div class="item">
										<div class="rating">
											<span class="icon-star"></span>
											<span class="icon-star"></span>
											<span class="icon-star"></span>
											<span class="icon-star"></span>
											<span class="icon-star empty-star"></span>
										</div>
										<div class="title">Admin</div>
										<div class="data">Prabhu on May 19, 2016</div>
										<p>
											WOW! AWESOME job on this template :-)<br>
											Just wanted to say that as we have worked with the YourStore template more and more over the last week we are truly impressed. This has to be one of the best designed templates we have encountered on ThemeForest. There were only the few minor bugs which the EXCELLENT support here on this board took care of immediately. The code is clean and flexible and yet easy for even more novice designers to adapt to their needs. We are thrilled to finally have a professional design that is a pleasure to work with and that will allow us to complete our business expansion on time and under budget!
										</p>
									</div>
									<div class="item">
										<div class="rating">
											<span class="icon-star"></span>
											<span class="icon-star"></span>
											<span class="icon-star"></span>
											<span class="icon-star"></span>
											<span class="icon-star empty-star"></span>
										</div>
										<div class="title">Admin</div>
										<div class="data">Prabhu on May 19, 2016</div>
										<p>
											WOW! AWESOME job on this template :-)<br>
											Just wanted to say that as we have worked with the YourStore template more and more over the last week we are truly impressed. This has to be one of the best designed templates we have encountered on ThemeForest. There were only the few minor bugs which the EXCELLENT support here on this board took care of immediately. The code is clean and flexible and yet easy for even more novice designers to adapt to their needs. We are thrilled to finally have a professional design that is a pleasure to work with and that will allow us to complete our business expansion on time and under budget!
										</p>
									</div>
								</div>
				            </div>
			            </div>
			            <div>
			            	<span class="tt-tabs__title">E</span>
			            	<div class="tt-tabs__content">
			                	<h5 class="tab-title">E</h5>
			                </div>
			            </div>
			            <div>
			            	<span class="tt-tabs__title">F</span>
			            	<div class="tt-tabs__content">
			                	<h5 class="tab-title">F</h5>
			                </div>
			            </div>
				    </div>
				</div>
			</div>
		</div>