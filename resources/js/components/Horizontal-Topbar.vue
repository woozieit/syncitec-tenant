<template>
  <header id="page-topbar">
    <div class="navbar-header">
      <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box">
          <inertia-link href="/" class="logo logo-dark">
            <span class="logo-sm">
              <img src="/images/logo-sm-dark.png" alt height="22" />
            </span>
            <span class="logo-lg">
              <img src="/images/logo-dark.png" alt height="20" />
            </span>
          </inertia-link>

          <inertia-link href="/" class="logo logo-light">
            <span class="logo-sm">
              <img src="/images/logo-sm-light.png" alt height="22" />
            </span>
            <span class="logo-lg">
              <img src="/images/logo-light.png" alt height="20" />
            </span>
          </inertia-link>
        </div>

        <button
          type="button"
          class="btn btn-sm px-3 font-size-24 d-lg-none header-item"
          data-toggle="collapse"
          @click="toggleMenu"
        >
          <i class="ri-menu-2-line align-middle"></i>
        </button>

      </div>

      <div class="d-flex">

        <div class="dropdown d-none d-lg-inline-block ml-1">
          <button
            type="button"
            class="btn header-item noti-icon waves-effect"
            data-toggle="fullscreen"
            @click="initFullScreen"
          >
            <i class="ri-fullscreen-line"></i>
          </button>
        </div>

        <b-dropdown
          right
          menu-class="dropdown-menu-lg p-0"
          toggle-class="header-item noti-icon"
          variant="black"
        >
          <template v-slot:button-content>
            <i class="ri-notification-3-line"></i>
            <span class="noti-dot"></span>
          </template>
          <div class="p-3">
            <div class="row align-items-center">
              <div class="col">
                <h6 class="m-0">
                  Notificaciones
                </h6>
              </div>
              <div class="col-auto">
                <a href="#!" class="small">Ver todos</a>
              </div>
            </div>
          </div>
          <simplebar style="max-height: 230px">
            <a href class="text-reset notification-item">
              <div class="media">
                <div class="avatar-xs mr-3">
                  <span
                    class="avatar-title bg-primary rounded-circle font-size-16"
                  >
                    <i class="ri-shopping-cart-line"></i>
                  </span>
                </div>
                <div class="media-body">
                  <h6 class="mt-0 mb-1">
                    Your order is placed
                  </h6>
                  <div class="font-size-12 text-muted">
                    <p class="mb-1">
                      if several languaje.
                    </p>
                    <p class="mb-0">
                      <i class="mdi mdi-clock-outline"></i>
                      3 min ago
                    </p>
                  </div>
                </div>
              </div>
            </a>
            <a href class="text-reset notification-item">
              <div class="media">
                <img
                  src="/images/users/avatar-3.jpg"
                  class="mr-3 rounded-circle avatar-xs"
                  alt="user-pic"
                />
                <div class="media-body">
                  <h6 class="mt-0 mb-1">
                    Angel Rojas
                  </h6>
                  <div class="font-size-12 text-muted">
                    <p class="mb-1">
                      lol
                    </p>
                    <p class="mb-0">
                      <i class="mdi mdi-clock-outline"></i>
                      1 hours ago
                    </p>
                  </div>
                </div>
              </div>
            </a>
            <a href class="text-reset notification-item">
              <div class="media">
                <div class="avatar-xs mr-3">
                  <span
                    class="avatar-title bg-success rounded-circle font-size-16"
                  >
                    <i class="ri-checkbox-circle-line"></i>
                  </span>
                </div>
                <div class="media-body">
                  <h6 class="mt-0 mb-1">
                    Your item is shippid
                  </h6>
                  <div class="font-size-12 text-muted">
                    <p class="mb-1">
                      {descripociion
                    </p>
                    <p class="mb-0">
                      <i class="mdi mdi-clock-outline"></i>
                      4 hours ago
                    </p>
                  </div>
                </div>
              </div>
            </a>
            <a href class="text-reset notification-item">
              <div class="media">
                <img
                  src="/images/users/avatar-4.jpg"
                  class="mr-3 rounded-circle avatar-xs"
                  alt="user-pic"
                />
                <div class="media-body">
                  <h6 class="mt-0 mb-1">
                    Angel Rojas - Admin
                  </h6>
                  <div class="font-size-12 text-muted">
                    <p class="mb-1">
                      aaaaaaa
                    </p>
                    <p class="mb-0">
                      <i class="mdi mdi-clock-outline"></i>
                      1 min ago
                    </p>
                  </div>
                </div>
              </div>
            </a>
          </simplebar>
          <div class="p-2 border-top">
            <a
              class="btn btn-sm btn-link font-size-14 btn-block text-center"
              href="javascript:void(0)"
            >
              <i class="mdi mdi-arrow-right-circle mr-1"></i>
              Leer más
            </a>
          </div>
        </b-dropdown>

        <b-dropdown
          right
          variant="black"
          toggle-class="header-item"
          class="d-inline-block user-dropdown"
        >
          <template v-slot:button-content>
            <img
              class="rounded-circle header-profile-user"
              src="/images/users/avatar-2.jpg"
              alt="Header Avatar"
            />
            <span class="d-none d-xl-inline-block ml-1">
                {{ $page.props.auth.admin.name }}
            </span>
            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
          </template>
          <!-- item-->
          <a class="dropdown-item" href="#">
            <i class="ri-user-line align-middle mr-1"></i>
            Mi Pérfil
          </a>
          <a class="dropdown-item" href="#">
            <i class="ri-wallet-2-line align-middle mr-1"></i>
            Mi billetera
          </a>
          <a class="dropdown-item d-block" href="#">
            <span class="badge badge-success float-right mt-1">11</span>
            <i class="ri-settings-2-line align-middle mr-1"></i>
            Configuración
          </a>
          <a class="dropdown-item" href="#">
            <i class="ri-lock-unlock-line align-middle mr-1"></i>
            Bloquear
          </a>
          <div class="dropdown-divider"></div>
          <inertia-link class="dropdown-item text-danger" :href="route('admin.logout')" method="post" as="button">
            <i class="ri-shut-down-line align-middle mr-1 text-danger"></i>
            Cerrar Sessión
          </inertia-link>
        </b-dropdown>

      </div>
    </div>
  </header>
</template>

<script>
import simplebar from "simplebar-vue";
import 'simplebar/dist/simplebar.min.css';

export default {
    components: { simplebar },
    methods: {
        initFullScreen() {
            document.body.classList.toggle("fullscreen-enable");
            if (
                !document.fullscreenElement &&
                /* alternative standard method */ !document.mozFullScreenElement &&
                !document.webkitFullscreenElement
            ) {
                // current working methods
                if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(
                    Element.ALLOW_KEYBOARD_INPUT
                );
                }
            } else {
                if (document.cancelFullScreen) {
                document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
                }
            }
        },
        toggleMenu() {
            let element = document.getElementById("topnav-menu-content");
            element.classList.toggle("show");
        }
    },
    mounted() {
        document.body.setAttribute("data-topbar", "dark");
        document.body.setAttribute("data-layout-mode", "fluid");
    }
}
</script>

