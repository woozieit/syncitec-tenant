<template>
  <div class="topnav">
    <div class="container-fluid">
      <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
        <div class="collapse navbar-collapse" id="topnav-menu-content">
          <ul class="navbar-nav">
            <li class="nav-item dropdown" v-for="(item, index) of menuItems" :key="index">

              <inertia-link tag="a" v-if="!item.subItems" :href="route(`${item.link}`)" class="nav-link dropdown-toggle arrow-none">
                <i :class="`${item.icon} mr-2`"></i>
                {{ item.label }}
              </inertia-link>

              <a
                v-if="item.subItems"
                class="nav-link dropdown-toggle arrow-none"
                @click="onMenuClick"
                href="javascript: void(0);"
                id="topnav-components"
                role="button"
              >
                <i :class="`${item.icon} mr-2`"></i>
                {{ item.label }}
                <div class="arrow-down"></div>
              </a>
              <div
                class="dropdown-menu row"
                aria-labelledby="topnav-dashboard"
                v-if="hasItems(item)"
              >
                <template v-for="(subitem) of item.subItems">
                  <inertia-link
                    :key="subitem.id"
                    class="col dropdown-item side-nav-link-ref"
                    v-if="!hasItems(subitem)"
                    :href="subitem.link"
                  >{{ subitem.label }}</inertia-link>
                  <div class="dropdown" v-if="hasItems(subitem)" :key="subitem.id">
                    <a class="dropdown-item" href="javascript: void(0);" @click="onMenuClick">
                      {{ subitem.label }}
                      <div class="arrow-down"></div>
                    </a>
                    <div class="dropdown-menu">
                      <inertia-link
                        v-for="(subSubitem, index) of subitem.subItems"
                        :key="index"
                        :href="subSubitem.link"
                        class="dropdown-item side-nav-link-ref"
                      >{{ subSubitem.label }}</inertia-link>
                    </div>
                  </div>
                </template>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
import { menuItems } from "./horizontal-admin-menu";

export default {
  data() {
    return {
      menuItems: menuItems
    };
  },
  mounted() {
    var links = document.getElementsByClassName("side-nav-link-ref");
    var matchingMenuItem = null;
    for (var i = 0; i < links.length; i++) {
      if (window.location.pathname === links[i].pathname) {
        matchingMenuItem = links[i];
        break;
      }
    }
    if (matchingMenuItem) {
      matchingMenuItem.classList.add("active");
      var parent = matchingMenuItem.parentElement;

      /**
       * TODO: This is hard coded way of expading/activating parent menu dropdown and working till level 3.
       * We should come up with non hard coded approach
       */
      if (parent) {
        parent.classList.add("active");
        const parent2 = parent.parentElement;
        if (parent2) {
          parent2.classList.add("active");
        }
        const parent3 = parent2.parentElement;
        if (parent3) {
          parent3.classList.add("active");
          var childAnchor = parent3.querySelector(".has-dropdown");
          if (childAnchor) childAnchor.classList.add("active");
        }

        const parent4 = parent3.parentElement;
        if (parent4) parent4.classList.add("active");
        const parent5 = parent4.parentElement;
        if (parent5) parent5.classList.add("active");
      }
    }
  },
  methods: {
    /**
     * Menu clicked show the submenu
     */
    onMenuClick(event) {
      event.preventDefault();
      const nextEl = event.target.nextSibling;
      if (nextEl && !nextEl.classList.contains("show")) {
        const parentEl = event.target.parentNode;
        if (parentEl) {
          parentEl.classList.remove("show");
        }
        nextEl.classList.add("show");
      } else if (nextEl) {
        nextEl.classList.remove("show");
      }
      return false;
    },
    /**
     * Returns true or false if given menu item has child or not
     * @param item menuItem
     */
    hasItems(item) {
      return item.subItems !== undefined ? item.subItems.length > 0 : false;
    }
  }
}
</script>
