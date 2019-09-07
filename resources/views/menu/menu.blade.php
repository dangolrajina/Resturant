 @extends('layouts.app')
 @section('data')
 <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h4>Menu List</h4>
                    <a class="active" href="menu-list.html"></a>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================End Our feature Area =================-->
        <section class="most_popular_item_area menu_list_page">
            <div class="container">
                <div class="popular_filter">
                    <ul>
                        @foreach($categories as $category)
                        <li class="active" data-filter="*"><a href="">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="p_recype_item_main">
                    <div class="row p_recype_item_active">
                        <div class="col-md-6 break snacks">
                    
                            
                            @foreach($menus as $menu)

                            <form action="{{ url('/cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="menu_name" value="{{ $menu->name }}">
                                <input type="hidden" name="price" value="{{ $menu->price }}">
                                <input type="hidden" name="quantity" value="1">
                            <div class="media">
                                <div class="media-left">
                                    <img src="/storage/menu_images/{{$menu->menu_image}}" alt="" style="height: 120px;">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>{{$menu->name}}</h3></a>
                                    <h4>Rs.{{$menu->price}}</h4>
                                    <p>.........................................</p>
                                    <button type ="submit" class="read_mor_btn">Order</button>
                                </div>
                            </div>
                        </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Our feature Area =================-->

        @endsection