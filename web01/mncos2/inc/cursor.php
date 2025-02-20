<!-- 마우스 커서 -->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

<style>
.mouse-cursor {
   position: fixed;
   pointer-events: none;
   z-index: 9999;
   transition: all 0.1s ease;
}

.cursor-outer {
   width: 25px;
   height: 25px;
   border: 1px solid rgba(180, 180, 180, 0.5);
   border-radius: 50%;
}

.cursor-inner {
   width: 6px;
   height: 6px;
   background: rgba(180, 180, 180, 0.5);
   border-radius: 50%;
}

a:hover ~ .cursor-inner,
button:hover ~ .cursor-inner,
input:hover ~ .cursor-inner,
.nav-link:hover ~ .cursor-inner {
  opacity: 0;
}

.cursor-inner.hover {
  opacity: 0;
}

a:hover ~ .cursor-outer,
button:hover ~ .cursor-outer,
input:hover ~ .cursor-outer,
.nav-link:hover ~ .cursor-outer {
   width: 50px;
   height: 50px;
   background: rgba(180, 180, 180, 0.1);
   border: none;
   margin-left: -25px;
   margin-top: -25px;
}

.cursor-outer.hover {
   width: 50px;
   height: 50px;
   background: rgba(180, 180, 180, 0.1);
   border: none;
   margin-left: -25px;
   margin-top: -25px;
}

a:hover ~ .cursor-inner,
button:hover ~ .cursor-inner {
   transform: scale(2);
   background: rgba(180, 180, 180, 0.5);
}


</style>

<script>
document.addEventListener('mousemove', function(e) {
   const inner = document.querySelector('.cursor-inner');
   const outer = document.querySelector('.cursor-outer');
   
   const hoverElements = document.querySelectorAll('a, button, input, .nav-link');
   let isHover = false;
   
   hoverElements.forEach(elem => {
        if (elem.matches(':hover')) {
            isHover = true;
            outer.classList.add('hover');
            inner.classList.add('hover');
        }
    });

    if (!isHover) {
        outer.classList.remove('hover');
        inner.classList.remove('hover'); 
    }
   
   requestAnimationFrame(() => {
       inner.style.transform = `translate(${e.clientX - 3}px, ${e.clientY - 3}px)`;
       outer.style.transform = `translate(${e.clientX - 12.5}px, ${e.clientY - 12.5}px)`;
   });
});
</script>