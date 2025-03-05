<header class="header_wrap">
   <div class="header bh_wrap">
       <div class="header_inner">
           <h1 class="logo">
               <a href="/cosmetic/index.php">
                   <img src="/cosmetic/images/main/logo.png" alt="기업명" class="logo_img">
               </a>
           </h1>
           <button class="hamburger">
               <span></span>
               <span></span>
               <span></span>
           </button>
           <nav class="main_menu">
               <ul>
                   <li class="menu_item has_submenu">
                       <a href="/cosmetic/about/story.php">About Us</a>
                       <ul class="submenu">
                           <li><a href="/cosmetic/about/story.php">스토리</a></li>
                           <li><a href="/cosmetic/about/ceo.php">CEO 인사말</a></li>
                           <li><a href="/cosmetic/about/certification.php">인증서</a></li>
                           <li><a href="/cosmetic/about/direct_inquiry.php">문의하기</a></li>
                           <li><a href="/cosmetic/about/map.php">오시는 길</a></li>
                       </ul>
                   </li>
                   <li class="menu_item">
                       <a href="/cosmetic/brand/index.php">Brand</a>
                   </li>

                   <li class="menu_item">
                   <a href="/cosmetic/shop/skin.php" class="active">Shop</a>
                       <ul class="submenu">
                           <li><a href="/cosmetic/shop/skin.php">기초케어</a></li>
                           <li><a href="/cosmetic/shop/hair.php">헤어케어</a></li>
                           <li><a href="/cosmetic/shop/body.php">바디/핸드케어</a></li>
                       </ul>
                   </li>


                   <li class="menu_item">
                       <a href="/cosmetic/oemodm/oem_odm.php">OEM/ODM</a>
                       <ul class="submenu">
                           <li><a href="/cosmetic/oemodm/oem_odm.php">OEM/ODM</a></li>
                           <li><a href="/cosmetic/oemodm/product.php">개발품목</a></li>
                           <li><a href="/cosmetic/oemodm/rnd.php">R&D</a></li>
                       </ul>
                   </li>

                   <li class="menu_item has_submenu">
                       <a href="/cosmetic/community/notice.php">Community</a>
                       <ul class="submenu">
                           <li><a href="/cosmetic/community/lookbook.php">룩북</a></li>
                           <li><a href="/cosmetic/community/notice.php">공지사항</a></li>
                           <li><a href="/cosmetic/community/inquiry.php">문의사항</a></li>
                           <li><a href="/cosmetic/gallery/index.php">갤러리</a></li>
                       </ul>
                   </li>
               </ul>
           </nav>
       </div>
   </div>
</header>

<style>
/* Base styles */
.header_wrap {
   position: fixed;
   top: 0;
   left: 0;
   width: 100%;
   background: #fff;
   z-index: 1000;
   box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.header {
   max-width: 1200px;
   margin: 0 auto;
   padding: 0 20px;
}

.header_inner {
   display: flex;
   align-items: center;
   justify-content: space-between;
   height: 90px;
}

.logo img {
   height: 40px;
}

/* PC Menu */
.main_menu > ul {
   display: flex;
   list-style: none;
   margin: 0;
   padding: 0;
}

.menu_item {
   position: relative;
   margin: 0 20px;
}

.menu_item > a {
   display: block;
   padding: 10px;
   color: #666;
   text-decoration: none;
   font-size: 18px;
   font-weight: 500;
}

.submenu {
    position: absolute;
    top: 100%;
    left: 0;
    background: #fff;
    min-width: 150px;
    text-align: center;
    text-decoration: none;
    list-style: none;
    padding: 8px 0;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: 0.3s;
    font-size: 16px;
}

.menu_item:hover .submenu {
   opacity: 1;
   visibility: visible;
   transform: translateY(0);
}

.submenu a {
   display: block;
   padding: 8px 20px;
   text-decoration: none;
   color: #666;
   font-size: 16px;
}

.submenu a:hover {
   background: #007a5d;
   color: #fff;
}

/* Hamburger */
.hamburger {
   display: none;
   width: 30px;
   height: 24px;
   border: 0;
   background: none;
   position: relative;
   cursor: pointer;
}

.hamburger span {
   display: block;
   width: 100%;
   height: 2px;
   background: #333;
   position: absolute;
   transition: 0.3s;
}

.hamburger span:nth-child(1) { top: 0; }
.hamburger span:nth-child(2) { top: 50%; transform: translateY(-50%); }
.hamburger span:nth-child(3) { bottom: 0; }

/* Mobile styles */
@media (max-width: 992px) {
   .hamburger {
       display: block;
   }
   
   .main_menu {
       position: fixed;
       top: 90px;
       left: 0;
       width: 100%;
       height: calc(100vh - 90px);
       background: #fff;
       padding: 20px;
       transform: translateX(100%);
       transition: 0.3s;
       overflow-y: auto;
   }
   
   .main_menu.active {
       transform: translateX(0);
   }
   
   .main_menu > ul {
       flex-direction: column;
   }
   
   .menu_item {
       margin: 0;
       border-bottom: 1px solid #eee;
   }
   
   .submenu {
       position: static;
       opacity: 1;
       visibility: visible;
       transform: none;
       box-shadow: none;
       display: none;
       padding-left: 20px;
       text-decoration: none;
   }
   
   .menu_item.active .submenu {
       display: block;
   }
   
   .hamburger.active span:nth-child(1) {
       transform: rotate(45deg);
       top: 50%;
   }
   
   .hamburger.active span:nth-child(2) {
       opacity: 0;
   }
   
   .hamburger.active span:nth-child(3) {
       transform: rotate(-45deg);
       bottom: 50%;
   }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
   const hamburger = document.querySelector('.hamburger');
   const mainMenu = document.querySelector('.main_menu');
   const menuItems = document.querySelectorAll('.has_submenu');

   hamburger.addEventListener('click', function() {
       this.classList.toggle('active');
       mainMenu.classList.toggle('active');
   });

   menuItems.forEach(item => {
       item.addEventListener('click', function(e) {
           if(window.innerWidth <= 992) {
               e.preventDefault();
               this.classList.toggle('active');
           }
       });
   });
});
</script>