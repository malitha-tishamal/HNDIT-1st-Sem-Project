
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/icon-head.png">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/store.css">
  <link rel="stylesheet" type="text/css" href="css/log-in-out.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Learning.lk - Store</title>
</head>
<body>

  <div class="user">
        <div class="top-box align3">&nbsp;&nbsp;&nbsp;&nbsp;
             <a href="index.php"><img src="images/icon.png" width="200px" height="60px"></a></div>

        <div class="top-box"></div>

        <div class="top-box output-align ">             
            
            <?php
                if (isset($_POST["sub12"])) {           
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    if ($username =="admin@elk.com" && $password =="1234") {
                        echo "<div ><img src='images/admin2.jpg' width='55px'></div>";
                        echo "<div class='success'> Log in Successfull! <br> As Admin. Wellcome! </div>";
                        $_SESSION["user"]="Admin";
                    }
                   
                    else{
                        echo "<div ><img src='images/error.png' width='50px'></div>";
                        echo "<div class='error'> Invalid Credentials! <br>  Please Cheak Again! </div>";
                        }
                    }
            ?>

            <?php
                     if(isset($_GET['sign'])){
                        if ($_GET['sign']== 1) {
                          echo "<div ><img src='images/success.png' width='55px'></div>";
                            echo "<div class='success'>New Account Create Successfull</div>";
                        }
                        if ($_GET['sign']== 0) {
                          echo "<div ><img src='images/error.png' width='50px'></div>";
                            echo "<div class='error'>New Account Create Unsuccessfull</div>";
                        }
                    }
            ?>
            <?php
                     if(isset($_GET['send'])){
                        if ($_GET['send']== 1) {
                          echo "<div ><img src='images/success.png' width='55px'></div>";
                            echo "<div class='success'>Update Successfull</div>";
                        }
                        if ($_GET['send']== 0) {
                          echo "<div ><img src='images/error.png' width='50px'></div>";
                            echo "<div class='error'>Update Unsuccessfull</div>";
                        }
                    }
            ?>

            <?php
                if (isset($_POST["sub12"])) {    
                require("connect.php");       
                    $email=$_POST['email'];
                    $password = $_POST['password'];

                   $query = "SELECT * FROM account WHERE email = '$email' AND password = '$password'";
              $result = mysqli_query($con,$query);

          while($row=mysqli_fetch_array($result)){
            if(mysqli_num_rows($result)== 1){
                echo "<div class='success'> Log in Successfull! <br> $row[2] Wellcome! </div>";
                $_SESSION["user"]="$row[2]";
              }
              else{
                 echo "<div class='error'> Invalid Credentials! <br>  Please Cheak Again! </div>";
              }
            
          }
        }
            ?>


        </div>

        <div>
          <div class="box">
              <div class="cart-count">0</div>
              <i class="fa fa-shopping-cart" style="color: orange; font-size: 40px; cursor: pointer;" id="cart-icon"></i> 
          </div>         
        </div>

        <div class="top-box align4">
          <button class="main login" onclick="document.getElementById('id01').style.display='block'">
          <i class="fa fa-fw fa-user"></i>Login
          </button>
          <button class="main signup" onclick="document.getElementById('id02').style.display='block'" >
          <i class="fa fa-sign-in"></i>SignUp
        </button>
        </div>
    </div>


    <!--Log in content -->
    <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    
    <div class="signup-container modal-content">
          <h1>Log In</h1>
          <p>Don't have an Account? <span onclick="signform()">Sign in</span></p>
         
          <div class="social-signup">
              <button class="social-btn">Google
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="images/google.png" width="20px">
              </button>
              <button class="social-btn">Facebook
                &nbsp;&nbsp;&nbsp;
                <img src="images/facebook2.png" width="20px">
              </button>
          </div>  
          <div class="social-signup">
              <button class="social-btn">Instagram
                &nbsp;&nbsp;&nbsp;
                <img src="images/ins.jpg" width="20px">
              </button>
              <button class="social-btn">Github
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="images/github.png" width="20px">
              </button>
          </div>
          
          <div class="divid">OR</div>
          
          <form class="signup-form" method="post">
              <input type="text" id="ajest-input" name="email" placeholder="email" required>
              <input type="password" id="ajest-input" name="password" placeholder="password" required>
              <button class="social-btn">Forgot Password ?</button>
              <button type="submit" name="sub12" class="signup-btn width-ajest2">Log In</button>
          </form>
          
      </div>
  </div>
  
  <!--sign in content -->
  <div id="id02" class="modal">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    
    <div class="signup-container modal-content">
          <h1>Sign Up</h1>
          <p>Already have an account? <span onclick="loginform()">Log in</span></p>
         
          <div class="social-signup">
              <button class="social-btn">Google
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="images/google.png" width="20px">
              </button>
              <button class="social-btn">Facebook
                &nbsp;&nbsp;&nbsp;
                <img src="images/facebook2.png" width="20px">
              </button>
          </div>  
          <div class="social-signup">
              <button class="social-btn">Instagram
                &nbsp;&nbsp;&nbsp;
                <img src="images/ins.jpg" width="20px">
              </button>
              <button class="social-btn">Github
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <img src="images/github.png" width="20px">
              </button>
          </div>
          
          <div class="divid">OR</div>
          
          <form class="signup-form" method="get" action="entry3.php">
              <input type="email" id="ajest-input" name="email" placeholder="email" required>
              <input type="password" id="ajest-input" name="password" placeholder="password" required>
              <input type="text" id="ajest-input" name="first_name" placeholder="first name" required>
              <input type="text" id="ajest-input" name="last_name" placeholder="last name" required>
              <input type="submit" value="SignUp" class="signup-btn width-ajest1">
          </form>
          
          <p class="terms">
              By signing up you agree to our <a href="#" >
              <span class="policy">Terms of Service</span><br>
              </a> and <a href="#" ><span class="policy">Privacy Policy</span></a><br>
              <br><br>
              <span class="policy">
              <input type="checkbox" checked ></span>
              Email me with news and updates
          </p>
      </div>
  </div>

  <script type="text/javascript">
    function signform(){
        document.getElementById('id01').style.display='none';
        document.getElementById('id02').style.display='block';
      }
      function loginform(){
        document.getElementById('id02').style.display='none';
        document.getElementById('id01').style.display='block';
      }
  </script>

  <script type="text/javascript" src="js/user.js"></script>
  
  <div class="navbar">
    <a  href="index.php">
      <i class="fa fa-home"></i> Home
    </a>
    <a href="Store.php" style="background-color: red;">
      <i class="fa fa-shopping-cart"></i> Store
    </a>
    <a href="news.php">
      <i class="fa fa-newspaper-o"></i> News
    </a>
    <div class="dropdown">
      <button class="dropdown-btn">
        <i class="fa fa-download"></i> Downloads <i class="fa fa-caret-down"></i>
      </button>
        <div class="dropdown-contents">
                <a href="java-download.php"><i class='fa fa-coffee' style='color:red'></i> Java Programming</a>
                <a href="python-download.php"><i class="fa fa-code" style="color:orange"></i> Python Programming</a>
                <a href="web-download.php"><i class="fa fa-code" style="color:blue"></i> Web Programming</a>
            </div>
    </div>
    <a href="courses.php">
      <i class="fa fa-clone"></i> Courses
    </a>
    <a href="contact.php">
      <i class="fa fa-envelope"></i> Contact
    </a>
    <a href="Admin.php">
      <i class="fa fa-user-secret"></i> Admin
    </a>
    <a href="Register.php">
      <i class="fa fa-user-circle-o"></i> Register
    </a>

    <input type="submit" value="Log Out" name="sub" class="log-out-btn">

    </div>



      <div class="cart">
          <div class="cart-title" name= "item">Cart Items</div>
          <div class="cart-content">
          </div>
          
          <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">Rs.0</div>
          </div>

          <button class="btn-buy" onclick="order()">Place Order</button>
          <button id="cart-close">x</button>
     </div>
      <script type="text/javascript">
        function order (){
          var x = document.getElementByName('item');
          alert(x)
      }
      </script>

     <div class="main-category-box">
        <h1>Choose by Category :</h1>
         <div class="category">

            <a onclick="filterSelection('all')">
              <div class="category-btn " style="border:2px solid #3333ff; color: #3333ff;">
                <img src="images/store/all.png" class="img-cteg" width="60px" height ="60px"><br></a>
                Show all
              </div>

            <a onclick="filterSelection('java2')">
              <div class="category-btn" style="border:2px solid red; color: red;">
                <img src="images/store/java.png" class="img-cteg" width="50px" height ="50px"><br></a>
                Java Programming
              </div>

            <a onclick="filterSelection('web2')">
              <div class="category-btn" style="border:2px solid #3333ff; color: #3333ff;">
                <img src="images/store/web.png" class="img-cteg" width="50px" height ="50px"><br></a>
                Web Development
              </div>

            <a onclick="filterSelection('python2')">
              <div class="category-btn" style="border:2px solid orange; color: #e69500;">
                <img src="images/store/pyth.png" class="img-cteg" width="50px" height ="50px"><br></a>
                 Python Development
              </div>

            <a onclick="filterSelection('full')">
              <div class="category-btn" style="border:2px solid #0d0d0d; color: black;"> 
                <img src="images/store/course.png" class="img-cteg" width="50px" height ="60px"><br></a>
                Full Courses
              </div>

            <a onclick="filterSelection('tute')">
              <div class="category-btn" style="border:2px solid #3333ff;; color: #3333ff;">
                <img src="images/store/tute.png" class="img-cteg" width="60px" height ="60px"><br></a>
                 Tutes
              </div>
        </div>
      </div>

    <div class="shop-content">

          <div class="item-box all full java2">
              <div class="pic"><img src="images/store/javafull.jpg" class="item-img"></div>
              <h2 class="item-title">Java Programming Full Course</h2>
              <span class="item-price">Rs.10000</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
          </div>

          <div class="item-box all full python2">
              <div class="pic"><img src="images/store/pythonfull.jpg" class="item-img"></div>
              <h2 class="item-title">Python Development Full Course</h2>
              <span class="item-price">Rs.12000</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
          </div>

          <div class="item-box all full web2">
              <div class="pic"><img src="images/store/webfull.jpg" class="item-img"></div>
              <h2 class="item-title">Web Development Full Course</h2>
              <span class="item-price">Rs.15000</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
          </div>


          <div class="item-box all java2">         
              <div class="pic"><img src="images/store/java1.jpg" class="item-img"></div>
              <h2 class="item-title">Java Programming Semester 1</h2>
              <span class="item-price">Rs.1500</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
          </div>

          <div class="item-box all java2"> 
              <div class="pic"><img src="images/store/java2.jpg" class="item-img"></div>
              <h2 class="item-title">Java Programming Semester 2</h2>
              <span class="item-price">Rs.1500</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
          </div>
          
        <div class="item-box all java2"> 
            <div class="pic"><img src="images/store/java3.jpg" class="item-img"></div>
            <h2 class="item-title">Java Programming Semester 3</h2>
              <span class="item-price">Rs.1500</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all java2"> 
            <div class="pic"><img src="images/store/java4.jpg" class="item-img"></div>
            <h2 class="item-title">Java Programming Semester 4</h2>
              <span class="item-price">Rs.1500</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

          <div class="item-box all java2"> 
          <div class="pic"><img src="images/store/java5.jpg" class="item-img"></div>
          <h2 class="item-title">Java Programming Semester 5</h2>
              <span class="item-price">Rs.1500</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all java2">
        <div class="pic"><img src="images/store/java6.jpg" class="item-img"></div> 
         <h2 class="item-title">Java Programming Semester 6</h2>
              <span class="item-price">Rs.1500</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all java2 tute">
          <div class="pic"><img src="images/store/javat1.jpg" class="item-img"></div>
          <h2 class="item-title">Java Tute 1 Variables</h2>
              <span class="item-price">Rs.600</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all java2 tute">
          <div class="pic"><img src="images/store/javat2.jpg" class="item-img"></div>
          <h2 class="item-title">Java Tute 2 Data Types</h2>
              <span class="item-price">Rs.600</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all java2 tute">
          <div class="pic"><img src="images/store/javat3.jpg" class="item-img"></div>
          <h2 class="item-title">Java Tute 3 Loops</h2>
              <span class="item-price">Rs.600</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all java2 tute">
          <div class="pic"><img src="images/store/javat4.jpg" class="item-img"></div>
          <h2 class="item-title">Java Tute 4 Statements</h2>
              <span class="item-price">Rs.600</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all web2">
          <div class="pic"><img src="images/store/web1.jpg" class="item-img"></div>
          <h2 class="item-title">Web Development Semester 1</h2>
              <span class="item-price">Rs.1800</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all web2">
          <div class="pic"><img src="images/store/web2.jpg" class="item-img"></div>
          <h2 class="item-title">Web Development Semester 2</h2>
              <span class="item-price">Rs.1800</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all web2">
          <div class="pic"><img src="images/store/web3.jpg" class="item-img"></div>
          <h2 class="item-title">Web Development Semester 3</h2>
              <span class="item-price">Rs.1800</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all web2">
          <div class="pic"><img src="images/store/web4.jpg" class="item-img"></div>
          <h2 class="item-title">Web Development Semester 4</h2>
              <span class="item-price">Rs.1800</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all web2">
          <div class="pic"><img src="images/store/web5.jpg" class="item-img"></div>
          <h2 class="item-title">Web Development Semester 5</h2>
              <span class="item-price">Rs.1800</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all web2">
          <div class="pic"><img src="images/store/web6.jpg" class="item-img"></div>
          <h2 class="item-title">Web Development Semester 6</h2>
              <span class="item-price">Rs.1800</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all web2 tute">
          <div class="pic"><img src="images/store/html.jpg" class="item-img"></div>
          <h2 class="item-title">Web Development Tute - HTML</h2>
              <span class="item-price">Rs.600</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all web2 tute">
          <div class="pic"><img src="images/store/css.jpeg" class="item-img"></div>
          <h2 class="item-title">Web Development Tute - CSS</h2>
              <span class="item-price">Rs.600</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all web2 tute">
          <div class="pic"><img src="images/store/js.jpeg" class="item-img"></div>
          <h2 class="item-title">Web Development Tute - JS</h2>
              <span class="item-price">Rs.600</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all web2 tute">
          <div class="pic"><img src="images/store/php.jpeg" class="item-img"></div>
          <h2 class="item-title">Web Development Tute - PHP</h2>
              <span class="item-price">Rs.600</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all python2">
          <div class="pic"><img src="images/store/pyth1.jpg" class="item-img"></div>
          <h2 class="item-title">Python Development Semester 1</h2>
              <span class="item-price">Rs.2000</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all python2">
          <div class="pic"><img src="images/store/pyth2.jpg" class="item-img"></div>
          <h2 class="item-title">Python Development Semester 2</h2>
              <span class="item-price">Rs.2000</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all python2">
          <div class="pic"><img src="images/store/pyth3.jpg" class="item-img"></div>
          <h2 class="item-title">Python Development Semester 3</h2>
              <span class="item-price">Rs.2000</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all python2">
          <div class="pic"><img src="images/store/pyth4.jpg" class="item-img"></div>
          <h2 class="item-title">Python Development Semester 4</h2>
              <span class="item-price">Rs.2000</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all python2">
          <div class="pic"><img src="images/store/pyth5.jpg" class="item-img"></div>
          <h2 class="item-title">Python Development Semester 5</h2>
              <span class="item-price">Rs.20000</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all python2">
          <div class="pic"><img src="images/store/pyth6.jpg" class="item-img"></div>
          <h2 class="item-title">Python Development Semester 6</h2>
              <span class="item-price">Rs.20000</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all python2 tute">
          <div class="pic"><img src="images/store/pytht1.jpg" class="item-img"></div>
          <h2 class="item-title">Python Tute 1 Variables</h2>
              <span class="item-price">Rs.20000</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all python2 tute">
          <div class="pic"><img src="images/store/pytht2.jpg" class="item-img"></div>
          <h2 class="item-title">Python Tute 2 Data Types</h2>
              <span class="item-price">Rs.500</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all python2 tute">
          <div class="pic"><img src="images/store/pytht3.jpg" class="item-img"></div>
          <h2 class="item-title">Python Tute 3 Loops</h2>
              <span class="item-price">Rs.500</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

        <div class="item-box all python2 tute">
          <div class="pic"><img src="images/store/pytht4.jpg" class="item-img"></div>
          <h2 class="item-title">Python Tute 4 Statements</h2>
              <span class="item-price">Rs.500</span>       
              <button class="add-cart">Add Cart <i class="fa fa-shopping-cart"></i></button>
        </div>

     </div>


     <script type="text/javascript" src="js/shop.js"></script>

    <script>
      const btnCart=document.querySelector('#cart-icon');
      const cart=document.querySelector('.cart');
      const btnClose=document.querySelector('#cart-close');

      btnCart.addEventListener('click',()=>{
        cart.classList.add('cart-active');
      });

      btnClose.addEventListener('click',()=>{
        cart.classList.remove('cart-active');
      });

      document.addEventListener('DOMContentLoaded',loadFood);

      function loadFood(){
        loadContent();

      }

      function loadContent(){
        let btnRemove=document.querySelectorAll('.cart-remove');
        btnRemove.forEach((btn)=>{
          btn.addEventListener('click',removeItem);
        });

        let qtyElements=document.querySelectorAll('.cart-quantity');
        qtyElements.forEach((input)=>{
          input.addEventListener('change',changeQty);
        });

        let cartBtns=document.querySelectorAll('.add-cart');
        cartBtns.forEach((btn)=>{
          btn.addEventListener('click',addCart);
        });

        updateTotal();
      }

      function removeItem(){
        if(confirm('Are Your Sure to Remove')){
          let title=this.parentElement.querySelector('.cart-item-title').innerHTML;
          itemList=itemList.filter(el=>el.title!=title);
          this.parentElement.remove();
          loadContent();
        }
      }

      function changeQty(){
        if(isNaN(this.value) || this.value<1){
          this.value=1;
        }
        loadContent();
      }

      let itemList=[];

      function addCart(){
       let item=this.parentElement;
       let title=item.querySelector('.item-title').innerHTML;
       let price=item.querySelector('.item-price').innerHTML;
       let imgSrc=item.querySelector('.item-img').src;
       
       let newProduct={title,price,imgSrc}

       //Check Product already Exist in Cart
       if(itemList.find((el)=>el.title==newProduct.title)){
        alert("Product Already added in Cart");
        return;
       }else{
        itemList.push(newProduct);
       }


      let newProductElement= createCartProduct(title,price,imgSrc);
      let element=document.createElement('div');
      element.innerHTML=newProductElement;
      let cartBasket=document.querySelector('.cart-content');
      cartBasket.append(element);
      loadContent();
      }


      function createCartProduct(title,price,imgSrc){

        return `
        <div class="cart-box">
        <img src="${imgSrc}" class="cart-img">
        <div class="detail-box">
          <div class="cart-item-title" id="item">${title}</div>
          <div class="price-box">
            <div class="cart-price">${price}</div>
             <div class="cart-amt">${price}</div>
         </div>
          <input type="number" value="1" class="cart-quantity">
        </div>
        <ion-icon name="trash" class="cart-remove"></ion-icon>
      </div>
        `;
      }
       
      function updateTotal()
      {
        const cartItems=document.querySelectorAll('.cart-box');
        const totalValue=document.querySelector('.total-price');

        let total=0;

        cartItems.forEach(product=>{
          let priceElement=product.querySelector('.cart-price');
          let price=parseFloat(priceElement.innerHTML.replace("Rs.",""));
          let qty=product.querySelector('.cart-quantity').value;
          total+=(price*qty);
          product.querySelector('.cart-amt').innerText="Rs."+(price*qty);

        });

        totalValue.innerHTML='Rs.'+total;

        const cartCount=document.querySelector('.cart-count');
        let count=itemList.length;
        cartCount.innerHTML=count;

        if(count==0){
          cartCount.style.display='none';
        }else{
          cartCount.style.display='block';
        }
    }
  </script>
    
  <br><br>

      <div class="footer apply1">
        <div class="box1 apply">
 
          <i class="fa fa-thumbs-o-up"></i>
          REACH US
          <div class="font-apply2">
            <i class="fa fa-map-marker" style="font-size:20px; "></i>
            Siridhamma Mawatha, 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Akmeemana
          </div>
          <div style="font-size: 18px;">
            <i class="fa fa-rss"></i>
            FOLLOW US
          </div>
          <div>
            <a href="#" class="fa fa-instagram apply4"></a>
        <a href="#" class="fa fa-facebook apply4"></a>
        <a href="#" class="fa fa-linkedin apply4"></a>
        <a href="#" class="fa fa-twitter apply4"></a>
        <a href="#" class="fa fa-youtube apply4"></a>
        <a href="#" class="fa fa-google apply4"></a>
        <a href="#" class="fa fa-pinterest apply4"></a>
        <a href="#" class="fa fa-snapchat-ghost apply4"></a>
          </div>
          <div class="font-apply2">
            <i class="fa fa-phone" style="font-size:20px;"></i>
            <a href="tel:+94412225554">0412225554</a>
          </div>
        </div>
        <div class="box1">
          <div style="font-size: 20px; padding:0px 0px 10px 0px;">
            <i class="fa fa-newspaper-o"></i>
            POPULAR NEWS
          </div>
          <a href="news.php#robotic1">
            <div class="footer-news" >
              <mark class="color4">Robotics</mark> 
              <span class="date">2024.09.10</span>
              <br>
              NEW COURSE STARTING NOV 18 <sup>th</sup></a>
            </div>
          
          <a href="news.php#java6">
            <div class="footer-news">
              <mark class="color4">Java</mark>
              <span class="date"> 2024.09.08 </span>
              <br>
              NEW 6<sup>th</sup> BATCH STARTING NOV 12</a>
            </div>
          
          <a href="news.php#python5">
            <div class="footer-news">
              <mark class="color4">Python</mark>
               <span class="date">2024.06.06 </span>
              <br>
              NEW 5<sup>th</sup> BATCH STARTING OCT 6</a>
              <br>
            </div>
          
        </div>
        <div class="box1">
          <div style="font-size: 20px;padding-bottom:10px;">
            <i class="fa fa-puzzle-piece"></i> 
            CATEGORIES
          </div>
            <a href="courses.php#java"><mark class="color5">Java</mark></a>
            <a href="courses.php#web"><mark class="color5">Web Design</mark></a>
            <br><br>
            <a href="courses.php#python"><mark class="color5">Python</mark></a>
            <a href="courses.php#arduino"><mark class="color5">Robotics</mark></a>
            <br><br>
            <a href="courses.php#c1"><mark class="color5">C#</mark></a>
            <a href="courses.php#c2"><mark class="color5">C++</mark></a>
        </div>
        <div class="box1">
          <div style="font-size: 20px;padding-bottom:10px;">
            <i class="fa fa-map-marker"></i>
            FIND US
          </div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.4184450925177!2d80.23076517546636!3d6.074174528220766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae17182cf82c5bf%3A0xcabc61ef94f1ad0e!2sAdvanced%20Technological%20Institute%20-%20Galle!5e0!3m2!1sen!2slk!4v1725649661855!5m2!1sen!2slk" width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
      <div class="copyright-cont">
        <hr>
        Copyright © 2024 Malitha Tishamal. All Rights Reserved.
        <hr>
      </div>
</body>
</html>