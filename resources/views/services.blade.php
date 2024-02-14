
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Add to Cart Interaction Example</title>
  <link href="{{  asset ('assets/css/products.css') }}" rel="stylesheet">
</head>
<body>
<!-- partial:index.partial.html -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>



<div id="checkout">
	CHECKOUT
</div>


<div id="header">	
	   <!-- Navbar Start -->
       <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 text-secondary"><span class="text-primary">LF</span>LAUNDRY</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="{{ url('/') }}"  class="nav-item nav-link {{ (Route::currentRouteName() == 'index') ? 'active' : '' }}">Home</a>
                        <a href="{{ url('aboutus') }}" class="nav-item nav-link {{ (Route::currentRouteName() == 'aboutUs') ? 'active' : '' }}">About</a>
                        <a href="{{ url('service') }}" class="nav-item nav-link {{ (Route::currentRouteName() == 'service') ? 'active' : '' }}">Services</a>
                        <a href="{{ url('pricing') }}" class="nav-item nav-link {{ (Route::currentRouteName() == 'pricing') ? 'active' : '' }}">Products</a>
                        <a href="{{ url('signup') }}" class="nav-item nav-link {{ (Route::currentRouteName() == 'pricing') ? 'active' : '' }}">Sign Up</a>
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="blog.html" class="dropdown-item">Blog Grid</a>
                                <a href="single.html" class="dropdown-item">Blog Detail</a>
                            </div>
                        </div> -->
                        <a href="{{ url('contactus') }}" class="nav-item nav-link {{ (Route::currentRouteName() == 'contactus') ? 'active' : '' }}">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
</div>
@if (session()->has('status'))
          <div class="alert alert-success">{{ session()->get('status') }}</div>
 @endif

<div id="sidebar">
    <h3>My Orders</h3>
@if (count($user->orders ?? []) == 0) {
// Handle the case where $user->orders is null or an empty array
}
    <p>No orders for you</p>
    <table>
        <thead>
            <tr>
                <th>Cost</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
    @if ($user)
    
    @foreach ($user->orders as $order)
    
    ...
    
    @endforeach
    
    @endif
    
    <tr>
    
        <td>Ksh {{ $order->total_cost }}</td>
    
        <td>{{ $order->status }}</td>
    
    </tr>



	<h3>CART</h3>
    <div id="cart">
    	<span class="empty">No items in cart.</span>       
    </div>
    <div id="cart-summary">
        <p>Total Cost: <span id="total-cost">0</span></p>
        <form id="checkout-form" action="/checkout" method="post"> <!-- Update the action attribute with your actual route -->
            @csrf <!-- Add a CSRF token for Laravel to protect against CSRF attacks -->
            <input type="hidden"  name="totalCost"  id="total-cost-input">
            <button type="submit" class="checkout" id="checkout-btn">Checkout</button>
        </form>
    </div>
    
    
    <h3>CATEGORIES</h3>
    <div class="checklist categories">
    	<ul>
   
            <li><a href=""><span></span>Bags</a></li>
            <li><a href=""><span></span>Dressed</a></li>
            <li><a href=""><span></span>Jackets</a></li>
            <li><a href=""><span></span>jewelry</a></li>
            <li><a href=""><span></span>Shoes</a></li>
            <li><a href=""><span></span>Shirts</a></li>
            <li><a href=""><span></span>Sweaters</a></li>
            <li><a href=""><span></span>T-shirts</a></li>
        </ul>
    </div>
    
    <h3>COLORS</h3>
    <div class="checklist colors">
    	<ul>
        	<li><a href=""><span></span>Beige</a></li>
            <li><a href=""><span style="background:#222"></span>Black</a></li>
            <li><a href=""><span style="background:#6e8cd5"></span>Blue</a></li>
            <li><a href=""><span style="background:#f56060"></span>Brown</a></li>
            <li><a href=""><span style="background:#44c28d"></span>Green</a></li>
        </ul>
        
        <ul>
        	<li><a href=""><span style="background:#999"></span>Grey</a></li>
            <li><a href=""><span style="background:#f79858"></span>Orange</a></li>
            <li><a href=""><span style="background:#b27ef8"></span>Purple</a></li>
            <li><a href=""><span style="background:#f56060"></span>Red</a></li>
            <li><a href=""><span style="background:#fff;border: 1px solid #e8e9eb;width:13px;height:13px;"></span>White</a></li>
        </ul>        
    </div>
</div>

<div id="grid-selector">
       <div id="grid-menu">
       	   View:
           <ul>           	   
               <li class="largeGrid"><a href=""></a></li>
               <li class="smallGrid"><a class="active" href=""></a></li>
           </ul>
       </div>
       
       Showing 1–9 of 9 results 
</div>

<div id="grid">
    @foreach($services as $product)
    <div class="product">
        <div class="make3D">
            <div class="product-front">
                <div class="shadow"></div>
                <img src="{{ asset('assets/img/services/' . $product->image) }}" style=" height: 350px; " class="me-3">
                <div class="image_overlay"></div>
                <div class="add_to_cart">Add to cart</div>
                <div class="view_gallery">View gallery</div>                
                <div class="stats">        	
                    <div class="stats-container">
                        <div class="product_price">Ksh <span class="price">{{ $product->cost }}</span></div>
                        <div class="product_name">{{ $product->name }}</div>   
                        <p>category</p>                                            
                        
                        <div class="product-options">
                        <strong>COLORS</strong>
                        <div class="colors">
                            <div class="c-blue"><span></span></div>
                            <div class="c-red"><span></span></div>
                            <div class="c-white"><span></span></div>
                            <div class="c-green"><span></span></div>
                            @endforeach
                        </div>
                    </div>                       
                    </div>                         
                </div>
            </div>
            
            <div class="product-back">
                <div class="shadow"></div>
                <div class="carousel">
                    <ul class="carousel-container">
                        @for ($i = 0; $i < 3; $i++)
                            <li>
                                <img src="{{ asset('assets/img/services/' . $product->image) }}" >
                            </li>
                        @endfor

                    </ul>
                    <div class="arrows-perspective">
                        <div class="carouselPrev">
                            <div class="y"></div>
                            <div class="x"></div>
                        </div>
                        <div class="carouselNext">
                            <div class="y"></div>
                            <div class="x"></div>
                        </div>
                    </div>
                </div>
                <div class="flip-back">
                    <div class="cy"></div>
                    <div class="cx"></div>
                </div>
            </div>	  
        </div>	
    </div>   
</div>
</div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- partial -->
<script src="{{asset('assets/js/products.js') }}"></script>
</body>
</html>
