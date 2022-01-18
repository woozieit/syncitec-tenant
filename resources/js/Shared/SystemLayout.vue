<template>
    <div>

        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <i class="ri-loader-line spin-icon"></i>
                </div>
            </div>
        </div>

      <div id="layout-wrapper">

          <HorizontalTopbar />
          <HorizontalNav />

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <FlashMessages />
                        <transition name="fade">
                            <slot />
                        </transition>
                    </div>
                </div>

                <Footer />
            </div>
      </div>

    </div>
</template>

<script>
  import HorizontalTopbar from '@/Components/Horizontal-Topbar'
  import HorizontalNav from '@/Components/Horizontal-Navbar'
  import Footer from "@/Components/Footer";
  import FlashMessages from '@/Shared/FlashMessages'

  export default {
      components: {
          HorizontalTopbar,
          HorizontalNav,
          Footer,
          FlashMessages
      },
      created: () => {
        document.body.setAttribute("data-layout", "horizontal");
        document.body.setAttribute("data-topbar", "dark");
        document.body.removeAttribute("data-sidebar", "dark");
        document.body.removeAttribute("data-layout-size", "boxed");
      },
      mounted() {
        document.body.classList.remove("auth-body-bg");
        if (this.loader === true) {
            document.getElementById("preloader").style.display = "block";
            document.getElementById("status").style.display = "block";

            setTimeout(function () {
                document.getElementById("preloader").style.display = "none";
                document.getElementById("status").style.display = "none";
            }, 2500);
        } else {
            document.getElementById("preloader").style.display = "none";
            document.getElementById("status").style.display = "none";
        }
    },
  }
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0
}
</style>
