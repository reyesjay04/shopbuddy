

<script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "70%";
    // document.getElementById("flipkart-navbar").style.width = "50%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
}
</script>
<style type="text/css">
span.num {
  background: #cccccc;
  border-radius: 0.6em;
  -moz-border-radius: 0.6em;
  -webkit-border-radius: 0.6em;
  color: #ffffff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.4em;
  margin-right: 3px;
  text-align: center;
  width: 1.4em; 
}
p {
    margin: 0 0 10px;
    margin-left: 10px;
}

    
</style>

<!------ Include the above in your HEAD tag ---------->

<div id="flipkart-navbar">
    <div class="container">
        <div class="row row1">
            <ul class="largenav pull-right">
                <li class="upper-links dropdown">
                    <a class="notif" href="records.php">
                        <svg class="" width="16px" height="12px" style="overflow: visible;">
                            <path d="M8.037 17.546c1.487 0 2.417-.93 2.417-2.417H5.62c0 1.486.93 2.415 2.417 2.415m5.315-6.463v-2.97h-.005c-.044-3.266-1.67-5.46-4.337-5.98v-.81C9.01.622 8.436.05 7.735.05 7.033.05 6.46.624 6.46 1.325v.808c-2.667.52-4.294 2.716-4.338 5.98h-.005v2.972l-1.843 1.42v1.376h14.92v-1.375l-1.842-1.42z" fill="#ffffff"><span class="num"><?php echo count_approve();?></span></path>
                        </svg>
                    </a>
 <!--                    <a class="dropdown-menu" href="records.php">
                        <div class="container-fluid">
                             <strong><h5 class="text-center"style="width: 300px;color:black;">Orders</h5></strong>
                        </div>
                    
                        
        
                        <script type="text/javascript">
                            $('#account').click(function() {
                        window.location.href = 'login.php';
                        return false;
                        });
                        </script>
                    </a> -->
                </li>
                <li class="upper-links"><a class="links" href="index.php">SHOP</a></li>
                <li class="upper-links"><a class="links" href="contact.php">CONTACT US</a></li>
                <li class="upper-links"><a style="color: #ff7941;"class="links" href="supplierregister.php">SELL ON SHOPBUDDY</a></li>
        
                <?php if(!logged_in()): ?>
            
                <li class="upper-links"><a class="links" href="login.php">LOGIN</a></li>
            
                <?php else:?>
                <?php get_email(); ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ Shop Buddy</span></h2>
                <a href = "index.php" style="color:white; font-family: 'Lobster', cursive;"><h1 style="margin:0px;  font-size: 30px;"><span class="largenav">Shop Buddy</span></h1></a>
            </div>

            <form method="get" action="index.php">
                <script type="text/javascript">
                $(document).ready(function(){
                    $('.flipkart-navbar-search input[type="text"]').on("keyup input", function(){
                        /* Get input value on change */
                        var inputVal = $(this).val();
                        var resultDropdown = $(this).siblings(".dropdown-content");
                        if(inputVal.length){
                            $.get("backend-search.php", {term: inputVal}).done(function(data){
                                // Display the returned data in browser
                                resultDropdown.html(data);
                            });
                        } else{
                            resultDropdown.empty();
                        }
                    });
                    
                    // Set search input value on click of result item
                    $(document).on("click", ".dropdown-content p", function(){
                        $(this).parents(".flipkart-navbar-search").find('input[type="text"]').val($(this).text());
                        $(this).parent(".dropdown-content").empty();
                    });
                });
                </script>
             <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                    <div class="row">
                        <input class="flipkart-navbar-input col-xs-11" type="text" placeholder="Search for Products, Brands and more" name="search" autocomplete="off">
                        
                        <button type="submit" class="flipkart-navbar-button col-xs-1" >
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="15px" height="15px" viewBox="0 0 485.213 485.213" style="enable-background:new 0 0 485.213 485.213;" xml:space="preserve" class=""><g><g>
                                <g>
                                <path d="M471.882,407.567L360.567,296.243c-16.586,25.795-38.536,47.734-64.331,64.321l111.324,111.324    c17.772,17.768,46.587,17.768,64.321,0C489.654,454.149,489.654,425.334,471.882,407.567z" data-original="#000000" class="active-path" data-old_color="#EEE8E8" fill="#F4F2F2"/>
                                <path d="M363.909,181.955C363.909,81.473,282.44,0,181.956,0C81.474,0,0.001,81.473,0.001,181.955s81.473,181.951,181.955,181.951    C282.44,363.906,363.909,282.437,363.909,181.955z M181.956,318.416c-75.252,0-136.465-61.208-136.465-136.46    c0-75.252,61.213-136.465,136.465-136.465c75.25,0,136.468,61.213,136.468,136.465    C318.424,257.208,257.206,318.416,181.956,318.416z" data-original="#000000" class="active-path" data-old_color="#EEE8E8" fill="#F4F2F2"/>
                                <path d="M75.817,181.955h30.322c0-41.803,34.014-75.814,75.816-75.814V75.816C123.438,75.816,75.817,123.437,75.817,181.955z" data-original="#000000" class="active-path" data-old_color="#EEE8E8" fill="#F4F2F2"/>
                                </g>
                                </g>
                                </g> 
                            </svg>
                        </button>
                        <br>
                        <br>
                        <br>
                        <div class="dropdown-content" style="position: fixed;background-color: #275b7f; width: 200px"></div>
                    </div>
                </div>
            </form>
  
            <div class="cart largenav col-sm-2">
                <a href ="checkout.php" class="cart-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -16 512.00018 512" width="16px" height="16px" class=""><g><path d="m396 440c5.519531 0 10-4.480469 10-10s-4.480469-10-10-10-10 4.480469-10 10 4.480469 10 10 10zm0 0" data-original="#000000" class="active-path" data-old_color="#003e52" fill="#003e52"/><path d="m230 440c5.519531 0 10-4.480469 10-10s-4.480469-10-10-10-10 4.480469-10 10 4.480469 10 10 10zm0 0" data-original="#000000" class="active-path" data-old_color="#003e52" fill="#003e52"/><path d="m509.882812 123.847656c-1.894531-2.429687-4.804687-3.847656-7.882812-3.847656h-360.003906l-22.792969-96.875c-3.210937-13.617188-15.222656-23.125-29.203125-23.125h-60c-16.542969 0-30 13.457031-30 30s13.457031 30 30 30h36.238281l74.558594 316.875c3.210937 13.617188 15.222656 23.125 29.203125 23.125h20.027344c-6.292969 8.363281-10.027344 18.753906-10.027344 30 0 27.570312 22.429688 50 50 50s50-22.429688 50-50c0-11.246094-3.734375-21.636719-10.027344-30h86.054688c-6.292969 8.363281-10.027344 18.753906-10.027344 30 0 27.570312 22.429688 50 50 50s50-22.429688 50-50c0-11.246094-3.734375-21.636719-10.027344-30h.027344c16.542969 0 30-13.457031 30-30s-13.457031-30-30-30h-242.238281l-9.414063-40h58.621094.019531.015625 145.992188.019531.019531 57.347656c13.785157 0 25.757813-9.34375 29.109376-22.726562l36.210937-144.847657c.746094-2.988281.074219-6.152343-1.820313-8.578125zm-35.691406 76.152344h-63.863281l7.5-60h71.363281zm-118.191406 20h31.671875l-7.5 60h-54.171875v-30c0-5.523438-4.476562-10-10-10s-10 4.476562-10 10v30h-54.171875l-7.5-60h31.671875c5.523438 0 10-4.476562 10-10s-4.476562-10-10-10h-34.171875l-7.5-60h71.671875v30c0 5.523438 4.476562 10 10 10s10-4.476562 10-10v-30h71.671875l-7.5 60h-34.171875c-5.523438 0-10 4.476562-10 10s4.476562 10 10 10zm-176.359375 60-14.117187-60h58.648437l7.5 60zm34.53125-140 7.5 60h-60.855469l-14.113281-60zm45.828125 290c0 16.542969-13.457031 30-30 30s-30-13.457031-30-30 13.457031-30 30-30 30 13.457031 30 30zm166 0c0 16.542969-13.457031 30-30 30s-30-13.457031-30-30 13.457031-30 30-30 30 13.457031 30 30zm10-70c5.515625 0 10 4.484375 10 10s-4.484375 10-10 10h-266c-4.660156 0-8.664062-3.171875-9.734375-7.710938l-78.1875-332.289062h-52.078125c-5.515625 0-10-4.484375-10-10s4.484375-10 10-10h60c4.660156 0 8.664062 3.171875 9.734375 7.710938l62.1875 264.292968c.003906.015625.007813.03125.011719.050782l15.988281 67.945312zm20.089844-87.582031c-1.117188 4.464843-5.109375 7.582031-9.710938 7.582031h-46.050781l7.5-60h61.367187zm0 0" data-original="#000000" class="active-path" data-old_color="#003e52" fill="#003e52"/><path d="m316 200c-5.519531 0-10 4.480469-10 10s4.480469 10 10 10 10-4.480469 10-10-4.480469-10-10-10zm0 0" data-original="#000000" class="active-path" data-old_color="#003e52" fill="#003e52"/></g> </svg>
                   
                    <span style="color: #003e52;">Your Cart</span>
                    <span class="item-number "><?php count_orders(); ?></span>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="mySidenav" class="sidenav">
    <div class="container" style="background-color: #2874f0; padding-top: 10px;">
        <span class="sidenav-heading">Home</span>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    </div>
    <a href="shop.php">SHOP</a>
    <a href="contact.php">CONTACT US</a>
    <a style="color: #ff7941;"href="supplierregister.php">SELL ON SHOPBUDDY</a>


</div>





<script>
$(document).ready(function() {
    $("[id*='dataList']").DataTable({ 
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": false,
    "pageLength": 5,
    "searching" : false,
     responsive: true,
         "dom": '<"top"lf>rt<"bottom"p><"clear">'
    });
});
</script>
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var employee_id = $(this).attr("id");
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>