@extends('layout')
@section('content')
  <div class="page-container">
    <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-menu">
      <div class="container">
        <div class="title-wrapper">
          <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Thực đơn</div>
          <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
          <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">The various dishes are waiting for your coming to enjoy its</div>
        </div>
      </div>
    </div>
    <div class="page-content-wrapper">
      <section class="product-sesction-menu padding-bottom-100 padding-top-100">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="swin-sc swin-sc-title style-3">
                <p class="title"><span>Chi tiết {{$detail_first_menu->name}}</span></p>
              </div>
              <div class="swin-sc swin-sc-product products-01 style-02 woocommerce">
                
                <div class="row">
                  <div class="nav-slider">
                    <div class="tab-content">
                      <div class="col-md-5 col-sm-12">
                        <div class="cat-wrapper">
                          <div class="item"><img src="fooday/assets/images/thuc_don/{{$detail_first_menu->image}}" alt="" class="img img-responsive img-full"></div>
                        </div>
                      </div>
                      <div class="col-md-7 col-sm-12">
                        <div class="products">
                        @foreach($detail_first_menu->Foods as $monan)
                          <div class="item product-01">
                            <div class="item-left">
                              <h5 class="title">{{$monan->name}}</h5>
                              <div class="des">{{$monan->summary}}</div>
                            </div>
                            <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">vnđ</span>{{number_format($monan->price)}}</span></div>
                          </div>
                        @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="menu-grid-02 padding-bottom-100">
        <div class="container">
          <div class="swin-sc swin-sc-product products-01 style-03 woocommerce">
            
            <div class="row">
              <div class="col-md-12">
                <div class="products nav-slider">
                  <div class="item-slick">
                    <div class="row">
                      @foreach($menu as $thucdon)
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/thuc_don/{{$thucdon->image}}" alt="" width="150px" height="100px">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <a href="ds-thuc-don.html"><h5 class="title">{{$thucdon->name}}</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">vnđ</span>{{number_format($thucdon->price)}}</span></a>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="item-slick">
                    <div class="row">
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01l.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Frish Cheese Chip</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01b.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Grandpa's Country Fried</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>30.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>27.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01e.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>17.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01f.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Frish Cheese Chip</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01d.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>27.0</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Frish Cheese Chip</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01b.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Grandpa's Country Fried</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>30.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01c.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>27.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01d.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>17.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01e.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Frish Cheese Chip</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01f.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>27.0</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item-slick">
                    <div class="row">
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Frish Cheese Chip</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01b.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Grandpa's Country Fried</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>30.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01c.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>27.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01d.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>17.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01e.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Frish Cheese Chip</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01f.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>27.0</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01l.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Frish Cheese Chip</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01b.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Grandpa's Country Fried</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>30.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>27.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01e.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>17.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01f.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Frish Cheese Chip</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01d.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>27.0</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item-slick">
                    <div class="row">
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01c.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>27.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01d.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>17.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Frish Cheese Chip</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01b.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Grandpa's Country Fried</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>30.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01e.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Frish Cheese Chip</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01f.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>27.0</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>27.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01e.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>17.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01l.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Frish Cheese Chip</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01b.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Grandpa's Country Fried</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>30.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01f.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Frish Cheese Chip</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <div class="item product-01">
                          <div class="block-img"><img src="fooday/assets/images/product/product-01d.jpg" alt="">
                            <div class="group-btn"><a href="#" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="#" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <h5 class="title">Uncle Herschel's Favorite</h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>27.0</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="menu-banner-section banner-section padding-top-100 padding-bottom-100"><img src="fooday/assets/images/background/lemon.png" alt="" class="img-left img-bg img-deco img-responsive"><img src="fooday/assets/images/background/vegetable_03.png" alt="" class="img-right img-bg img-deco img-responsive">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="content-wrapper">
                <h2 class="heading-title">Let's Make Your Meal be Fantastic With<span class="text-large"> FOODAY</span>Awesome Menu!</h2>
                <div class="swin-btn-wrap"><a href="#" class="swin-btn"><span>Book Table</span></a></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </div>
  </div>
@endsection