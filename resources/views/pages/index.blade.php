@extends('layout') 
@section('content')
  <div class="page-container">
    <div class="top-header top-bg-parallax">
      <div data-parallax="scroll" data-image-src="fooday/assets/images/slider/slider2-bg1.jpg" class="slides parallax-window">
        <div class="slide-content slide-layout-02">
          <div class="container">
            <div class="slide-content-inner"><img src="fooday/assets/images/slider/slider2-icon.png" data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="500" alt="fooday" class="slide-icon img img-responsive animated">
              <h3 data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1000" class="slide-title animated">FOODAY RESTAURANT</h3>
              <p data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1500" class="slide-sub-title animated"><span class="line-before"></span><span class="line-after"></span><span class="text"><span>Tasty</span><span>Delicious</span><span>Savoury</span></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-content-wrapper">
      <section class="about-us-session padding-top-100 padding-bottom-100">
        <div class="container">
          <div class="row">
            <div class="col-md-6 colsm-12"><img src="fooday/assets/images/pages/home1-about.jpg" alt="" class="img img-responsive wow zoomIn"></div>
            <div class="col-md-6 col-sm-12">
              <div class="swin-sc swin-sc-title style-4 margin-bottom-20 margin-top-50">
                <p class="top-title"><span>Giới thiệu</span></p>
                <h3 class="title">Our Story</h3>
              </div>
              <p class="des font-bold text-center">WE HAVE THE GLORY BEGINING IN RESTAURANT BUSINESS</p>
              <p class="des margin-bottom-20 text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis ullam laboris nisi ut aliquip ex ea commodo consequat.</p>
              <div class="swin-btn-wrap center"><a href="#" class="swin-btn center form-submit btn-transparent"> <span>	About Us</span></a></div>
            </div>
          </div>
        </div>
      </section>

      <section class="product-sesction-03-1 padding-top-100 padding-bottom-100">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1">
              <div class="swin-sc swin-sc-title text-left light">
                <h3 class="title">Món ăn trong ngày</h3>
              </div>
              <div class="swin-sc swin-sc-product products-01 style-04 light swin-vetical-slider">
                <div class="row">
                  <div class="col-md-12">
                    <div data-height="200" class="products nav-slider">
                      @foreach($today as $trongngay)
                      <div class="item product-01">
                        <div class="item-left"><img src="fooday/assets/images/hinh_mon_an/{{$trongngay->image}}" alt="" class="img img-responsive">
                          <div class="content-wrapper"><a href="chi-tiet-mon-an.html" class="title">{{$trongngay->name}}</a>
                            <div class="dot">...............................</div>
                            <div class="des">{{$trongngay->summary}}</div>
                          </div>
                        </div>
                        <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">vnđ</span>{{number_format($trongngay->price)}}</span></div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="product-sesction-02 padding-top-100 padding-bottom-100" id="jumpp">
        <div class="container">
          <div class="swin-sc swin-sc-title style-3">
            <p class="title"><span>Danh sách món ăn</span></p>
          </div>
          <div class="swin-sc swin-sc-product products-02 carousel-02">
           
            <div class="products nav-slider">
              <div class="row slick-padding">
                @foreach($foods as $food)
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="blog-item item swin-transition">
                      <div class="block-img"><img src="fooday/assets/images/hinh_mon_an/{{$food->image}}" alt="" class="img img-responsive" style="height:300px">
                        <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><span class="price-symbol"></span>{{number_format($food->price)}}</span></div>
                        <div class="group-btn"><a href="chi-tiet-mon-an.html" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                      </div>
                      <div class="block-content">
                        <h5 class="title"><a href="chi-tiet-mon-an.html">{{$food->name}}</a></h5>
                        <div class="product-info">
                         {{$food->summary}}
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
            {{$foods->links()}}

          </div>
          
        </div>
      </section>
    </div>
  </div>

<script>
$(document).ready(function(){
    $('.pagination li').each(function(){
        var num = $('a', this).text()
        $(this).has('a').html('<span>'+num+'</span>')
        
    })
    $('.pagination li').click(function(){
        var page = $(this).text();
        if(!jQuery.isNumeric(page)){
            if(page == "«"){
                if($('.pagination li.active').text() > 1){
                    $('.pagination li.active').prev().addClass('active')
                    $('.pagination li.active').next().removeClass('active')
                }
                else{
                    $('.pagination li:first-child').addClass('disabled')
                }
                
            }
            else{
                if($('.pagination li.active').next().text() != "»"){
                    $('.pagination li.active').next().addClass('active')
                    $('.pagination li.active').prev().removeClass('active')
                    
                }
                else{
                    $('.pagination li:last-child').addClass('disabled')
                }
            }
            return false;
        }
        $('.pagination li').each(function(){
            if($(this).text() == 1){
                $(this).prev().removeClass('disabled')
            }
            $(this).removeClass('active')
        })

        $(this).addClass('active')

        $.ajax({
            url: "{{route('getProductPagination')}}",
            type: 'GET',
            data:{trang_so:page},
            success:function(data){
                $('.slick-padding').html(data)
            }
        })

        //console.log(page)
    })
})
</script>

@endsection