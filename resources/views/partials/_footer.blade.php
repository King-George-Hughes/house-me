<!-- FOOTER -->
<style>
  .footer{
    background-color: none;
    background: linear-gradient(to bottom left, rgba(0,0,0,0.5), rgba(0,0,0,0.7));
    backdrop-filter: blur(10px);
  }
</style>

<footer class="footer fixed-bottom text-white text-center py-2">
    <p>
      &copy; HouseMe | 
      <span id="year"></span> 
      &trade; 
      @if (auth()->user())
        @if (auth()->user()->role == '1')
          <a class="btn btn-primary ms-2" href="/create">Add Post</a>

          @else
          
        @endif

        @else
        <a class="btn btn-primary ms-2" href="/create">Add Post</a>
      @endif
    </p>
</footer>
<!-- FOOTER END -->