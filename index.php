<?php
$title = 'Home';
$page = 'home';
include_once('./php/header.php');
?>

    <!-- login form  -->

    <div class="login-form-container">
      <div id="close-login-btn" class="fas fa-times"></div>

      <form action="">
        <h3>sign in</h3>
        <span>username</span>
        <input
          type="email"
          name=""
          class="box"
          placeholder="enter your email"
          id=""
        />
        <span>password</span>
        <input
          type="password"
          name=""
          class="box"
          placeholder="enter your password"
          id=""
        />
        <div class="checkbox">
          <input type="checkbox" name="" id="remember-me" />
          <label for="remember-me"> remember me</label>
        </div>
        <input type="submit" value="sign in" class="btn" />
        <p>forget password ? <a href="#">click here</a></p>
        <p>don't have an account ? <a href="#">create one</a></p>
      </form>
    </div>

    <!-- home section -->

    <section class="home" id="home">
      <div class="row">
        <div class="content">
          <h3>up to 75% off</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam
            deserunt nostrum accusamus. Nam alias sit necessitatibus, aliquid ex
            minima at!
          </p>
          <a href="#" class="btn">shop now</a>
        </div>

        <div class="swiper books-slider">
          <div class="swiper-wrapper">
            <a href="#" class="swiper-slide"
              ><img src="./image/book-1.jpg" alt=""
            /></a>
            <a href="#" class="swiper-slide"
              ><img src="image/book-2.jpg" alt=""
            /></a>
            <a href="#" class="swiper-slide"
              ><img src="image/book-3.jpg" alt=""
            /></a>
            <a href="#" class="swiper-slide"
              ><img src="image/book-4.jpg" alt=""
            /></a>
            <a href="#" class="swiper-slide"
              ><img src="image/book-5.jpg" alt=""
            /></a>
            <a href="#" class="swiper-slide"
              ><img src="image/book-6.jpg" alt=""
            /></a>
          </div>
          <img src="image/stand.png" class="stand" alt="" />
        </div>
      </div>
    </section>

    <!-- icons section -->

    <section class="icons-container">
      <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <div class="content">
          <h3>free shipping</h3>
          <p>order over 200 Lei</p>
        </div>
      </div>

      <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
          <h3>secure payment</h3>
          <p>100 secure payment</p>
        </div>
      </div>

      <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
          <h3>easy returns</h3>
          <p>15 days returns</p>
        </div>
      </div>

      <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
          <h3>24/7 support</h3>
          <p>call us anytime</p>
        </div>
      </div>
    </section>

    <!-- featured section -->

    <section class="featured" id="featured">
      <h1 class="heading"><span>featured books</span></h1>

      <div class="swiper featured-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide box">
            <div class="icons">
              <a href="#" class="fas fa-search"></a>
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
              <img src="image/book-1.jpg" alt="" />
            </div>
            <div class="content">
              <h3>featured books</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <a href="#" class="btn">add to cart</a>
            </div>
          </div>

          <div class="swiper-slide box">
            <div class="icons">
              <a href="#" class="fas fa-search"></a>
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
              <img src="image/book-2.jpg" alt="" />
            </div>
            <div class="content">
              <h3>featured books</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <a href="#" class="btn">add to cart</a>
            </div>
          </div>

          <div class="swiper-slide box">
            <div class="icons">
              <a href="#" class="fas fa-search"></a>
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
              <img src="image/book-3.jpg" alt="" />
            </div>
            <div class="content">
              <h3>featured books</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <a href="#" class="btn">add to cart</a>
            </div>
          </div>

          <div class="swiper-slide box">
            <div class="icons">
              <a href="#" class="fas fa-search"></a>
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
              <img src="image/book-4.jpg" alt="" />
            </div>
            <div class="content">
              <h3>featured books</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <a href="#" class="btn">add to cart</a>
            </div>
          </div>

          <div class="swiper-slide box">
            <div class="icons">
              <a href="#" class="fas fa-search"></a>
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
              <img src="image/book-5.jpg" alt="" />
            </div>
            <div class="content">
              <h3>featured books</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <a href="#" class="btn">add to cart</a>
            </div>
          </div>

          <div class="swiper-slide box">
            <div class="icons">
              <a href="#" class="fas fa-search"></a>
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
              <img src="image/book-6.jpg" alt="" />
            </div>
            <div class="content">
              <h3>featured books</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <a href="#" class="btn">add to cart</a>
            </div>
          </div>

          <div class="swiper-slide box">
            <div class="icons">
              <a href="#" class="fas fa-search"></a>
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
              <img src="image/book-7.jpg" alt="" />
            </div>
            <div class="content">
              <h3>featured books</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <a href="#" class="btn">add to cart</a>
            </div>
          </div>

          <div class="swiper-slide box">
            <div class="icons">
              <a href="#" class="fas fa-search"></a>
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
              <img src="image/book-8.jpg" alt="" />
            </div>
            <div class="content">
              <h3>featured books</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <a href="#" class="btn">add to cart</a>
            </div>
          </div>

          <div class="swiper-slide box">
            <div class="icons">
              <a href="#" class="fas fa-search"></a>
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
              <img src="image/book-9.jpg" alt="" />
            </div>
            <div class="content">
              <h3>featured books</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <a href="#" class="btn">add to cart</a>
            </div>
          </div>

          <div class="swiper-slide box">
            <div class="icons">
              <a href="#" class="fas fa-search"></a>
              <a href="#" class="fas fa-heart"></a>
              <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
              <img src="image/book-10.jpg" alt="" />
            </div>
            <div class="content">
              <h3>featured books</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <a href="#" class="btn">add to cart</a>
            </div>
          </div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </section>

    <!-- newsletter section -->
    <section class="newsletter">
      <form action="">
        <h3>subscribe for latest updates</h3>
        <input
          type="email"
          name=""
          placeholder="enter your email"
          id=""
          class="box"
        />
        <input type="submit" value="subscribe" class="btn" />
      </form>
    </section>

    <!-- arrivals section  -->
    <section class="arrivals" id="arrivals">
      <h1 class="heading"><span>new arrivals</span></h1>

      <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">
          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="image/book-1.jpg" alt="" />
            </div>
            <div class="content">
              <h3>new arrivals</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="image/book-2.jpg" alt="" />
            </div>
            <div class="content">
              <h3>new arrivals</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="image/book-3.jpg" alt="" />
            </div>
            <div class="content">
              <h3>new arrivals</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="image/book-4.jpg" alt="" />
            </div>
            <div class="content">
              <h3>new arrivals</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="image/book-5.jpg" alt="" />
            </div>
            <div class="content">
              <h3>new arrivals</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">
          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="image/book-6.jpg" alt="" />
            </div>
            <div class="content">
              <h3>new arrivals</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="image/book-7.jpg" alt="" />
            </div>
            <div class="content">
              <h3>new arrivals</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="image/book-8.jpg" alt="" />
            </div>
            <div class="content">
              <h3>new arrivals</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="image/book-9.jpg" alt="" />
            </div>
            <div class="content">
              <h3>new arrivals</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </a>

          <a href="#" class="swiper-slide box">
            <div class="image">
              <img src="image/book-10.jpg" alt="" />
            </div>
            <div class="content">
              <h3>new arrivals</h3>
              <div class="price">25.99 Lei <span>30.99 Lei</span></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>

    <!-- deal section -->
    <section class="deal">
      <div class="content">
        <h3>deal of the day</h3>
        <h1>up to 50% off</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde
          perspiciatis in atque dolore tempora quaerat at fuga dolorum natus
          velit.
        </p>
        <a href="#" class="btn">shop now</a>
      </div>

      <div class="image">
        <img src="image/deal-img.jpg" alt="" />
      </div>
    </section>
   
    <?php 
    include_once('./php/footer.php');
    ?>
  </body>
</html>
