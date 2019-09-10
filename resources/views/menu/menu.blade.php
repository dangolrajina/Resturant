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
                <div style="display: flex;justify-content: center;">
                    <ul style="display: flex;justify-content: center;">
                        @foreach($categories as $category)
                        <li style="    margin: 11px;border: 1px solid black;padding: 6px;">
                            <a href="/menu/{{ $category->slug }}">{{$category->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="p_recype_item_main">
                    <div class="row p_recype_item_active">
                    
                            
                            @foreach($menus as $menu)
                        <div class="col-md-6 break snacks">

                            <form action="{{ url('/add-cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="name" value="{{ $menu->name }}">
                                <input type="hidden" name="price" value="{{ $menu->price }}">
                                <input type="hidden" name="quantity" value="1">
                            <div class="media">
                                <div class="media-left">
                                    <img src="/storage/menu_images/{{$menu->menu_image}}" alt="" style="height: 140px;width: 160px;">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h3>{{$menu->name}}</h3></a>
                                    <h4>Rs.{{$menu->price}}</h4>
                                    <p>{{ str_limit($menu->description,120) }}</p>
                                    <button type ="submit" class="read_mor_btn">Order</button>
                                </div>
                            </div>
                        </form>
                        </div>
                        
                            @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--================End Our feature Area =================-->

        @endsection