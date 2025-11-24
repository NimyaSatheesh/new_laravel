<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-RE3t+uPxbvY3AI2zIh+WLgJGjdFfzskZGv1EfeN/zOZ2RCwo/6JgVWAz4FzDOdiYMXqah7kp5PU+Trp6fdk3OQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>

<style>

</style>

<div class="w3-bar w3-white w3-large">
    <a href="{{route('user.index')}}" class="w3-bar-item w3-button w3-mobile">Home</a>
    <a  class="w3-bar-item w3-button w3-mobile dropdownn">
      <ul class="notification-drop">
      
      </ul>
  </a>
    
  
      <div class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile" style=" margin-right: 22px;">

          <div class="relative" style=" margin-right: 22px;">
            @if(Auth::check())
              <a class="dropbtn">  {{ Auth::user()->name }}  <i class="fas fa-caret-down"></i> </a>
              <div class="dropdown">

                  <form method="POST" action="{{ route('user.logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                  </form>
                </a>
              </div>
              @endif 
            </div>
            
       </div>
  </div>

  
