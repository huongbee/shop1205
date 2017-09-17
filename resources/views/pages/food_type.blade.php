@extends('layout')
@section('content')
<style>
.slick-list{
  height: 950px!important
}
.row .slick-list{
  height: 140px!important
}
</style>
        <div class="page-container">
          <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-menu">
            <div class="container">
              <div class="title-wrapper">
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Món ăn theo loại</div>
                <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">The various dishes are waiting for your coming to enjoy its</div>
              </div>
            </div>
          </div>
          <div class="page-content-wrapper">
            <section class="product-sesction-02 padding-top-100 padding-bottom-100">
              <div class="container">
                <div class="swin-sc swin-sc-title style-3">
                  <p class="title"><span>Món ăn theo loại</span></p>
                </div>
                <div class="swin-sc swin-sc-product products-02 carousel-02">
                  <div class="row">
                    <div class="col-md-2"></div>
                    <div data-slide-toshow="5" class="cat-wrapper-02 main-slider col-md-8">
                      
                      @foreach($type as $loai)
                      <div class="item" >
                        <div class="cat-icons loaiMonan" dataId="{{$loai->id}}">
                          <?=$loai->icon;?>
                          <h5 class="cat-title">{{$loai->name}}</h5>
                        </div>
                      </div>
                      @endforeach

                    </div>
                    <div class="col-md-2"></div>
                  </div>
                  <div class="products nav-slider">
                    
                    <div class="row slick-padding addData">
                      @foreach($foods as $monan)
                      
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="blog-item item swin-transition">
                          <div class="block-img"><img style="height: 250px; width: 100%" src="fooday/assets/images/hinh_mon_an/{{$monan->image}}" alt="" class="img img-responsive">
                            <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount">{{number_format($monan->price)}}</span><span class="price-symbol"> vnđ</span></div>
                            <div class="group-btn"><a href="chi-tiet-mon-an.html" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                          </div>
                          <div class="block-content">
                            <h5 class="title"><a href="chi-tiet-mon-an.html">{{$monan->name}}</a></h5>
                            <div class="product-info">
                             {{$monan->summary}}
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      <div class="col-md-12"> {{$foods->links()}}</div>
                    </div>
                    
                  </div>
                  
                </div>
              </div>
            </section>
          </div>
        </div>
  <script>
    $(document).ready(function(){
      $('.loaiMonan').on('click',function(){
        var id_loai = $(this).attr('dataId')
        
        var route = "{{route('ajax-load-food-by-type',['id_loai'])}}"

        route = route.replace('id_loai',id_loai)

        console.log(route)
        $.ajax({
          url : route,
          type:"GET",
          success:function(data){
            $('.addData').html(data)
          }

        })

      })



    $('.pagination li').each(function(){
        var num = $('a', this).text()
        $(this).has('a').html('<span>'+num+'</span>')
        
    })
    $('.pagination li').on('click',function(){
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



        var id_loai = {{$id_type}}
        var route = "{{route('ajax-paginator')}}"

        $.ajax({
            url: route,
            type: 'GET',
            data:{
              trang_so:page,
              id_type:id_loai
            },
            success:function(data){
              $('.addData').html(data)
            }
        })

        //console.log(page)
    })
})
</script>
@endsection