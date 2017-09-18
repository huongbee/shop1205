@foreach($foods as $monan)
                      
<div class="col-md-4 col-sm-6 col-xs-12">
  <div class="blog-item item swin-transition">
    <div class="block-img"><img style="height: 250px; width: 100%" src="fooday/assets/images/hinh_mon_an/{{$monan->image}}" alt="" class="img img-responsive">
      <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount">{{number_format($monan->price)}}</span><span class="price-symbol"> vnđ</span></div>
      <div class="group-btn"><a href="chi-tiet-mon-an.html" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="{{route('add-to-cart',[$monan->id])}}" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
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
@if(!isset($foodAll))
<div class="col-md-12"> {{$foods->links()}}</div>
@else
<div class="col-md-12"> {{$foodAll->links()}}</div>
@endif

<script>
    $(document).ready(function(){ 
        var trang = {{isset($trang) ? $trang : 1}};
        
        $('.pagination li').each(function(){
            var num = $('a', this).text()
            $(this).has('a').html('<span>'+num+'</span>')
            
            
            if($(this).text() == 1){
                $(this).prev().removeClass('disabled')
            }
            $(this).removeClass('active')
            
            if($(this).text()==trang){
                $(this).addClass('active')
            }

        })
       
        
        
        $('.pagination li').on('click',function(){
            var page = $(this).text();

            if(!jQuery.isNumeric(page)){
                if(page == "«"){
                    page = $('.pagination li.active').text() - 1;
                    if($('.pagination li.active').text() > 1){
                        $('.pagination li.active').prev().addClass('active')
                        $('.pagination li.active').next().removeClass('active')
                    }
                    else{
                        $('.pagination li:first-child').addClass('disabled')
                    }
                }
                else{
                    page = parseInt($('.pagination li.active').text()) + 1;
                    if($('.pagination li.active').next().text() != "»"){
                        $('.pagination li.active').next().addClass('active')
                        $('.pagination li.active').prev().removeClass('active')
                        
                    }
                    else{
                        $('.pagination li:last-child').addClass('disabled')
                    }
                }
            }
            var maxPageOverOne = $(".pagination li").length - 1
            //console.log(page, maxPageOverOne);
            if(page == 0 || page == maxPageOverOne){
                return false;
            }
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
        })
    })
</script>
    