@php
      $deep="hii deep";
      $fruit=['deep','jadav','xyz'];
    @endphp
    <script>
      var data =@json($fruit);
      console.log(data);  
    </script>